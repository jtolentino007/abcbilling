<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Business_style extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model('Business_style_model');
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Business Style Management';

	        $this->load->view('business_style_view',$data);
		}

		function transaction($txn)
		{
			switch ($txn) {
				case 'list':
					$m_business_style = $this->Business_style_model;

					$response['data'] = $m_business_style->get_list('is_deleted=FALSE AND is_active=TRUE');

					echo json_encode($response);
					break;

	             case 'create':

	             $m_business_style = $this->Business_style_model;
	             $m_business_style->business_style_name = $this->input->post('business_style_name');
	             $m_business_style->business_style_description = $this->input->post('business_style_description');
	             $m_business_style->save();

	             $business_style_id = $m_business_style->last_insert_id();
	             	$response['title'] = 'Success!';
	                $response['stat'] = 'success';
	                $response['msg'] = 'Business Style Successfully created.';
	            $response['row_added'] = $m_business_style->get_list('is_deleted=FALSE AND is_active=TRUE AND business_style_id='.$business_style_id); 
	            echo json_encode($response);
	                break;

	             case 'delete':

	             $m_business_style =$this->Business_style_model;
	             $business_style_id = $this->input->post('business_style_id');
	             $m_business_style->is_deleted=1;
	            if($m_business_style->modify($business_style_id)){
	                    $response['title']='Success!';
	                    $response['stat']='success';
	                    $response['msg']='Business Style Successfully deleted.';

	                    echo json_encode($response);
	                }

	            break;



				case 'update':

				$m_business_style = $this->Business_style_model;
				$business_style_id = $this->input->post('business_style_id');
				$m_business_style->business_style_name = $this->input->post('business_style_name');
	            $m_business_style->business_style_description = $this->input->post('business_style_description');
	            $m_business_style->modify($business_style_id);

	                $response['title']='Success!';
	                $response['stat']='success';
	                $response['msg']='Business Style Successfully updated.';
	                $response['row_updated']=$m_business_style->get_list('is_deleted=FALSE AND is_active=TRUE AND business_style_id='.$business_style_id);
	                echo json_encode($response);

	             break;


			}
		}
	}
?>