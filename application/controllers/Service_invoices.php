<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Service_invoices extends CORE_Controller 
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
                    'Services_invoice_model',
				    'Services_invoice_items_model',
				    'Customers_model',
                    'Charges_model',
                    'Contract_fee_template_model',
                    'Beginning_balance_model',
                    'Company_model',
                    'Advance_payments_model',
                    'Billing_advances_model'
                )
			);
            
		}

		public function index()
		{
			$data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
	        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
	        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
	        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
	        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
            $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title']='Billing Statement';

            $current_year=date("Y");
            $max_year=$current_year+1;

            $years=array();
            for($min_year=$current_year-1;$min_year<=$max_year;$min_year++){
                $years[]=$min_year;
            }

            $data['years']=$years;
            $data['months']=array("January","February","March","April","May","June","July","August","September","October","November","December");
            $data['customers']=$this->Customers_model->get_list('is_deleted=0');
            $data['charges']=$this->Charges_model->get_list('is_deleted=0');
        (in_array('4-1',$this->session->user_rights)? 
        $this->load->view('service_invoice_view',$data)
        :redirect(base_url('dashboard')));
	        
        }

		function transaction($txn=null) 
		{
			switch($txn) {

                case 'finalize':
                    $m_billing=$this->Services_invoice_model;
                    $m_billing_items=$this->Services_invoice_items_model;
                    $m_beginning=$this->Beginning_balance_model;


                    $m_billing->begin();
                     //$m_billing->billing_no=$m_billing->create_billing_no();
                    $billing_no = $this->input->post('billing_no',TRUE);

                    $exist = $m_billing->get_list("billing_no='".$billing_no."'");
                    if(count($exist)>0){
                        $response['title']="Duplicate!";
                        $response['stat']="error";
                        $response['msg']="Billing number already exists. Make sure billing number is not in used.";
                        die(json_encode($response));
                    }


                    $m_billing->billing_no=$billing_no;
                        $m_billing->contract_id=$this->input->post('contract_id',TRUE);
                        $m_billing->date_billed=date('Y-m-d',strtotime($this->input->post('date_billed',TRUE)));
                        $m_billing->customer_id=$this->input->post('customer_id',TRUE);
                        $m_billing->month_id=$this->input->post('month_id',TRUE);
                        $m_billing->year_id=$this->input->post('year_id',TRUE);
                        $m_billing->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                        //$m_billing->remarks=$this->input->post('remarks',TRUE);
                        $m_billing->total_billing_current_amount=$this->get_numeric_value($this->input->post('total_billing_current_amount',TRUE));
                        $m_billing->total_billing_previous_amount=$this->get_numeric_value($this->input->post('total_billing_previous_amount',TRUE));
                        $m_billing->total_billing_amount=$this->get_numeric_value($this->input->post('total_billing_amount',TRUE));
                        $m_billing->total_amount_due=$this->get_numeric_value($this->input->post('total_amount_due',TRUE));
                        $m_billing->advance_payment=$this->get_numeric_value($this->input->post('advance_payment',TRUE));

                        $m_billing->posted_by=$this->session->user_id;
                        $m_billing->set('date_posted','NOW()');
                        $m_billing->save();

                        $billing_id=$m_billing->last_insert_id();

                        //advance payments
                        $m_billing_advance = $this->Billing_advances_model;

                        if($this->input->post('advance_payment_id',TRUE) != 0) 
                        {
                            $m_billing_advance->billing_id = $billing_id;
                            $m_billing_advance->advance_payment_id = $this->input->post('advance_payment_id',TRUE);
                            $m_billing_advance->amount = $this->get_numeric_value($this->input->post('amount',TRUE));
                            $m_billing_advance->save();
                        }

                        //billing items
                        $current_charge_id=$this->input->post('current_charge_id',TRUE);
                        $current_charge_description=$this->input->post('current_charge_description',TRUE);
                        $current_charge_amount=$this->input->post('current_charge_amount',TRUE);

                        for($i=0;$i<=count($current_charge_id)-1;$i++){
                            $m_billing_items->billing_id=$billing_id;
                            $m_billing_items->charge_id=$current_charge_id[$i];
                            $m_billing_items->description=$current_charge_description[$i];
                            $m_billing_items->charge_line_total=$this->get_numeric_value($current_charge_amount[$i]);
                            $m_billing_items->save();
                        }

                        //beginning balances
                        $beginning_balance_charge_id=$this->input->post('beginning_balance_charge_id',TRUE);
                        $beginning_balance_description=$this->input->post('beginning_balance_description',TRUE);
                        $beginning_balance_remaining=$this->input->post('beginning_balance_remaining',TRUE);

                        for($i=0;$i<=count($beginning_balance_charge_id)-1;$i++){
                            $m_beginning->billing_id=$billing_id;
                            $m_beginning->charge_id=$beginning_balance_charge_id[$i];
                            $m_beginning->description=$beginning_balance_description[$i];
                            $m_beginning->beginning_amount=$this->get_numeric_value($beginning_balance_remaining[$i]);
                            $m_beginning->save();
                        }


                        $m_billing->commit();

                        if($m_billing->status()===TRUE){

                            $contract_id=$this->input->post('contract_id',TRUE);
                            $month_id=$this->input->post('month_id',TRUE);
                            $year_id=$this->input->post('year_id',TRUE);

                            $response['title']="Success!";
                            $response['stat']="success";
                            $response['msg']="Billing successfully created.";
                            $response['contract_row']=$m_billing->get_contract_billing_status($month_id,$year_id,$contract_id);
                            echo json_encode($response);
                        }

                    break;



                case 'update_billing':
                    $m_billing=$this->Services_invoice_model;
                    $m_billing_items=$this->Services_invoice_items_model;
                    $m_beginning=$this->Beginning_balance_model;

                    $billing_id = $this->input->post('billing_id',TRUE);

                    $m_billing->begin();
                     //$m_billing->billing_no=$m_billing->create_billing_no();
                    $billing_no = $this->input->post('billing_no',TRUE);

                    $exist = $m_billing->get_count_billing_info($billing_no,$billing_id);
                    if(count($exist)>0){
                        $response['title']="Duplicate!";
                        $response['stat']="error";
                        $response['msg']="Billing number already exists. Make sure billing number is not in used.";
                        die(json_encode($response));
                    }

                        $m_billing->contract_id=$this->input->post('contract_id',TRUE);
                        $m_billing->date_billed=date('Y-m-d',strtotime($this->input->post('date_billed',TRUE)));
                        $m_billing->customer_id=$this->input->post('customer_id',TRUE);
                        $m_billing->month_id=$this->input->post('month_id',TRUE);
                        $m_billing->year_id=$this->input->post('year_id',TRUE);
                        $m_billing->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                        //$m_billing->remarks=$this->input->post('remarks',TRUE);
                        $m_billing->total_billing_current_amount=$this->get_numeric_value($this->input->post('total_billing_current_amount',TRUE));
                        $m_billing->total_billing_previous_amount=$this->get_numeric_value($this->input->post('total_billing_previous_amount',TRUE));
                        $m_billing->total_billing_amount=$this->get_numeric_value($this->input->post('total_billing_amount',TRUE));
                        $m_billing->total_amount_due=$this->get_numeric_value($this->input->post('total_amount_due',TRUE));
                        $m_billing->advance_payment=$this->get_numeric_value($this->input->post('advance_payment',TRUE));
                        $m_billing->modified_by=$this->session->user_id;
                        $m_billing->set('date_modifed','NOW()');
                        $m_billing->modify($billing_id);

                       
                        //advance payments
                        $m_billing_advance = $this->Billing_advances_model;

                        if($this->input->post('advance_payment_id',TRUE) != 0) 
                        {
                            $m_billing_advance->delete_via_fk($billing_id);
                            $m_billing_advance->billing_id = $billing_id;
                            $m_billing_advance->advance_payment_id = $this->input->post('advance_payment_id',TRUE);
                            $m_billing_advance->amount = $this->get_numeric_value($this->input->post('amount',TRUE));
                            $m_billing_advance->save();
                        }

                        //billing items
                        $current_charge_id=$this->input->post('current_charge_id',TRUE);
                        $current_charge_description=$this->input->post('current_charge_description',TRUE);
                        $current_charge_amount=$this->input->post('current_charge_amount',TRUE);
                        $m_billing_items->delete_via_fk($billing_id);
                        for($i=0;$i<=count($current_charge_id)-1;$i++){
                            $m_billing_items->billing_id=$billing_id;
                            $m_billing_items->charge_id=$current_charge_id[$i];
                            $m_billing_items->description=$current_charge_description[$i];
                            $m_billing_items->charge_line_total=$this->get_numeric_value($current_charge_amount[$i]);
                            $m_billing_items->save();
                        }
                         
                        //beginning balances
                        $beginning_balance_charge_id=$this->input->post('beginning_balance_charge_id',TRUE);
                        $beginning_balance_description=$this->input->post('beginning_balance_description',TRUE);
                        $beginning_balance_remaining=$this->input->post('beginning_balance_remaining',TRUE);
                        $m_beginning->delete_via_fk($billing_id);
                        for($i=0;$i<=count($beginning_balance_charge_id)-1;$i++){
                            $m_beginning->billing_id=$billing_id;
                            $m_beginning->charge_id=$beginning_balance_charge_id[$i];
                            $m_beginning->description=$beginning_balance_description[$i];
                            $m_beginning->beginning_amount=$this->get_numeric_value($beginning_balance_remaining[$i]);
                            $m_beginning->save();
                        }

                         $m_billing->commit();
                        if($m_billing->status()===TRUE){

                            $contract_id=$this->input->post('contract_id',TRUE);
                            $month_id=$this->input->post('month_id',TRUE);
                            $year_id=$this->input->post('year_id',TRUE);

                            $response['title']="Success!";
                            $response['stat']="success";
                            $response['msg']="Billing successfully created.";
                            // $response['contract_row']=$m_billing->get_contract_billing_status($month_id,$year_id,$contract_id);
                            echo json_encode($response);
                        }

                    break;

                case 'invoice-list':
                    $billing_month=$this->input->get('month_id',TRUE);
                    $billing_year=$this->input->get('year',TRUE);


                    $response['data']=$this->get_response_rows('billing_info.is_deleted=0 AND billing_info.is_active=1 AND billing_info.month_id='.$billing_month.' AND billing_info.year_id='.$billing_year);
                    echo json_encode($response);
                    break;
                    

                case 'count_payment_billing':
                    $billing_id=$this->input->get('billing_id',TRUE);
                    $m_billing=$this->Services_invoice_model;
                    $payment = $m_billing->get_count_payments($billing_id);
                    $response['payment_count'] = count($payment);


                    echo json_encode($response);
                    break;


                case 'contract-billing-status-list':
                    $month_id=$this->input->get('month_id',TRUE);
                    $year_id=$this->input->get('year_id',TRUE);

                    $response['data']=$this->Services_invoice_model->get_contract_billing_status($month_id,$year_id);
                    echo json_encode($response);
                    break;



                case 'edit-billing':
                    $m_billing_items=$this->Services_invoice_items_model;
                    $billing_id =$this->input->get('billing_id');

                    $billing_items=$m_billing_items->get_list(
                        array(
                            'billing_items.billing_id'=>$billing_id
                        ),
                        array(
                            'billing_items.*',
                            'c.charge_name',
                            'c.charge_description'
                        ),
                        array(
                            array('charges as c','c.charge_id=billing_items.charge_id','left')
                        )
                    );

                    $data['billing_items']=$billing_items;
                    $m_billing_info= $this->Services_invoice_model;
                    $billing_info = $m_billing_info->get_list(array('billing_info.billing_id'=>$billing_id));

                    $m_billing_advance = $this->Billing_advances_model;

                    $advance_data = $m_billing_advance->get_list(array('billing_id'=>$billing_id));
                    if(isset($advance_data[0])){
                    $response['advance_amount'] = $advance_data[0]->amount;
                    $response['advance_payment_id'] = $advance_data[0]->advance_payment_id;
                    }else{
                    $response['advance_amount'] = '';
                    $response['advance_payment_id'] = '';
                    }



                    // $response['billing_info'] = $billing_info[0];
                    $m_beginning=$this->Beginning_balance_model;


                    $response['current_charges']=$this->load->view('template/edit_current_charges_table_body',$data,TRUE);
                    $data['previous_fees']=$m_beginning->get_list(
                        array(
                            'billing_beginning_balances.billing_id'=>$billing_id
                        ),
                        array(
                            'billing_beginning_balances.*',
                            'c.charge_name',
                            'c.charge_description',
                            'info.billing_no',
                            'info.date_billed',
                            'info.date_due'


                        ),
                        array(
                            array('charges as c','c.charge_id=billing_beginning_balances.charge_id','left'),
                            array('billing_info as info','info.billing_id=billing_beginning_balances.billing_id','left')

                        )
                    );
                    $response['beginning_balances']=$this->load->view('template/edit_beginning_charges_table_body',$data,TRUE);

                    echo json_encode($response);
                    break;



                case 'billing-current-charges':
                    $m_fee=$this->Contract_fee_template_model;
                    $m_billing=$this->Services_invoice_model;

                    $contract_id=$this->input->get('contract_id',TRUE);
                    $month_id=$this->input->get('month_id',TRUE);
                    $year_id=$this->input->get('year_id',TRUE);

                    //check if this contract is already billed
                    $exist=$m_billing->get_list(
                        array(
                            'billing_info.contract_id'=>$contract_id,
                            'billing_info.month_id'=>$month_id,
                            'billing_info.year_id'=>$year_id,
                            'billing_info.is_active'=>1,
                            'billing_info.is_deleted'=>0
                        )
                    );

                    //get recurring fixed charges on the contract template
                    $data['fees']=$m_fee->get_list(
                        array(
                            'contract_id'=>$contract_id
                        ),
                        array(
                            'contract_fee_template.*',
                            'c.charge_name',
                            'c.charge_description'
                        ),
                        array(
                            array('charges as c','c.charge_id=contract_fee_template.charge_id','left')
                        )
                    );

                    $response['billing_no']=$m_billing->create_billing_no();

                    if(count($exist)<=0){ // if billing already created for this month, do not include previous balance
                        //$response['title']="Contract Already Billed!";
                        //$response['stat']="error";
                        //$response['msg']="Sorry, contract is already been billed for this month. Please cancel existing billing to process new billing on current period.";
                        //die(json_encode($response));

                        //get previous balances
                        $response['stat']="success";
                        $response['current_charges']=$this->load->view('template/current_charges_table_body',$data,TRUE);
                        $data['previous_fees']=$m_billing->get_billing_with_balances($contract_id);
                        $response['beginning_balances']=$this->load->view('template/beginning_balance_table_body',$data,TRUE);
                    }else{
                        $response['stat']="info";
                        $response['title']="Reminder!";
                        $response['msg']="Billing is already created for this month.";
                        $response['current_charges'] = '';
                        $response['beginning_balances'] = '';
                    }


                    echo json_encode($response);

                    break;

                case 'get-clients-advances':
                    $m_advance=$this->Advance_payments_model;

                    $customer_id = $this->input->get('cusid',TRUE);

                    $response['advances'] = $m_advance->get_client_advances($customer_id);

                    echo json_encode($response);
                    break;

                case 'billing_statement':
                    $m_billing=$this->Services_invoice_model;
                    $m_billing_items=$this->Services_invoice_items_model;
                    $m_company_info=$this->Company_model;
                    $m_beginning=$this->Beginning_balance_model;

                    //query list of billing id
                    // id_list = get_list_of_billing();

                    $billing_id=$this->input->get('bid', TRUE);

                    $company_info=$m_company_info->get_list();

                    $data['company_info']=$company_info[0];
                    $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);

                    $data['beginning_balances']=$m_beginning->get_list(
                        array('billing_id'=>$billing_id)
                    );

                    $data['current_charges']=$m_billing_items->get_list(
                        array('billing_id'=>$billing_id),
                        'billing_items.*,
                        charges.*',
                        array(
                            array('charges','charges.charge_id=billing_items.charge_id','left')
                        )
                    );

                    $billing_info=$m_billing->get_list(
                        $billing_id,
                        'billing_info.*,
                        customers_info.*,
                        contracts.*',
                        array(
                            array('customers_info','customers_info.customer_id=billing_info.customer_id','left'),
                            array('contracts','contracts.contract_id=billing_info.contract_id','left')
                        )
                    );

                    $data['billing_info']=$billing_info[0];

                    $this->load->view('template/billing_statement_report',$data);

                    break;
                case 'billing_statement_pdf':
                    $m_billing=$this->Services_invoice_model;
                    $m_billing_items=$this->Services_invoice_items_model;
                    $m_company_info=$this->Company_model;
                    $m_beginning=$this->Beginning_balance_model;

                    //query list of billing id
                    // id_list = get_list_of_billing();

                    $billing_id=$this->input->get('bid', TRUE);

                    $company_info=$m_company_info->get_list();

                    $data['company_info']=$company_info[0];
                    $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);

                    $data['beginning_balances']=$m_beginning->get_list(
                        array('billing_id'=>$billing_id)
                    );

                    $data['current_charges']=$m_billing_items->get_list(
                        array('billing_id'=>$billing_id),
                        'billing_items.*,
                        charges.*',
                        array(
                            array('charges','charges.charge_id=billing_items.charge_id','left')
                        )
                    );

                    $billing_info=$m_billing->get_list(
                        $billing_id,
                        'billing_info.*,
                        customers_info.*,
                        contracts.*',
                        array(
                            array('customers_info','customers_info.customer_id=billing_info.customer_id','left'),
                            array('contracts','contracts.contract_id=billing_info.contract_id','left')
                        )
                    );

                    $data['billing_info']=$billing_info[0];

                    $this->load->view('template/billing_statement_report_pdf',$data);

                    break;
            }
		}


        function get_response_rows($params=null){
            $m_service_info=$this->Services_invoice_model;

            return $m_service_info->get_list(
                $params,

                array(
                    'billing_info.*',
                    'ci.company_name'
                ),

                array(
                    array('customers_info as ci','ci.customer_id=billing_info.customer_id','left')
                )

            );
        }



	}
?>