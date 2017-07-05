<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Accomplishments extends CORE_Controller
	{
		
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Services_model',
                    'Customers_model',
                    'Accomplishment_model'
				)
			);
		}

		public function index(){
			$data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
	        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
	        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
	        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
	        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
            $data['_chat_template']=$this->load->view('template/elements/chat_view','',TRUE);
	        $data['title']='Process Accomplishments';

            $current_year=date("Y");
            $max_year=$current_year+1;

            $years=array();
            for($min_year=$current_year-1;$min_year<=$max_year;$min_year++){
                $years[]=$min_year;
            }


            $data['years']=$years;
            $data['months']=array("January","February","March","April","May","June","July","August","September","October","November","December");
            $data['customers']=$this->Customers_model->get_list('is_deleted=0');

	        $this->load->view('accomplishments_view',$data);
		}

        function transaction($txn=null){
            switch($txn){
                case 'accomplishment-percentage':
                    $response['data']=$this->Accomplishment_model->get_accomplishment_percentage();    
                    echo json_encode($response);
                break;
                
                case 'list':
                    $m_customers=$this->Customers_model;
                    $response['data']=$m_customers->get_list('is_deleted=0');
                    echo (
                        json_encode($response)
                    );

                    break;
                case 'expand-view':
                    $m_customers=$this->Customers_model;
                    $customer_id=$this->input->get('id');
                    $month=$this->input->get('month');
                    $year=$this->input->get('year');

                    $data['customer_id']=$customer_id;
                    $data['services']=$this->Accomplishment_model->get_services_accomplishment($customer_id,null,$month,$year);
                    $data['customer_info']=$m_customers->get_list($customer_id);


                    $this->load->view('template/accomplishment_expand_view',$data);
                    break;

                case 'mark-completed':
                    $m_accomplish=$this->Accomplishment_model;
                    $customer_id=$this->input->post('customer_id',TRUE);
                    $service_id=$this->input->post('service_id',TRUE);
                    $month_id=$this->input->post('month_id',TRUE);
                    $year_id=$this->input->post('year_id',TRUE);

                    $m_accomplish->begin();

                    $m_accomplish->delete(
                        array(
                            'service_id'=>$service_id,
                            'customer_id'=>$customer_id,
                            'month_id'=>$month_id,
                            'year_id'=>$year_id
                        )
                    );

                    $m_accomplish->customer_id=$customer_id;
                    $m_accomplish->service_id=$service_id;
                    $m_accomplish->month_id=$month_id;
                    $m_accomplish->year_id=$year_id;
                    $m_accomplish->narration=$this->input->post('narration',TRUE);
                    $m_accomplish->accomplished_by=$this->session->user_id;
                    $m_accomplish->set('date_accomplished','NOW()');
                    $m_accomplish->save();


                    $m_accomplish->commit();


                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Successfully mark as completed.';
                    $response['row_updated']=$this->Accomplishment_model->get_services_accomplishment($customer_id,$service_id,$month_id,$year_id);

                    echo json_encode($response);

                    break;

            }
        }















	}

?>



