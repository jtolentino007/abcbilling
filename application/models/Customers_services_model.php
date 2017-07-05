<?php
	class Customers_services_model extends CORE_model
	{
		protected $table="customers_services";
		protected $pk_id="customer_service_id";
		protected $fk_id="contract_id";

		function __construct()
		{
			parent::__construct();
		}


        function get_customer_service_status($contract_id,$service_id=null){
            $sql="SELECT s.*,IF(ISNULL(cs.service_id),0,1) as stat
                FROM services as s

                LEFT JOIN

                (
                SELECT cs.service_id,cs.contract_id FROM customers_services as cs
                WHERE cs.`contract_id`=$contract_id
                )as cs ON cs.service_id=s.service_id


                WHERE s.is_deleted=0 AND s.is_active=1".($service_id==null?"":" AND s.service_id=$service_id");

            return $this->db->query($sql)->result();
        }




	}
?>