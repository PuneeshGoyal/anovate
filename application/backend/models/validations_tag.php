<?php 
class validations_tag extends CI_Model {
 
    function __construct(){
        parent::__construct();
    }
	public function validate_tag($arr = array())
	{
		
		if($arr['tag']=='')
		{
			$this->session->set_flashdata("errormsg","Please enter tag name");
			$err=1;		
		}
		else if(!$this->common->check_tag_name($arr)){
			$err=1;
			$this->session->set_flashdata("errormsg","This tag name already exists,try another");
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