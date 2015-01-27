<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class start_cause extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("start_cause_model");
        $this->load->model("account_model");
    }

    public function index() {
        $this->home();
    }

    public function manage_cause() {

        $page = isset($_GET["per_page"]) ? $_GET["per_page"] : "";
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
        $config['base_url'] = base_url() . $this->router->class . "/manage_cause/?" . $this->common->removeUrl("per_page", $_SERVER["QUERY_STRING"]);
        $countdata = array();
        $countdata = $_GET;
        $countdata["countdata"] = "yes";
        $countdata["usertype"] = "admin"; //parameter is used to differentiate that this is used for //admin or fo front panel	
        $config['total_rows'] = count($this->start_cause_model->getallusercause($countdata));
        $config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"] != "") ? $_GET["per_page"] : "0";
        $this->pagination->initialize($config);
        /* --------------------------Paging code ends--------------------------------------------------- */

        $searcharray = array();
        $searcharray = $_GET;
        $searcharray["per_page"] = $config["per_page"];
        $searcharray["page"] = $config["uri_segment"];
        $searcharray["usertype"] = "admin"; //parameter is used to differentiate that this is used for //admin or fo front panel	

        /* $userid = $this->session->userdata('userid');
          $usertype = $this->session->userdata('user_type');
          if($usertype == 'organisation')
          {
          $data['data_user']  = $this->account_model->get_user_info_org($userid);
          }
          else
          {
          $data['data_user']  = $this->account_model->get_user_info_user($userid);
          } */
		
        $data['resultset'] = $this->start_cause_model->getallusercause($searcharray);
        $data["item"] = "Manage cause";
        //debug($data['resultdata']);die;
        $data["master_title"] = "Manage Causes";
        $data["master_body"] = "manage_cause";
        $this->load->theme('mainlayout', $data);
    }

    public function enable_disable_cause() {
        $tagid = $this->input->post("id");
        $status = $this->input->post("status");

        /* 	echo $tagid;
          echo $status;
          die; */
        if ($status == 1) {
            $show_status = "deactivated";
        } else if ($status == 2) {
            $show_status = "activated";
        } else if ($status == 3) {
            $show_status = "closed";
        }
        $this->start_cause_model->enable_disable_cause($tagid, $status);

        $this->session->set_flashdata("successmsg", "Cause " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_cause");
    }

    public function enable_disable_featured() {
        $tagid = $this->uri->segment(3);
        $status = $this->uri->segment(4);

        /* 	echo $tagid;
          echo $status;
          die; */
        if ($status == 0) {
            $show_status = "disabled";
        } else {
            $show_status = "enabled";
        }
        $this->start_cause_model->enable_disable_featured($tagid, $status);

        $this->session->set_flashdata("successmsg", "Cause marked as " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_cause");
    }

    public function enable_disable_hope() {
        $tagid = $this->uri->segment(3);
        $status = $this->uri->segment(4);

        /* 	echo $tagid;
          echo $status;
          die; */
        if ($status == 0) {
            $show_status = "disabled";
        } else {
            $show_status = "enabled";
        }
        $this->start_cause_model->enable_disable_hope($tagid, $status);

        $this->session->set_flashdata("successmsg", "Stories of hope " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_cause");
    }

    public function view_cause() {
        $id = $this->uri->segment(3);
        if ($id == "") {
            redirect(base_url() . "invalidpage");
        } else {
            $data["resultset"] = $this->start_cause_model->getIndividualcause($id);
        }
		$data["donation_data"] = $this->start_cause_model->getcausedonationinfo($id);
		$data["petition_cause_data"] = $this->start_cause_model->getPetitionDonationInfo($id);
        $data["volunteer_cause_data"] = $this->start_cause_model->getVolunteerDonationInfo($id);
	    //debug($data);die;
        $data["master_title"] = "View cause";
        $data["master_body"] = "view_cause";
        $this->load->theme('mainlayout', $data);
    }

    public function edit_cause() {

        $this->common->is_logged_in();
        $slug = $this->uri->segment(3);
        $data["dataset"] = $this->start_cause_model->getcausedatabyslug($slug);

        $data["item"] = "Edit cause";
        $data["master_title"] = "Edit cause | " . $this->config->item('sitename');
        $data["master_body"] = "edit_cause";
        $this->load->theme('home_layout', $data);
    }

    public function test() {
        $data["item"] = "Start cause";
        $data["master_title"] = "Start cause | " . $this->config->item('sitename');
        $data["master_body"] = "test";
        $this->load->view("start_cause/test");
        //	$this->load->theme('home_layout',$data);
    }

    public function upload_image() {
        //require_once APPPATH.'libraries/server/index.php';
        require_once APPPATH . 'libraries/server/UploadHandler.php';
        $upload_handler = new UploadHandler();
    }

    public function upload_doc() {
        //require_once APPPATH.'libraries/server/index.php';
        require_once APPPATH . 'libraries/server/UploadHandler.php';
        $upload_handler = new UploadHandler();
    }

    public function remove_image() {


        $url = $_GET['url'];
        $new_url = explode('file=', $url);

        $path = "upload/" . $new_url['1'];
        $path1 = "upload/thumbnail/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('upload/' . $new_url['1']);
        unlink('upload/thumbnail/' . $new_url['1']);

        $data['result'] = "success";
        $data['img'] = $new_url['1'];

        echo json_encode($data);
        die;
    }

    public function remove_docs() {


        $url = $_GET['url'];
        $new_url = explode('file=', $url);

        $path = "upload/" . $new_url['1'];
        $path1 = "upload/thumbnail/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('upload/' . $new_url['1']);
        $data['result'] = "success";
        $data['img'] = $new_url['1'];
        echo json_encode($data);
        die;
    }

    public function get_user_address() {
        $user_id = $this->session->userdata("userid");
        $type = $this->session->userdata("user_type");
        if ($type == 'personal') {
            $data = $this->account_model->get_user_info_user($user_id);
        } else {
            $data = $this->account_model->get_user_info_org($user_id);
        }
        echo json_encode($data);
        die;
    }

    public function move_image($image_name) {
        $copy_path = "upload/" . $image_name;
        $path = "cause_upload_images/" . $image_name;
        chmod("$copy_path", 0777);  // set permission to the file.
        chmod("$path", 0777);  // set permission to the file.
        if (copy($copy_path, $path)) {//  upload the file to the server
            unlink('upload/' . $image_name);

            $copy_path_thumb = "upload/thumbnail/" . $image_name;
            $path_thumb = "cause_upload_images/thumbnail/" . $image_name;
            chmod("$copy_path_thumb", 0777);
            chmod("$path_thumb", 0777);
            if (copy($copy_path_thumb, $path_thumb)) {
                unlink('upload/thumbnail/' . $image_name);
            }
        }
    }

    public function move_doc($doc_name) {
        $copy_path = "upload/" . $doc_name;
        $path = "cause_upload_docs/" . $doc_name;
        chmod("$copy_path", 0777);  // set permission to the file.
        chmod("$path", 0777);  // set permission to the file.
        if (copy($copy_path, $path)) {//  upload the file to the server
            unlink('upload/' . $doc_name);
        }
    }

    public function add_cause() {

        $this->common->is_logged_in();
        $arr['user_type'] = clean($this->session->userdata("user_type"));
        $arr['user_id'] = clean($this->session->userdata("userid"));
        $arr['is_fundraise'] = clean($this->input->post('fundraising'));
        $arr['title'] = clean($this->input->post('title'));
        $arr["tagline"] = implode(',', $this->input->post("tag"));
        $arr['summary'] = clean($this->input->post('summary'));
        $arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
        $arr['fund_allocation_information'] = clean($this->input->post('fund_allocation_information'));
        $arr['postal_code'] = clean($this->input->post('postal_code'));
        $arr['address'] = clean($this->input->post('address'));
        $arr['unit_f'] = clean($this->input->post('unit_f'));
        $arr['unit_l'] = clean($this->input->post('unit_l'));
        $arr['target_amount'] = clean($this->input->post('target_amount'));
        $arr['duration'] = clean($this->input->post('duration'));
        $arr['created_time'] = time();
        $arr['status'] = 1;

        $arr1['docs'] = $this->input->post('docs');
        $arr1['image'] = $this->input->post('image');

        if ($this->start_cause_model->add_cause($arr)) {
            $last_id = $this->db->insert_id();
            foreach ($arr1['image'] as $key => $val) {
                $this->move_image($val);
                $image['cause_id'] = $last_id;
                $image['image_name'] = $val;
                $image['created_time'] = time();
                $image['status'] = 1;
                $this->start_cause_model->add_edit_cause_images($image);
            }
            if ($arr1['docs'] != "") {
                foreach ($arr1['docs'] as $dkey => $dval) {
                    $this->move_doc($dval);
                    $doc['cause_id'] = $last_id;
                    $doc['document_name'] = $dval;
                    $doc['created_time'] = time();
                    $doc['status'] = 1;
                    $this->start_cause_model->add_edit_cause_docs($doc);
                }
            }
            $this->session->set_flashdata("successmsg", "Cause Published Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to published this cause.");
        }
        redirect(base_url() . "start_cause/");
    }

    public function update_cause() {

        $this->common->is_logged_in();

        $arr['id'] = clean($this->input->post("id"));
        $arr['user_type'] = clean($this->session->userdata("user_type"));
        $arr['user_id'] = clean($this->session->userdata("userid"));
        $arr['is_fundraise'] = clean($this->input->post('fundraising'));
        $arr['title'] = clean($this->input->post('title'));
        $arr["tagline"] = implode(',', $this->input->post("tag"));
        $arr['summary'] = clean($this->input->post('summary'));
        $arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
        $arr['fund_allocation_information'] = clean($this->input->post('fund_allocation_information'));
        $arr['postal_code'] = clean($this->input->post('postal_code'));
        $arr['address'] = clean($this->input->post('address'));
        $arr['unit_f'] = clean($this->input->post('unit_f'));
        $arr['unit_l'] = clean($this->input->post('unit_l'));
        $arr['target_amount'] = clean($this->input->post('target_amount'));
        $arr['duration'] = clean($this->input->post('duration'));

        $arr1['docs'] = $this->input->post('docs');
        $arr1['image'] = $this->input->post('image');

        if ($this->start_cause_model->edit_cause($arr)) {
            $last_id = $arr['id'];
            //// remove prev 
            $this->start_cause_model->delete_cause_images($last_id, $arr1['image']);
            foreach ($arr1['image'] as $key => $val) {
                if ($val != "") {
                    $filename = "cause_upload_images/" . $val;
                    if (file_exists($filename)) {
                        
                    } else {
                        $this->move_image($val);
                    }
                    $image['cause_id'] = $last_id;
                    $image['image_name'] = $val;
                    $image['created_time'] = time();
                    $image['status'] = 1;
                    $this->start_cause_model->add_edit_cause_images($image);
                }
            }
            $this->start_cause_model->delete_cause_docs($last_id, $arr1['docs']);
            if ($arr1['docs'] != "") {
                foreach ($arr1['docs'] as $dkey => $dval) {
                    $filename = "cause_upload_docs/" . $dval;
                    if (file_exists($filename)) {
                        
                    } else {
                        $this->move_doc($dval);
                    }

                    $doc['cause_id'] = $last_id;
                    $doc['document_name'] = $dval;
                    $doc['created_time'] = time();
                    $doc['status'] = 1;
                    $this->start_cause_model->add_edit_cause_docs($doc);
                }
            }
            $this->session->set_flashdata("successmsg", "Cause edited Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to edit this cause.");
        }
        redirect(base_url() . "start_cause/edit_cause/" . $this->input->post("slug"));
    }

    public function remove_image_edit() {


        $url = $_GET['url'];
        $new_url = explode('file=', $url);

        $path = "cause_upload_images/" . $new_url['1'];
        $path1 = "cause_upload_images/thumbnail/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('cause_upload_images/' . $new_url['1']);
        unlink('cause_upload_images/thumbnail/' . $new_url['1']);

        $data['result'] = "success";
        $data['img'] = $new_url['1'];

        echo json_encode($data);
        die;
    }

    public function remove_docs_edit() {


        $url = $_GET['url'];
        $new_url = explode('file=', $url);
        $path = "cause_upload_docs/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('cause_upload_docs/' . $new_url['1']);
        $data['result'] = "success";
        $data['img'] = $new_url['1'];
        echo json_encode($data);
        die;
    }

   
    public function close_cause() {
        $this->common->is_logged_in();
        $id = $this->uri->segment(3);
        if ($this->start_cause_model->closecause($id)) {
            $this->session->set_flashdata("successmsg", "Cause closed Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to close this cause.");
        }
        redirect(base_url() . "accounts/manage_cause");
    }

    public function view() {
        $data["name"] = $this->uri->segment(3);
        $data["item"] = "Detail";
        $data["master_title"] = "view Detail | " . $this->config->item('sitename');
        $data["master_body"] = "view";
        //debug($data);die;
        $this->load->theme('mainlayout', $data);
    }
	 public function view_image() {
		 
		$data["name"] = $this->uri->segment(3);
        $data["item"] = "Detail";
        $data["master_title"] = "view Detail | " . $this->config->item('sitename');
        $data["master_body"] = "view_image";
        //debug($data);die;
		
        $this->load->view('start_cause/view_image', $data);
    }
	
	
    public function download_file() {

        // $fullPath = base_url().'cause_upload_docs/'.urldecode($this->uri->segment(3));
        //$fullPath = $this->config->item("cause_upload_docs").$this->uri->segment(3);
        $fullPath = '../cause_upload_docs/' . $this->uri->segment(3);

        // Must be fresh start
        if (headers_sent()) {
            die('Headers Sent');
        }
        // Required for some browsers
        if (ini_get('zlib.output_compression')) {
            ini_set('zlib.output_compression', 'Off');
        }
        // File Exists?
        if (file_exists($fullPath)) {

            // Parse Info / Get Extension
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);

            // Determine Content Type
            switch ($ext) {
                case "pdf": $ctype = "application/pdf";
                    break;
                case "exe": $ctype = "application/octet-stream";
                    break;
                case "zip": $ctype = "application/zip";
                    break;
                case "doc": $ctype = "application/msword";
                    break;
                case "xls": $ctype = "application/vnd.ms-excel";
                    break;
                case "ppt": $ctype = "application/vnd.ms-powerpoint";
                    break;
                case "gif": $ctype = "image/gif";
                    break;
                case "png": $ctype = "image/png";
                    break;
                case "jpeg": $ctype = "image/jpeg";
                    break;
                case "jpg": $ctype = "image/jpg";
                    break;
                case "txt": $ctype = "application/txt";
                    break;
                default: $ctype = "application/force-download";
            }

            header("Pragma: public"); // required
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false); // required for certain browsers
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"" . basename($fullPath) . "\";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fsize);
            ob_clean();
            flush();
            readfile($fullPath);
        } else {
            die('File Not Found');
        }
    }


	 public function download_image() {

        // $fullPath = base_url().'cause_upload_docs/'.urldecode($this->uri->segment(3));
        //$fullPath = $this->config->item("cause_upload_docs").$this->uri->segment(3);
        $fullPath = '../cause_upload_images/' . $this->uri->segment(3);

        // Must be fresh start
        if (headers_sent()) {
            die('Headers Sent');
        }
        // Required for some browsers
        if (ini_get('zlib.output_compression')) {
            ini_set('zlib.output_compression', 'Off');
        }
        // File Exists?
        if (file_exists($fullPath)) {

            // Parse Info / Get Extension
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);

            // Determine Content Type
            switch ($ext) {
                case "pdf": $ctype = "application/pdf";
                    break;
                case "exe": $ctype = "application/octet-stream";
                    break;
                case "zip": $ctype = "application/zip";
                    break;
                case "doc": $ctype = "application/msword";
                    break;
                case "xls": $ctype = "application/vnd.ms-excel";
                    break;
                case "ppt": $ctype = "application/vnd.ms-powerpoint";
                    break;
                case "gif": $ctype = "image/gif";
                    break;
                case "png": $ctype = "image/png";
                    break;
                case "jpeg": $ctype = "image/jpeg";
                    break;
                case "jpg": $ctype = "image/jpg";
                    break;
                case "txt": $ctype = "application/txt";
                    break;
                default: $ctype = "application/force-download";
            }

            header("Pragma: public"); // required
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false); // required for certain browsers
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"" . basename($fullPath) . "\";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fsize);
            ob_clean();
            flush();
            readfile($fullPath);
        } else {
            die('File Not Found');
        }
    }
	
	public function archive_cause(){
		
		$id = $this->uri->segment(3);
		
		if ($this->start_cause_model->archive_cause($id)) {
            $this->session->set_flashdata("successmsg", "Cause archived Successfully.");
        }
		else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to archive this cause.");
        }
        redirect(base_url()."start_cause/manage_cause");
	}
}

?>