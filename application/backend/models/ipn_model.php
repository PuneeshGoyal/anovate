<?php
class ipn_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
  
  public function ipn_update_order($order, $txn) {

        $arr['status'] = 1;
		$arr['transection_id'] = $txn;
        $this->db->where("cause_id", $order);
        $this->db->update("cause_donations", $arr);
    }

    public function ipn_log_transaction($data) {

        $this->db->insert('paypal_log', $data);
    }
	
}
?>