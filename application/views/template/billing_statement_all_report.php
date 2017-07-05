<!DOCTYPE html>
<html>
<head>
	<title>Billing Statement Report</title>
	<style type="text/css">
		@page { size: landscape; }
		.text-center {
			text-align: center;
		}

		@media print {
			body {-webkit-print-color-adjust: exact;}
		}

		@media print {
		    footer {page-break-after: always;}
		}
	</style>

	<script>
		(function(){
			window.print();
		})();
	</script>
</head>
<body>
	<table width="100%">
		<td width="50%">
			<div style="border: 1px solid black;">
				<table width="100%" cellspacing="0">
					<td style="width: 35%; font-size: 10px;">
						<div class="text-center">
							<img src="<?php echo base_url($company_info->logo_path); ?>" style="width: 100px; height: 50px;"><br>
							<span style="font-size: 9px;"><strong>M. NG &amp; T. LOPEZ PARTNERSHIP FIRM</strong></span><br>
							<span><?php echo $company_info->company_address; ?></span><br>
							<span>TIN: <?php echo $company_info->tin_no; ?></span>
						</div>
					</td>
					<td style="width: 30%"></td>
					<td style="width: 35%; font-size: 10px;">
						<table width="100%">
							<tr>
								<td colspan="2"><h3>Billing Statement</h3></td>
							</tr>
							<tr>
								<td width="40%" align="right">SOA Number</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo $billing_info->billing_no; ?></center></td>
							</tr>
							<tr>
								<td width="40%" align="right">Billing Date</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo date('m/d/Y',strtotime($billing_info->date_billed)); ?></center></td>
							</tr>
							<tr>
								<td width="40%" align="right">Due Date</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo date('m/d/Y',strtotime($billing_info->date_due)); ?></center></td>
							</tr>
						</table>
					</td>
				</table><br>
				<table width="100%" style="font-size: 10px;" cellspacing="0">
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;"><center>Client Name</center></td>
						<td width="60%" style="border-bottom: 1px solid black;"><center><strong><?php echo $billing_info->company_name; ?></strong></center></td>
					</tr>
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;">&nbsp;</td>
						<td width="60%" style="border-bottom: 1px solid black;">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;"><center>Account Number</center></td>
						<td width="60%" style="border-bottom: 1px solid black;"><center><strong><?php echo $billing_info->contract_no; ?></strong></center></td>
					</tr>
				</table>
				<table width="100%" style="font-size: 10px;" cellspacing="0">
					<tr>
						<td width="50%">&nbsp;</td>
						<td width="50%">&nbsp;</td>
					</tr>
					<tr>
						<td width="70%" style="background: #62bb66; padding: 5px 0 5px 0;"><center><strong>Description</strong></center></td>
						<td width="30%" style="background: #62bb66; padding: 5px 0 5px 0;"><center><strong>Amount</strong></center></td>
					</tr>
					<?php 
					$bal_count = 0;
					foreach ($beginning_balances as $beginning_balance) { $bal_count++; } 
					?>
					<tr style="<?php echo ($bal_count == 0 ? 'display:none;' : '') ?>" >
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 20px;"><strong>Beginning Balance</strong></td>
						<td width="30%">&nbsp;</td>
					</tr>
					<?php
					$sum_beginning = 0;
					 foreach($beginning_balances as $beginning_balance) { ?>
						<tr>
							<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 40px;"><?php echo $beginning_balance->description; ?></td>
							<td width="30%" align="right" style=" padding-right: 10px;"><?php
							 	$sum_beginning += $beginning_balance->beginning_amount;
							 	echo number_format($beginning_balance->beginning_amount,2); 
							 ?></td>
						</tr>
					<?php } ?>
					<?php 
					$charge_count = 0;
					foreach ($current_charges as $current_charge) { $charge_count++; } 
					?>
					<tr style="<?php echo ($charge_count == 0 ? 'display:none;' : '') ?>">
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 20px;"><strong>Current Charges</strong></td>
						<td width="30%">&nbsp;</td>
					</tr>
					<?php 
					$sum_curr_charge = 0;
					foreach($current_charges as $current_charge) { ?>
					<tr>
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 40px;"><?php echo $current_charge->description; ?></td>
						<td width="30%" align="right" style=" padding-right: 10px;"><?php 
							$sum_curr_charge += $current_charge->charge_line_total;
							echo number_format($current_charge->charge_line_total,2); 
						?></td>
					</tr>
					<?php } ?>
					<!-- End Foreach Here -->
					<tr>
						<td width="70%" style="border-right: 1px solid black;border-top: 1px solid black; padding: 0 0 0 40px;"></td>
						<td width="30%" style="border-top: 1px solid black;">&nbsp;</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0">
					<tr>
						<td width="40%" style="border-top: 1px solid black;"><span style="font-size: 10px;"><strong>Received By:</strong></span></td>
						<td width="30%" style="border-top: 1px solid black;"><span style="font-size: 10px;"><strong>TOTAL</strong></span></td>
						<td width="30%" style="border-top: 1px solid black; text-align: right; padding-right: 10px; font-size: 10px;"><?php
						$total = $sum_beginning + $sum_curr_charge; 
						echo number_format($total,2); ?></td>
					</tr>
					<tr>
						<td width="40%"></td>
						<td width="30%"><span style="font-size: 10px;">Less: Cash Advance</span></td>
						<td width="30%" style="text-align: right; padding-right: 10px;">-</td>
					</tr>
					<tr>
						<td width="40%"></td>
						<td width="30%"><span style="font-size: 10px;">Less: Advance Payment</span></td>
						<td width="30%" style="text-align: right; padding-right: 10px;font-size: 10px;"><?php echo ($billing_info->advance_payment == 0 ? '-' : number_format($billing_info->advance_payment,2)); ?></td>
					</tr>
					<tr>
						<td width="40%" style="border-top: 1px solid black; font-size: 10px;"><center>Signature over printed name</center></td>
						<td width="30%" style="border-top: 1px solid black; border-bottom: 3px double black;"><span style="font-size: 10px;"><strong>Total Amount Due</strong></span></td>
						<td width="30%" style="border-top: 1px solid black;text-align: right; padding-right: 10px;font-size: 10px; border-bottom: 3px double black;"><strong><?php 
							$total_amount_due = 0;
							$total_amount_due = ($total - $billing_info->advance_payment);

							echo number_format($total_amount_due,2);
						?></strong></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><small style="font-size: 10px;"><center>Please present this document when paying. All checks should be issued in favour of <strong>Marco Fernando Ng</strong>. <br>Kindly note that as a General Professional Partnership, our fee is not subject to the 10% withholding tax.</center></small></td>
					</tr>
				</table>
			</div>
		</td>
		<td width="50%">
			<div style="border: 1px solid black;">
				<table width="100%" cellspacing="0">
					<td style="width: 35%; font-size: 10px;">
						<div class="text-center">
							<img src="<?php echo base_url($company_info->logo_path); ?>" style="width: 100px; height: 50px;"><br>
							<span style="font-size: 9px;"><strong>M. NG &amp; T. LOPEZ PARTNERSHIP FIRM</strong></span><br>
							<span><?php echo $company_info->company_address; ?></span><br>
							<span>TIN: <?php echo $company_info->tin_no; ?></span>
						</div>
					</td>
					<td style="width: 30%"></td>
					<td style="width: 35%; font-size: 10px;">
						<table width="100%">
							<tr>
								<td colspan="2"><h3>Billing Statement</h3></td>
							</tr>
							<tr>
								<td width="40%" align="right">SOA Number</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo $billing_info->billing_no; ?></center></td>
							</tr>
							<tr>
								<td width="40%" align="right">Billing Date</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo date('m/d/Y',strtotime($billing_info->date_billed)); ?></center></td>
							</tr>
							<tr>
								<td width="40%" align="right">Due Date</td>
								<td width="60%" style="border-bottom: 1px solid black;"><center><?php echo date('m/d/Y',strtotime($billing_info->date_due)); ?></center></td>
							</tr>
						</table>
					</td>
				</table><br>
				<table width="100%" style="font-size: 10px;" cellspacing="0">
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;"><center>Client Name</center></td>
						<td width="60%" style="border-bottom: 1px solid black;"><center><strong><?php echo $billing_info->company_name; ?></strong></center></td>
					</tr>
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;">&nbsp;</td>
						<td width="60%" style="border-bottom: 1px solid black;">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%" style="border-bottom: 1px solid black;"><center>Account Number</center></td>
						<td width="60%" style="border-bottom: 1px solid black;"><center><strong><?php echo $billing_info->contract_no; ?></strong></center></td>
					</tr>
				</table>
				<table width="100%" style="font-size: 10px;" cellspacing="0">
					<tr>
						<td width="50%">&nbsp;</td>
						<td width="50%">&nbsp;</td>
					</tr>
					<tr>
						<td width="70%" style="background: #62bb66; padding: 5px 0 5px 0;"><center><strong>Description</strong></center></td>
						<td width="30%" style="background: #62bb66; padding: 5px 0 5px 0;"><center><strong>Amount</strong></center></td>
					</tr>
					<?php 
					$bal_count = 0;
					foreach ($beginning_balances as $beginning_balance) { $bal_count++; } 
					?>
					<tr style="<?php echo ($bal_count == 0 ? 'display:none;' : '') ?>" >
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 20px;"><strong>Beginning Balance</strong></td>
						<td width="30%">&nbsp;</td>
					</tr>
					<?php
					$sum_beginning = 0;
					 foreach($beginning_balances as $beginning_balance) { ?>
						<tr>
							<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 40px;"><?php echo $beginning_balance->description; ?></td>
							<td width="30%" align="right" style=" padding-right: 10px;"><?php
							 	$sum_beginning += $beginning_balance->beginning_amount;
							 	echo number_format($beginning_balance->beginning_amount,2); 
							 ?></td>
						</tr>
					<?php } ?>
					<?php 
					$charge_count = 0;
					foreach ($current_charges as $current_charge) { $charge_count++; } 
					?>
					<tr style="<?php echo ($charge_count == 0 ? 'display:none;' : '') ?>">
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 20px;"><strong>Current Charges</strong></td>
						<td width="30%">&nbsp;</td>
					</tr>
					<?php 
					$sum_curr_charge = 0;
					foreach($current_charges as $current_charge) { ?>
					<tr>
						<td width="70%" style="border-right: 1px solid black; padding: 0 0 0 40px;"><?php echo $current_charge->description; ?></td>
						<td width="30%" align="right" style=" padding-right: 10px;"><?php 
							$sum_curr_charge += $current_charge->charge_line_total;
							echo number_format($current_charge->charge_line_total,2); 
						?></td>
					</tr>
					<?php } ?>
					<!-- End Foreach Here -->
					<tr>
						<td width="70%" style="border-right: 1px solid black;border-top: 1px solid black; padding: 0 0 0 40px;"></td>
						<td width="30%" style="border-top: 1px solid black;">&nbsp;</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0">
					<tr>
						<td width="40%" style="border-top: 1px solid black;"><span style="font-size: 10px;"><strong>Received By:</strong></span></td>
						<td width="30%" style="border-top: 1px solid black;"><span style="font-size: 10px;"><strong>TOTAL</strong></span></td>
						<td width="30%" style="border-top: 1px solid black; text-align: right; padding-right: 10px; font-size: 10px;"><?php
						$total = $sum_beginning + $sum_curr_charge; 
						echo number_format($total,2); ?></td>
					</tr>
					<tr>
						<td width="40%"></td>
						<td width="30%"><span style="font-size: 10px;">Less: Cash Advance</span></td>
						<td width="30%" style="text-align: right; padding-right: 10px;">-</td>
					</tr>
					<tr>
						<td width="40%"></td>
						<td width="30%"><span style="font-size: 10px;">Less: Advance Payment</span></td>
						<td width="30%" style="text-align: right; padding-right: 10px;font-size: 10px;"><?php echo ($billing_info->advance_payment == 0 ? '-' : number_format($billing_info->advance_payment,2)); ?></td>
					</tr>
					<tr>
						<td width="40%" style="border-top: 1px solid black; font-size: 10px;"><center>Signature over printed name</center></td>
						<td width="30%" style="border-top: 1px solid black; border-bottom: 3px double black;"><span style="font-size: 10px;"><strong>Total Amount Due</strong></span></td>
						<td width="30%" style="border-top: 1px solid black;text-align: right; padding-right: 10px;font-size: 10px; border-bottom: 3px double black;"><strong><?php 
							$total_amount_due = 0;
							$total_amount_due = ($total - $billing_info->advance_payment);

							echo number_format($total_amount_due,2);
						?></strong></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><small style="font-size: 10px;"><center>Please present this document when paying. All checks should be issued in favour of <strong>Marco Fernando Ng</strong>. <br>Kindly note that as a General Professional Partnership, our fee is not subject to the 10% withholding tax.</center></small></td>
					</tr>
				</table>
			</div>
		</td>
	</table>
</body>
<footer>
	
</footer>
</html>