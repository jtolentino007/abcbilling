<?php
	class Document_category_model extends CORE_Model
	{
		protected $table = "document_category";
		protected $pk_id = "document_category_id";
		function __construct()
		{
			parent::__construct();
		}
	}

?>