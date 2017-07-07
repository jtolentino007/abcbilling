<?php
	defined('BASEPATH') OR exit('No direct script access allowed.');

	class Image_viewer extends CORE_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
		}

		public function index() 
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        	$data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        	$data['fname'] = $this->input->get('fname',TRUE);
			$data['img_src'] = $this->input->get('src',TRUE);
			$this->load->view('template/image_view',$data);
		}
	}
?>