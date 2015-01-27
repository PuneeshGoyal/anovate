<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class animal_breeds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('validations_animal_breed');
        $this->load->model('breed_model');
    }

    public function index() {
        $this->manage_breed();
    }

    //to bring all the data 	
    public function manage_breed() {
        $page = (isset($_GET["per_page"]) && $_GET["per_page"] != "") ? $_GET["per_page"] : ""; //$this->input->get("page");

        if ($page == '') {
            $page = '0';
        } else {
            if (!is_numeric($page)) {
                redirect(BASEURL . '404');
            } else {
                $page = $page;
            }
        }

        $config["per_page"] = $this->config->item("perpageitem");
        $config['base_url'] = base_url() . $this->router->class."/manage_breed/?" . $this->common->removeUrl("per_page", $_SERVER["QUERY_STRING"]);
        $countdata = array();
        $countdata = $_GET;
        $countdata["countdata"] = "yes";

        $config['total_rows'] = count($this->breed_model->getbreedData($countdata));
        $config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"] != "") ? $_GET["per_page"] : "0";
        $this->pagination->initialize($config);
        /* --------------------------Paging code ends--------------------------------------------------- */
        $searcharray = array();
        $searcharray = $_GET;
        $searcharray["per_page"] = $config["per_page"];
        $searcharray["page"] = $config["uri_segment"];
        $data["resultset"] = $this->breed_model->getbreedData($searcharray);
        $data["item"] = "breed";
        $data["master_title"] = "Manage breeds";
        $data["master_body"] = "manage_breed";
        $this->load->theme('mainlayout', $data);
    }

    public function add_breed() {

        $data["item"] = "breed";
        $data["do"] = "add";
        $data["breeddata"] = $this->session->userdata("tempdata");
        $data["master_title"] = "Add breeds";
        $data["master_body"] = "add_breed";
        $this->load->theme('mainlayout', $data);
        if ($this->uri->segment(4) != '' && $this->uri->segment(4) == '0')
		{
            header("Refresh:3;url=".base_url().$this->router->class."/manage_breed");
        }
    }

    public function edit_breed() {
        $data["item"] = "breed";
        $data["do"] = "edit";
        $tagid = $this->uri->segment(3);
        $data["breeddata"] = $this->session->userdata("tempdata");
        if ($data["breeddata"] <> "") {
            $data["breeddata"] = $data["breeddata"];
        } else {
            $data["breeddata"] = $this->breed_model->getIndividualbreed($tagid);
        }
        $data["master_title"] = "Edit breeds";
        $data["master_body"] = "add_breed";
        $this->load->theme('mainlayout', $data);
		
        if ($this->uri->segment(4) != '' && $this->uri->segment(4) == '2')
		{
            header("Refresh:3;url=" . base_url().$this->router->class."/manage_breed");
        }
    }

    public function add_breed_to_database() {

        $arr["id"] = trim($this->input->post("id"));
        $arr["name"] = clean($this->input->post("name"));
		if($arr["id"]==""){
        	$arr["created_time"] = time();
			$arr["updated_time"] = time();
		}else{
			$arr["updated_time"] = time();
		}
        $arr["status"] = 1;


        $this->session->set_userdata("tempdata", strip_slashes($arr));

        if ($this->validations_animal_breed->validate_animal_breed($arr)) {
            //echo $this->breed_model->add_edit_tag($arr);die;
            if ($this->breed_model->add_edit_breed($arr)) {
                $last_id = $this->db->insert_id();
				
                if ($arr["id"] == "" && $last_id != '') {
                    $err = 0; // for breeds added successfully
                    $this->session->set_flashdata("successmsg", "breeds added successfully");
					$this->session->unset_userdata('tempdata');
                    redirect(base_url().$this->router->class."/add_breed/" . $last_id . "/0");
                } else {
                    $err = 2; // for breeds updated successfully
                    $this->session->set_flashdata("successmsg", "breeds updated successfully");
					$this->session->unset_userdata('tempdata');
                    redirect(base_url().$this->router->class."/edit_breed/" . $arr["id"] . "/2");
                }
            } else {
                $this->session->set_flashdata("errormsg", "There is error adding breeds to data base . Please contact database admin");
                $err = 1;
            }
        } else {
            if ($arr["id"] == "") {
                $err = 1;
                redirect(base_url().$this->router->class."/add_breed");
            } else {
                redirect(base_url().$this->router->class."/edit_breed/" . $arr["id"]);
            }
        }
    }

    public function enable_disable_breed() {
        $tagid = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if ($status == 0) {
            $show_status = "deactivated";
        } else {
            $show_status = "activated";
        }
        $this->breed_model->enable_disable_breed($tagid, $status);
        $this->session->set_flashdata("successmsg", "breeds " . $show_status . " successfully");
        redirect(base_url().$this->router->class."/manage_breed");
    }

    public function archive_breed() {
        $delid = $this->uri->segment(3);
        if ($delid != '') {
            $this->breed_model->archive_breed($delid);
            $this->session->set_flashdata("successmsg", "breeds archived successfully");
            redirect(base_url().$this->router->class."/manage_breed");
        } else {
            $data = $this->input->post("chk");
            if (!isset($_REQUEST["chk"]) && count($_REQUEST["chk"]) == 0) {
                $this->session->set_flashdata("errormsg", "No breeds selected");
                redirect(base_url().$this->router->class."/manage_breed");
            }
            foreach ($data as $key => $val) {
                $this->breed_model->archive_breed($val);
            }

            $this->session->set_flashdata("successmsg", "Selected breeds archived successfully");
            redirect(base_url().$this->router->class."/manage_breed");
        }
    }

    public function view_breed() {
        $tagid = $this->uri->segment(3);
        if ($tagid == "") {
            redirect(base_url() . "invalidpage");
        } else {
            $data["resultset"] = $this->breed_model->getIndividualbreed($tagid);
        }
        $data["master_title"] = "View breeds";
        $data["master_body"] = "view_breed";
        $this->load->theme('mainlayout', $data);
    }

//==================================================breeds  Section End=============================================================================//
}

?>