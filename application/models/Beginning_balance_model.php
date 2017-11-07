<?php

class Beginning_balance_model extends CORE_Model
{
    protected $table="billing_beginning_balances";
    protected $pk_id="begin_balance_id";
    protected $fk_id="billing_id";

    function __construct()
    {
        parent::__construct();
    }





}
?>