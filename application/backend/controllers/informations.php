<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class informations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('validations_information');
        $this->load->model('information_model');
    }

    public function index() {
        $this->manage_information();
    }

    //to bring all the data 	
    public function manage_information() {
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
        $config['base_url'] = base_url() . $this->router->class."/manage_information/?" . $this->common->removeUrl("per_page", $_SERVER["QUERY_STRING"]);
        $countdata = array();
        $countdata = $_GET;
        $countdata["countdata"] = "yes";

        $config['total_rows'] = count($this->information_model->getinformationData($countdata));
        $config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"] != "") ? $_GET["per_page"] : "0";
        $this->pagination->initialize($config);
        /* --------------------------Paging code ends--------------------------------------------------- */
        $searcharray = array();
        $searcharray = $_GET;
        $searcharray["per_page"] = $config["per_page"];
        $searcharray["page"] = $config["uri_segment"];
        $data["resultset"] = $this->information_model->getinformationData($searcharray);
        $data["item"] = "information";
        $data["master_title"] = "Manage informations";
        $data["master_body"] = "manage_information";
        $this->load->theme('mainlayout', $data);
    }

    public function add_information() {

        $data["item"] = "information";
        $data["do"] = "add";
        $data["informationdata"] = $this->session->userdata("tempdata");
        $data["master_title"] = "Add informations";
        $data["master_body"] = "add_information";
        $this->load->theme('mainlayout', $data);
        if ($this->uri->segment(3) != '' && $this->uri->segment(3) == '0')
		{
            header("Refresh:3;url=".base_url().$this->router->class."/manage_information");
        }
    }

    public function edit_information() {
        $data["item"] = "information";
        $data["do"] = "edit";
        $tagid = $this->uri->segment(3);
		$data["informationdata"] = $this->information_model->getIndividualinformation($tagid);
        //debug($data);die;
        $data["master_title"] = "Edit informations";
        $data["master_body"] = "add_information";
        $this->load->theme('mainlayout', $data);
        if ($this->uri->segment(4) != '' && $this->uri->segment(4) == '2')
		{
            header("Refresh:3;url=" . base_url().$this->router->class."/manage_information");
        }
    }

    public function add_information_to_database() {

        $arr["id"] = trim($this->input->post("id"));
        $arr["title"] = clean($this->input->post("title"));
        $arr["created_time"] = time();
        $arr["status"] = 1;
		$arr["image"] = $_FILES["image"]["name"];
		
		if ($arr["image"] != "") {
            $arr["image"] = time() . "." . $this->common->get_extension($_FILES["image"]["name"]);
        }else {
            $arr["image"] = $this->input->post("banner_image");
        }
		$this->session->set_userdata("tempdata", strip_slashes($arr));
       
        if ($this->validations_information->validate_information($arr)) {
            if ($arr["image"] != $this->input->post("banner_image")) {
                $image_info = getimagesize($_FILES['image']['tmp_name']);
                $image_width = $image_info[0];
                $image_height = $image_info[1];
                if ($image_width < 100 || $image_height <  100) {
                    $path = "../slideshowimages/" . $arr["image"];
                    chmod("$path", 0777);  // set permission to the file.
                    if (copy($_FILES['image']['tmp_name'], $path)) {//  upload the file to the server
                        unlink('../slideshowimages/' . $this->input->post("banner_image"));
                        $err = 0;
                    } else {
                        //echo $this->upload->display_errors();die;
                        $this->session->set_flashdata("successmsg", "There is some error uploading the files to server. Please contact server admin");
                        if ($arr["id"] == "") {
                            redirect(base_url() . $this->router->class . "/add_information");
                        } else {
                            redirect(base_url() . $this->router->class . "/edit_information/" . $arr["id"]);
                        }
                    }
                } else {
                    $this->session->set_flashdata("errormsg", "Please upload an image with a size of 100 X 100 or less");
                    if ($arr["id"] == "") {
                        redirect(base_url() . $this->router->class . "/add_information");
                    } else {
                        redirect(base_url() . $this->router->class . "/edit_information/" . $arr["id"]);
                    }
                }
            }
            if ($this->information_model->add_edit_information($arr)) {
                if ($arr["id"] == '') {
                    $err = 1;
                    $this->session->set_flashdata("successmsg", "Information added successfully");
                } else {
                    $err = 2;
                    $this->session->set_flashdata("successmsg", "Information edited successfully");
                }
            } else {
                $this->session->set_flashdata("errormsg", "There was error in adding this information.");
                $err = 1;
            }
            if ($err == 0) {
                redirect(base_url() . $this->router->class . "/add_information" . "/0");
            } else if ($err == 1) {
				$this->session->unset_userdata('tempdata');
                redirect(base_url() . $this->router->class . "/add_information" . "/0");
            } else if ($err == 2) {
				$this->session->unset_userdata('tempdata');
                redirect(base_url() . $this->router->class . "/edit_information/" . $arr["id"] . "/2");
            }
        } else {
            if ($arr["id"] == "") {
                redirect(base_url() . $this->router->class . "/add_information");
            } else {
                redirect(base_url() . $this->router->class . "/edit_information/" . $arr["id"]);
            }
        }
    }

    public function enable_disable_information() {
        $tagid = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if ($status == 0) {
            $show_status = "deactivated";
        } else {
            $show_status = "activated";
        }
        $this->information_model->enable_disable_information($tagid, $status);
        $this->session->set_flashdata("successmsg", "information " . $show_status . " successfully");
        redirect(base_url().$this->router->class."/manage_information");
    }

    public function archive_information() {
        $delid = $this->uri->segment(3);
        if ($delid != '') {
            $this->information_model->archive_information($delid);
            $this->session->set_flashdata("successmsg", "informations archived successfully");
            redirect(base_url().$this->router->class."/manage_information");
        } else {
            $data = $this->input->post("chk");
            if (!isset($_REQUEST["chk"]) && count($_REQUEST["chk"]) == 0) {
                $this->session->set_flashdata("errormsg", "No informations selected");
                redirect(base_url().$this->router->class."/manage_information");
            }
            foreach ($data as $key => $val) {
                $this->information_model->archive_information($val);
            }

            $this->session->set_flashdata("successmsg", "Selected informations archived successfully");
            redirect(base_url().$this->router->class."/manage_information");
        }
    }

    public function view_information() {
        $tagid = $this->uri->segment(3);
        if ($tagid == "") {
            redirect(base_url() . "invalidpage");
        } else {
            $data["resultset"] = $this->information_model->getIndividualinformation($tagid);
        }
        $data["master_title"] = "View informations";
        $data["master_body"] = "view_information";
        $this->load->theme('mainlayout', $data);
    }

//==================================================informations Comments Section End=============================================================================//
}

?>