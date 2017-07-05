<?php
	class Categories_model extends CORE_Model
	{
		protected $table="categories";
		protected $pk_id="category_id";
		
		function __construct()
		{
			parent::__construct('');
		}
	}
?>