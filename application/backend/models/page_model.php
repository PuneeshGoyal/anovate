<?php 

class page_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	/********************************************************Blog function starts***************************************************/
	public function getPageData($pagename="")

	{
		$this->db->select("*");
		$this->db->from("content_pages");
		$this->db->where(array("page_name"=>$pagename,"page_status"=>"1"));
		$query=$this->db->get();//run query 
		//echo $this->db->last_query();//execute lat query
		$resultset=$query->row_array();
		return $resultset; 
		//echo "<pre>";//print_r($resultset);
	}
	//get conent pages data for front end 
	
	public function get_contact_data($pagename=''){
		$this->db->select("*");
		$this->db->from("content_pages");
		$this->db->where(array("page_name"=>$pagename,"page_status"=>"1"));
		$query=$this->db->get();
		$resultset=$query->row_array();//echo $this->db->last_query();die;
		return $resultset; 
	}
	//update content page data from admin
	public function update_contact_data($arr=array()){
		
		if($_FILES["userfile"]["name"] !=''){
			$this->db->select("*");
			$this->db->from("content_pages");
			$this->db->where("id",$arr["id"]);
			$query = $this->db->get();
			$images = $query->row_array();
			//echo $this->db->last_query();die;
			unlink('../uploads/'.$images['image']);
		}
		$this->db->where("id",$arr["id"]);
		return $this->db->update("content_pages",$arr);	
	}
	
	public function updatepagedata($arr=array()){
		$this->db->where("id",$arr["id"]);
		return $this->db->update("content_pages",$arr);	
	}
	
	//update about us data for admin
	public function update_aboutus_to_database($arr){
		//print_r($arr);die;
		$this->db->where("page_name",$arr["page_name"]);
		return $this->db->update("content_pages",$arr);	
	}
	
	public function get_blog_data($arr)

	{
		$this->db->select("*");
		$this->db->from("blogs");
		$this->db->where(array("status"=>1));
		$query=$this->db->get();//run query 
		//echo $this->db->last_query();//execute lat query
		$resultset=$query->result_array();
		//echo "<pre>";
		//print_r($resultset);
		return $resultset; 
	}
	
	public function get_newsletter(){
		$this->db->select("*");
		$this->db->from("newsletters");
		$this->db->where(array("status"=>1));
		$query=$this->db->get();//run query 
		//echo $this->db->last_query();//execute lat query
		$resultset=$query->result_array();
		return $resultset; 
	}	
}

?>