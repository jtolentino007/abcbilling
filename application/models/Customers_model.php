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
        $sql="SELECT 
            unpaid.*,
            IFNULL(paid.payment_amount, 0) AS payment_amount,
            ((IFNULL(unpaid.total_billing_current_amount, 0) - IFNULL(unpaid.advance_payment, 0)) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)) AS amount_due
        FROM
            (SELECT 
                DISTINCT(billing_info.billing_id) AS billing_id,
                billing_info.billing_no,
                billing_info.contract_id,
                contracts.contract_no,
                billing_items.notes,
                billing_info.date_billed,
                customers_info.company_name,
                billing_info.date_due,
                billing_info.total_billing_current_amount,
                billing_info.advance_payment
            FROM
            billing_info
            LEFT JOIN billing_items ON billing_items.billing_id = billing_info.billing_id
            LEFT JOIN contracts ON contracts.contract_id = billing_info.contract_id
            LEFT JOIN customers_info ON customers_info.customer_id = billing_info.customer_id

            WHERE
                billing_info.is_active = TRUE
                AND billing_info.is_deleted = FALSE
                AND billing_info.payment_status = 0
                AND billing_info.customer_id = $customer_id
                OR billing_info.payment_status = 1) AS unpaid
                
            LEFT JOIN

            (SELECT 
                payment_items.payment_id,
                payment_items.billing_id,
                payment_items.discount,
                SUM(payment_items.payment_amount) AS payment_amount
            FROM
            (payment_items
            INNER JOIN billing_info ON billing_info.billing_id = payment_items.billing_id)

            INNER JOIN payment_info ON payment_info.payment_id = payment_items.payment_id

                WHERE
                payment_info.is_active = TRUE
                AND payment_info.is_deleted = FALSE
                AND billing_info.payment_status = 0
                AND payment_info.customer_id = $customer_id
                OR billing_info.payment_status = 1

            GROUP BY payment_items.billing_id) AS paid ON unpaid.billing_id = paid.billing_id HAVING amount_due>0";

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



}

?>