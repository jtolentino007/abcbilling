<?php

class Customers_item_model extends CORE_Model {
    protected $table="customer_items"; //table name
    protected $pk_id="item_id"; //primary key id
    protected $fk_id="customer_id";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
}