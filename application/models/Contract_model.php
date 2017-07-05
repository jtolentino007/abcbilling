<?php

class Contract_model extends CORE_Model{

    protected  $table="contracts"; //table name
    protected  $pk_id="contract_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_contract_fee_template($contract_id){
        $sql="SELECT c.charge_id,c.charge_name,c.charge_description,cft.amount as charge_amount FROM charges as c
                LEFT JOIN

                (

                SELECT cft.charge_id,cft.amount FROM contract_fee_template as cft
                WHERE cft.contract_id=$contract_id

                )as cft

                ON c.charge_id=cft.charge_id WHERE c.is_deleted=0";

        return $this->db->query($sql)->result();
    }


}




?>