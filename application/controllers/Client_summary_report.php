<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Client_summary_report extends CORE_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model(
				array(
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
	        $data['title'] = 'Client payment summary Report';
	                (in_array('5-4',$this->session->user_rights)? 
        $this->load->view('client_summary_report_view',$data)
        :redirect(base_url('dashboard')));
	        
		}

		function transaction($txn) 
		{
			switch ($txn) {
				case 'list':
					$m_customers = $this->Customers_model;

					$month = $this->input->get('m',TRUE);

					$response['data'] = $m_customers->get_list(
						'customers_info.is_deleted=FALSE AND MONTH(bi.date_billed) LIKE "%'.$month.'" AND YEAR(bi.date_billed) = YEAR(NOW())',
						'DISTINCT(customers_info.customer_id) customer_id,
						customers_info.company_name,
						customers_info.trade_name',
						array(
							array('billing_info bi','bi.customer_id = customers_info.customer_id','left')
						)
					);

					echo json_encode($response);
					break;

				case 'print':
					$m_customers = $this->Customers_model;
					$m_company = $this->Company_model;

					$customer_id = $this->input->get('cusid',TRUE);
					$month = $this->input->get('m',TRUE);
					$customer_name = $this->input->get('c',TRUE);
					
					$company_info = $m_company->get_list();
					$data['company_info'] = $company_info[0];
					$data['customer_name'] = $customer_name;
					$data['responses']=$m_customers->get_customer_payment_summary($customer_id,$month);

					$this->load->view('template/clients_summary_report',$data);
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>