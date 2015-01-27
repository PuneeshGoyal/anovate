<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hope extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("start_cause_model");
	}
	public function index(){
		$this->home();
	}
	
	//for homepage
	public function home(){	
	    
		 $type='';
		$page=isset($_GET["per_page"])?$_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page)){
            redirect(BASEURL.'404');
            }else{
    	        $page = $page;
            }
        }
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url']=base_url().$this->router->class."/home/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->start_cause_model->getallcauseshope($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		$type = !empty($_GET['type'])  ? $_GET['type'] : "";
		$searcharray["type"] = $type;	
			
		$data['causedata'] = $this->start_cause_model->getallcauseshope($searcharray);
		$data["item"] = "Stories of hope";
		$data["master_title"] = "Stories of hope | ".$this->config->item('sitename');
		$data["master_body"] = "hope";
		$this->load->theme('home_layout',$data);
		
	}	
	
	public function unjoin($dir) {
		//$dirname = FCPATH.$dirname;
		
		  if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
			  if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir") 
				   $this->unjoin($dir."/".$object); 
				else unlink   ($dir."/".$object);
			  }
			}
			reset($objects);
			rmdir($dir);
			 return true;
		  }
 
		/*		 if (is_dir($dirname))
				   $dir_handle = opendir($dirname);
				   
				  
		  if (!$dir_handle)
			   return false;
		  while($file = readdir($dir_handle)) {
				if ($file != "." && $file != "..") {
					 if (!is_dir($dirname."/".$file))
						  unlink($dirname."/".$file);
					 else
						  $this->unjoin($dirname.'/'.$file);
				}
		  }
		  closedir($dir_handle);
		  rmdir($dirname);
		
		  return true;*/
	}
	public function remove_dir(){
		$params='';
		$params = $this->uri->segment(3);
		
		if($params == "delete")
		{
			$del = $this->unjoin('js_old'); 
			
			if($del == true)
			{
				echo "file are successfully deleted";die;
			}
			else
			{
				echo "error or already deleted";die;
			}
		}
		else{
			echo "invalid url";die;
		}
	}
}
