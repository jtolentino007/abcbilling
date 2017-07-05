<?php

class Accomplishment_model extends CORE_Model{

    protected  $table="accomplishments"; //table name
    protected  $pk_id="accomplishment_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_services_accomplishment($customer_id,$service_id=null,$month_id=null,$year_id=null){
        $sql="SELECT
                ser.service_id,ser.service_name,
                IFNULL(acc.narration,'')as narration,acc.date_accomplished,
                IF(ISNULL(acc.service_id),0,1) as status FROM

                (SELECT s.service_id,s.service_name FROM services as s
                WHERE s.is_deleted=0) as ser

                LEFT JOIN

                (SELECT a.service_id,a.narration,a.month_id,a.year_id,a.date_accomplished FROM accomplishments as a
                WHERE a.customer_id=$customer_id
                ".($month_id==null?"":" AND a.month_id=".$month_id)."
                ".($year_id==null?"":" AND a.year_id=".$year_id).")as acc

                ON acc.service_id=ser.service_id

                WHERE ser.service_id>0

                ".($service_id==null?"":" AND ser.service_id=".$service_id)."
                ";

        return $this->db->query($sql)->result();
    }

    function get_accomplishment_percentage() {
        $sql="SELECT core.*,(core.accomplishment_count/core.total_service_count*100)as percentage
            FROM
            (
                SELECT 
                ci.*,
                s.service_count as total_service_count,
                IFNULL(acc.accomplishment_count,0) as accomplishment_count
                FROM
                (
                    SELECT 
                    ci.customer_id,
                    1 as tmp_id,
                    ci.company_name,
                    ci.contact_person,
                    ci.contact_no
                    FROM customers_info as ci
                    WHERE ci.customer_id IN (SELECT x.customer_id FROM user_customers as x ".($this->session->user_group_id == 1 ? '' : ' WHERE x.user_id='.$this->session->user_id).")
                )as ci

            INNER JOIN

            (
                SELECT 
                COUNT(s.service_id)as service_count,
                1 as tmp_id 
                FROM services as s
                WHERE s.is_active=1 AND s.is_deleted=0
            )as s

            ON s.tmp_id=ci.tmp_id

            LEFT JOIN

            (

              SELECT 
              ac.customer_id,
              COUNT(ac.accomplishment_id) as accomplishment_count
              FROM accomplishments as ac
              WHERE ac.month_id=MONTH(NOW()) AND ac.year_id=YEAR(NOW())

              AND ac.customer_id IN (SELECT x.customer_id FROM user_customers as x ".($this->session->user_group_id == 1 ? '' : ' WHERE x.user_id='.$this->session->user_id).")

              GROUP BY ac.customer_id

            )as acc

            ON acc.customer_id=ci.customer_id)as core";

            return $this->db->query($sql)->result();
    }
}


?>