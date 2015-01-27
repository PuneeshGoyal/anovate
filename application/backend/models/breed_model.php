<?php 
class breed_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	
	/********************************************************breed function starts***************************************************/
	
	public function getbreedData($searchdata=array())
	{
		
		if(!isset($searchdata["page"]) || $searchdata["page"]=="")
		{
			$searchdata["page"]=0;	
		}
	    if(!isset($searchdata["countdata"]))
		{	
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
			{
				$recordperpage=$searchdata["per_page"];	
			}
			else
			{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!="")
			{
				$startlimit=$searchdata["page"];	
			}
			else
			{
				$startlimit=0;
			}
		}
		
		$this->db->select("*,animal_breeds.id as breedid");
		$this->db->from("animal_breeds");
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			$this->db->like("animal_breeds.name",$searchdata["search"]);	
		}	
		foreach($searchdata as $key=>$val)
		{
			if(isset($searcharray[$key]) && $searchdata[$key]!="")
			{
				if(array_key_exists($key,$searcharray))
				{
					$where=array($searcharray[$key]=>$val);
					$this->db->where($where);
				}
			}
		}		
		$where=array("animal_breeds.status <>"=>"4");
		$this->db->where($where);
		$this->db->order_by("id DESC");		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$this->db->limit($recordperpage,$startlimit);
			}
		}
		$query = $this->db->get();
		//echo $this->db->last_query();
		$resultset=$query->result_array();
		//debug($resultset);
		return $resultset; 
	}
	
	
	public function add_edit_breed($breedarray)
	{
		if($breedarray["id"]=="")
		{
			return $this->db->insert("animal_breeds",$breedarray);	
		}	
		else
		{
			$this->db->where("id",$breedarray["id"]);
			return $this->db->update("animal_breeds",$breedarray);
		}	
	}
	
	public function getIndividualbreed($breedid)
	{
		$this->db->select("*,animal_breeds.id as breedid");	
		$this->db->from('animal_breeds');
		$where=array("animal_breeds.id"=>$breedid);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;		
	}
		public function enable_disable_breed($breedid,$status)
	{
		$this->db->where("id",$breedid);
		$array=array("status"=>$status);
		$this->db->update("animal_breeds",$array);		
	}
	
	public function archive_breed($breedid)
	{
		$where=array("id"=>$breedid);
		$array=array("status"=>4);
		$this->db->where($where);
		$this->db->update("animal_breeds",$array);
	}	
}
?>