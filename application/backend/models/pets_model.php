<?php 
ob_start();

class pets_model extends CI_Model { 
    function __construct(){
        parent::__construct();
    }
	//to check user has booked any slot
	public function check_is_date_filled($cause_id)
	{
		$this->db->select("*");
		$this->db->from('evt_events');
		$where = array("cause_id" =>$cause_id,"user_id"=>$this->session->userdata("userid"),"user_type"=>$this->session->userdata("user_type"));
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->num_rows();
		//echo $this->db->last_query();die;
		return !empty($resultset) ? $resultset : "0";		
	}
	
	public function check_is_date_filled_admin($cause_id,$user_id,$user_type)
	{
		$this->db->select("*");
		$this->db->from('evt_events');
		$where = array("cause_id" => $cause_id,"user_id" => $user_id,"user_type" => $user_type);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->num_rows();
		//echo $this->db->last_query();die;
		return !empty($resultset) ? $resultset : "0";		
	}
	
	public function check_creater_availability($cause_id,$user_id,$user_type)
	{
		$this->db->select("*");
		$this->db->from('evt_events');
		$where = array("cause_id" => $cause_id,"user_id" => $user_id,"user_type" => $user_type);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->result_array();
		//echo $this->db->last_query();die;
		return $resultset;		
	}
	
	
	public function get_all_breeds()
	{
		$this->db->select("*");	
		$this->db->from('animal_breeds');
		$where = array("status"=>1,"status <> "=>4);
		$this->db->where($where);
		$this->db->order_by("name ASC");
		$query = $this->db->get();
		$resultset = $query->result_array();
		return $resultset;		
	}
	public function get_breed_name($id = null)
	{
		$this->db->select("name");	
		$this->db->from('animal_breeds');
		$where = array("id"=>$id,"status <> "=>4);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset["name"];		
	}
	public function get_all_informations()
	{
		$this->db->select("*");	
		$this->db->from('informations');
		$where = array("status"=>1,"status <> "=>4);
		$this->db->where($where);
		$this->db->order_by("title ASC");
		$query = $this->db->get();
		$resultset = $query->result_array();
		return $resultset;		
	}
	public function get_user_petadoption_informations($id)
	{
		$this->db->select("group_concat(information_id) as information_id");	
		$this->db->from('pet_informations');
		$where = array("pet_id" => $id,"status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset;				
	}
	
	public function get_user_petadoption_informations_admin($id)
	{
		$this->db->select("group_concat(information_id) as information_id");	
		$this->db->from('pet_informations');
		$where = array("pet_id" => $id,"status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		$info_id = explode(',',$resultset["information_id"]);
		
		$this->db->select("title");	
		$this->db->from('informations');
		$this->db->where_in('id',$info_id);
		$where = array("status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->result_array();
		$arr=array();
		foreach($resultset as $k=>$v){
			$arr[] = $v["title"];	
		}
		$res = implode(', ',$arr);
		return $res;				
	}
	
	public function get_user_petadoption_informations_front($id)
	{
		$this->db->select("group_concat(information_id) as information_id");	
		$this->db->from('pet_informations');
		$where = array("pet_id" => $id,"status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		$info_id = explode(',',$resultset["information_id"]);
		
		$this->db->select("title,image");	
		$this->db->from('informations');
		$this->db->where_in('id',$info_id);
		$where = array("status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->result_array();
		return $resultset;				
	}
	
	function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL)
	{
		$t =& get_instance();
		$slug = url_title($string);
		$slug = strtolower($slug);
		$i = 0;
		$params = array ();
		$params[$field] = $slug;
	 
		if($key)$params["$key !="] = $value;
	 
		while ($t->db->where($params)->get($table)->num_rows())
		{  
			if (!preg_match ('/-{1}[0-9]+$/', $slug ))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
			 
			$params [$field] = $slug;
		}  
		return $slug;  
	}
	
	public function add_cause($array){
		  if($this->db->insert("pet_adoptions",$array)){
		  // echo $this->db->last_query();die;
			 return true;
		  }
		  else{return false; }
	}
	public function edit_cause($array){
	     $id= $array['id'];
		 unset($array['id']);
		 $this->db->where("id",$id);
	     return $this->db->update("pet_adoptions",$array);
	}
	public function add_edit_cause_images($array){
		 $this->db->insert("pet_adoption_images",$array);
	}
	public function add_edit_pet_informations($array){
		 $this->db->insert("pet_informations",$array);
	}
	
	public function add_edit_cause_docs($array){
		 $this->db->insert("pet_adoption_documents",$array);
	}
	
	public function enable_disable_pet($tagid,$status)
	{
		$this->db->select("activated_time,duration");	
		$this->db->from('pet_adoptions');
		$where = array("id" => $tagid);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		if($resultset["activated_time"] == "0" && $status==2)
		{
			$end_time = time() + ($resultset['duration']*24*60*60);
			$data = array("status"=>$status,"activated_time" => time(),'end_time' => $end_time);
/*			$petition_end_time = time() + ($resultset['petition_duration']*24*60*60);
			$data = array("status"=>$status,"activated_time" => time(),'end_time' => $end_time,'petition_end_time' => $petition_end_time);
*/		}
		else{
			$data = array("status" => $status);
		}
		$this->db->where("id",$tagid);
		$this->db->update("pet_adoptions",$data);		
	}
	
	public function enable_disable_featured($tagid,$status)
	{
		$data = array("featured" => $status);
		$this->db->where("id",$tagid);
		$this->db->update("causes",$data);		
	}
	public function enable_disable_hope($tagid,$status)
	{
		$data = array("stories_of_hope" => $status);
		$this->db->where("id",$tagid);
		$this->db->update("causes",$data);		
	}
	
	public function get_slug_by_id($id = NULL)
	{
		$this->db->select("slug");	
		$this->db->from('pet_adoptions');
		$where = array("id" => $id);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset["slug"];		
	}
	public function get_pet_id_byslug($slug = NULL)
	{
		$this->db->select("id");	
		$this->db->from('pet_adoptions');
		$where = array("slug" => $slug);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset["id"];		
	}
	
	
	public function get_all_pet_adoption_data($searchdata=array()){
		
		$recordperpage="";
		$startlimit="";
		if(!isset($searchdata["page"]) || $searchdata["page"]==""){
			$searchdata["page"]=0;	
		}
	    if(!isset($searchdata["countdata"])){	
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!=""){
				$recordperpage=$searchdata["per_page"];	
			}
			else{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!=""){
				$startlimit=$searchdata["page"];	
			}
			else{
				$startlimit=0;
			}
		}
		$this->db->select("pet_adoptions.*");	
		$this->db->from('pet_adoptions');
		
		
		if(count($searchdata)!=0){		
			foreach($searchdata as $key=>$val){
				if(isset($searcharray[$key]) && $searchdata[$key]!=""){
					if(array_key_exists($key,$searcharray)){
						$where=array($searcharray[$key]=>$val);
						$this->db->where($where);
					}
				}
			}		
		}
		
		
	    if(isset($searchdata["filter"]) && $searchdata["filter"]=="approved")
		{
			$this->db->where("pet_adoptions.status",2);	
		}
		else if(isset($searchdata["filter"]) && $searchdata["filter"] =="pending")
		{
			$this->db->where("pet_adoptions.status",1);	
		}
		else if(isset($searchdata["filter"]) && $searchdata["filter"] =="close")
		{
			$this->db->where("pet_adoptions.status",3);	
		}
		else
		{
			if($searchdata["usertype"] != "admin"){
				$this->db->where(array("pet_adoptions.status <>"=>4));
		 		$this->db->where(array("pet_adoptions.status <>"=>5));
			}
			else{
				$this->db->where(array("pet_adoptions.status <>"=>4));
			}
		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			$this->db->like("causes.title",$searchdata["search"]);	
		}	
		
		if($searchdata["usertype"] != "admin"){
			$where=array("userid"=>$this->session->userdata('userid'));
			$this->db->where($where);
		}
		
		
       	$this->db->order_by("id DESC"); 
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!=""){
			if($recordperpage!="" && ($startlimit!="" || $startlimit==0)){
				$this->db->limit($recordperpage,$startlimit);
			}
		}

		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
	}
	
	public function getIndividualpet($id = NULL)
	{
		$this->db->select("pet_adoptions.*");	
		$this->db->from('pet_adoptions');
		$where = array("pet_adoptions.id" => $id,"pet_adoptions.status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset;
	}
	
	public function getcausedata($id){
				
		$this->db->select("pet_adoptions.*");	
		$this->db->from('pet_adoptions');
		$where=array("pet_adoptions.pet_id"=>$id,"pet_adoptions.status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		
		
	   	$this->db->select("image_name");	
		$this->db->from('pet_adoption_images');
		$where_image=array("pet_id"=>$id,"status"=>"1");
		$this->db->where($where_image);
		$query_image = $this->db->get();
		$resultset1=$query_image->result_array();
		
		$j=0;
		foreach($resultset1 as $key=>$val){
		   $resultset["causeimages"][$j]=$val["image_name"];	
		   $j++;
		}
		
		$this->db->select("document_name");	
		$this->db->from('pet_adoption_documents');
		$where_doc=array("pet_id"=>$id,"status"=>"1");
		$this->db->where($where_doc);
		$query_doc = $this->db->get();
		$resultset2=$query_doc->result_array();
		$k=0;
		 if(count($resultset1) > 0)
		 {
			foreach($resultset2 as $dkey=>$dval)
			{
			   $resultset["causedoc"][$k]=$dval["document_name"];	
			   $k++;
			}
		 }		
		return $resultset;
	}
	
	public function getcausedatabyslug($slug){
				
		$this->db->select("pet_adoptions.*");	
		$this->db->from('pet_adoptions');
		$where = array("pet_adoptions.slug" => $slug,"pet_adoptions.status <>" => "4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		
	   	$this->db->select("image_name");	
		$this->db->from('pet_adoption_images');
		$where_image=array("pet_id" => $resultset['id'],"status"=>"1");
		$this->db->where($where_image);
		$this->db->order_by('is_default_image','ASC');
		$query_image = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset1 = $query_image->result_array();
		
		$j=0;
		foreach($resultset1 as $key => $val){
		   $resultset["causeimages"][$j] = $val["image_name"];	
		   $j++;
		}
		
		$this->db->select("document_name");	
		$this->db->from('pet_adoption_documents');
		$where_doc=array("pet_id"=>$resultset['id'],"status"=>"1");
		$this->db->where($where_doc);
		$query_doc = $this->db->get();
		$resultset2=$query_doc->result_array();
		
		$k=0;
		 if(count($resultset1) > 0){
			foreach($resultset2 as $dkey => $dval){
			   $resultset["causedoc"][$k] = $dval["document_name"];	
			   $k++;
			}
		 }		
		return $resultset;
	}
	
	
	public function delete_cause_images($datarr,$newarr)
	{
	         $this->db->select("image_name");
			 $this->db->from("pet_adoption_images");
			 $this->db->where(array("status"=>1,"pet_id"=>$datarr));
			 $result = $this->db->get();
			 $result = $result->result_array();
			
			foreach($result as $keys => $vals){
				//echo $vals['image_name'];
				if(in_array($vals['image_name'],$newarr))
				{
				 ////skip
				}
				else
				{
				 unlink('cause_upload_images/'.$vals['image_name']);
				 unlink('cause_upload_images/thumbnail/'.$vals['image_name']);
				}
				
			}
		  $this->db->where(array("pet_id"=>$datarr));
		  return $this->db->delete("pet_adoption_images");
	}
	
	public function delete_cause_docs($datarr,$newarr)
	{
	         $this->db->select("document_name");
			 $this->db->from("pet_adoption_documents");
			 $this->db->where(array("status"=>1,"pet_id"=>$datarr));
			 $result = $this->db->get();
			 $result = $result->result_array();
			
			foreach($result as $keys => $vals){
				//echo $vals['document_name'];
				if(in_array($vals['document_name'],$newarr))
				{
				 ////skip
				}
				else
				{
				 unlink('cause_upload_docs/'.$vals['image_name']);
				}
				
			}
			
		 $this->db->where(array("pet_id"=>$datarr));
		 return $this->db->delete("pet_adoption_documents");
	}
	
	
	
	public function closepets($id)
	{
	     $array['status']= '3' ;
		 $this->db->where("id",$id);
	     return $this->db->update("pet_adoptions",$array);
	}
	public function getfrontpagecause()
	{
		$this->db->select("causes.*");
		$this->db->from("causes");
		$this->db->where(array("causes.status"=>"2" ,"causes.featured" => 1,"causes.end_time >= " => time()));
        $this->db->order_by('causes.id', 'RANDOM');
		$this->db->limit(12,0);
        $query=$this->db->get();
		//echo $this->db->last_query();die;
		$result= $query->result_array();
		return $result;
	}
	
	public function getallpets($searchdata=array()){
		
		$recordperpage="";
		$startlimit="";
		if(!isset($searchdata["page"]) || $searchdata["page"]==""){
			$searchdata["page"]=0;	
		}
	    if(!isset($searchdata["countdata"])){	
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!=""){
				$recordperpage=$searchdata["per_page"];	
			}
			else{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!=""){
				$startlimit=$searchdata["page"];	
			}
			else{
				$startlimit=0;
			}
		}
		
		$country = explode(',',$searchdata["country"]);
		
		
		$this->db->select("pet_adoptions.*");	
		$this->db->from('pet_adoptions');
		
		if(count($searchdata)!=0){		
			foreach($searchdata as $key=>$val){
				if(isset($searcharray[$key]) && $searchdata[$key]!=""){
					if(array_key_exists($key,$searcharray)){
						$where=array($searcharray[$key]=>$val);
						$this->db->where($where);
					}
				}
			}		
		}
		
		
		
		//debug($test);
		if(isset($searchdata["country"]) && $searchdata["country"]!="")
		{
			if($searchdata["country"]=="all"){}
			else{$this->db->where(array("pet_adoptions.country" => $searchdata["country"]));}
		}	
		
		if(isset($searchdata["breed"]) && $searchdata["breed"] !=""){
			$breed =  explode(',',$searchdata["breed"]);
			$this->db->where(array("pet_adoptions.status"=>"2","pet_adoptions.status <>"=>"3","pet_adoptions.end_time >= " => time()));
			$this->db->where(array("pet_adoptions.status <>"=>"5"));
			$this->db->where_in("pet_adoptions.breed_id",$breed);
			$this->db->order_by('pet_adoptions.id', 'RANDOM');
		}
		
		if(isset($searchdata["age"]) && $searchdata["age"]!="" && $searchdata["age"]!=0){
			 $this->db->where(array("pet_adoptions.age" => $searchdata["age"]));
		}
		
		if(empty($searchdata["breed"])){
			$this->db->where(array("pet_adoptions.status"=>"2","pet_adoptions.status <>"=>"3","pet_adoptions.end_time >= " => time()));
			$this->db->where(array("pet_adoptions.status <>"=>"5"));
			$this->db->order_by('pet_adoptions.id', 'RANDOM');
		}
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!=""){
			if($recordperpage!="" && ($startlimit!="" || $startlimit==0)){
				$this->db->limit($recordperpage,$startlimit);
			}
		}
      
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
	}
	
	public function getpetdisplayimages($id)
	{
	    $resultset = "";
		$this->db->select("image_name");	
		$this->db->from('pet_adoption_images');
		$where_image=array("pet_id"=>$id,"status"=>"1");
		$this->db->where($where_image);
		$this->db->order_by('is_default_image','ASC');
		$query_image = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset1 = $query_image->result_array();
		
		$j=0;
		foreach($resultset1 as $key=>$val)
		{
		  $array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
		  $ext = end(explode('.',$val["image_name"]));
		  if(in_array(strtolower($ext),$array))
		  {
			  $resultset[$j] = $val["image_name"];	
			  $j++;
		  }
		}
		
		return $resultset;
	} 
	
	public function getcausedonationinfo($id)
	{
	    $this->db->select("sum(amount) as total_sum, count(*) as count,cause_donations.status,causes.target_amount,causes.activated_time,causes.duration");
		$this->db->from("cause_donations");
		$this->db->join('causes','causes.id=cause_donations.cause_id','left outer');
		$where=array("cause_donations.cause_id"=>$id,"cause_donations.status"=>1);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;		
	} 
	
	public function getPetitionDonationInfo($id)
	{
	    $this->db->select("count(*) as count");
		$this->db->from("causes");
		$this->db->join('petitions','petitions.cause_id = causes.id');
		$where=array("causes.id"=>$id,"causes.status <>"=>4);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset;		
	} 
	
	public function getVolunteerDonationInfo($id)
	{
	    $this->db->select("count(*) as count");
		$this->db->from("causes");
		$this->db->join('volunteers','volunteers.cause_id = causes.id');
		$where = array("causes.id"=>$id,"causes.status <>"=>4);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset;		
	} 
	
	public function save_user_donation($array)
	{
		return $this->db->insert("cause_donations",$array);
	}
	
	public function add_comment($arr)
	{
		return $this->db->insert("cause_comments",$arr);
	}
	public function mark_attendence($v)
	{
		 $arr["is_attended"] = "1";
		 $this->db->where("id",$v);
		 return $this->db->update("volunteers",$arr);
	}
	public function get_all_comments($pet_id)
	{
		$this->db->select("*");	
		$this->db->from('cause_comments');
		$where = array("cause_comments.pet_id" => $pet_id,"cause_comments.status" =>1);
		$this->db->where($where);
		$this->db->order_by("id desc");
		$this->db->limit(5,0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;		
	}
	
	public function get_comments_count($blogid)
	{
		$this->db->select("*");	
		$this->db->from('cause_comments');
		$where=array("cause_comments.pet_id" => $blogid,"cause_comments.status" =>1);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return count($resultset);		
	}
	
	public function get_cause_id_byslug($id)
	{
		$this->db->select("*");	
		$this->db->from('pet_adoptions');
		$where = array("pet_adoptions.slug" => $id);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset["id"];		
	}
	
	public function load_more($last_id,$blogid)
	{
		$this->db->select("*");	
		$this->db->from('cause_comments');
		$where = array("cause_comments.pet_id" => $blogid,"cause_comments.cause_id" => 0,"cause_comments.id <" => $last_id);
		$this->db->where($where);
		$this->db->order_by("cause_comments.id desc");
		$this->db->limit(5,0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;	
	}
	
	public function get_cause_donation_by_id($id)
	{
		$this->db->select("cause_donations.*");	
		$this->db->from('cause_donations');
		//$this->db->join('users','users.id=cause_donations.user_id','left outer');
		$where = array("cause_donations.cause_id" => $id,'cause_donations.status <>' =>'0');
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $resultset = $query->result_array();
	}
	
	public function archive_pets($id)
	{
		$array['status']= '4' ;
		$this->db->where("id",$id);
	    return $this->db->update("pet_adoptions",$array);
	}
	
	public function get_guestuser_donation_info($id)
	{
		$this->db->select("*");	
		$this->db->from('cause_donations');
		$where = array("id" => $id);
		$this->db->where($where);
		$query1 = $this->db->get();
		//echo $this->db->last_query();die;	
		return $query1->row_array();
	}
	public function mark_steps_completed($id)
	{
		$arr=array();
		$this->db->select("steps_completed");	
		$this->db->from('pet_adoptions');
		$where = array("id" => $id);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;	
		$num = $query->num_rows();
		$res = $query->row_array();
		
		if($res["steps_completed"] == 0){
			$arr["steps_completed"]=1;
			$this->db->where("id",$id);
			if($this->db->update("pet_adoptions",$arr)){
				$return = "1";
			}
			else{$return = "0";}
		}
		else{
			$return = "1";
		}
		return $return;
	}
	
	public function proceed_adoption($arr)
	{
		if($this->db->insert("pet_adoption_appointments",$arr)){
			$return = "1";
		}
		else{$return = "0";}
		return $return;
	}
	
	public function is_already_booked_appointment($pet_id,$userid,$user_type){
			$this->db->select("*");	
			$this->db->from('pet_adoption_appointments');
			$where = array("pet_id" => $pet_id,"userid" => $userid,"user_type" => $user_type);
			$this->db->where($where);
			$query = $this->db->get();
			$num = $query->num_rows();
			if(empty($num)){
				return "0";
			}
		    else {
				$res = $query->row_array();
				return $res;
			}
	}
	public function get_booked_appointments_userdata($pet_id){
			$this->db->select("*");	
			$this->db->from('pet_adoption_appointments_datetime');
			$where = array("pet_id" => $pet_id);
			$this->db->where($where);
			$this->db->order_by('enabled_time ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$res = $query->result_array();
			return $res;
	}
	
	public function is_unique_title($arr =array()){
			$this->db->select("*");	
			$this->db->from('pet_adoptions');
			if($arr["id"]==""){
				$where = array("title" => $arr['title'],'status <>'=>4);
			}
			else{
				$where = array("title" => $arr['title'],"id <>" => $arr['id'],'status <>'=>4);
			}
			$this->db->where($where);
			$query = $this->db->get();
			$num = $query->num_rows();
			//echo $this->db->last_query();die;
			if(empty($num)){
				return "0";
			}
		    else {
				$res = $query->row_array();
				return $res;
			}
	}
}
?>