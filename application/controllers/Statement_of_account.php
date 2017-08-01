<?php
	defined('BASEPATH') OR die('No direct script access allowed');

	class Statement_of_account extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model('Payments_info_model');
			$this->load->model('Company_model');
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['_chat_template'] = $this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Statement of Account';

	        $this->load->view('statement_of_account_view',$data);
		}

		function transaction($txn) 
		{
			switch ($txn) {
				case 'list':
					$m_payments = $this->Payments_info_model;
					$month=$this->input->get('month',TRUE);
					$year=$this->input->get('year',TRUE);

					$response['data']=$m_payments->get_client_summary_report($month,$year);

					echo json_encode($response);
				break;

				case 'report':
					$m_payments = $this->Payments_info_model;
					$m_company = $this->Company_model;

					$sDate=date('Y-m-d',strtotime($this->input->get('sDate',TRUE)));
					$eDate=date('Y-m-d',strtotime($this->input->get('eDate',TRUE)));

					$company_info=$m_company->get_list();

					$data['company_info']=$company_info[0];

					$data['collections']=$m_payments->get_list(
						'payment_info.is_deleted=FALSE AND payment_info.is_active=TRUE AND date_paid BETWEEN "'.$sDate.'" AND "'.$eDate.'"',
						'payment_info.*, ci.*',
						array(
							array('customers_info as ci','ci.customer_id=payment_info.customer_id','left')
						)
					);

					$this->load->view('template/collection_report',$data);
				break;
			}
		}
	}
?>