<?php

class checkout_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * cart logic implementation
     */

    public function ipn_update_order($order, $txn)
	{
	    $arr['status'] = 1;
        $arr['transection_id'] = $txn;
        $this->db->where("id", $order);
        $this->db->update("cause_donations", $arr);
    }

    public function ipn_log_transaction($data)
	{
        $this->db->insert('paypal_log', $data);
    }
}

?>