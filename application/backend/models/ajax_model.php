<?php 
class ajax_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function showState($CountryId = null) {
        $this->db->select('*');
        if ($CountryId != NULL) {
            $this->db->where('CountryId', $CountryId);
        }
        $query = $this->db->get('state');
        $State = array();
        if ($query->result()) {
            foreach ($query->result() as $StateVal) {
                $State[$StateVal->StateId] = $StateVal->State;
            }
            return $State;
        } else {
            return FALSE;
        }
    }
	public function showCity($StateId = null) {
        $this->db->select('*');
        if ($StateId != NULL) {
            $this->db->where('stateID', $StateId);
        }
        $query = $this->db->get('cities');
        $City = array();
        if ($query->result()) {
            foreach ($query->result() as $CityVal) {
                $City[$CityVal->cityId] = $CityVal->city;
            }
            return $City;
        } else {
            return FALSE;
        }
    }
	public function showSubCategory($parent_category = null) {
        $this->db->select('*');
        if ($parent_category != NULL) {
            $this->db->where(array('parent_category'=>$parent_category,'sub_category_status <>'=>'4'));
        }
        $query = $this->db->get('sub_category');
        $sub_category = array();
        if ($query->result()) {
            foreach ($query->result() as $SubCategoryVAl) {
                $sub_category[$SubCategoryVAl->id] = $SubCategoryVAl->sub_category_name;
            }
            return $sub_category;
        } else {
            return error;
        }
    }
	public function SelectshowSubCategory($product_sub_category_id = null) {
        $this->db->select('*');
        if ($product_sub_category_id != NULL) {
            $this->db->where(array('id'=>$product_sub_category_id,'sub_category_status <>'=>'4'));
        }
        $query = $this->db->get('sub_category');
        $sub_category = array();
        if ($query->result()) {
            foreach ($query->result() as $SubCategoryVAl) {
                $sub_category[$SubCategoryVAl->id] = $SubCategoryVAl->sub_category_name;
            }
            return $sub_category;
        } else {
            return error;
        }
    }
}
?>