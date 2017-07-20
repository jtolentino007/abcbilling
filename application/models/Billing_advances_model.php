<?php

	class Billing_advances_model extends CORE_Model
	{
		protected $table = "billing_advances";
		protected $pk_id = "billing_advances_id";
		
		function __construct()
		{
			parent::__construct();
		}
	}
?>