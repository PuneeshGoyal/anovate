<?php 
class validations_information extends CI_Model {
 
    function __construct(){
        parent::__construct();
    }
	public function validate_information($arr = array())
	{
		
		if($arr['title']=='')
		{
			$this->session->set_flashdata("errormsg","Please enter title");
			$err=1;		
		}
		else if(!$this->common->check_information_name($arr)){
			$err=1;
			$this->session->set_flashdata("errormsg","This title name already exists,try another");
		}
		else if($arr["image"]==""  && $arr["id"]=="")
		{
			$this->session->set_flashdata("errormsg","Please select image");
			$err=1;		
		}
		else if(isset($arr["image"]) && $arr["image"]!="" && !in_array($this->common->get_extension($arr["image"]),$this->config->item("allowedimages")))
		{
			$this->session->set_flashdata("errormsg","File type is not valid only jpg,png,gif allowed");
			$err=1;	
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	
	
/*************************************For Category ADD Edit End MOTOR Bike*****************************************************************/

}