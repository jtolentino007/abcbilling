<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model('Users_model');
        $this->load->model('User_groups_model');
        $this->load->model('Rights_link_model');
        $this->load->model('User_group_right_model');
        $this->load->model('Payment_method_model');
        $this->load->model('Company_model');
        $this->load->model('Charges_model');    
        $this->load->model(
            array(
                'Customers_model',
                'User_customers_model',
                'Users_model',
                'Account_title_model',
                'Account_type_model',
                'Account_class_model'
            )
        );
    }


    public function index()
    {
        $this->create_required_default_data();

        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);

        $company=$this->Company_model->get_list();
        $data['company_info']=$company[0];

        //WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)
        if($this->session->userdata('logged_in') == 1) {
            // $dashboardData['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
            // $dashboardData['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
            // $dashboardData['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
            // $dashboardData['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
            // $dashboardData['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);

            // $user_count=$this->Users_model->get_list(
            //     'is_deleted=FALSE AND is_active=TRUE',
            //     'COUNT(*) AS user_count'
            // );

            // $customer_count=$this->User_customers_model->get_list(
            //     array('user_id'=>$this->session->user_id),
            //     'COUNT(*) AS customer_count'
            // );

            // $dashboardData['users_count']=$user_count[0];

            // $dashboardData['customers_count']=$customer_count[0];

            // $this->load->view('dashboard_view',$dashboardData);
            redirect(base_url('Dashboard'));
        } else {
            $this->load->view('login_view',$data); 
        }
        //END WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)
    }


    function create_required_default_data(){

        //create default user : the admin
        $m_users=$this->Users_model;
        $m_users->create_default_user();

        //create default user group : the Super User
        $m_user_groups=$this->User_groups_model;
        $m_user_groups->create_default_user_group();

        $m_links=$this->Rights_link_model;
        $m_links->create_default_link_list();

        $m_methods=$this->Payment_method_model;
        $m_methods->create_default_payment_method();

        $m_charges=$this->Charges_model;
        $m_charges->create_default_charges();

        $m_account_titles=$this->Account_title_model;
        $m_account_titles->create_default_account_title();
        
        $m_account_types=$this->Account_type_model;
        $m_account_types->create_default_account_types();

        $m_account_class=$this->Account_class_model;
        $m_account_class->create_default_account_classes();
    }


    function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'validate' :
                    $uname=$this->input->post('uname');
                    $pword=$this->input->post('pword');

                    $users=$this->Users_model;
                    $result=$users->authenticate_user($uname,$pword);

                    if($result->num_rows()>0){ //valid username and pword
                        $m_rights=$this->User_group_right_model;
                        $rights=$m_rights->get_list(
                            array(
                                'user_group_rights.user_group_id'=>$result->row()->user_group_id
                            ),
                            'user_group_rights.link_code'
                        );

                        $user_rights=array();
                        $parent_links=array();
                        foreach($rights as $right){
                            $main=explode('-',$right->link_code);
                            $user_rights[]=$right->link_code;
                            $parent_links[]=$main[0];
                        }


                        //set session data here and response data
                        $this->session->set_userdata(
                            array(
                                'user_id'=>$result->row()->user_id,
                                'user_group_id'=>$result->row()->user_group_id,
                                'user_fullname'=>$result->row()->user_fullname,
                                'user_email'=>$result->row()->user_email,
                                'user_photo'=>$result->row()->photo_path,
                                'user_rights'=>$user_rights,
                                'parent_rights'=>$parent_links,
                                'logged_in'=>1
                            )
                        );

                        $response['title']='Success';
                        $response['stat']='success';
                        $response['msg']='User successfully authenticated.';

                        echo json_encode($response);

                    }else{ //not valid

                        $response['stat']='error';
                        $response['msg']='Invalid username or password.';
                        echo json_encode($response);

                    }

                    break;
                //****************************************************************************
                case 'logout' :
                    $this->end_session();
                //****************************************************************************


                break;

                default:


        }




    }




}
