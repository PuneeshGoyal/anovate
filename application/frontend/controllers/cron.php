<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cron extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("cron_model");
		log_message('debug', "Cron Class Initialized");
    }
	
    public function index() {
		$this->cron_model->mark_cause_complete();
		$this->cron_model->delete_disabled_days();
		$this->cron_model->mark_pets_complete();
    }
	public function del(){
	  $main_dir='';
	  //echo FCPATH;
	  $main_dir = FCPATH."upload/";
	  $thumb_dir = FCPATH."upload/thumbnail";
	  
	  $dirtime  = $this->scan_dir($main_dir);//scan dir and return file name according to time desc
	  $i=0;
	  foreach($dirtime as $k=>$v){
	   if($i==0){
		$max_time = $v;
		$deducted_time = strtotime('-2 hours',$max_time);
	   }
	   if($v > $deducted_time) {
		//echo $v."<br/>";
		unlink("upload/".$k);
	   }
	   //unset($deducted_time);
	   //echo "name is ".$k . " and time  is ".$v."<br/>";
	   $i++;
	  }
	   
	  $dirtime1  = $this->scan_dir($thumb_dir);//scan dir and return file name according to time desc
	  
	  $i=0;foreach($dirtime1 as $k=>$v){
	   if($i==0){
		$max_time = $v;
		$deducted_time = strtotime('-2 hours',$max_time);
	   }
	   if($v > $deducted_time) {
		//echo $v."<br/>";
		unlink("upload/thumbnail/".$k);
	   }
	   //unset($deducted_time);
	   //echo "name is ".$k . " and time  is ".$v."<br/>";
	   $i++;
	  }
	  
	  
	  
	 }
	  public function scan_dir($dir) {
	   //'thumbnail',
	   $ignored = array('Thumbs.db','.', '..', '.svn', '.htaccess');
	   $files = array();    
	   foreach (scandir($dir) as $file) {
		if (in_array($file, $ignored)) continue;
		  //$stat = stat($dir."/".$file);
		  
		  $files[$file] = filemtime($dir . '/' . $file);
		 //$files[$file] = $stat["mtime"];
		}
		arsort($files);
		/*
		$data[1] = array_values($files);
		$data[0] = array_keys($files);
		return $msg = array_combine($data[0], $data[1]);*/
		return ($files) ? $files : false;
	  }
}

?>