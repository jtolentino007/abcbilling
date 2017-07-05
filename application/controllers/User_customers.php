<?php
	class User_customers extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Customers_model',
					'User_customers_model'
				)
			);
		}

		public function index()
		{

		}

		function transaction($txn=null)
		{
			switch($txn) 
			{
				case 'assign':
					$m_user_customers=$this->User_customers_model;

					$m_user_customers->user_id=$this->input->post('user_id', TRUE);
					$m_user_customers->customer_id=$this->input->post('customer_id', TRUE);
					$m_user_customers->save();

					$response['title']='Success!';
					$response['stat']='success';
					$response['msg']='Customer Successfully assigned to user';
					echo json_encode($response);
					exit;
				break;

				case 'unassign':
					$m_user_customers=$this->User_customers_model;

					$user_id=$this->input->post('user_id', TRUE);
					$customer_id=$this->input->post('customer_id', TRUE);

					$m_user_customers->user_id=$user_id;
					$m_user_customers->customer_id=$customer_id;
					$m_user_customers->delete(
						array(
							'user_id'=>$user_id,
							'customer_id'=>$customer_id
						)
					);

					$response['title']='Success!';
					$response['stat']='success';
					$response['msg']='Customer Successfully unassign to user';
					echo json_encode($response);
					exit;
				break;
			}
		}
	}
?>