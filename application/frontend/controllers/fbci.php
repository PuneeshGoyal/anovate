<?php 
/* -----------------------------------------------------------------------------------------
 facebook graph api version 4.0
 @Author --Mukesh Kaushal
 Publish on - 22-8-2014
 @Params
 1.)Email 
 -----------------------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
require_once APPPATH.'libraries/facebook/src/facebook.php';

class Fbci extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model("start_cause_model");
	}
	public function index(){
		
		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook(array(
		  'appId'  => $this->config->item('App_ID'),
		  'secret' => $this->config->item('App_Secret'),
		  'cookie' => true
		));
		
		if(isset($_GET['logout']))       
		{
			$url = 'https://www.facebook.com/logout.php?next=' . urlencode('http://demo.phpgang.com/facebook_login_graph_api/') .
			  '&access_token='.$_GET['tocken'];
			session_destroy();
			header('Location: '.$url);
		}
		if(isset($_GET['fbTrue']))
		{
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			   . "client_id=".$this->config->item('App_ID')."&redirect_uri=" . urlencode($this->config->item('callback_url'))
			   . "&client_secret=".$this->config->item('App_Secret')."&code=" . $_GET['code']; 
		
			 $response = file_get_contents($token_url);
			 $params = null;
			 parse_str($response, $params);
		
			 $graph_url = "https://graph.facebook.com/me?access_token=" 
			   . $params['access_token'];
		
			 $user = json_decode(file_get_contents($graph_url));
			 $extra = "<a href='index.php?logout=1&tocken=".$params['access_token']."'>Logout</a><br>";     
			 $content = $user;
			// debug($user);die;
			 /*$data["fb_data"]  =  $user;
			 $data["item"] = "Fb login";
			 $data["master_title"] = "Fb login | ".$this->config->item('sitename');
			 $data["master_body"] = "register";
			 $this->load->theme('home_layout',$data);*/
			// redirect(base_url()."logins/register");
			 $this->load->view("logins/register",$user);
		}
		else
		{
			$content = '<a href="https://www.facebook.com/dialog/oauth?client_id='.$this->config->item('App_ID').'&redirect_uri='.$this->config->item('callback_url').'&scope=email,user_likes,publish_stream"><img src="./images/login-button.png" alt="Sign in with Facebook"/></a>';
		}
		
		
		//include('html.inc');
	}

}
/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */