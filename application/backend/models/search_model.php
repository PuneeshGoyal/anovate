<?php 
class search_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

	public function getsearchcause($searchdata = array()){
		
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
		
		$sql="SELECT  causes.*  FROM  causes ";
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
		{
			//$sql .= "INNER JOIN  tags ON FIND_IN_SET(tags.id, causes.tagline) > 0  where 1=1 and (tags.tag like '%".urldecode($searchdata["search"])."%' OR causes.title like '%".urldecode($searchdata["search"])."%' OR tags.tag like '%".urldecode($searchdata["search"])."%') and causes.status='2' and causes.status <> '3' GROUP BY causes.id";
			$sql .= "INNER JOIN  tags ON FIND_IN_SET(tags.id, causes.tagline) > 0  where causes.status='2' and causes.end_time >= ".time()." and (tags.tag like '%".urldecode($searchdata["search"])."%' OR causes.title like '%".urldecode($searchdata["search"])."%') and causes.status <> '3'  GROUP BY causes.id";
		}
		else
		{
			$sql .=" where causes.status='2' and causes.status <> '3' and causes.end_time >= ".time()." GROUP BY causes.id";
		}
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$sql .= " limit ".$startlimit.",".$recordperpage;	
			}
		}
		
		$query = $this->db->query($sql);
	   // echo $this->db->last_query();die;
		$resultset = $query->result_array();
		//debug($resultset);die;
		return $resultset; 
}


}
?>