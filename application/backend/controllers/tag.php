<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tag extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('validations_tag');
        $this->load->model('tag_model');
    }

    public function index() {
        $this->manage_tag();
    }

    //to bring all the data 	
    public function manage_tag() {
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
        $config['base_url'] = base_url() . "tag/manage_tag/?" . $this->common->removeUrl("per_page", $_SERVER["QUERY_STRING"]);
        $countdata = array();
        $countdata = $_GET;
        $countdata["countdata"] = "yes";

        $config['total_rows'] = count($this->tag_model->gettagData($countdata));
        $config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"] != "") ? $_GET["per_page"] : "0";
        $this->pagination->initialize($config);
        /* --------------------------Paging code ends--------------------------------------------------- */
        $searcharray = array();
        $searcharray = $_GET;
        $searcharray["per_page"] = $config["per_page"];
        $searcharray["page"] = $config["uri_segment"];
        $data["resultset"] = $this->tag_model->gettagData($searcharray);
        $data["item"] = "tags";
        $data["master_title"] = "Manage tag";
        $data["master_body"] = "manage_tag";
        $this->load->theme('mainlayout', $data);
    }

    public function add_tag() {

        $data["item"] = "tags";
        $data["do"] = "add";
        $data["tagdata"] = $this->session->flashdata("tempdata");
        $data["master_title"] = "Add tag";
        $data["master_body"] = "add_tag";
        $this->load->theme('mainlayout', $data);
        if ($this->uri->segment(4) != '' && $this->uri->segment(4) == '0') {
            header("Refresh:3;url=" . base_url() . "tag/manage_tag");
        }
    }

    public function edit_tag() {
        $data["item"] = "tags";
        $data["do"] = "edit";
        $tagid = $this->uri->segment(3);
        $data["tagdata"] = $this->session->flashdata("tempdata");
        if ($data["tagdata"] <> "") {
            $data["tagdata"] = $data["tagdata"];
        } else {
            $data["tagdata"] = $this->tag_model->getIndividualtag($tagid);
        }
        $data["master_title"] = "Edit tag";
        $data["master_body"] = "add_tag";
        $this->load->theme('mainlayout', $data);
        if ($this->uri->segment(4) != '' && $this->uri->segment(4) == '2') {
            header("Refresh:3;url=" . base_url() . "tag/manage_tag");
        }
    }

    public function add_tag_to_database() {

        $arr["id"] = trim($this->input->post("id"));
        $arr["tag"] = clean($this->input->post("tag"));
        $arr["created_time"] = time();
        $arr["status"] = 1;


        $this->session->set_flashdata("tempdata", strip_slashes($arr));

        if ($this->validations_tag->validate_tag($arr)) {
            //echo $this->tag_model->add_edit_tag($arr);die;
            if ($this->tag_model->add_edit_tag($arr)) {
                $last_id = $this->db->insert_id();

                if ($arr["id"] == "" && $last_id != '') {
                    $err = 0; // for tag added successfully
                    $this->session->set_flashdata("successmsg", "tag added successfully");
                    redirect(base_url() . "tag/add_tag/" . $last_id . "/0");
                } else {
                    $err = 2; // for tag updated successfully
                    $this->session->set_flashdata("successmsg", "tag updated successfully");
                    redirect(base_url() . "tag/edit_tag/" . $arr["id"] . "/2");
                }
            } else {
                $this->session->set_flashdata("errormsg", "There is error adding tag to data base . Please contact database admin");
                $err = 1;
            }
        } else {
            if ($arr["id"] == "") {
                $err = 1;
                redirect(base_url() . "tag/add_tag");
            } else {
                redirect(base_url() . "tag/edit_tag/" . $arr["id"]);
            }
        }
    }

    public function enable_disable_tag() {
        $tagid = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if ($status == 0) {
            $show_status = "deactivated";
        } else {
            $show_status = "activated";
        }
        $this->tag_model->enable_disable_tag($tagid, $status);
        $this->session->set_flashdata("successmsg", "tag " . $show_status . " successfully");
        redirect(base_url() . "tag/manage_tag");
    }

    public function archive_tag() {
        $delid = $this->uri->segment(3);
        if ($delid != '') {
            $this->tag_model->archive_tag($delid);
            $this->session->set_flashdata("successmsg", "tag archived successfully");
            redirect(base_url() . "tag/manage_tag");
        } else {
            $data = $this->input->post("chk");
            if (!isset($_REQUEST["chk"]) && count($_REQUEST["chk"]) == 0) {
                $this->session->set_flashdata("errormsg", "No tag selected");
                redirect(base_url() . "tag/manage_tag");
            }
            foreach ($data as $key => $val) {
                $this->tag_model->archive_tag($val);
            }

            $this->session->set_flashdata("successmsg", "Selected tag archived successfully");
            redirect(base_url() . "tag/manage_tag");
        }
    }

    public function view_tag() {
        $tagid = $this->uri->segment(3);
        if ($tagid == "") {
            redirect(base_url() . "invalidpage");
        } else {
            $data["resultset"] = $this->tag_model->getIndividualtag($tagid);
        }
        $data["master_title"] = "View tag";
        $data["master_body"] = "view_tag";
        $this->load->theme('mainlayout', $data);
    }

//==================================================tag Comments Section End=============================================================================//
}

?>