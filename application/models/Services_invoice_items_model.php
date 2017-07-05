<?php
	class Services_invoice_items_model extends CORE_Model
	{
		protected $table="billing_items";
		protected $pk_id="billing_item_id";	

		function __construct()
		{
			parent::__construct();
		}
	}

?>