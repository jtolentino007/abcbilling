<?php
	class Payments_info_model extends CORE_Model
	{
		protected $table="payment_info";
		protected $pk_id="payment_id";

		function __construct()
		{
			parent::__construct();
		}
	}
?>