<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Document_category extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model('Document_category_model');
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Document Category Management';

	        $this->load->view('document_category_view',$data);
		}

		function transaction($txn)
		{
			switch ($txn) {
				case 'list':
					$m_document_category = $this->Document_category_model;

					$response['data'] = $m_document_category->get_list('is_deleted=FALSE AND is_active=TRUE');

					echo json_encode($response);
					break;

				case 'create':
	                $m_document_category = $this->Document_category_model;

	                $m_document_category->document_category = $this->input->post('document_category', TRUE);
	                $m_document_category->document_category_desc = $this->input->post('document_category_desc', TRUE);
	                $m_document_category->save();

	                $document_category_id = $m_document_category->last_insert_id();

	                $response['title'] = 'Success!';
	                $response['stat'] = 'success';
	                $response['msg'] = 'Document Category Successfully created.';
	                $response['row_added'] = $m_document_category->get_list('is_deleted=FALSE AND is_active=TRUE AND document_category_id='.$document_category_id); echo json_encode($response);
	                break;

	            case 'delete':
	                $m_document_category=$this->Document_category_model;

	                $document_category_id=$this->input->post('document_category_id',TRUE);

	                $m_document_category->is_deleted=1;
	                if($m_document_category->modify($document_category_id)){
	                    $response['title']='Success!';
	                    $response['stat']='success';
	                    $response['msg']='Document Category Successfully deleted.';

	                    echo json_encode($response);
	                }

	                break;

	            case 'update':
	                $m_document_category=$this->Document_category_model;

	                $document_category_id=$this->input->post('document_category_id',TRUE);
	                $m_document_category->document_category=$this->input->post('document_category',TRUE);
	                $m_document_category->document_category_desc=$this->input->post('document_category_desc',TRUE);

	                $m_document_category->modify($document_category_id);

	                $response['title']='Success!';
	                $response['stat']='success';
	                $response['msg']='Document Category Successfully updated.';
	                $response['row_updated']=$m_document_category->get_list('is_deleted=FALSE AND is_active=TRUE AND document_category_id='.$document_category_id);
	                echo json_encode($response);

	                break;
			}
		}
	}
?>