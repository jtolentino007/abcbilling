<?php
class Customers_model extends CORE_Model {
    protected $table="customers_info"; //table name
    protected $pk_id="customer_id"; //primary key id
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_customer_payment_summary($customer_id=null,$month=null)
    {
        $sql = "SELECT
        billed.*,
        paid.*,
        IFNULL(IFNULL(billed.billed_amount,0) - IFNULL(paid.total_collected,0) - IFNULL(paid.advance_amount,0),'-') outstanding_balance
        FROM
        (SELECT
        bi.billing_id,
        bi.billing_no,
        bi.customer_id,
        ci.trade_name,
        ci.company_name,
        bi.total_billing_current_amount monthly_due,
        bi.total_billing_previous_amount beginning_balance,
        IFNULL(bi.total_billing_amount,0) - IFNULL(bi.advance_payment,0) billed_amount,
        bi.date_billed billing_date,
        bi.date_due due_date,
        GROUP_CONCAT(ch.charge_name SEPARATOR ', ') AS payment_details
        FROM
        (billing_info bi
        INNER JOIN billing_items bitems ON bitems.billing_id = bi.billing_id)
        LEFT JOIN charges ch ON ch.charge_id = bitems.charge_id
        LEFT JOIN customers_info ci ON ci.customer_id = bi.customer_id
        WHERE bi.is_deleted=FALSE
        AND bi.is_active=TRUE
        ". ($customer_id == null ? "" : "AND bi.customer_id = $customer_id") ."
        AND MONTH(bi.date_billed) LIKE '%$month%'
        AND YEAR(bi.date_billed) = YEAR(NOW())
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
        ". ($customer_id == null ? "" : "AND pi.customer_id = $customer_id")."
        GROUP BY pitems.billing_id) paid
        ON paid.billing_id = billed.billing_id
        GROUP BY billed.billing_id";
        
        return $this->db->query($sql)->result();
    }
    function get_customer_receivable_list($customer_id) 
    {
        $sql = "SELECT
                *
                FROM
                (SELECT
                unpaid.*,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(paid.discount,0) AS discount,
                IFNULL(paid.payment_amount,0) AS payment_amount,
                FORMAT((IFNULL(unpaid.charge_line_total,0) - IFNULL(paid.advance_amount,0) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)),2) AS amount_due
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
                IFNULL(ba.amount,0) AS advance_payment,
                ci.customer_id,
                ci.company_name
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
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
                SUM(pi.payment_amount) AS payment_amount,
                SUM(pi.advance_amount) AS advance_amount
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
                HAVING amount_due>0) AS unpaid_paid
                LEFT JOIN
                (SELECT
                unpaid.billing_id,
                unpaid.advance_payment_id,
                IFNULL(unpaid.amount,0) AS amount,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(unpaid.amount,0) - IFNULL(paid.advance_amount,0) AS new_advance
                FROM
                (SELECT
                bi.*,
                IFNULL(ba.amount,0) AS amount,
                ba.advance_payment_id
                FROM billing_info bi
                LEFT JOIN billing_advances ba ON ba.billing_id = bi.billing_id
                WHERE customer_id = $customer_id
                AND bi.is_deleted=FALSE
                AND bi.is_active=TRUE) AS unpaid
                LEFT JOIN
                (SELECT 
                pi.*,
                pitems.billing_id,
                IFNULL(SUM(pitems.advance_amount),0) AS advance_amount
                FROM
                payment_info pi
                LEFT JOIN payment_items pitems ON pitems.payment_id = pi.payment_id
                WHERE customer_id = $customer_id
                AND is_active=TRUE
                GROUP BY pitems.billing_id) AS paid
                ON paid.billing_id = unpaid.billing_id) AS advances
                ON advances.billing_id = unpaid_paid.billing_id
                LEFT JOIN
                (SELECT * FROM advance_payments) as remarks
                ON remarks.advance_payment_id = advances.advance_payment_id
                ";
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
     function get_collection_notice($customer_id)
    {
    $sql="SELECT
                *
                FROM
                (SELECT
                unpaid.*,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(paid.discount,0) AS discount,
                IFNULL(paid.payment_amount,0) AS payment_amount,
                FORMAT((IFNULL(unpaid.charge_line_total,0) - IFNULL(paid.advance_amount,0) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)),2) AS amount_due
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
                IFNULL(ba.amount,0) AS advance_payment,
                ci.customer_id,
                ci.company_name
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
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
                SUM(pi.payment_amount) AS payment_amount,
                SUM(pi.advance_amount) AS advance_amount
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
                HAVING amount_due>0) AS unpaid_paid
                LEFT JOIN
                (SELECT
                unpaid.billing_id,
                IFNULL(unpaid.amount,0) AS amount,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(unpaid.amount,0) - IFNULL(paid.advance_amount,0) AS new_advance
                FROM
                (SELECT
                bi.*,
                IFNULL(ba.amount,0) AS amount
                FROM billing_info bi
                LEFT JOIN billing_advances ba ON ba.billing_id = bi.billing_id
                WHERE customer_id = $customer_id
                AND bi.is_deleted=FALSE
                AND bi.is_active=TRUE) AS unpaid
                LEFT JOIN
                (SELECT 
                pi.*,
                pitems.billing_id,
                IFNULL(SUM(pitems.advance_amount),0) AS advance_amount
                FROM
                payment_info pi
                LEFT JOIN payment_items pitems ON pitems.payment_id = pi.payment_id
                WHERE customer_id = $customer_id
                AND is_active=TRUE
                GROUP BY pitems.billing_id) AS paid
                ON paid.billing_id = unpaid.billing_id) AS advances
                LEFT JOIN
                (SELECT             binfo.billing_id,
                SUM(bi.charge_line_total) AS gross
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
                LEFT JOIN contracts ctr on ctr.contract_id = binfo.contract_id
                LEFT JOIN charges chr ON chr.charge_id = bi.charge_id
                LEFT JOIN customers_info ci ON ci.customer_id = binfo.customer_id
                WHERE 
                binfo.is_active = TRUE
                AND binfo.is_deleted=FALSE
                AND binfo.customer_id = $customer_id
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1
                group by billing_id
                ) AS gross
                ON gross.billing_id = advances.billing_id
                ON advances.billing_id = unpaid_paid.billing_id";
                return $this->db->query($sql)->result();
    }
     function get_collection_notice_batch($customer_id)
    {
    $sql="  SELECT
                DISTINCT unpaid_paid.billing_no,
                gross.gross,
                advances.billing_id,
                unpaid_paid.date_due,
                unpaid_paid.date_billed,
                unpaid_paid.company_name
                FROM
                (SELECT
                unpaid.*,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(paid.discount,0) AS discount,
                IFNULL(paid.payment_amount,0) AS payment_amount,
                FORMAT((IFNULL(unpaid.charge_line_total,0) - IFNULL(paid.advance_amount,0) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)),2) AS amount_due
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
                IFNULL(ba.amount,0) AS advance_payment,
                ci.customer_id,
                ci.company_name
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
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
                SUM(pi.payment_amount) AS payment_amount,
                SUM(pi.advance_amount) AS advance_amount
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
                HAVING amount_due>0) AS unpaid_paid
                LEFT JOIN
                (SELECT
                unpaid.billing_id,
                IFNULL(unpaid.amount,0) AS amount,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(unpaid.amount,0) - IFNULL(paid.advance_amount,0) AS new_advance
                FROM
                (SELECT
                bi.*,
                IFNULL(ba.amount,0) AS amount
                FROM billing_info bi
                LEFT JOIN billing_advances ba ON ba.billing_id = bi.billing_id
                WHERE customer_id = $customer_id
                AND bi.is_deleted=FALSE
                AND bi.is_active=TRUE) AS unpaid
                LEFT JOIN
                (SELECT 
                pi.*,
                pitems.billing_id,
                IFNULL(SUM(pitems.advance_amount),0) AS advance_amount
                FROM
                payment_info pi
                LEFT JOIN payment_items pitems ON pitems.payment_id = pi.payment_id
                WHERE customer_id = $customer_id
                AND is_active=TRUE
                GROUP BY pitems.billing_id) AS paid
                ON paid.billing_id = unpaid.billing_id) AS advances
                LEFT JOIN
                (SELECT             binfo.billing_id,
                SUM(bi.charge_line_total) AS gross
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
                LEFT JOIN contracts ctr on ctr.contract_id = binfo.contract_id
                LEFT JOIN charges chr ON chr.charge_id = bi.charge_id
                LEFT JOIN customers_info ci ON ci.customer_id = binfo.customer_id
                WHERE 
                binfo.is_active = TRUE
                AND binfo.is_deleted=FALSE
                AND binfo.customer_id = $customer_id
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1
                group by billing_id
                ) AS gross
                ON gross.billing_id = advances.billing_id
                ON advances.billing_id = unpaid_paid.billing_id";
                return $this->db->query($sql)->result();
    }
     function get_collection_notice_list()
    {
    $sql=" SELECT
            DISTINCT unpaid_paid.company_name,
            unpaid_paid.customer_id
                FROM
                (SELECT
                unpaid.*,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(paid.discount,0) AS discount,
                IFNULL(paid.payment_amount,0) AS payment_amount,
                FORMAT((IFNULL(unpaid.charge_line_total,0) - IFNULL(paid.advance_amount,0) - IFNULL(paid.payment_amount,0) - IFNULL(paid.discount,0)),2) AS amount_due
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
                IFNULL(ba.amount,0) AS advance_payment,
                ci.customer_id,
                ci.company_name
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
                LEFT JOIN contracts ctr on ctr.contract_id = binfo.contract_id
                LEFT JOIN charges chr ON chr.charge_id = bi.charge_id
                LEFT JOIN customers_info ci ON ci.customer_id = binfo.customer_id
                WHERE 
                binfo.is_active = TRUE
                AND binfo.is_deleted=FALSE
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1) AS unpaid
                LEFT JOIN
                (SELECT
                pi.payment_id,
                pi.billing_id,
                pi.charge_id,
                SUM(pi.discount) AS discount,
                SUM(pi.payment_amount) AS payment_amount,
                SUM(pi.advance_amount) AS advance_amount
                FROM
                (payment_items pi
                INNER JOIN billing_info binfo ON binfo.billing_id = pi.billing_id)
                INNER JOIN payment_info pinfo ON pinfo.payment_id = pi.payment_id
                WHERE pinfo.is_active = TRUE
                AND pinfo.is_deleted = FALSE
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1
                GROUP BY pi.billing_id,pi.charge_id) AS paid
                ON paid.billing_id = unpaid.billing_id AND paid.charge_id = unpaid.charge_id
                HAVING amount_due>0) AS unpaid_paid
                LEFT JOIN
                (SELECT
                unpaid.billing_id,
                IFNULL(unpaid.amount,0) AS amount,
                IFNULL(paid.advance_amount,0) AS advance_amount,
                IFNULL(unpaid.amount,0) - IFNULL(paid.advance_amount,0) AS new_advance
                FROM
                (SELECT
                bi.*,
                IFNULL(ba.amount,0) AS amount
                FROM billing_info bi
                LEFT JOIN billing_advances ba ON ba.billing_id = bi.billing_id
                AND bi.is_deleted=FALSE
                AND bi.is_active=TRUE) AS unpaid
                LEFT JOIN
                (SELECT 
                pi.*,
                pitems.billing_id,
                IFNULL(SUM(pitems.advance_amount),0) AS advance_amount
                FROM
                payment_info pi
                LEFT JOIN payment_items pitems ON pitems.payment_id = pi.payment_id
                AND is_active=TRUE
                GROUP BY pitems.billing_id) AS paid
                ON paid.billing_id = unpaid.billing_id) AS advances
                LEFT JOIN
                (SELECT             binfo.billing_id,
                SUM(bi.charge_line_total) AS gross
                FROM billing_items bi
                INNER JOIN billing_info binfo ON binfo.billing_id = bi.billing_id
                LEFT JOIN billing_advances ba ON ba.billing_id = binfo.billing_id   
                LEFT JOIN contracts ctr on ctr.contract_id = binfo.contract_id
                LEFT JOIN charges chr ON chr.charge_id = bi.charge_id
                LEFT JOIN customers_info ci ON ci.customer_id = binfo.customer_id
                WHERE 
                binfo.is_active = TRUE
                AND binfo.is_deleted=FALSE
                AND binfo.payment_status = 0
                OR binfo.payment_status = 1
                group by billing_id
                ) AS gross
                ON gross.billing_id = advances.billing_id
                ON advances.billing_id = unpaid_paid.billing_id
                WHERE unpaid_paid.date_due <= CURDATE() - INTERVAL 30 DAY";
            return $this->db->query($sql)->result();
    }
}
?>