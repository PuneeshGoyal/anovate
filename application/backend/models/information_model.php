<?php 
class information_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	
	/********************************************************information function starts***************************************************/
	
	public function getinformationData($searchdata=array())
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
		
		$this->db->select("*,informations.id as informationid");
		$this->db->from("informations");
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			$this->db->like("informations.information",$searchdata["search"]);	
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
		$where=array("informations.status <>"=>"4");
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
	
	
	public function add_edit_information($informationarray)
	{
		if($informationarray["id"]=="")
		{
			return $this->db->insert("informations",$informationarray);	
		}	
		else
		{
			$this->db->where("id",$informationarray["id"]);
			return $this->db->update("informations",$informationarray);
		}	
	}
	
	public function getIndividualinformation($informationid)
	{
		$this->db->select("*,informations.id as informationid");	
		$this->db->from('informations');
		$where=array("informations.id"=>$informationid);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->row_array();
		return $resultset;		
	}
	
	
	
	public function enable_disable_information($informationid,$status)
	{
		$this->db->where("id",$informationid);
		$array=array("status"=>$status);
		$this->db->update("informations",$array);		
	}
	
	public function archive_information($informationid)
	{
		$this->db->select("image");
		$this->db->from("informations");
		$this->db->where("id",$informationid);
		$query = $this->db->get();
		$images = $query->row_array();
		unlink('../slideshowimages/'.$images['image']);
		
		$where=array("id"=>$informationid);
		$array=array("status"=>4);
		$this->db->where($where);
		$this->db->update("informations",$array);
	}	
	
}
?>