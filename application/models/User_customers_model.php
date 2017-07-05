<?php
	class User_customers_model extends CORE_Model
	{
		protected $table="user_customers";
		protected $pk_id="user_customers_id";

		function __construct()
		{
			parent::__construct();
		}

		function get_affiliated_clients($user_id) {
			
			$sql="SELECT 
				ci.*,
				ci.`customer_id`,
				ucg.user_id,
				IF(ISNULL(ucg.customer_id),0,1) as is_assign

				FROM customers_info as ci

				LEFT JOIN

				(SELECT 
					uc.customer_id,
				    uc.`user_id` 
				FROM 
				user_customers AS uc WHERE uc.user_id=$user_id) 
				AS ucg

				ON ci.customer_id=ucg.customer_id
				WHERE ci.is_deleted=FALSE";
        	
        	return $this->db->query($sql)->result();

		}		
	}
?>