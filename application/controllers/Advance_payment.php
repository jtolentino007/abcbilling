<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Advance_payment extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model(
				array(
					'Advance_payments_model',
					'Billing_advances_model',
					'Customers_model'
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
	        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Advance Payment Entry';

	        $data['clients'] = $this->Customers_model->get_list('is_deleted=FALSE');

	        $this->load->view('advance_payments_view',$data);
		}

		function transaction($txn) 
		{
			switch ($txn) {
				case 'list':
					$m_advances = $this->Advance_payments_model;

					$response['data'] = $m_advances->get_list(
						'advance_payments.is_active=TRUE',
						'cs.*, advance_payments.advance_payment_id,advance_payments.advance_payment_remarks, FORMAT(advance_payments.advance_payment_amount,2) AS advance_payment_amount',
						array(
							array('customers_info cs','cs.customer_id = advance_payments.customer_id','left')
						)
					);

					echo json_encode($response);
					break;

				case 'create':
					$m_advances = $this->Advance_payments_model;

					$m_advances->begin();

					$m_advances->customer_id = $this->input->post('customer_id',TRUE);
					$m_advances->advance_payment_remarks = $this->input->post('advance_payment_remarks',TRUE);
					$m_advances->advance_payment_amount = $this->get_numeric_value($this->input->post('advance_payment_amount',TRUE));
					$m_advances->save();

					$advance_payment_id = $m_advances->last_insert_id();

					$m_advances->commit();

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Advance payment successfully posted.';
                    $response['row_added']=$m_advances->get_list(
						'advance_payments.is_active=TRUE AND advance_payments.advance_payment_id='.$advance_payment_id,
						'cs.*, advance_payments.advance_payment_remarks,FORMAT(advance_payments.advance_payment_amount,2) AS advance_payment_amount',
						array(
							array('customers_info cs','cs.customer_id = advance_payments.customer_id','left')
						)
					);

					echo json_encode($response);
					break;

				case 'cancel':
					$m_billing_advances=$this->Billing_advances_model;
					$advance_payment_id=$this->input->post('advance_payment_id',TRUE);


					$billing_advance=$m_billing_advances->get_list(
						array(
							'advance_payment_id'=>$advance_payment_id)
						);
					if (count($billing_advance)>0){
					$response['title'] = 'Error!';
                    $response['stat'] = 'error';
                    $response['msg'] = 'Cannot Delete: Advanced payment is in use.';

                    echo json_encode($response);
                    exit();

					} else{
					
					$m_advances=$this->Advance_payments_model;
					$m_advances->is_active=0;
					$m_advances->set('date_cancelled','NOW()');
					$m_advances->modify(array('advance_payment_id'=>$advance_payment_id));

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Advance payment successfully cancelled.';

                    echo json_encode($response);

                    }
					break;
			}
		}
	}

?>