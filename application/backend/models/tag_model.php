<?php 
class tag_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	
	/********************************************************tag function starts***************************************************/
	
	public function gettagData($searchdata=array())
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
		
		$this->db->select("*,tags.id as tagid");
		$this->db->from("tags");
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			$this->db->like("tags.tag",$searchdata["search"]);	
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
		$where=array("tags.status <>"=>"4");
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
	
	
	public function add_edit_tag($tagarray)
	{
		if($tagarray["id"]=="")
		{
			return $this->db->insert("tags",$tagarray);	
		}	
		else
		{
			$this->db->where("id",$tagarray["id"]);
			return $this->db->update("tags",$tagarray);
		}	
	}
	
	public function getIndividualtag($tagid)
	{
		$this->db->select("*,tags.id as tagid");	
		$this->db->from('tags');
		$where=array("tags.id"=>$tagid);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;		
	}
	
	
	
	public function enable_disable_tag($tagid,$status)
	{
		$this->db->where("id",$tagid);
		$array=array("status"=>$status);
		$this->db->update("tags",$array);		
	}
	
	public function archive_tag($tagid)
	{
		$where=array("id"=>$tagid);
		$array=array("status"=>4);
		$this->db->where($where);
		$this->db->update("tags",$array);
	}	
	
	
}
?>