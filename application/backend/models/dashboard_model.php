<?php 
class dashboard_model extends CI_Model {

//var	$user_table = 'country'; 
    function __construct(){
        parent::__construct();
    }
	
// admin dashbard recent activities
	public function recent_activities_admin($searchdata=array()){ //echo $searchdata; die;
		$last_logged = $this->session->userdata("last_logged"); 
		/*	if($searchdata['sort'] == 'events'){
				$this->db->select("*");
				$this->db->from('events');
				$where = array("status" =>1, "status <>" =>4, "created_by <>" => "admin");
				//$where = "time < ".$last_logged;
				$this->db->where($where);
				$this->db->order_by("time DESC");
				$query = $this->db->get();
			// echo $this->db->last_query(); die;
			}
			else if($searchdata['sort'] == 'meetings'){
				$this->db->select("*");
				$this->db->from('meetings');
				$where = array("status" =>1, "status <>" =>4, "created_by <>" => "admin");
				//$where = "time > ".$last_logged;
				$this->db->where($where);
				$this->db->order_by("time DESC");
				$query = $this->db->get();
				//echo $this->db->last_query(); die;
			}
			else if($searchdata['sort'] == 'volunteer'){
				$this->db->select("*");
				$this->db->from('volunteer');
				$where = "status<>4 AND time > ".$last_logged;
				$this->db->where($where);
				$this->db->order_by("time DESC");
				$query = $this->db->get();
	
			}
			else if($searchdata['sort'] == 're_allocation_requests'){ //echo "dsfdsf";
				$this->db->select("volunteer.name, re_allocation_requests.time, re_allocation_requests.status, division.name as division");
				$this->db->from('re_allocation_requests');
				$this->db->join("volunteer","volunteer.id = re_allocation_requests.user_id");
				$this->db->join("division","division.id = re_allocation_requests.request_division");
				$where = "re_allocation_requests.status <> 4 ";
				$this->db->where($where);
				$this->db->order_by("re_allocation_requests.time DESC");
				$query = $this->db->get();
				//echo $this->db->last_query(); die;
	
			}
			else if($searchdata['sort'] == 'training_appications'){ //echo "dsfdsf";
				$this->db->select("division.name as division, training_categories.name as training, training_appications.time, training_appications.status");
				$this->db->from('training_appications');
				$this->db->join("division","division.id = training_appications.division_id");
				$this->db->join("training_categories","training_categories.id = training_appications.training_id");
				$where = "training_appications.status <> 4 AND training_appications.status=0";
				$this->db->where($where);
				$this->db->order_by("training_appications.time DESC");
				$query = $this->db->get();
				//echo $this->db->last_query(); die;
	
			}
			else if($searchdata['sort'] == 'promotions'){ 
				$this->db->select("volunteer.name, ranks.name, admin_users.name, promotions.time, promotions.status");
				$this->db->from('promotions');
				$this->db->join("volunteer","volunteer.id = promotions.volunteer_id");
				$this->db->join("ranks","ranks.id = promotions.volunteer_rank");
				$this->db->join("admin_users","admin_users.id = promotions.user_id AND promotions.created_by <> 'admin'");
				$where = "promotions.status<>4";
				//$this->db->where($where);
				$this->db->order_by("promotions.time DESC");
				$query = $this->db->get();
				//echo $this->db->last_query(); die;
	
			}
			else{ 
					$sql = "select view.* from (SELECT -1 as email, name, created_by, start_date, -1 as meeting_date, -1 as user_name, -1 as division, -1 as training, -1 as promted, -1 as rank, -1 as promted_by, user_id, time, status FROM events where status<> 4 AND status = 1 AND created_by <>'admin' 
					  UNION SELECT -1, name, created_by, -1, meeting_date, -1, -1, -1, -1, -1, -1, user_id, time, status FROM meetings where status<> 4 AND status = 1 AND created_by <> 'admin'
					  UNION SELECT email, name, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, time, status FROM volunteer where status<> 4 AND status = 1 
					  UNION SELECT -1, -1, -1, -1, -1, -1, division.name, training_categories.name, -1, -1, -1, -1, training_appications.time, training_appications.status FROM training_appications join division on (division.id =  training_appications.division_id) join training_categories on (training_categories.id =  training_appications.training_id) where training_appications.status <> 4 
					  UNION SELECT -1, -1, -1, -1, -1, -1, -1, -1, volunteer.name, ranks.name, admin_users.name, -1, promotions.time, promotions.status FROM promotions join volunteer on (volunteer.id =  promotions.volunteer_id) join ranks on (ranks.id =  promotions.volunteer_rank) join admin_users on (admin_users.id = promotions.user_id) where promotions.created_by <> 'admin' AND promotions.status <> 4 
					  UNION SELECT -1, -1, -1, -1, -1, volunteer.name, division.name, -1, -1, -1, -1, -1, re_allocation_requests.time, re_allocation_requests.status FROM re_allocation_requests join volunteer on (volunteer.id = re_allocation_requests.user_id) join division on (division.id = re_allocation_requests.request_division) where  volunteer.status!=4 AND re_allocation_requests.status=0
					  ) as view where view.status !=4 order by view.time DESC";

				/*$sql = "select view.* from (SELECT -1 as email, name, created_by, start_date, -1 as meeting_date, -1 as user_name, -1 as division, -1 as training, -1 as promted, -1 as rank, -1 as promted_by, user_id, time, status FROM events where status<> 4 AND status = 1 AND created_by <> 'admin' 
					  UNION SELECT -1, name, created_by, -1, meeting_date, -1, -1, -1, -1, -1, -1, user_id, time, status FROM meetings where  status<> 4 AND status = 1 AND created_by <>'admin' 
					  UNION SELECT -1, -1, -1, -1, -1, -1, division.name, training_categories.name, -1, -1, -1, -1, training_appications.time, training_appications.status FROM training_appications join division on (division.id =  training_appications.division_id) join training_categories on (training_categories.id =  training_appications.training_id) where training_appications.status <> 4 
					  ) as view where view.status != 4 order by view.time DESC";*/
				/*$query = $this->db->query($sql);
				//echo $this->db->last_query(); die;
			}
		$resultset=$query->result_array(); //print_r($resultset); die;
		
		return $resultset;
	}
	
	public function recent_activities_subadmin($searchdata=array()){  
		$last_logged = $this->session->userdata("last_logged"); 
			$user_id = $this->session->userdata('id');
				if($searchdata['sort'] == 'events'){
				$this->db->select("*");
				$this->db->from('events');
				$where = array("status" =>1, "status <>" => 4, 'user_id <>' => $user_id);
				$this->db->where($where);
				$this->db->order_by("time DESC");
				$query = $this->db->get();
				//echo $this->db->last_query(); die;
			}
			else if($searchdata['sort'] == 'meetings'){
				$this->db->select("*");
				$this->db->from('meetings');
				$where = array("status" =>1, "status <>" => 4, 'user_id <>' => $user_id);
				$this->db->where($where);
				$this->db->order_by("time DESC");
				$query = $this->db->get();
			}
		else if($searchdata['sort'] == 'training_appications'){ //echo "dsfdsf";
				$loged_user_id = $this->session->userdata('id');
				$divisions_id = $this->common->get_loged_in_subadmin_divisions($loged_user_id);
				//$divisions_id = explode(',',$divisions_id);
				$sql = " SELECT division.name as division, training_categories.name as training, division_id, training_appications.time, training_appications.status FROM training_appications join division on (division.id =  training_appications.division_id) join training_categories on (training_categories.id =  training_appications.training_id) where training_appications.status <> 4 AND training_appications.division_id IN ($divisions_id) order by training_appications.time DESC";*/
				/*$this->db->select("division.name, training_categories.name, training_appications.time, training_appications.status");
				$this->db->from('training_appications');
				$this->db->join("division","division.id = training_appications.division_id");
				$this->db->join("training_categories","training_categories.id = training_appications.training_id");
				$where = "training_appications.status <> 4 AND training_appications.status=0";
				$this->db->where($where);
				$this->db->where_in("training_appications.division_id",$divisions_id);
				$this->db->order_by("training_appications.time DESC");*/
				//$query = $this->db->get();
			/*	$query = $this->db->query($sql);
				//echo $this->db->last_query(); die;
	
			}
			else{ 
				$loged_user_id = $this->session->userdata('id');
				$divisions_id = $this->common->get_loged_in_subadmin_divisions($loged_user_id);
			//	$divisions_id = explode(',',$divisions_id);
				$sql = "select view.* from (SELECT -1 as email, name, created_by, start_date, -1 as meeting_date, -1 as user_name, -1 as division, -1 as training, -1 as division_id, -1 as rank, -1 as promted_by, time, status 
					  FROM events where status <> 4 AND status = 1 AND user_id <>'".$this->session->userdata("id")."' 
					  UNION SELECT -1, name, created_by, -1, meeting_date, -1, -1, -1, -1, -1, -1, time, status FROM meetings where status<> 4 AND status = 1 AND user_id <>'".$this->session->userdata("id")."'
					  UNION SELECT email, name, -1, -1, -1, -1, -1, -1, -1, -1, -1, time, status FROM volunteer where status<> 4 AND status = 1 
					  UNION SELECT -1, -1, -1, -1, -1, -1, division.name, training_categories.name, division_id, -1, -1, training_appications.time, training_appications.status FROM training_appications join division on (division.id =  training_appications.division_id) join training_categories on (training_categories.id =  training_appications.training_id) where training_appications.status <> 4 and training_appications.division_id IN ($divisions_id)
					  ) as view where view.status !=4 order by view.time DESC";
					  
				$query = $this->db->query($sql);
				//echo $this->db->last_query(); die;
			}
			$resultset=$query->result_array(); //print_r($resultset); die;
			return $resultset;*/

	}
	
//for volunteer recent activites 	
public function recent_activities_volunteer($searchdata=array()){}
	
	
}   


?>   