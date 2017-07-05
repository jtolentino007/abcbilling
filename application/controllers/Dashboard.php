<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(
            array(
                'Accomplishment_model',
                'Customers_model',
                'User_customers_model',
                'Users_model',
                'Payments_info_model',
                'Services_invoice_model',
                'Services_model'
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

        $user_count=$this->Users_model->get_list(
            'is_deleted=FALSE AND is_active=TRUE',
            'COUNT(*) AS user_count'
        );

        $customer_count=$this->User_customers_model->get_list(
            array('user_id'=>$this->session->user_id),
            'COUNT(*) AS customer_count'
        );

        $january=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-01'),'%') 
            AND is_deleted=FALSE AND is_active=TRUE
            ".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $february=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-02'),'%') 
            AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $march=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-03'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $april=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-04'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $may=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-05'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $june=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-06'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $july=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-07'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $august=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-08'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $september=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-09'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $october=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-10'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $november=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-11'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,
            'date_paid'
        );

        $december=$this->Payments_info_model->get_list(
            "date_paid LIKE CONCAT('%',CONCAT(YEAR(CURDATE()),'-12'),'%') AND is_deleted=FALSE AND is_active=TRUE".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id),
            'IFNULL(SUM(total_amount_paid),0) as total_amount',
            null,
            null,   
            'date_paid'
        );

        $collection_percentage = $this->Services_invoice_model->get_collection_percentage();

        $collection_amount=$this->Payments_info_model->get_list(
            'is_deleted=FALSE AND is_active=TRUE AND date_paid LIKE CONCAT("%",YEAR(NOW()),"-",DATE_FORMAT(NOW(),"%m"),"%")'.($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_id),
            'SUM(total_amount_paid) AS total_billing_amount'
        );

        $service_count=$this->Services_model->get_list(
            'is_active=TRUE AND is_deleted=FALSE',
            'COUNT(*) AS total_service_count'
        );

        $unpaid_billing=$this->Services_invoice_model->get_list(
            'is_deleted=FALSE AND is_active=TRUE AND month_id=MONTH(NOW()) AND year_id=YEAR(NOW()) AND payment_status!=2'.($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_id),
            'COUNT(billing_id) AS unpaid_count'
        );

        $data['collections']=array(
            (count($january) == 0 ? 0 : $january[0]->total_amount),
            (count($february) == 0 ? 0 : $february[0]->total_amount),
            (count($march) == 0 ? 0 : $march[0]->total_amount),
            (count($april) == 0 ? 0 : $april[0]->total_amount),
            (count($may) == 0 ? 0 : $may[0]->total_amount),
            (count($june) == 0 ? 0 : $june[0]->total_amount),
            (count($july) == 0 ? 0 : $july[0]->total_amount),
            (count($august) == 0 ? 0 : $august[0]->total_amount),
            (count($september) == 0 ? 0 : $september[0]->total_amount),
            (count($october) == 0 ? 0 : $october[0]->total_amount),
            (count($november) == 0 ? 0 : $november[0]->total_amount),
            (count($december) == 0 ? 0 : $december[0]->total_amount)
        );

        $data['newsfeeds']=$this->Services_invoice_model->get_news_feed();

        $data['users_count']=$user_count[0];

        $data['service_count']=$service_count[0];

        $data['collection_amount']=$collection_amount[0];

        $data['unpaid_billing']=$unpaid_billing[0];

        $data['collection_percentage']=$collection_percentage[0];

        $data['customers_count']=$customer_count[0];

        $this->load->view('dashboard_view',$data);
    }
}
