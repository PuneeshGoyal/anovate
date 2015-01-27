<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("store_model");
		//$this->load->model("order_model");
		$this->load->model("user_model");
		$this->load->model("country_model");
		//$this->load->model("product_model");
		$this->load->model('email_model');
		$this->load->model('common');
	}
	public function upload_images()
	{
		$data["master_title"]="Upload";  
		$data["master_body"]="upload_images";
		$this->load->theme('home_layout',$data);	
	}
	 public function upload()
    {
        if (isset($_FILES['upload']['name'])) {
            // total files //
            $count = count($_FILES['upload']['name']);
           // all uploads //
            $uploads = $_FILES['upload'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    move_uploaded_file($uploads['tmp_name'][$i], 'productimages/' . $uploads['name'][$i]);
                    echo $uploads['name'][$i] . "\n";
                }
            }
        }
    }
	public function upload_file()
	{
		 $status = "";
   $msg = "";
   $file_element_name = 'userfile';
    
   if (empty($_POST['title']))
   {
      $status = "error";
      $msg = "Please enter a title";
   }
    
   if ($status != "error")
   {
      $config['upload_path'] = '../productimages/';
      $config['allowed_types'] = 'gif|jpg|png|doc|txt';
      $config['max_size']  = 1024 * 8;
      $config['encrypt_name'] = TRUE;
 
      $this->load->library('upload', $config);
 
      if (!$this->upload->do_upload($file_element_name))
      {
         $status = 'error';
         $msg = $this->upload->display_errors('', '');
      }
      else
      {
         $data = $this->upload->data();
         $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
         if($file_id)
         {
            $status = "success";
            $msg = "File successfully uploaded";
         }
         else
         {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
         }
      }
      @unlink($_FILES[$file_element_name]);
   }
   echo json_encode(array('status' => $status, 'msg' => $msg));
	}
}
?>