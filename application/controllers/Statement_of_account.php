<?php
	defined('BASEPATH') OR die('No direct script access allowed');

	class Statement_of_account extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->library('excel');
			$this->load->model('Payments_info_model');
			$this->load->model('Company_model');
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['_chat_template'] = $this->load->view('template/elements/chat_view','',TRUE);
	        $data['title'] = 'Statement of Account';

	        $this->load->view('statement_of_account_view',$data);
		}

		function MergeCenterCell($cellrange) 
		{
			$excel=$this->excel;
			return $excel->getActiveSheet()->mergeCells($cellrange)
										   ->getStyle($cellrange)
										   ->getAlignment()
										   ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
										   ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		}

		function SetColumnSize($column,$width)
		{
			$excel=$this->excel;

			return $excel->getActiveSheet()->getColumnDimension($column)->setAutoSize(FALSE)->setWidth($width);
		}

		function transaction($txn) 
		{
			switch ($txn) {
				case 'list':
					$m_payments = $this->Payments_info_model;
					$month=$this->input->get('month',TRUE);
					$year=$this->input->get('year',TRUE);

					$response['data']=$m_payments->get_client_summary_report($month,$year);

					echo json_encode($response);
				break;

				case 'export':
	                $m_company=$this->Company_model;
	                $m_payments = $this->Payments_info_model;

	                $company_info=$m_company->get_list();
	                $month=$this->input->get('m',TRUE);
	                $year=$this->input->get('y',TRUE);

					$dateObj = DateTime::createFromFormat('!m', $month);
					$monthName = $dateObj->format('F'); // March

	                $excel=$this->excel;

	                $excel->setActiveSheetIndex(0);

	                $this->SetColumnSize('B',25);
	                $this->SetColumnSize('C',50);
	                $this->SetColumnSize('D',50);
	                $this->SetColumnSize('E',50);
	                $this->SetColumnSize('F',25);
	                $this->SetColumnSize('G',25);
	                $this->SetColumnSize('H',25);
	                $this->SetColumnSize('I',25);
	                $this->SetColumnSize('J',25);
	                $this->SetColumnSize('K',25);
	                $this->SetColumnSize('L',25);
	                $this->SetColumnSize('M',25);
	                $this->SetColumnSize('N',25);
	                $this->SetColumnSize('O',25);
	                $this->SetColumnSize('P',25);
	                $this->SetColumnSize('Q',25);

	                //name the worksheet
	                $excel->getActiveSheet()->setTitle('Statement of Account Monitoring');

	               //company info
	                $excel->getActiveSheet()->setCellValue('A1',$company_info[0]->company_name)
	                                        ->setCellValue('A2','STATEMENT OF ACCOUNT MONITORING')
	                                        ->setCellValue('A3',strtoupper($monthName).' '.$year);

	                //$excel->getActiveSheet()->getProtection()->setSheet(TRUE);
	                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);

	                $excel->getActiveSheet()->setCellValue('A6','SOA#')
	                                        ->setCellValue('B6','ACCOUNT CODE')
	                                        ->setCellValue('C6','TRADE NAME')
	                                        ->setCellValue('D6','CLIENT NAME')
	                                        ->setCellValue('E6','DESCRIPTION')
	                                        ->setCellValue('F6','BEGINNING BALANCE')
	                                        ->setCellValue('F7','(SOA #)')
	                                        ->setCellValue('G7','AMOUNT')
	                                        ->setCellValue('H6','CURRENT CHARGES')
	                                        ->setCellValue('I6','AMOUNT DUE')
	                                        ->setCellValue('J6','PAYMENT')
	                                        ->setCellValue('J7','AMOUNT PAID')
	                                        ->setCellValue('K7','DISCOUNT')
	                                        ->setCellValue('L7','CASH ADVANCE')
	                                        ->setCellValue('M7','DATE')
	                                        ->setCellValue('N6','ENDING BALANCE')
	                                        ->setCellValue('O6','BILLING DATE')
	                                        ->setCellValue('P6','DUE DATE')
	                                        ->setCellValue('Q6','REMARKS');

	                $this->MergeCenterCell('A1:Q1');
	                $this->MergeCenterCell('A2:Q2');
	                $this->MergeCenterCell('A3:Q3');
	                $this->MergeCenterCell('A6:A7');
	                $this->MergeCenterCell('B6:B7');
	                $this->MergeCenterCell('C6:C7');
	                $this->MergeCenterCell('D6:D7');
	                $this->MergeCenterCell('E6:E7');
	                $this->MergeCenterCell('F6:G6');
	                $this->MergeCenterCell('J6:M6');
	                $this->MergeCenterCell('N6:N7');
	                $this->MergeCenterCell('O6:O7');
	                $this->MergeCenterCell('P6:P7');
	                $this->MergeCenterCell('Q6:Q7');
	                $this->MergeCenterCell('H6:H7');
	                $this->MergeCenterCell('I6:I7');

	                $client_summaries = $m_payments->get_client_summary_report($month,$year);

	                $BStyle  = array(
					  'borders' => array(
					    'allborders' => array(
					      'style' => PHPExcel_Style_Border::BORDER_THIN
					    )
					  )
					);

					$excel->getActiveSheet()->getStyle('A6:Q6')->applyFromArray($BStyle);
					$excel->getActiveSheet()->getStyle('A7:Q7')->applyFromArray($BStyle);

	                $excel->getActiveSheet()->getStyle('A6:Q6')->getFont()->setBold(TRUE);
	                $excel->getActiveSheet()->getStyle('A7:Q7')->getFont()->setBold(TRUE);
	                $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);

	                $excel->getActiveSheet()->getStyle('A6:Q6')
										   ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

					 $excel->getActiveSheet()->getStyle('A7:Q7')
										   ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

					$i = 7;
	                foreach($client_summaries as $client_summary)
	                {
	                	$i++;
	                	$excel->getActiveSheet()->setCellValue('A'.$i, $client_summary->billing_no )
	                							->setCellValue('B'.$i, $client_summary->customer_code )
	                							->setCellValue('C'.$i, $client_summary->trade_name )
	                							->setCellValue('D'.$i, $client_summary->company_name )
	                							->setCellValue('E'.$i, $client_summary->payment_details )
	                							->setCellValue('F'.$i, $client_summary->description )
	                							->setCellValue('G'.$i, number_format($client_summary->beginning_balance,2) )
	                							->setCellValue('H'.$i, number_format($client_summary->billed_amount,2) )
	                							->setCellValue('I'.$i, number_format($client_summary->monthly_due,2) )
	                							->setCellValue('J'.$i, number_format($client_summary->collected,2) )
	                							->setCellValue('K'.$i, number_format($client_summary->discount,2) )
	                							->setCellValue('L'.$i, number_format($client_summary->advance_amount,2) )
	                							->setCellValue('M'.$i, $client_summary->date_deposited )
	                							->setCellValue('N'.$i, number_format($client_summary->outstanding_balance,2) )
	                							->setCellValue('O'.$i, $client_summary->billing_date )
	                							->setCellValue('P'.$i, $client_summary->due_date )
	                							->setCellValue('Q'.$i, $client_summary->remarks );
	                }

	                // Redirect output to a client’s web browser (Excel2007)
	                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	                header('Content-Disposition: attachment;filename="Statement of Account Monitoring '.strtoupper($monthName).'.xlsx"');
	                header('Cache-Control: max-age=0');
	                // If you're serving to IE 9, then the following may be needed
	                header('Cache-Control: max-age=1');

	                // If you're serving to IE over SSL, then the following may be needed
	                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	                header ('Pragma: public'); // HTTP/1.0

	                $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	                $objWriter->save('php://output');
				break;
			}
		}
	}
?>