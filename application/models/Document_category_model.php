<?php
	class Document_category_model extends CORE_Model
	{
		protected $table = "document_category";
		protected $pk_id = "document_category_id";
		function __construct()
		{
			parent::__construct();
		}

		function create_default_document_category(){
	        $sql="INSERT IGNORE INTO `document_category` (`document_category_id`, `document_category`, `document_category_desc`) 
	        	  VALUES 
	        	  (1,'General Documents',''),
	        	  (2,'Supporting Documents',''),
	        	  (3,'Previous Returns','')
	        	";


	        $this->db->query($sql);
	    }
	}

?>