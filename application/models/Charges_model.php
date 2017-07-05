<?php
	
	class Charges_model extends CORE_Model
	{
		protected $table="charges";
		protected $pk_id="charge_id";
		
		function __construct()
		{
			parent::__construct();
		}

		function create_default_charges(){
        	$sql="INSERT INTO `charges` (`charge_id`, `charge_name`, `charge_description`, `charge_amount`) VALUES
        		(1,'Retainer\'s Fee', 'Monthly Retainer\'s Fee',0),
        		(2,'Previous Balance', 'Previous Balance',0)
            ON DUPLICATE KEY UPDATE charges.charge_name=VALUES(charges.charge_name),charges.charge_description=VALUES(charges.charge_description)";

        $this->db->query($sql);
    }



	}
?>