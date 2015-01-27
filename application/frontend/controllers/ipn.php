<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ipn extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('checkout_model');
        $this->load->helper('url');
        $this->load->helper('cookie');
    }

    public function ipn_pay($order=NULL) {
		
		/*$emailarr["to"] = "mukeshkaushal2008gmail.com";
        $emailarr["subject"] = "IPN";
        $emailarr["message"] = "hi";
        $this->email_model->sendIndividualEmail($emailarr);
		*/
		
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.sandbox.paypal.com/cgi-bin/webscr");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        $res = curl_exec($ch);
        $err   = curl_error($ch);
        if (!($res = curl_exec($ch))) {
            curl_close($ch);
            // redirect and show failure message
//            $err = "Curl fail";
        }
        

        if (strcmp($res, "VERIFIED") == 0) {
            //update transaction and order_status in orders table here 
            //$this->checkout_model->update_order($order);
            $text .= "SUCCESS!\n";
        } else if (strcmp($res, "INVALID") == 0) {
            $text .= 'FAIL: ' . "\n";
        }
        $text = '[' . date('m/d/Y g:i A') . '] - ';
        $text .= "IPN POST Vars from Paypal:\n";
       
	   
		
		//@@@@@@@@@@@@@@@@@@@@@   ADD USER ID TO RECORD ALSO 
        $ipn_data = $_POST;
        foreach ($ipn_data as $key => $value){
			/*if($key == 'txn_id') {
                $txn = $value;
            }*/
            $text .= "$key=$value\n ";
        }
        
        //update orders table 
     	/*$emailarr["to"] = "mukeshkaushal2008@gmail.com";
	    $emailarr["subject"] = "IPN";
	    $emailarr["message"] = $text.'---'.$txn.'------*******************************'.$order;
	    $this->email_model->sendIndividualEmail($emailarr);*/
        ////////////////////////////////////////////////////////////
		$data['text'] = $text;
        $log_data = array(
            'paypal_log_data' => serialize($data),
            'paypal_log_created' => date('Y-m-d H:i:s'),
            'user_id' => "1",
            'cause_donations_id' => $order,
        );
		
        $this->checkout_model->ipn_update_order($order,$_POST['txn_id']);//inside checkout model 
        $this->checkout_model->ipn_log_transaction($log_data);//inside checkout model 
    }
}

?>