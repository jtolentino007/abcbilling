<?php
	class Services_invoice_model extends CORE_Model {
		protected $table="billing_info";
		protected $pk_id="billing_id";

		function __construct() {
			parent::__construct();
		}


        function get_billing_with_balances($contract_id){
            $sql="SELECT bi.*,pi.payment_amount,
                (IFNULL(bi.current_charge,0)-IFNULL(pi.payment_amount,0))as remaining_balance,

                (2)as charge_id,
                (SELECT charge_name FROM charges WHERE charge_id=2) as charge_name /**this is previous balance with id 2**/

                FROM

                (SELECT bi.billing_id,bi.billing_no,DATE_FORMAT(bi.date_billed,'%M %d, %Y')as date_billed,DATE_FORMAT(bi.date_due,'%M %d, %Y')as  date_due,
                (bi.total_billing_current_amount-bi.advance_payment)as current_charge
                FROM billing_info as bi


                WHERE bi.is_active=1 AND bi.is_deleted=0 AND bi.contract_id=$contract_id AND
                (bi.payment_status=0 OR bi.payment_status=1)) as bi


                LEFT JOIN

                (

                SELECT pi.billing_id,SUM(pi.payment_amount)as payment_amount FROM payment_items as pi
                INNER JOIN payment_info as p ON p.payment_id=pi.payment_id
                WHERE p.is_active=1 AND p.is_deleted=0 AND pi.contract_id=$contract_id
                GROUP BY pi.billing_id

                ) as pi

                ON pi.billing_id=bi.billing_id";

            return $this->db->query($sql)->result();
        }

        function get_news_feed() {
            $sql = "SELECT
                    t.*
                    FROM
                    (SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Created billing no. ',bi.`billing_no`,' for ', ci.`company_name`) as description,
                    bi.date_posted as `date`
                    FROM billing_info bi
                    INNER JOIN user_accounts ua on ua.user_id=bi.`posted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=bi.`customer_id`
                    WHERE bi.`is_active`=TRUE AND bi.`is_deleted`=FALSE

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Updated billing no. ',bi.`billing_no`,' for ', ci.`company_name`) as description,
                    bi.date_modifed as `date`
                    FROM billing_info bi
                    INNER JOIN user_accounts ua on ua.user_id=bi.`modified_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=bi.`customer_id`
                    WHERE bi.`is_active`=TRUE AND bi.`is_deleted`=FALSE

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Deleted billing no. ',bi.`billing_no`,' for ', ci.`company_name`) as description,
                    bi.date_deleted as `date`
                    FROM billing_info bi
                    INNER JOIN user_accounts ua on ua.user_id=bi.`deleted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=bi.`customer_id`

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Created contract no. ',c.`contract_no`,' for ', ci.`company_name`) as description,
                    c.date_posted as `date`
                    FROM contracts c
                    INNER JOIN user_accounts ua on ua.user_id=c.`posted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=c.`customer_id`
                    WHERE c.`is_active`=TRUE AND c.`is_deleted`=FALSE

                    UNION 

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Updated contract no. ',c.`contract_no`,' for ', ci.`company_name`) as description,
                    c.`date_modified` as `date`
                    FROM contracts c
                    INNER JOIN user_accounts ua on ua.user_id=c.`modified_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=c.`customer_id`
                    WHERE c.`is_active`=TRUE AND c.`is_deleted`=FALSE

                    UNION 

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Cancelled contract no. ',c.`contract_no`,' for ', ci.`company_name`) as description,
                    c.`date_cancelled` as `date`
                    FROM contracts c
                    INNER JOIN user_accounts ua on ua.user_id=c.`cancelled_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=c.`customer_id`

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Deleted contract no. ',c.`contract_no`,' for ', ci.`company_name`) as description,
                    c.`date_deleted` as `date`
                    FROM contracts c
                    INNER JOIN user_accounts ua on ua.user_id=c.`deleted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=c.`customer_id`

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Posted Payment on receipt no. ',pifo.`receipt_no`,' for ', ci.`company_name`) as description,
                    pifo.`date_posted` as `date`
                    FROM payment_info pifo
                    INNER JOIN user_accounts ua on ua.user_id=pifo.`posted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=pifo.`customer_id`
                    WHERE pifo.`is_active`=TRUE AND pifo.`is_deleted`=FALSE

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Updated Payment on receipt no. ',pifo.`receipt_no`,' for ', ci.`company_name`) as description,
                    pifo.`date_modified` as `date`
                    FROM payment_info pifo
                    INNER JOIN user_accounts ua on ua.user_id=pifo.`modified_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=pifo.`customer_id`
                    WHERE pifo.`is_active`=TRUE AND pifo.`is_deleted`=FALSE

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Cancelled Payment on receipt no. ',pifo.`receipt_no`,' for ', ci.`company_name`) as description,
                    pifo.`date_cancelled` as `date`
                    FROM payment_info pifo
                    INNER JOIN user_accounts ua on ua.user_id=pifo.`cancelled_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=pifo.`customer_id`

                    UNION

                    SELECT
                    ua.`photo_path`,
                    CONCAT(ua.user_fname,' ',ua.user_lname) as user,
                    CONCAT('Deleted Payment on receipt no. ',pifo.`receipt_no`,' for ', ci.`company_name`) as description,
                    pifo.`date_deleted` as `date`
                    FROM payment_info pifo
                    INNER JOIN user_accounts ua on ua.user_id=pifo.`deleted_by`
                    INNER JOIN customers_info ci on ci.`customer_id`=pifo.`customer_id`) AS t
                    ORDER BY t.`date` DESC LIMIT 10";

                return $this->db->query($sql)->result();
        }

        function get_customer_ledger($customer_id,$asOfDate) {
            $variable="SET @vRunBalance:=0.00;";
            $this->db->query($variable);

            $sql = "SELECT
                    trans2.*,
                    @vRunBalance:=(@vRunBalance+(trans2.debit_amount-trans2.credit_amount))as balance
                    FROM
                    (SELECT trans.*

                    FROM

                    (SELECT 
                        date_billed as txn_date,
                        bi.customer_id,
                        bi.billing_no,
                        '-' as receipt_no,
                        bi.remarks,
                        bi.total_billing_current_amount as debit_amount,
                        0 as credit_amount 
                    FROM billing_info as bi
                    WHERE bi.customer_id=$customer_id AND bi.date_billed <= '$asOfDate'
                    AND is_deleted=FALSE AND is_active=TRUE

                    UNION ALL

                    SELECT 
                        pi.date_paid as txn_date,
                        pi.customer_id,
                        '-' as billing_no,
                        pi.receipt_no,
                        pi.remarks,
                        0 as debit_amount,
                        pi.total_amount_paid as credit_amount
                    FROM payment_info as pi
                    WHERE 
                    pi.customer_id=$customer_id AND pi.date_paid <= '$asOfDate'
                    AND is_deleted=FALSE AND is_active=TRUE) as trans
                    ORDER BY trans.txn_date) AS trans2";

            return $this->db->query($sql)->result();
        }

        function get_collection_percentage() {
            $sql = "SELECT
            IFNULL((no_fully_paid / no_billing) * 100, 0) AS pc
            FROM
            (SELECT
            billing_id,
            posted_by,
            COUNT(billing_id) AS no_fully_paid
            FROM `billing_info`
            WHERE 
            is_active=TRUE 
            AND is_deleted=FALSE
            AND payment_status = 2
            AND date_billed 
            LIKE CONCAT('%',YEAR(CURDATE()),'-',LPAD(MONTH(CURDATE()), 2, '0'),'%')
            ".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id).") AS t1
            LEFT JOIN 
            (SELECT
            billing_id,
            posted_by,
            COUNT(billing_id) AS no_billing
            FROM
            billing_info
            WHERE
            is_active=TRUE
            AND is_deleted=FALSE
            AND date_billed 
            LIKE CONCAT('%',YEAR(CURDATE()),'-',LPAD(MONTH(CURDATE()), 2, '0'),'%')
            ".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id).") AS t2
            ON t2.billing_id=t1.billing_id";

            return $this->db->query($sql)->result();
        }

        function create_billing_no() {


            $sql="SELECT IFNULL(MAX(m.counter_id),0) as id
            FROM
            (SELECT CAST(REPLACE(billing_no,DATE_FORMAT(NOW(),'%Y-%m-'),'') AS UNSIGNED)as counter_id 
            FROM billing_info 
            WHERE billing_no LIKE CONCAT(DATE_FORMAT(NOW(),'%Y-%m-'),'%')) AS m";

            $counter=$this->db->query($sql)->result();
            $id= $counter[0] ->id;         

            settype($id, "double");

            return date('Y-m-').str_pad($id+1,4,0,STR_PAD_LEFT);
        }

        function get_contract_billing_status($month_id,$year_id,$contract_id=null){
            $sql="SELECT c.*,IF(ISNULL(bi.customer_id),0,1)as bill_status
                    FROM
                    (SELECT c.*,ci.company_name,ci.trade_name,ci.contact_no,ci.office_address FROM contracts as c
                    LEFT JOIN customers_info as ci ON ci.customer_id=c.customer_id
                    WHERE c.is_deleted=0 AND c.is_active=1
                    ".($contract_id==null ? "" : " AND c.contract_id=$contract_id")." )as c

                    LEFT JOIN
                    (SELECT bi.customer_id,bi.contract_id FROM billing_info as bi WHERE bi.is_deleted=0 AND bi.is_active=1
                    AND bi.month_id=CAST($month_id as UNSIGNED) AND bi.year_id=CAST($year_id as UNSIGNED)
                    ".($contract_id==null?"":" AND bi.contract_id=$contract_id")."

                    GROUP BY bi.contract_id

                    ) as bi ON bi.contract_id=c.contract_id";

            return $this->db->query($sql)->result();
        }



        function get_billing_no(){
            $sql="SELECT create_billing_no() as id";
            $result=$this->db->query($sql)->result();
            return $result[0]->id;
        }















	}

?>