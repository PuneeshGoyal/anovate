<?php 
class validations_animal_breed extends CI_Model {
 
    function __construct(){
        parent::__construct();
    }
	public function validate_animal_breed($arr = array())
	{
		
		if($arr['name']=='')
		{
			$this->session->set_flashdata("errormsg","Please enter breed name");
			$err=1;		
		}
		else if(!$this->common->check_breed_name($arr)){
			$err=1;
			$this->session->set_flashdata("errormsg","This breed name already exists,try another");
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
}