<?php

class Customers_model extends CORE_Model {
    protected $table="customers_info"; //table name
    protected $pk_id="customer_id"; //primary key id

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_customer_receivable_list($customer_id) 
    {
        $sql = "SELECT
                unpaid.*,
                unpaid.charge_line_total,
                IFNULL(paid.payment_amount,0) AS payment_amount,
                (IFNULL(unpaid.charge_line_total,0) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)) AS amount_due
                FROM
                (SELECT 
                binfo.billing_id,
                binfo.billing_no,
                binfo.contract_id,
                binfo.date_billed,
                binfo.date_due,
                ctr.contract_no,
                chr.charge_name,
                bi.charge_id,
                bi.notes,
                bi.charge_line_total,
                ci.customer_id,
                ci.company_name
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN contracts ctr on ctr.contract_id = binfo.contract_id
                LEFT JOIN charges chr ON chr.charge_id = bi.charge_id
                LEFT JOIN customers_info ci ON ci.customer_id = binfo.customer_id
                WHERE 
                binfo.is_active = TRUE
                AND binfo.is_deleted=FALSE
                AND binfo.customer_id = $customer_id
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1) AS unpaid

                LEFT JOIN

                (SELECT
                pi.payment_id,
                pi.billing_id,
                pi.charge_id,
                SUM(pi.discount) AS discount,
                SUM(pi.payment_amount) AS payment_amount
                FROM
                (payment_items pi
                INNER JOIN billing_info binfo ON binfo.billing_id = pi.billing_id)
                INNER JOIN payment_info pinfo ON pinfo.payment_id = pi.payment_id
                WHERE pinfo.is_active = TRUE
                AND pinfo.is_deleted = FALSE
                AND pinfo.customer_id = $customer_id
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1
                GROUP BY pi.billing_id,pi.charge_id) AS paid

                ON paid.billing_id = unpaid.billing_id AND paid.charge_id = unpaid.charge_id

                HAVING amount_due>0";

        return $this->db->query($sql)->result();
    }

    function get_customer_services($customer_id){
        $sql="SELECT s.service_id,s.service_name,s.service_description,IF(ISNULL(n.service_id),0,1)as service_stat FROM services as s

        LEFT JOIN

        (
        SELECT cs.service_id FROM customers_services as cs WHERE cs.customer_id=$customer_id
        ) as n

        ON s.service_id=n.service_id";

        return $this->db->query($sql)->result();
    }

    function get_last_customer_code()
    {
        return $this->db->select('customer_code')->order_by('customer_code','desc')->limit(1)->get('customers_info')->row('customer_code');
    }



}

?>