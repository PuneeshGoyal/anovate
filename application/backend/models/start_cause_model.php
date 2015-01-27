<?php 
ob_start();

class start_cause_model extends CI_Model { 
    function __construct(){
        parent::__construct();
    }
	
	public function get_all_tags()
	{
		$this->db->select("*");	
		$this->db->from('tags');
		$where = array("tags.status"=>1,"tags.status <> "=>4);
		$this->db->where($where);
		$this->db->order_by("tag ASC");
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
						
	     $string=$array['title'];
		 $table='causes';
		 $field='slug';
		 $key='id';
		 $value='';
		 $array['slug'] = $this->create_unique_slug($string,$table,$field,$key,$value);
		  if($this->db->insert("causes",$array)){
		  // echo $this->db->last_query();die;
			 return true;
		  }
		  else
		  {
			return false;  
		  }
	}
	public function edit_cause($array){
						
	     $string=$array['title'];
		 $table='causes';
		 $field='slug';
		 $key='id';
		 $value=$array['id'];
		 $array['slug'] = $this->create_unique_slug($string,$table,$field,$key,$value);
		 $id= $array['id'];
		 unset($array['id']);
		 $this->db->where("id",$id);
	     return $this->db->update("causes",$array);
			
	}
	public function add_edit_cause_images($array){
		 $this->db->insert("cause_images",$array);
	}
	
	public function add_petition_submission($array){
		return $this->db->insert("petitions",$array);
	}
	public function add_volunteer_submission($array){
		return $this->db->insert("volunteers",$array);
	}
	
	public function add_edit_cause_docs($array){
				
		 $this->db->insert("cause_documents",$array);
			
	}
	
