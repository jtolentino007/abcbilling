<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Customers_model');
        $this->load->model('Customer_photos_model');
        $this->load->model('Documents_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Services_model');
        $this->load->model('Customers_services_model');
        $this->load->model('Customer_file_model');
        $this->load->model('User_customers_model');
        $this->load->model('Customer_document_type_model');
        $this->load->model('Contract_model');
    }

    public function index()
    {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
        $data['title']='Customer Management';

        $data['documents'] = $this->Documents_model->get_list('is_active=TRUE AND is_deleted=FALSE');
        $data['taxes'] = $this->Tax_types_model->get_list('is_deleted=FALSE');
        $data['services'] = $this->Services_model->get_list('is_active=TRUE AND is_deleted=FALSE');

        $this->load->view('clients_view',$data);
    }

    function test($A,$K){
        $pos_from_left=$K-1;
        $second_half=array_slice($A,$pos_from_left);
        $first_half=array_slice($A,0,$pos_from_left);

        print_r(array_merge($second_half,$first_half));
    }

    function transaction($txn=null,$filter_value=null){
        switch($txn){
            //****************************************************************************************************************
            case 'list':
                if ($this->session->user_group_id == 1) {
                  $m_customers=$this->Customers_model;
                  $response['data']=$m_customers->get_list('is_deleted=FALSE');
                } else {
                  $m_user_customers=$this->User_customers_model;
                  $response['data']=$m_user_customers->get_list(
                      array(
                        'user_id'=>$filter_value,
                        'customers_info.is_deleted=FALSE'
                      ),
                      'customers_info.*',
                      array(
                        array('customers_info','customers_info.customer_id=user_customers.customer_id','left')
                      )
                  );
                }
                echo json_encode($response);
                break;
            //****************************************************************************************************************
            case 'get-client-documents':
                $m_customers=$this->Customers_model;
                //$customer_id=$this->input->get('customerId',TRUE);
                $response['data']=$m_customers->get_list(
                    array(
                        'customers.is_deleted=FALSE'
                    ),
                    'customers_info.*,
                    customers_files.*,
                    document_types.*',
                    array(
                        array('customers_files','customers_files.customer_id=customers_info.customer_id','left'),
                        array('document_types','document_types.document_type_id=customers_files.document_type_id','left')
                    )
                );
                echo json_encode($response);
                break;
            //****************************************************************************************************************
            case 'create':
                $m_customers=$this->Customers_model;
                //$m_photos=$this->Customer_photos_model;
                $m_customers->begin();

                $m_customers->customer_code=$this->input->post('customer_code',TRUE);
                $m_customers->company_name=$this->input->post('company_name',TRUE);
                $m_customers->trade_name=$this->input->post('trade_name',TRUE);
                $m_customers->office_address=$this->input->post('office_address',TRUE);
                $m_customers->billing_address=$this->input->post('billing_address',TRUE);
                $m_customers->contact_person=$this->input->post('contact_person',TRUE);
                $m_customers->designation=$this->input->post('designation',TRUE);
                $m_customers->contact_no=$this->input->post('contact_no',TRUE);
                $m_customers->email_address=$this->input->post('email_address',TRUE);
                $m_customers->tin_no=$this->input->post('tin_no',TRUE);
                $m_customers->tax_type_id=$this->input->post('tax_type_id',TRUE);
                $m_customers->photo_path=$this->input->post('photo_path',TRUE);
                $m_customers->save();

                $customer_id=$m_customers->last_insert_id();//get last insert id

                $m_user_customers=$this->User_customers_model;
                $m_user_customers->user_id=$this->session->user_id;
                $m_user_customers->customer_id=$customer_id;
                $m_user_customers->save();

                $m_customers->commit();

                //$m_photos->customer_id=$customer_id;
                //$m_photos->photo_path=$this->input->post('photo_path',TRUE);
                //$m_photos->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Customer information successfully created.';
                $response['row_added']=$this->row_response($customer_id);
                echo json_encode($response);

                break;
            //****************************************************************************************************************
            case 'delete':
                $m_customers=$this->Customers_model;
                //$m_photos=$this->Customer_photos_model;
                $customer_id=$this->input->post('customer_id',TRUE);

                //$m_customers->set('date_deleted','NOW()');
                //$m_customers->deleted_by_user=$this->session->user_id;
                $m_customers->is_deleted=1;
                if($m_customers->modify($customer_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Customer information successfully deleted.';
                    $response['row_updated']=$m_customers->get_list('is_deleted=FALSE AND customer_id='.$customer_id);
                    echo json_encode($response);
                }



                break;
            //****************************************************************************************************************
            case 'update':
                $m_customers=$this->Customers_model;
                $customer_id=$this->input->post('customer_id',TRUE);
                //$m_photos=$this->Customer_photos_model;

                $m_customers->begin();

                $m_customers->customer_code=$this->input->post('customer_code',TRUE);
                $m_customers->company_name=$this->input->post('company_name',TRUE);
                $m_customers->trade_name=$this->input->post('trade_name',TRUE);
                $m_customers->office_address=$this->input->post('office_address',TRUE);
                $m_customers->billing_address=$this->input->post('billing_address',TRUE);
                $m_customers->contact_person=$this->input->post('contact_person',TRUE);
                $m_customers->designation=$this->input->post('designation',TRUE);
                $m_customers->contact_no=$this->input->post('contact_no',TRUE);
                $m_customers->email_address=$this->input->post('email_address',TRUE);
                $m_customers->tin_no=$this->input->post('tin_no',TRUE);
                $m_customers->tax_type_id=$this->input->post('tax_type_id',TRUE);
                $m_customers->photo_path=$this->input->post('photo_path',TRUE);
                //$m_customers->set('date_modified','NOW()');
                //$m_customers->modified_by_user=$this->session->user_id;
                $m_customers->modify($customer_id);



                $m_customers->commit();


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Customer information successfully updated.';
                $response['row_updated']=$this->row_response($customer_id);
                echo json_encode($response);

                break;

            case 'expand-view':
                $customer_id=$filter_value;
                $m_customers=$this->Customers_model;
                $m_contract=$this->Contract_model;
                //$m_documents=$this->Documents_model;
                $m_customer_files=$this->Customer_file_model;
                $m_customer_services=$this->Customers_services_model;

                $data['customer_id']=$customer_id;
                $data['customer_info']=$m_customers->get_list(
                    $customer_id,
                    array(
                        'customers_info.*',
                        'tt.tax_type'
                    ),
                    array(
                        array( 'tax_types as tt','tt.tax_type_id=customers_info.tax_type_id','left')
                    )
                );

                $data['customer_contracts']=$m_contract->get_list(
                    array(
                        'is_deleted=FALSE AND is_active=TRUE',
                        'contracts.customer_id'=>$customer_id
                    ),
                    'DISTINCT(contracts.contract_no) AS contract_no,
                    contracts.date_started,
                    IFNULL(charges.charge_amount,0) as charge_amount,
                    contracts.is_active',
                    array(
                        array('customers_info','customers_info.customer_id=contracts.customer_id','left'),
                        array('contract_fee_template','contract_fee_template.contract_id=contracts.contract_id','left'),
                        array('charges','charges.charge_id=contract_fee_template.charge_id','left')
                    )
                );

                $this->load->view('template/client_expand_view',$data);
                break;

            case 'services':
                $m_customer_services=$this->Customers_services_model;

                $id_filter=$this->input->get('cid',TRUE);

                $response['data']=$m_customer_services->get_list(
                    array('customers_services.customer_id'=>$id_filter),
                    array(
                        'customers_info.*',
                        'customers_services.*',
                        'services.*'
                    ),
                    array(
                        array('customers_info','customers_info.customer_id=customers_services.customer_id','left'),
                        array('services','services.service_id=customers_services.service_id','left')
                    )
                );

                echo json_encode($response);
                break;

            case 'documents':
                $m_customer_files=$this->Customer_file_model;

                $id_filter=$this->input->get('cid',TRUE);

                $response['data']=$m_customer_files->get_list(
                    array('customers_files.customer_id'=>$id_filter),
                    'customers_files.*, document_types.*',
                    array(
                        array('document_types','document_types.document_type_id=customers_files.document_type_id','left')
                    )
                );

                echo json_encode($response);
                break;

            //****************************************************************************************************************
            case 'upload': //upload customer image
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/customer/';


                foreach($_FILES as $file) {

                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    $orig_file_name=$file['name'];

                    if(!in_array(strtolower($extension), $allowed)){
                        $response['title']='Invalid!';
                        $response['stat']='error';
                        $response['msg']='Image is invalid. Please select a valid photo!';
                        die(json_encode($response));
                    }

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        $response['path']=$file_path;
                        echo json_encode($response);
                    }

                }


                break;

            case 'receivables':
                    $customer_id=$this->input->get('id',TRUE);
                    $m_customers=$this->Customers_model;

                    $data['receivables']=$m_customers->get_customer_receivable_list($customer_id);
                    $structured_content=$this->load->view('template/customer_receivable_list',$data,TRUE);
                    echo $structured_content;
                break;

        }
    }

    function row_response($filter_value){
        $m_customers=$this->Customers_model;
        return $m_customers->get_list(
            $filter_value
        );
    }
}
