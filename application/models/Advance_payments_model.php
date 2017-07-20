<?php
	
	class Advance_payments_model extends CORE_Model
	{
		protected $table = "advance_payments";
		protected $pk_id = "advance_payment_id";
		function __construct()
		{
			parent::__construct();
		}

		function get_client_advances($customer_id = null) 
		{
			$sql = "SELECT
					ap.*,
					ba.amount,
					FORMAT(IFNULL(ap.advance_payment_amount,0),2) AS advance_amount,
					(IFNULL(ap.advance_payment_amount,0) - IFNULL(ba.amount,0)) AS new_advance_amount
					FROM
					advance_payments ap
					LEFT JOIN (SELECT
					advance_payment_id,
					SUM(amount) AS amount
					FROM billing_advances
					GROUP BY advance_payment_id) ba ON ba.advance_payment_id = ap.advance_payment_id
					WHERE ap.is_active=TRUE AND ap.customer_id = $customer_id
					HAVING new_advance_amount>0";

			return $this->db->query($sql)->result();
		}
	}
?>