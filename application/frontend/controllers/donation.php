<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

///// lib used to make payment by both method 
//https://devtools-paypal.com/guide/pay_savedcard/php?env=sandbox
use PayPal\Api\CreditCard;
use PayPal\Api\Amount;
use PayPal\Api\FundingInstrument;
use PayPal\Api\CreditCardToken;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PPConnectionException;

class donation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("start_cause_model");
        $this->load->model("user_model");
        $this->load->model("email_model");
    }

    public function index() {
        
    }

    function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(array($this, __FUNCTION__), $d);
        } else {
            // Return array
            return $d;
        }
    }

    public function paypal_checkout() {
        // debug($_POST);die;
        //Discover - 6011000990139424
        //amex - 378734493671000
        //master -5484695080644918
        //visa - 4417119669820331
        require(BASEPATH . 'libraries/paypal/bootstrap.php');
        $array['casue_id'] = $_POST['cause_id'];
        $array['amount'] = $_POST['amount'];
        $array['card'] = $_POST['card'];
        $array['cnumber'] = $_POST['cnumber'];
        $array['exp_month'] = $_POST['exp_month'];
        $array['exp_year'] = $_POST['exp_year'];
        $array['cvc'] = $_POST['cvc'];
        $user_id = $this->session->userdata('userid');
        $user_type = trim($this->session->userdata('user_type'));
        $support_as = $_POST['support_as'];
        /* $array['casue_id'] = '5';  
          $array['amount'] = '55';
          $array['card'] = 'visa';
          $array['cnumber'] = '4417119669820331';
          $array['exp_month'] = '11';
          $array['exp_year'] = '2019';
          $array['cvc'] = '012';
         */

        $sum = number_format($array['amount'], 2);
        $card = new CreditCard();
        $card->setType($array['card'])
                ->setNumber($array['cnumber'])
                ->setExpireMonth($array['exp_month'])
                ->setExpireYear($array['exp_year'])
                ->setCvv2($array['cvc'])
                ->setFirstName('test')
                ->setLastName('payment');

        try {
            /////save card 
            $card->create($apiContext);
            $arr['card_id'] = $card->id;
            $arr['number'] = $card->number;

            //debug($card);
            ////// save card end //////
            ////deduct amount start ///////	 
// ### Credit card token
// Saved credit card id from a previous call to
// CreateCreditCard.php
            $creditCardToken = new CreditCardToken();
            $creditCardToken->setCreditCardId($arr['card_id']);

// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// For stored credit card payments, set the CreditCardToken
// field on this object.	 
            $fi = new FundingInstrument();
            $fi->setCreditCardToken($creditCardToken);


// ### Payer
// A resource representing a Payer that funds a payment
// For stored credit card payments, set payment method
// to 'credit_card'.

            $payer = new Payer();
            $payer->setPaymentMethod("credit_card")
                    ->setFundingInstruments(array($fi));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
            $amount = new Amount();
            $amount->setCurrency("USD")
                    ->setTotal($sum);


// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                    ->setDescription("Donation By user on crowdcauses");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
            $payment = new Payment();
            $payment->setIntent("sale")
                    ->setPayer($payer)
                    ->setTransactions(array($transaction));

            // ###Create Payment
            // Create a payment by calling the 'create' method
            // passing it a valid apiContext.
            // (See bootstrap.php for more on `ApiContext`)
            // The return object contains the state.
            try {
                $payment->create($apiContext);


                $response = array('transection_id' => $payment->id,
                    'status' => $payment->state,
                    'card_id' => $arr['card_id'],
                    'card_number' => $arr['number']);
                //debug($response);die;
            } catch (PayPal\Exception\PPConnectionException $ex) {
                $error_object = json_decode($ex->getData());
                //debug($error_object);die;
                switch ($error_object->name) {
                    case 'VALIDATION_ERROR':
                        $error = "Payment failed due to invalid Credit Card details:\n";
                        foreach ($error_object->details as $e) {
                            $error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
                        }
                        break;
                }
                $response = array('status' => 'error', 'msg' => $error);
            }
            //debug($error);die; 
            ///////deduct amount end  ////////
        } catch (PayPal\Exception\PPConnectionException $ex) {
            $error_object = json_decode($ex->getData());
            switch ($error_object->name) {
                case 'VALIDATION_ERROR':
                    $error = "Payment failed due to invalid Credit Card details:\n";
                    foreach ($error_object->details as $e) {
                        $error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
                    }
                    break;
            }

            $response = array('status' => 'error', 'msg' => $error);
        }

        if ($response['status'] == 'approved') {

            $userdata['user_id'] = $user_id;
            if ($user_type == "") {
                $userdata['user_type'] = 'guest';
            } else {
                $userdata['user_type'] = $user_type;
            }
            $userdata['card_id'] = $response['card_id'];
            $userdata['card_number'] = $response['card_number'];
            $userdata['status'] = 1;
            $userdata['time'] = time();

            if ($this->user_model->save_user_card($userdata)) {
                $arr1['user_id'] = $user_id;
                if ($user_type == "") {
                    $arr1['user_type'] = 'guest';
                } else {
                    $arr1['user_type'] = $user_type;
                }
                $arr1['cause_id'] = $array['casue_id'];
                $arr1['amount'] = $array['amount'];
                $arr1['transection_id'] = $response['transection_id'];
                $arr1['status'] = 1;
                $arr1['time'] = time();
                $arr1['payment_type'] = 'credit_card';
                $arr1['support_as'] = $support_as;


                if ($this->start_cause_model->save_user_donation($arr1)) {
                    $id = $this->db->insert_id();
                    $result['status'] = 'success';
                    $result['msg'] = 'Your payment has been completed successfully.';
                    $result['data'] = $id;
                } else {
                    $result['status'] = 'error';
                    $result['msg'] = 'Your payment has been completed successfully , but there is an error to update database please contact to admin.';
                    $result['data'] = '';
                }
            } else {
                $result['status'] = 'error';
                $result['msg'] = 'Your payment has been completed successfully , but there is an error to update database please contact to admin.';
                $result['data'] = '';
            }
            echo json_encode($result);
        } else {
            echo json_encode($response);
        }
        // die;
    }

    public function save_card() {

        require(BASEPATH . 'libraries/paypal/bootstrap.php');

        $array['card'] = $_POST['card'];
        $array['cnumber'] = $_POST['cnumber'];
        $array['exp_month'] = $_POST['exp_month'];
        $array['exp_year'] = $_POST['exp_year'];
        $array['cvc'] = $_POST['cvc'];
        /* $array['card'] = 'visa';
          $array['cnumber'] = '4417119669820331';
          $array['exp_month'] = '11';
          $array['exp_year'] = '2019';
          $array['cvc'] = '012';
         */
        $card = new CreditCard();
        $card->setType($array['card'])
                ->setNumber($array['cnumber'])
                ->setExpireMonth($array['exp_month'])
                ->setExpireYear($array['exp_year'])
                ->setCvv2($array['cvc'])
                ->setFirstName('test')
                ->setLastName('payment');

        try {
            /////save card 
            $card->create($apiContext);
            // debug($card);die;
            $response = array();
            $arr['card_id'] = $card->id;
            $arr['number'] = $card->number;
            $response = array('status' => $card->state, 'card_id' => $arr['card_id'], 'card_number' => $arr['number']);
            ////// save card end //////

            /* debug($response);die; */

            //$user_id =  $this->session->userdata('login_userid');
            $signup_userdata = array();
            $signup_userdata = $this->session->userdata('signup_userdata');
            $user_id = $signup_userdata["login_userid"];
            $user_email = $signup_userdata["email"];
            $user_type = $this->session->userdata('register_user_type');
            //debug($response);
            //debug($this->session->userdata);

            if ($response['status'] == 'ok') {
                $userdata['user_id'] = $user_id;
                if ($user_type == "") {
                    $userdata['user_type'] = 'guest';
                } else {
                    $userdata['user_type'] = $user_type;
                }
                $userdata['card_id'] = $response['card_id'];
                $userdata['card_number'] = $response['card_number'];
                $userdata['status'] = 1;
                $userdata['time'] = time();
                //save card data to the database
                if ($this->user_model->save_user_card($userdata)) {

                    /*                     * ***********************************************************************************
                      SEND EMAIL TO THE USER AND VERIFY THE EMAIL //MEANS USER STATUS MARK HIM AS ACTIVE
                     * *********************************************************************************** */
                    //read the session first from signup page

                    if ($user_type == "personal") {
                        $type = base64_encode('personal');
                    } else {
                        $type = base64_encode('organisations');
                    }
                    $emailarr["to"] = $user_email;
                    $emailarr["subject"] = "Sign Up Verification Notification";
                    $txt = 'logins/verify_email/?verify=' . base64_encode($userdata['user_id']) . "&type=" . $type . '';
                    $link = '<a href=' . base_url() . $txt . '>' . base_url() . $txt . '</a>';
                    $emailarr["message"] = "<p>Hi " . $arr['name'] . "</p>
						<p>Welcome to " . $this->config->item("sitename") . "</p> 
						<p>We are glad you signed up for your user account. Once you confirm your email address through the link below, you are all set to build your profile.</p>
						<p>Please click on the link below to be redirected to your recently created " . $this->config->item("sitename") . " profile.</p>
						<p>" . $link . "</p>
						<p>We hope you have an enjoyable experience with us.</p>
						<p>Best Wishes,</p>
						<p>" . $this->config->item("sitename") . " Team</p>";

                    $email_send = $this->email_model->sendIndividualEmail($emailarr);

                    if ($email_send == 0) {
                        $this->session->unset_userdata('signup_userdata'); //unset session userid after inserting to database
                        $this->session->unset_userdata('register_user_type'); //unset signup user type

                        $result['status'] = 'success';
                        $result['msg'] = 'Your account was successfully created. Please check your inbox for a confirmation email.';
                    } else {
                        $result['status'] = 'error';
                        $result['msg'] = 'You card has been saved successfully but there is an error to while sending email please contact to admin.';
                    }
                } else {
                    $result['status'] = 'error';
                    $result['msg'] = 'There is an error to update database please contact to admin.';
                }
                echo json_encode($result);
                die;
            }
        } catch (PayPal\Exception\PPConnectionException $ex) {
            $error_object = json_decode($ex->getData());
            switch ($error_object->name) {
                case 'VALIDATION_ERROR':
                    $error = "Payment failed due to invalid Credit Card details:\n";
                    foreach ($error_object->details as $e) {
                        $error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
                    }
                    break;
            }
            $response = array('status' => 'error', 'msg' => $error);
            echo json_encode($response);
            die;
        }
    }

    public function paypal() {
        $arr["amount"] = $this->input->post("amount");
        $arr['support_as'] = $this->input->post("support_as");
        $arr["user_id"] = $this->session->userdata("userid");

        if ($arr["user_id"] <> "") {
            $arr["user_id"] = $arr["user_id"];
            $arr["user_type"] = $this->session->userdata("user_type");
        } else {
            $arr["user_id"] = '0';
            $arr["user_type"] = 'guest';
        }

        $arr["cause_id"] = $this->input->post("cause_id");
        $arr['payment_type'] = 'site';
        $arr['transection_id'] = '';
        $arr['status'] = 0;
        $arr['time'] = time();

        $this->start_cause_model->save_user_donation($arr);
        $last_id = $this->db->insert_id();
        $this->load->library('Paypal');
        $this->paypal->initialize();


        $this->paypal->add_field('return', base_url() . 'cause/thankyou/' . $arr["cause_id"] . '/' . $last_id);
        $this->paypal->add_field('cancel_return', base_url() . 'home/');
        $this->paypal->add_field('notify_url', base_url() . 'ipn/ipn_pay/' . $last_id);

        $this->paypal->add_field('item_name', "Donations");
        $this->paypal->add_field('amount', $arr["amount"]);
        $this->paypal->add_field('quantity', 1);
        $this->paypal->paypal_auto_form();
        //$this->paypal->pay();
    }

    public function pay_card() {
        // debug($_POST);die;
        require(BASEPATH . 'libraries/paypal/bootstrap.php');
        $array['casue_id'] = $_POST['cause_id'];
        $array['amount'] = $_POST['amount'];
        $user_id = $this->session->userdata('userid');
        $user_type = trim($this->session->userdata('user_type'));
        $support_as = $_POST['support_as'];
        $arr['card_id'] = $_POST['card_id'];

        $sum = number_format($array['amount'], 2);

// ### Credit card token
// Saved credit card id from a previous call to
// CreateCreditCard.php
        $creditCardToken = new CreditCardToken();
        $creditCardToken->setCreditCardId($arr['card_id']);

// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// For stored credit card payments, set the CreditCardToken
// field on this object.	 
        $fi = new FundingInstrument();
        $fi->setCreditCardToken($creditCardToken);


// ### Payer
// A resource representing a Payer that funds a payment
// For stored credit card payments, set payment method
// to 'credit_card'.

        $payer = new Payer();
        $payer->setPaymentMethod("credit_card")
                ->setFundingInstruments(array($fi));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount = new Amount(); //SGD
        $amount->setCurrency("USD")
                ->setTotal($sum);

        //debug($amount);
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setDescription("Donation By user on crowdcause");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions(array($transaction));

        // ###Create Payment
        // Create a payment by calling the 'create' method
        // passing it a valid apiContext.
        // (See bootstrap.php for more on `ApiContext`)
        // The return object contains the state.
        try {
            $payment->create($apiContext);

            $response = array('transection_id' => $payment->id, 'status' => $payment->state, 'card_id' => $arr['card_id'], 'card_number' => $arr['number']);
        } catch (PayPal\Exception\PPConnectionException $ex) {
            $error_object = json_decode($ex->getData());

            switch ($error_object->name) {
                case 'VALIDATION_ERROR':
                    $error = "Payment failed due to invalid Credit Card details:\n";
                    foreach ($error_object->details as $e) {
                        $error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
                    }
                    break;
            }
            $response = array('status' => 'error', 'msg' => $error);
        }

        if ($response['status'] == 'approved') {

            $arr1['user_id'] = $user_id;
            if ($user_type == "") {
                $arr1['user_type'] = 'guest';
            } else {
                $arr1['user_type'] = $user_type;
            }
            $arr1['cause_id'] = $array['casue_id'];
            $arr1['amount'] = $array['amount'];
            $arr1['transection_id'] = $response['transection_id'];
            $arr1['status'] = 1;
            $arr1['time'] = time();
            $arr1['payment_type'] = 'credit_card';
            $arr1['support_as'] = $support_as;

            if ($this->start_cause_model->save_user_donation($arr1)) {
                $id = $this->db->insert_id();

                $result['status'] = 'success';
                $result['msg'] = 'Your payment has been completed successfully.';
                $result['data'] = $id;
            } else {
                $result['status'] = 'error';
                $result['msg'] = 'Your payment has been completed successfully , but there is an error to update database please contact to admin.';
                $result['data'] = '';
            }
            echo json_encode($result);
        } else {
            echo json_encode($response);
        }
    }

}
