<?php
	class Business_style_model extends CORE_Model
	{
		protected $table = "business_style";
		protected $pk_id = "business_style_id";
		function __construct()
		{
			parent::__construct();
		}

		function create_default_business_styles() 
		{
			$sql="INSERT IGNORE INTO `business_style` (`business_style_id`, `business_style_name`, `business_style_description`) 
              VALUES 
              (1,'Service', ''),
              (2,'Merchandising', ''),
              (3,'Manufacturing', '')
            ";


          	$this->db->query($sql);
		}
	}

?>