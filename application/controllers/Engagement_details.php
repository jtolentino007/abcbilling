<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Engagement_details extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model('Engagement_details_model');
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Engagement Details Management';

	        $this->load->view('engagement_details_view',$data);
		}

		function transaction($txn)
		{
			switch ($txn) {
				case 'list':
					$m_engagement_details = $this->Engagement_details_model;

					$response['data'] = $m_engagement_details->get_list('is_deleted=FALSE AND is_active=TRUE');

					echo json_encode($response);
					break;

	             case 'create':

	             $m_engagement_details = $this->Engagement_details_model;
	             $m_engagement_details->engagement_detail_name = $this->input->post('engagement_detail_name');
	             $m_engagement_details->engagement_detail_description = $this->input->post('engagement_detail_description');
	             $m_engagement_details->save();

	             $engagement_detail_id = $m_engagement_details->last_insert_id();
	             	$response['title'] = 'Success!';
	                $response['stat'] = 'success';
	                $response['msg'] = 'Engagement Detail Successfully created.';
	            $response['row_added'] = $m_engagement_details->get_list('is_deleted=FALSE AND is_active=TRUE AND engagement_detail_id='.$engagement_detail_id); 
	            echo json_encode($response);
	                break;

	             case 'delete':

	             $m_engagement_details =$this->Engagement_details_model;
	             $engagement_detail_id = $this->input->post('engagement_detail_id');
	             $m_engagement_details->is_deleted=1;
	            if($m_engagement_details->modify($engagement_detail_id)){
	                    $response['title']='Success!';
	                    $response['stat']='success';
	                    $response['msg']='Engagement Detail Successfully deleted.';

	                    echo json_encode($response);
	                }

	            break;



				case 'update':

				$m_engagement_details = $this->Engagement_details_model;
				$engagement_detail_id = $this->input->post('engagement_detail_id');
				$m_engagement_details->engagement_detail_name = $this->input->post('engagement_detail_name');
	            $m_engagement_details->engagement_detail_description = $this->input->post('engagement_detail_description');
	            $m_engagement_details->modify($engagement_detail_id);

	                $response['title']='Success!';
	                $response['stat']='success';
	                $response['msg']='Engagement Detail Successfully updated.';
	                $response['row_updated']=$m_engagement_details->get_list('is_deleted=FALSE AND is_active=TRUE AND engagement_detail_id='.$engagement_detail_id);
	                echo json_encode($response);

	             break;


			}
		}
	}
?>