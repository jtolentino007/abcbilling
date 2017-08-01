<?php
	class Payments_info_model extends CORE_Model
	{
		protected $table="payment_info";
		protected $pk_id="payment_id";

		function __construct()
		{
			parent::__construct();
		}




		function get_client_summary_report($month,$year){

		$sql="SELECT
			billed.*,
			paid.*,
			ci.*,
			IFNULL(IFNULL(billed.billed_amount,0) - IFNULL(paid.total_collected,0) - IFNULL(paid.advance_amount,0),'-') outstanding_balance
			FROM
			(SELECT
			bi.customer_id,
			bi.billing_id,
			bi.billing_no,
			bi.total_billing_current_amount monthly_due,
			bi.total_billing_previous_amount beginning_balance,
			IFNULL(bi.total_billing_amount,0) - IFNULL(bi.advance_payment,0) billed_amount,
			bi.date_billed billing_date,
			bbb.description,
			bi.date_due due_date,
			GROUP_CONCAT(ch.charge_name SEPARATOR ', ') AS payment_details
			FROM
			(billing_info bi
			INNER JOIN billing_items bitems ON bitems.billing_id = bi.billing_id)
			LEFT JOIN charges ch ON ch.charge_id = bitems.charge_id
            LEFT JOIN billing_beginning_balances bbb ON bbb.billing_id = bi.billing_id
			WHERE bi.is_deleted=FALSE
			AND bi.is_active=TRUE

			AND MONTH(bi.date_billed) LIKE '%$month%'
			AND YEAR(bi.date_billed) LIKE '%$year%'
			GROUP BY bi.billing_id) billed 

			LEFT JOIN

			(SELECT
			pi.payment_id,
			pi.receipt_no,
			pi.date_paid date_deposited,
			pitems.billing_id,
			IFNULL(pitems.amount_due,0) amount_due,
			IFNULL(SUM(pitems.discount),0) discount,
			IFNULL(SUM(pitems.payment_amount),0) collected,
			IFNULL(SUM(pitems.advance_amount),0) advance_amount,
			IFNULL(SUM(pitems.payment_amount),0) - IFNULL(SUM(pitems.advance_amount),0) total_collected,
			pi.remarks
			FROM
			payment_info pi
			INNER JOIN payment_items pitems ON pitems.payment_id = pi.payment_id
			WHERE pi.is_deleted=FALSE
			AND pi.is_active=TRUE

			GROUP BY pitems.billing_id) paid

			ON paid.billing_id = billed.billing_id

			LEFT JOIN (SELECT 
			ci.customer_id,
			ci.customer_code,
			ci.trade_name,
			ci.company_name

			FROM Customers_info ci) ci ON ci.customer_id=billed.customer_id

			GROUP BY billed.billing_id";

 return $this->db->query($sql)->result();

}
	}
?>