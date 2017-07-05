<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Documents_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['_chat_template'] = $this->load->view('template/elements/chat_view','',TRUE);
        $data['title'] = 'Document Type Management';

        $this->load->view('documents_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_documents = $this->Documents_model;
                
                $response['data'] = $m_documents->get_documents_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_documents = $this->Documents_model;

                $m_documents->document_type = $this->input->post('document_type', TRUE);
                $m_documents->document_type_description = $this->input->post('document_type_description', TRUE);
                $m_documents->save();

                $document_type_id = $m_documents->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Document Type Information Successfully Created.';
                $response['row_added'] = $m_documents->get_documents_list($document_type_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_documents=$this->Documents_model;

                $document_type_id=$this->input->post('document_type_id',TRUE);

                $m_documents->is_deleted=1;
                if($m_documents->modify($document_type_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Document Type Information Successfully Deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_documents=$this->Documents_model;

                $document_type_id=$this->input->post('document_type_id',TRUE);
                $m_documents->document_type=$this->input->post('document_type',TRUE);
                $m_documents->document_type_description=$this->input->post('document_type_description',TRUE);

                $m_documents->modify($document_type_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Document Type Information Successfully Updated.';
                $response['row_updated']=$m_documents->get_documents_list($document_type_id);
                echo json_encode($response);

                break;
        }
    }
}
