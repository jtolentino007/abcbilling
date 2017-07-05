<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Payments extends CORE_Controller
	{		
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Customers_model',
					'Payments_item_model',
					'Payments_info_model',
					'Payment_method_model',
					'Services_invoice_items_model',
					'Services_invoice_model'
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
	        $data['title'] = 'Collection Entry';	

	        $data['methods']=$this->Payment_method_model->get_list('is_deleted=FALSE');
	        $data['customers']=$this->Customers_model->get_list('is_deleted=FALSE');

	        $this->load->view('payments_view',$data);
		}

		function transactions($txn=null,$filter_value=null)
		{
			switch ($txn) {
				case 'get-customer-billings':
					$m_clients=$this->Customers_model;

					$response['data']=$m_clients->get_customer_receivable_list($filter_value);

					echo json_encode($response);
					break;

				case 'list':
					$m_payment_info=$this->Payments_info_model;

					$response['data']=$m_payment_info->get_list(
						'payment_info.is_deleted=FALSE',
						'payment_info.is_active AS active_status,payment_info.*, customers_info.*, user_accounts.*, payment_methods.*',
						array(
							array('customers_info','customers_info.customer_id=payment_info.customer_id','left'),
							array('payment_methods','payment_methods.payment_method_id=payment_info.payment_method_id','left'),
							array('user_accounts','user_accounts.user_id=payment_info.posted_by','left')
						)
					);

					echo json_encode($response);
					break;

				case 'cancel':
					$m_payment_info=$this->Payments_info_model;

					$payment_id=$this->input->post('payment_id',TRUE);
					$m_payment_info->is_active=FALSE;
					$m_payment_info->set('date_cancelled','NOW()');
					$m_payment_info->modify($payment_id);

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Collection Entry successfully cancelled.';
                    $response['row_updated']=$m_payment_info->get_list(
						array('payment_info.is_deleted=FALSE','payment_info.payment_id'=>$payment_id),
						'payment_info.is_active as active_status, payment_info.*, customers_info.*, user_accounts.*, payment_methods.*',
						array(
							array('customers_info','customers_info.customer_id=payment_info.customer_id','left'),
							array('payment_methods','payment_methods.payment_method_id=payment_info.payment_method_id','left'),
							array('user_accounts','user_accounts.user_id=payment_info.posted_by','left')
						)
					);

                    echo json_encode($response);
				break;

				case 'create':
					$m_payment_info=$this->Payments_info_model;

					$m_payment_info->begin();

					$m_payment_info->receipt_no=$this->input->post('receipt_no',TRUE);
					$m_payment_info->date_paid=date('Y-m-d',strtotime($this->input->post('date_paid',TRUE)));
					$m_payment_info->payment_method_id=$this->input->post('payment_method_id',TRUE);
					$m_payment_info->customer_id=$this->input->post('customer_id',TRUE);
					$m_payment_info->total_amount_paid=$this->input->post('total_amount_paid',TRUE);
					$m_payment_info->remarks=$this->input->post('remarks',TRUE);
					$m_payment_info->posted_by=$this->session->user_id;
					$m_payment_info->set('date_posted','NOW()');
					$m_payment_info->check_date=date('Y-m-d',strtotime($this->input->post('check_date',TRUE)));
					$m_payment_info->check_no=$this->input->post('check_no',TRUE);
					$m_payment_info->save();

					$payment_id=$m_payment_info->last_insert_id();

					$m_payment_items=$this->Payments_item_model;

					$billing_id=$this->input->post('billing_id',TRUE);
					$contract_id=$this->input->post('contract_id',TRUE);
					$item_remarks=$this->input->post('item_remarks',TRUE);
					$amount_due=$this->input->post('amount_due',TRUE);
					$discount=$this->input->post('discount',TRUE);
					$payment_amount=$this->input->post('payment_amount',TRUE);

					for($i=0;$i<count($billing_id);$i++) {
						$m_payment_items->payment_id=$payment_id;
						$m_payment_items->billing_id=$billing_id[$i];
						$m_payment_items->contract_id=$contract_id[$i];
						$m_payment_items->item_remarks=$item_remarks[$i];
						$m_payment_items->amount_due=$this->get_numeric_value($amount_due[$i]);
						$m_payment_items->discount=$this->get_numeric_value($discount[$i]);
						$m_payment_items->payment_amount=$this->get_numeric_value($payment_amount[$i]);
						$m_payment_items->save();
					}

					$m_payment_info->commit();

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Collection Entry successfully posted.';
                    $response['row_added']=$m_payment_info->get_list(
						array('payment_info.is_deleted=FALSE','payment_info.payment_id'=>$payment_id),
						'payment_info.is_active as active_status, payment_info.*, customers_info.*, user_accounts.*, payment_methods.*',
						array(
							array('customers_info','customers_info.customer_id=payment_info.customer_id','left'),
							array('payment_methods','payment_methods.payment_method_id=payment_info.payment_method_id','left'),
							array('user_accounts','user_accounts.user_id=payment_info.posted_by','left')
						)
					);

                    echo json_encode($response);

					break;
					
			}
		}
	}
?>