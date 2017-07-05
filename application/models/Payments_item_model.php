<?php
	class Payments_item_model extends CORE_Model
	{
		protected $table="payment_items";
		protected $pk_id="payment_item_id";

		function __construct()
		{
			parent::__construct();
		}
	}
?>