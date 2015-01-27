<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pets extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model("pets_model");
		$this->load->model("pets_model");
        $this->load->model("account_model");
    }

    public function index() {
        $this->home();
    }

    public function manage_pets() {

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
        $config['base_url'] = base_url() . $this->router->class . "/manage_pets/?" . $this->common->removeUrl("per_page", $_SERVER["QUERY_STRING"]);
        $countdata = array();
        $countdata = $_GET;
        $countdata["countdata"] = "yes";
        $countdata["usertype"] = "admin"; //parameter is used to differentiate that this is used for //admin or fo front panel	
        $config['total_rows'] = count($this->pets_model->get_all_pet_adoption_data($countdata));
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
		
        $data['resultset'] = $this->pets_model->get_all_pet_adoption_data($searcharray);
        $data["item"] = "Manage pet listing";
        //debug($data);die;
        $data["master_title"] = "Manage pets listing";
        $data["master_body"] = "manage_pets";
        $this->load->theme('mainlayout', $data);
    }
	
    public function enable_disable_pet() {
        $tagid = $this->input->post("id");
        $status = $this->input->post("status");

        if ($status == 1) {
            $show_status = "deactivated";
        } else if ($status == 2) {
            $show_status = "activated";
        } else if ($status == 3) {
            $show_status = "closed";
        }
        $this->pets_model->enable_disable_pet($tagid, $status);

        $this->session->set_flashdata("successmsg", "pet listing " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_pets");
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
        $this->pets_model->enable_disable_featured($tagid, $status);

        $this->session->set_flashdata("successmsg", "pets marked as " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_pets");
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
        $this->pets_model->enable_disable_hope($tagid, $status);

        $this->session->set_flashdata("successmsg", "Stories of hope " . $show_status . " successfully");
        redirect(base_url() . $this->router->class . "/manage_pets");
    }

    public function view_pet() {
        $id = $this->uri->segment(3);
        if ($id == "") {
            redirect(base_url() . "invalidpage");
        } else {
            $data["resultset"] = $this->pets_model->getIndividualpet($id);
        }
		//debug($data);die;
        $data["master_title"] = "View pet";
        $data["master_body"] = "view_pet";
        $this->load->theme('mainlayout', $data);
    }

    public function edit_pets() {

        $this->common->is_logged_in();
        $slug = $this->uri->segment(3);
        $data["dataset"] = $this->pets_model->getpetsdatabyslug($slug);

        $data["item"] = "Edit pets";
        $data["master_title"] = "Edit pets | " . $this->config->item('sitename');
        $data["master_body"] = "edit_pets";
        $this->load->theme('home_layout', $data);
    }

    public function test() {
        $data["item"] = "Start pets";
        $data["master_title"] = "Start pets | " . $this->config->item('sitename');
        $data["master_body"] = "test";
        $this->load->view("start_pets/test");
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
        $path = "pets_upload_images/" . $image_name;
        chmod("$copy_path", 0777);  // set permission to the file.
        chmod("$path", 0777);  // set permission to the file.
        if (copy($copy_path, $path)) {//  upload the file to the server
            unlink('upload/' . $image_name);

            $copy_path_thumb = "upload/thumbnail/" . $image_name;
            $path_thumb = "pets_upload_images/thumbnail/" . $image_name;
            chmod("$copy_path_thumb", 0777);
            chmod("$path_thumb", 0777);
            if (copy($copy_path_thumb, $path_thumb)) {
                unlink('upload/thumbnail/' . $image_name);
            }
        }
    }

    public function move_doc($doc_name) {
        $copy_path = "upload/" . $doc_name;
        $path = "pets_upload_docs/" . $doc_name;
        chmod("$copy_path", 0777);  // set permission to the file.
        chmod("$path", 0777);  // set permission to the file.
        if (copy($copy_path, $path)) {//  upload the file to the server
            unlink('upload/' . $doc_name);
        }
    }

    public function add_pets() {

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

        if ($this->pets_model->add_pets($arr)) {
            $last_id = $this->db->insert_id();
            foreach ($arr1['image'] as $key => $val) {
                $this->move_image($val);
                $image['pets_id'] = $last_id;
                $image['image_name'] = $val;
                $image['created_time'] = time();
                $image['status'] = 1;
                $this->pets_model->add_edit_pets_images($image);
            }
            if ($arr1['docs'] != "") {
                foreach ($arr1['docs'] as $dkey => $dval) {
                    $this->move_doc($dval);
                    $doc['pets_id'] = $last_id;
                    $doc['document_name'] = $dval;
                    $doc['created_time'] = time();
                    $doc['status'] = 1;
                    $this->pets_model->add_edit_pets_docs($doc);
                }
            }
            $this->session->set_flashdata("successmsg", "pets Published Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to published this pets.");
        }
        redirect(base_url() . "start_pets/");
    }

    public function update_pets() {

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

        if ($this->pets_model->edit_pets($arr)) {
            $last_id = $arr['id'];
            //// remove prev 
            $this->pets_model->delete_pets_images($last_id, $arr1['image']);
            foreach ($arr1['image'] as $key => $val) {
                if ($val != "") {
                    $filename = "pets_upload_images/" . $val;
                    if (file_exists($filename)) {
                        
                    } else {
                        $this->move_image($val);
                    }
                    $image['pets_id'] = $last_id;
                    $image['image_name'] = $val;
                    $image['created_time'] = time();
                    $image['status'] = 1;
                    $this->pets_model->add_edit_pets_images($image);
                }
            }
            $this->pets_model->delete_pets_docs($last_id, $arr1['docs']);
            if ($arr1['docs'] != "") {
                foreach ($arr1['docs'] as $dkey => $dval) {
                    $filename = "pets_upload_docs/" . $dval;
                    if (file_exists($filename)) {
                        
                    } else {
                        $this->move_doc($dval);
                    }

                    $doc['pets_id'] = $last_id;
                    $doc['document_name'] = $dval;
                    $doc['created_time'] = time();
                    $doc['status'] = 1;
                    $this->pets_model->add_edit_pets_docs($doc);
                }
            }
            $this->session->set_flashdata("successmsg", "pets edited Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to edit this pets.");
        }
        redirect(base_url() . "start_pets/edit_pets/" . $this->input->post("slug"));
    }

    public function remove_image_edit() {


        $url = $_GET['url'];
        $new_url = explode('file=', $url);

        $path = "pets_upload_images/" . $new_url['1'];
        $path1 = "pets_upload_images/thumbnail/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('pets_upload_images/' . $new_url['1']);
        unlink('pets_upload_images/thumbnail/' . $new_url['1']);

        $data['result'] = "success";
        $data['img'] = $new_url['1'];

        echo json_encode($data);
        die;
    }

    public function remove_docs_edit() {
        $url = $_GET['url'];
        $new_url = explode('file=', $url);
        $path = "pets_upload_docs/" . $new_url['1'];
        chmod("$path", 0777);  // set permission to the file.
        chmod("$path1", 0777);
        unlink('pets_upload_docs/' . $new_url['1']);
        $data['result'] = "success";
        $data['img'] = $new_url['1'];
        echo json_encode($data);
        die;
    }

   
    public function close_pets() {
        $this->common->is_logged_in();
        $id = $this->uri->segment(3);
        if ($this->pets_model->closepets($id)) {
            $this->session->set_flashdata("successmsg", "pet listing closed Successfully.");
        } else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to close this pet listing.");
        }
        redirect(base_url() . "pets/manage_pets");
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
		
        $this->load->view('pets/view_image', $data);
    }
	
	
    public function download_file() {

        // $fullPath = base_url().'pets_upload_docs/'.urldecode($this->uri->segment(3));
        //$fullPath = $this->config->item("pets_upload_docs").$this->uri->segment(3);
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

        // $fullPath = base_url().'pets_upload_docs/'.urldecode($this->uri->segment(3));
        //$fullPath = $this->config->item("pets_upload_docs").$this->uri->segment(3);
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
	
	public function archive_pets(){
		
		$id = $this->uri->segment(3);
		
		if ($this->pets_model->archive_pets($id)) {
            $this->session->set_flashdata("successmsg", "pet listing archived Successfully.");
        }
		else {
            $this->session->set_flashdata("errormsg", "There is some technical problem to archive this pet listing.");
        }
        redirect(base_url()."pets/manage_pets");
	}
	
	public function view_appointment(){
	  $data='';
	  $id = $this->uri->segment(3); 
	  $dataset = $this->pets_model->getcausedatabyslug($id);
	  $closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
	  $result = $this->pets_model->get_booked_appointments_userdata($dataset["id"]);
	  //debug($result);
	  //die;
	  $data .= '<div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">'.$id.' - Appointment progress</h4>
      </div>
      <div class="modal-body modal_w">
        <div class="mnt_table_popup">
          <div class="col-sm-6 col-xs-6">Time left: <span data-time="'.$closetime.'" class="kkcount-down" id="count"></span>
		  </span>
		  </div>
        </div>
        <div class="clearfix"></div>
		<div id="mnt_scroll">
        <div class="table-responsive">
          <table class="table mnt_table_popup manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
            <thead>
              <tr class="mnt_blue">
                <th>Name</th>
				<th>Email</th>
				<th>Contact office</th>
				<th>Type</th>
				<th>Date & Time</th>
              </tr>
            </thead>
            <tbody>';
			$set=0;
			//debug($result);
			$userinfo='';
			if(count($result) !=0){
				foreach($result as $key => $val){
					if(time() < $val["enabled_time"]){
						if($val['user_type'] == 'organisation') {
								$userinfo= $this->account_model->get_user_info_org($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
						 } elseif($val['user_type'] == 'personal'){
								$userinfo = $this->account_model->get_user_info_user($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
						 }
						 $data .='<tr>';
						 $data .='<td>'.$name.'</td>';
						 $data .='<td>'.$email.'</td>';
						 $data .='<td>'.$contact_office.'</td>';
						 $data .='<td>'.$val['user_type'].'</td>';
						 $data .='<td>'.date('d-M-Y h:i a',$val["enabled_time"]).'</td>';
						 $data .='</tr>';
					}
					else{
						$set=1;
					}
				 }
			}else{
				$data .= '<tr><td colspan="5" style="color:red; text-align:center;">No record found</td></tr>';
			}
			if($set==1){
				$data .= '<tr><td colspan="5" style="color:red; text-align:center;">No record found</td></tr>';
			}
         $data .= '</tbody>
          </table>
        </div>
		</div>
      </div>';
	  echo $data;
	}
}

?>