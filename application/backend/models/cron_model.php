<?php
class cron_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
  public function mark_cause_complete(){
	  
		//marked  all causes as completed  whose time expired and that are active
		$result = array();
        $this->db->select("*");
		$this->db->from("causes");
		$this->db->where(array("causes.status"=>2,"causes.end_time <=" => time()));
		$query = $this->db->get();//run query 
		//echo $this->db->last_query();
		$result = $query->result_array();
		//debug($result);die;
		if(!empty($result)){
			foreach($result as $k => $v){
				$array['status']= '5' ;
				$this->db->where("id",$v["id"]);
				$this->db->update("causes",$array);
			}
		}
    }
	public function mark_pets_complete(){
	  
		//marked  all causes as completed  whose time expired and that are active
		$result = array();
        $this->db->select("*");
		$this->db->from("pet_adoptions");
		$this->db->where(array("pet_adoptions.status"=>2,"pet_adoptions.end_time <=" => time()));
		$query = $this->db->get();//run query 
		//echo $this->db->last_query();
		$result = $query->result_array();
		//debug($result);die;
		if(!empty($result)){
			foreach($result as $k => $v){
				$array['status']= '5' ;
				$this->db->where("id",$v["id"]);
				$this->db->update("pet_adoptions",$array);
			}
		}
    }
	
	public function delete_disabled_days(){
		//marked  all dates as completed  whose time expired 
		$time = strtotime("today");
		$result = array();
        $this->db->select("*");
		$this->db->from("evt_events");
		$this->db->where(array("evt_events.enabled_time <" => $time));
		$query = $this->db->get();//run query 
		//echo $this->db->last_query();
		$result = $query->result_array();
		//debug($result);die;
		if(!empty($result)){
			foreach($result as $k => $v){
				$this->db->where("event_id",$v["event_id"]);
				$this->db->delete("evt_events");
			}
		}
	}
}
?>