<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_types extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(
            array('Services_model',
            'Categories_model')
        );
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
        $data['title'] = 'Service Type Management';

        $data['categories']=$this->Categories_model->get_list('is_deleted=FALSE');

        $this->load->view('service_type_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_services = $this->Services_model;
                $response['data'] = $m_services->get_list('is_deleted=false and is_active=true');
                echo json_encode($response);
                break;

            case 'create':
                $m_services = $this->Services_model;

                $m_services->service_name = $this->input->post('service_name', TRUE);
                $m_services->service_code = $this->input->post('service_code', TRUE);
                $m_services->service_description = $this->input->post('service_description', TRUE);
                $m_services->category_id = $this->input->post('category_id',TRUE);
                $m_services->filing_date = $this->input->post('filing_date',TRUE);
                $m_services->filing_month = $this->input->post('filing_month',TRUE);
                $m_services->save();

                $service_type_id = $m_services->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Service Type Information Successfully Created.';
                $response['row_added'] = $m_services->get_list($service_type_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_services=$this->Services_model;

                $service_type_id=$this->input->post('service_id',TRUE);

                $m_services->is_deleted=1;
                if($m_services->modify($service_type_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Service Type Information Successfully Deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_services=$this->Services_model;

                $service_type_id=$this->input->post('service_id',TRUE);
                $m_services->service_name = $this->input->post('service_name', TRUE);
                $m_services->service_code = $this->input->post('service_code', TRUE);
                $m_services->service_description = $this->input->post('service_description', TRUE);
                $m_services->category_id = $this->input->post('category_id',TRUE);
                $m_services->filing_date = $this->input->post('filing_date',TRUE);
                $m_services->filing_month = $this->input->post('filing_month',TRUE);

                $m_services->modify($service_type_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Service Type Information Successfully Updated.';
                $response['row_updated']=$m_services->get_list($service_type_id);
                echo json_encode($response);

                break;
        }
    }
}
