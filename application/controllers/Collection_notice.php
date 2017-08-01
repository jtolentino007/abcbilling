<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Collection_notice extends CORE_Controller
  {
    function __construct()
    {
      parent::__construct('');
      $this->validate_session();
      $this->load->model(
        array(
          'Services_invoice_model',
          'Customers_model',
          'Company_model'
        )
      );
    }

    public function index()
    {
      $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
          $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
          $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
          $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
          $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
          $data['_chat_template'] = $this->load->view('template/elements/chat_view','',TRUE);
          $data['title'] = 'Customer Ledger Report';
          $data['clients']=$this->Customers_model->get_list('is_deleted=FALSE');
          $this->load->view('collection_notice_view',$data);
    }

    function transaction($txn=null) {
      switch ($txn) 
      {
        case 'list':
          $m_customers=$this->Customers_model;
          $response['data']=$m_customers->get_collection_notice_list();
          echo json_encode($response);
        break;
      }
    } 

  }
?>