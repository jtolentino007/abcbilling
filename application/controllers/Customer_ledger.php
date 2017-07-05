<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Customer_ledger extends CORE_Controller
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

	        $this->load->view('customer_ledger_view',$data);
		}

		function transaction($txn=null) {
			switch ($txn) {
				case 'list':
					$m_services_inv=$this->Services_invoice_model;

					$customer_id=$this->input->get('cusid',TRUE);
					$asOfDate=date('Y-m-d',strtotime($this->input->get('asOfDate',TRUE)));

					$response['data']=$m_services_inv->get_customer_ledger($customer_id,$asOfDate);

					echo json_encode($response);
				break;

				case 'report':
					$m_services_inv=$this->Services_invoice_model;
					$m_company=$this->Company_model;

					$customer_id=$this->input->get('cusid',TRUE);
					$asOfDate=date('Y-m-d',strtotime($this->input->get('asOfDate',TRUE)));

					$data['customer_ledgers']=$m_services_inv->get_customer_ledger($customer_id,$asOfDate);
					$customer_name=$this->Customers_model->get_list('is_deleted=FALSE AND customer_id='.$customer_id);
					$data['customer_name']=$customer_name[0];
					$company_info=$m_company->get_list();
					$data['company_info']=$company_info[0];

					$this->load->view('template/customer_ledger_report',$data);
				break;
			}
		} 
	}
?>