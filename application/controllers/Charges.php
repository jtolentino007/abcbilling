<?php
	defined('BASEPATH') OR exit('No direct script access allowed.');
	class Charges extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model(
				array(
					'Charges_model'
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
	        $data['title'] = 'Charges Management';

	        $this->load->view('charges_view',$data);
		}

		function transaction($txn=null)
		{
			switch ($txn) {
				case 'list':
						$m_charges=$this->Charges_model;

						$response['data']=$m_charges->get_list('is_deleted=FALSE');

						echo json_encode($response);
					break;

				case 'create':
					$m_charges=$this->Charges_model;

					$m_charges->charge_name=$this->input->post('charge_name',TRUE);
					$m_charges->charge_description=$this->input->post('charge_description',TRUE);
					$m_charges->charge_amount=$this->input->post('charge_amount',TRUE);
					$m_charges->save();

					$charges_id = $m_charges->last_insert_id();

	                $response['title'] = 'Success!';
	                $response['stat'] = 'success';
	                $response['msg'] = 'Charge Successfully Created.';
	                $response['row_added'] = $m_charges->get_list($charges_id);
	                echo json_encode($response);
					break;

				case 'delete':
	                $m_charges=$this->Charges_model;

	                $charges_id=$this->input->post('charge_id',TRUE);

	                $m_charges->is_deleted=1;
	                if($m_charges->modify($charges_id)){
	                    $response['title']='Success!';
	                    $response['stat']='success';
	                    $response['msg']='Charge Successfully Deleted.';

	                    echo json_encode($response);
	                }

	                break;

	            case 'update':
	                $m_charges=$this->Charges_model;

	                $charges_id=$this->input->post('charge_id',TRUE);
	                $m_charges->charge_name=$this->input->post('charge_name',TRUE);
					$m_charges->charge_description=$this->input->post('charge_description',TRUE);
					$m_charges->charge_amount=$this->input->post('charge_amount',TRUE);

	                $m_charges->modify($charges_id);

	                $response['title']='Success!';
	                $response['stat']='success';
	                $response['msg']='Charge Successfully Updated.';
	                $response['row_updated']=$m_charges->get_list($charges_id);
	                echo json_encode($response);

	                break;
			}
		}
	}
?>