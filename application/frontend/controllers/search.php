<?php
    class search extends CI_Controller {
        
        function __construct() {
            parent::__construct();
            $this->load->model('search_model');
			  $this->load->model('start_cause_model');
           }
        
       
		  

		public function search_causes(){
		 
		 
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
		$config['base_url']=base_url()."search/search_causes/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->search_model->getsearchcause($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		
		$data['resultdata'] = $this->search_model->getsearchcause($searcharray);
		
		$data["master_title"]="Search Causes";
		$data["master_body"]="search";
		$this->load->theme('home_layout',$data);
	}
		
		
    }
    
?>