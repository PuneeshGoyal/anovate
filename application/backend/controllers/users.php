<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("account_model");
		$this->load->helper("form");
	}
	
	public function index(){
	
		$this->manage_user();
	}
	
	/*public function manage_user1($page_num=1,$sortfield='id',$order='asc') {		
		//pagination
		// Get the page number from the URI (/index.php/pagination/index/{pageid}) 
		$page_number = $this->uri->segment(3);	// it returns the 3rd segement from the url.In my requirement http://localhost:8080/ci/admin/users/2 is the url,  user 2 is page number(3rd segment)
		$config['base_url'] = base_url()."users/manage_user1/"; // page url, where we can display all users
		
		$config['per_page'] = 3; // set this value how many users per page.
		//$config['num_links'] = 5; // this allow the pagination with 5 links,like 1,2,3,4,5
		if(empty($page_number)) $page_number = 1;
		$offset = ($page_number-1) * $config['per_page'];
		
		$config['use_page_numbers'] = TRUE; // set this value true,so that page number value will be like users/1 , users/2 , users/3 etc, otherwise it will be like users/10 , users/20 , users/30 etc
		$data["usersdata"] = $this->user_model->usersdata($config['per_page'],$offset,$sortfield,$order); // here i calling the model function with perpage , offset , sortfield and order		
		$config['total_rows'] = $this->db->count_all('users'); // it returns total count of records of tbl_users table.
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';		
		$this->pagination->cur_page = $offset;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links(); // It will returns the pagination links
		
		
		$data["master_title"]="Manage users";
		$data["master_body"]="manage_user1";
		
		$this->load->theme('mainlayout',$data);
	}*/
	
	
	/*public function manage_user(){
		
		$data["filter"] = $this->input->get("filter");
		$data["col"] = $this->input->get("col");
		$data["col_val"] = $this->input->get("col_val");
		
		$page = isset($_GET["per_page"])?$_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page))
			{
            	redirect(BASEURL.'404');
            }
			else
			{
    	        $page = $page;
            }
        }
		
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/manage_user/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";
		$countdata["filter"] = $data["filter"];
		$countdata["col"] = $data["col"];
		$countdata["col_val"] = $data["col_val"];
		$config['total_rows'] = count($this->user_model->getuserData($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		
		$this->pagination->initialize($config);

		$searcharray=array();
		$searcharray=$_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["filter"] = $data["filter"];
	    $searcharray["col_val"] = $data["col_val"];
		$searcharray["col"] = $data["col"];
		$data['resultset'] = $this->user_model->getuserData($searcharray);
		$data["item"]="user";
		//debug($data['resultset']);die;
		$data["master_title"]="Manage users";
		$data["master_body"]="manage_user";
		$this->load->theme('mainlayout',$data);
	}*/
	public function manage_user(){
		
		
		$data["filter"] = $this->input->get("filter");
		
		$page = isset($_GET["per_page"])?$_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page))
			{
            	redirect(BASEURL.'404');
            }
			else
			{
    	        $page = $page;
            }
        }
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/manage_user/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";
		$countdata["filter"] = $data["filter"];
		
		$config['total_rows'] = count($this->user_model->getuserData($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		

		$searcharray=array();
		$searcharray=$_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["filter"] = $data["filter"];
			
		$data['resultset'] = $this->user_model->getuserData($searcharray);
		$data["item"]="user";
		//debug($data['resultset']);die;
		$data["master_title"]="Manage users";
		$data["master_body"]="manage_user";
		$this->load->theme('mainlayout',$data);
	}
	
	public function enable_disable_user()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		
		
		if($status == 1)
		{
			$show_status = "activated";	
		}	
		else
		{
			$show_status = "deactivated";	
		}
		$this->user_model->enable_disable_user($id,$status);
		$this->session->set_flashdata("successmsg","user ".$show_status." successfully");	
		redirect(base_url().$this->router->class."/manage_user");
	}
	
	public function view_user()
	{
		$id = $this->uri->segment(3);
		
		if($id == "" || $id == "0")
		{
			redirect("error_404.php");				
		}
		else
		{
			$data["resultset"] = $this->user_model->view_user($id);	
		}
		
		//debug($data["resultset"]);die;
		$data["master_title"] = "View user";  
		$data["master_body"] = "view_user";  
		$this->load->theme('mainlayout',$data);  
	}
	
	public function edit_user(){	
	    
		$id = $this->uri->segment(3);
		$data['country'] = $this->account_model->get_countries();
		$data["userinfo"] = $this->user_model->view_user($id);
		$data["do"]="edit";
		$data["item"]="Edit user";
		$data["master_title"]="Edit user | ".$this->config->item('sitename');
		$data["master_body"]="add_user";
		$this->load->theme('mainlayout',$data);
	}
	
	public function edit_user_to_database()
	{
		$user_id = ($this->input->post('user_id'));
		$arr['name'] = clean($this->input->post('personal_full_name'));
		$arr['nationality'] = clean($this->input->post('personal_nationality'));
		$arr['identification_type'] = clean($this->input->post('personal_identification_type'));
		$arr['identification_number'] = clean($this->input->post('personal_identification_number'));
		$arr['gender'] = clean($this->input->post('personal_gender'));
		$arr['contact_hp'] = clean($this->input->post('personal_contact_hp'));
		$arr['contact_home'] = clean($this->input->post('personal_contact_home'));
		$arr['contact_office'] = clean($this->input->post('personal_contact_office'));
		$arr['postal_code'] = clean($this->input->post('personal_postal_code'));
		$arr['address'] = clean($this->input->post('personal_address'));
		$arr['unit_f'] = clean($this->input->post('personal_unit_f'));
		$arr['unit_l'] = clean($this->input->post('personal_unit_l'));
		$personal_date = clean($this->input->post("personal_date"));
		$personal_month = clean($this->input->post("personal_month"));
		$personal_year = clean($this->input->post("personal_year"));
		$arr['d_o_b'] = $personal_year.'-'.$personal_month.'-'.$personal_date;
		
		//debug($arr);die;
		
		if($this->user_model->edit_user($arr, $user_id)) 
		{
			$this->session->set_flashdata('successmsg', 'Your account has been successfully edited');
			redirect(base_url().$this->router->class.'/manage_user/');
			//$this->session->set_flashdata('successmsg', 'Your account has been successfully edited');
		} else {
			$this->session->set_flashdata('errormsg', 'Your changes are not updated technical error contact administrator');
			redirect(base_url().$this->router->class.'/edit_user/');
		}
	}
	
	public function delete_user(){	
	    //$this->common->is_logged_in();
		$id=$this->uri->segment(3);
		if($this->user_model->delete_user($id))
		{
		   $this->session->set_flashdata("successmsg","user deleted Successfully.");
		}
		else
		{
		  $this->session->set_flashdata("errormsg","There is some technical problem to delete this user.");
		}
		
		redirect(base_url().$this->router->class."/manage_user");
	 }
	 
	/*$string="";
	$fileCount=0;
	$filePath=$PATH.'/var/www/public_html/'; # Specify the path you want to look in. 
	$dir = opendir($filePath); # Open the path
	while ($file = readdir($dir)) { 
	if (eregi("\.php",$file)) { # Look at only files with a .php extension
	$string .= "$file
	";
	$fileCount++;
	}
	}
	if ($fileCount > 0) {
	echo sprintf("<strong>List of Files in %s</strong>
	%s<strong>Total Files: %s</strong>",$filePath,$string,$fileCount);
	}*/
}
?>