	public function enable_disable_cause($tagid,$status)
	{
		$this->db->select("activated_time,duration,petition_duration");	
		$this->db->from('causes');
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
		$this->db->update("causes",$data);		
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
		$this->db->from('causes');
		$where = array("id" => $id);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset["slug"];		
	}
	public function getallusercause($searchdata=array()){
		
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
		$this->db->select("causes.*");	
		$this->db->from('causes');
		
		
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
			$this->db->where("causes.status",2);	
		}
		else if(isset($searchdata["filter"]) && $searchdata["filter"] =="pending")
		{
			$this->db->where("causes.status",1);	
		}
		else if(isset($searchdata["filter"]) && $searchdata["filter"] =="close")
		{
			$this->db->where("causes.status",3);	
		}
		else
		{
			if($searchdata["usertype"] != "admin"){
				$this->db->where(array("causes.status <>"=>4));
		 		$this->db->where(array("causes.status <>"=>5));
			}
			else{
				$this->db->where(array("causes.status <>"=>4));
			}
		}
		
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			$this->db->like("causes.title",$searchdata["search"]);	
		}	
		
		if($searchdata["usertype"] != "admin"){
			$where=array("user_id"=>$this->session->userdata('userid'));
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
	
	public function getIndividualcause($id = NULL)
	{
		$this->db->select("causes.*");	
		$this->db->from('causes');
		$where = array("causes.id" => $id,"causes.status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset = $query->row_array();
		return $resultset;
	}
	public function get_cause_tags($id = NULL)
	{
		$this->db->select("tag");	
		$this->db->from('tags');
		$this->db->where_in("id",$id);
		$where = array("status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$resultset = $query->result_array();
		foreach($resultset as $k =>$v){
			$data[] =  $v["tag"];
		}
		$res = implode(', ',$data);
		return $res;
	}
	public function getcausedata($id){
				
		$this->db->select("causes.*");	
		$this->db->from('causes');
		$where=array("causes.id"=>$id,"causes.status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		
		
	   	$this->db->select("image_name");	
		$this->db->from('cause_images');
		$where_image=array("cause_id"=>$id,"status"=>"1");
		$this->db->where($where_image);
		$query_image = $this->db->get();
		$resultset1=$query_image->result_array();
		
		$j=0;
		foreach($resultset1 as $key=>$val)
		{
		   $resultset["causeimages"][$j]=$val["image_name"];	
		   $j++;
		}
		
		$this->db->select("document_name");	
		$this->db->from('cause_documents');
		$where_doc=array("cause_id"=>$id,"status"=>"1");
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
				
		$this->db->select("causes.*");	
		$this->db->from('causes');
		$where=array("causes.slug"=>$slug,"causes.status <>"=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		
	   	$this->db->select("image_name");	
		$this->db->from('cause_images');
		$where_image=array("cause_id"=>$resultset['id'],"status"=>"1");
		$this->db->where($where_image);
		$query_image = $this->db->get();
		$resultset1=$query_image->result_array();
		
		$j=0;
		foreach($resultset1 as $key=>$val)
		{
		   $resultset["causeimages"][$j]=$val["image_name"];	
		   $j++;
		}
		
		$this->db->select("document_name");	
		$this->db->from('cause_documents');
		$where_doc=array("cause_id"=>$resultset['id'],"status"=>"1");
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
	
	
	public function delete_cause_images($datarr,$newarr)
	{
	         $this->db->select("image_name");
			 $this->db->from("cause_images");
			 $this->db->where(array("status"=>1,"cause_id"=>$datarr));
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
		  $this->db->where(array("cause_id"=>$datarr));
		  return $this->db->delete("cause_images");
	}
	
	public function delete_cause_docs($datarr,$newarr)
	{
	         $this->db->select("document_name");
			 $this->db->from("cause_documents");
			 $this->db->where(array("status"=>1,"cause_id"=>$datarr));
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
			
		 $this->db->where(array("cause_id"=>$datarr));
		 return $this->db->delete("cause_documents");
	}
	
	
	
	public function closecause($id)
	{
	     $array['status']= '3' ;
		 $this->db->where("id",$id);
	     return $this->db->update("causes",$array);
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
	
	public function getallcauses($searchdata=array()){
		
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
		
		$this->db->select("causes.*,");	
		$this->db->from('causes');
		
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
		$search_user_data =  explode(',',$searchdata["type"]);
		$search_user_data1 =  explode(',',$searchdata["category"]);
		//debug($test);
		if(isset($searchdata["type"]) && $searchdata["type"]!=""  && $search_user_data[0]!='multiselect-all')
		{
			$type = explode(',',$searchdata["type"]);
			foreach($type as $key=>$val){
				$this->db->or_where("FIND_IN_SET('$val',tagline) !=", 0);
			}	
		}	
		if(isset($searchdata["category"]) && $searchdata["category"]!=""  && $search_user_data1[0]!='multiselect-all')
		{
			foreach($search_user_data1 as $k=>$v)
			{
				if($v=="fundraising")
				{
					$this->db->where(array("causes.is_fundraise"=>"1"));
				}
				if($v=="pledge")
				{
					$this->db->where(array("causes.is_petition"=>"1"));
				}
				if($v == "volunteer")
				{
					$this->db->where(array("causes.is_volunteer"=>"1"));
				}
			}
		}
		
		
        $this->db->where(array("causes.status"=>"2","causes.status <>"=>"3","causes.end_time >= " => time()));
		$this->db->where(array("causes.status <>"=>"5"));
		//$this->db->or_where(array("causes.petition_end_time >= " => time()));
        $this->db->order_by('causes.id', 'RANDOM');
		
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
	
	
	public function getallcauseshope($searchdata=array()){
		
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
		$this->db->select("causes.*");	
		$this->db->from('causes');
		
		
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
		$search_user_data =  explode(',',$searchdata["type"]);
		$search_user_data1 =  explode(',',$searchdata["category"]);
		
		
		if(isset($searchdata["type"]) && $searchdata["type"]!=""  && $search_user_data[0] !='multiselect-all')
		{
			$type = explode(',',$searchdata["type"]);
			foreach($type as $key=>$val){
				
				$this->db->or_where("FIND_IN_SET('$val',tagline) !=", 0);
			}	
		}	
		
		if(isset($searchdata["category"]) && $searchdata["category"]!=""  && $search_user_data1[0]!='multiselect-all')
		{
			foreach($search_user_data1 as $k=>$v)
			{
				if($v == "fundraising")
				{
					$this->db->where(array("causes.is_fundraise"=>"1"));
				}
				if($v == "pledge")
				{
					$this->db->where(array("causes.is_petition"=>"1"));
				}
				if($v == "volunteer")
				{
					$this->db->where(array("causes.is_volunteer"=>"1"));
				}
			}
		}
		
	/*	$this->db->where(array("causes.stories_of_hope"=>1,"causes.end_time >=" => time(),"causes.status <>"=>"4"));
		$this->db->where(array("causes.status <>"=>"5"));
		$this->db->order_by('causes.id', 'RANDOM');*/
		
        /*$this->db->where(array("causes.status"=>"2","causes.end_time >=" => time()));
		$this->db->where("(causes.stories_of_hope=1 OR causes.status=3)");
		$this->db->where(array("causes.status <>"=>"5"));
		$this->db->order_by('causes.id', 'RANDOM');*/
		
		$this->db->where("(causes.stories_of_hope=1 AND causes.status=3)");
		$this->db->where(array("causes.status <>"=>"4"));
		$this->db->where(array("causes.status <>"=>"5"));
		$this->db->order_by('causes.id', 'RANDOM');
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!=""){
			if($recordperpage!="" && ($startlimit!="" || $startlimit==0)){
				$this->db->limit($recordperpage,$startlimit);
			}
		}
      
		$query = $this->db->get();
		//echo $this->db->last_query();
		$resultset=$query->result_array();
		return $resultset;
	}
	
	
	
	public function getcausedisplayimages($id)
	{
	    $resultset = "";
		$this->db->select("image_name");	
		$this->db->from('cause_images');
		$where_image=array("cause_id"=>$id,"status"=>"1");
		$this->db->where($where_image);
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
	public function get_all_comments($blogid)
	{
		$this->db->select("*");	
		$this->db->from('cause_comments');
		$where=array("cause_comments.cause_id" => $blogid,"cause_comments.status" =>1);
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
		$where=array("cause_comments.cause_id" => $blogid,"cause_comments.status" =>1);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return count($resultset);		
	}
	
	public function get_cause_id_byslug($id)
	{
		$this->db->select("*");	
		$this->db->from('causes');
		$where = array("causes.slug" => $id);
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
		$where = array("cause_comments.cause_id" => $blogid,"cause_comments.id <" => $last_id);
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
	
	public function get_all_heroes_of_cause($id)
	{
		$result1 = array();
		$result2 = array();
		$result3 = array();
		
		$this->db->select("cause_donations.*");	
		$this->db->from('cause_donations');
		$where = array("cause_donations.cause_id" => $id,"cause_donations.support_as <>"=>1);
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query1 = $this->db->get();
		//echo $this->db->last_query();die;	
		$result1 = $query1->result_array();
		
		$this->db->select("petitions.*");	
		$this->db->from('petitions');
		$where = array("petitions.cause_id" => $id,"petitions.anonymous_status <>"=>1);
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query2 = $this->db->get();
		//echo $this->db->last_query();die;	
		$result2 = $query2->result_array();
		
		/*$this->db->select("volunteers.*");	
		$this->db->from('volunteers');
		$where = array("volunteers.cause_id" => $id,"volunteers.anonymous_status <>"=>1);
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query3 = $this->db->get();
		//echo $this->db->last_query();die;	
		$result3 = $query3->result_array();*/
		//,$result3
		$response  =  array_merge($result1,$result2);
		return $response;      
  	}
	
	
	public function get_petition_data($id)
	{
		$this->db->select("*");	
		$this->db->from('petitions');
		$where = array("cause_id" => $id,"status <> " =>4);
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query1 = $this->db->get();
		//echo $this->db->last_query();die;	
		return $query1->result_array();
	}
	
	public function get_volunteer_data($id)
	{
		$this->db->select("*");	
		$this->db->from('volunteers');
		$where = array("cause_id" => $id,"status <> " =>4);
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query1 = $this->db->get();
		//echo $this->db->last_query();die;	
		return $query1->result_array();
	}
	
	public function newsletter($arr){
		
		$this->db->select("*");
		$this->db->from("newsletters");
		$this->db->where(array("email" => $arr["email"]));
		$query = $this->db->get();//run query 
		$num = $query->num_rows();
		if($num == 0){
			if($this->db->insert("newsletters",$arr)){
				$resultset =  '0';
			}
			else{
				$resultset =  '2';
			}
		}
		else{
			$resultset = '1';
		}
		return $resultset;
	}
	
	public function archive_cause($id)
	{
		$array['status']= '4' ;
		$this->db->where("id",$id);
	    return $this->db->update("causes",$array);
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
	
}
?>