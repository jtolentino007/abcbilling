<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_files extends CORE_Controller {
    function __construct(){
        parent::__construct('');
        $this->validate_session();
        $this->load->model(
            array('Customers_model', 'Customer_file_model', 'Documents_model')
        );
    }

    public function index()
    {
       
    }

    function transaction($txn=null){
        switch ($txn) {
            case 'get-docfile-list':
                $m_customer_file=$this->Customer_file_model;
                $data['customer_files']=$m_customer_file->get_list(
                    'is_active=TRUE AND is_deleted=FALSE',
                    null,
                    array(
                        array('customers', 'customers.customer_id=customer_files.customer_id','left'),
                        array('document_types','document_types.document_type_id=customer_files.document_type_id','left')
                    )
                );
                echo json_encode($data);
                break;
        }
    }
}
?>