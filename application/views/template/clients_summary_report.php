<!DOCTYPE html>
<html>
<head>
	<title>Client Payment Summary Report</title>

	<style type="text/css">
		body {
			font-family: 'Arial',sans-serif;
			-webkit-print-color-adjust:exact;
		}
		@page { margin: 1%; }
	</style>

	<script>
		window.print();
	</script>
</head>
<body>
	<table width="60%" class="no-border" >
        <tr class="no-border">
            <td width="10%" class="no-border" style="font-family: Cambria, Georgia, serif!important;"><img src="<?php echo base_url().$company_info->logo_path; ?>" style="height: 80px; width: 120px; text-align: left;"></td>
            <td width="50%" class="align-left no-border" style="font-family: Cambria, Georgia, serif!important;">
                <p  style="font-family: Cambria, Georgia, serif!important;padding:0; margin:0;"> <strong><?php echo $company_info->company_name; ?><br>
                AB&amp;C Partnership Firm<br>
                <?php echo $company_info->company_address; ?></strong></p>
            </td>
        </tr>
    </table><hr>
    <table width="100%" border="1" cellspacing="0">
    	<tr>
    		<td colspan="11" align="center" style="background: #00bcd4;">
    			<strong style="text-transform: uppercase;"><?php echo $customer_name; ?></strong>
    		</td>
    	</tr>
    	<tr>
    		<th width="7%">SOA Number</th>
    		<th width="7%">Beginning Balance</th>
    		<th width="7%">Monthly Due</th>
    		<th width="7%">Billed Amount</th>
    		<th width="7%">Date Deposited</th>
    		<th width="7%">Collected</th>
    		<th width="7%">Outstanding Balance</th>
    		<th width="15%">Description</th>
    		<th width="12%">Payment Details</th>
    		<th width="7%">Billing Date</th>
    		<th width="7%">Due Date</th>    	
    	</tr>
    	<tbody>
    		<?php foreach($responses as $response) { ?>
	    		<tr>
	    			<td align="center"><?php echo $response->billing_no; ?></td>
	    			<td align="right"><?php echo number_format($response->beginning_balance,2); ?></td>
	    			<td align="right"><?php echo number_format($response->monthly_due,2); ?></td>
	    			<td align="right"><?php echo number_format($response->billed_amount,2); ?></td>
	    			<td align="center"><?php echo $response->date_deposited; ?></td>
	    			<td align="right"><?php echo number_format($response->collected,2); ?></td>
	    			<td align="right"><?php echo number_format($response->outstanding_balance,2); ?></td>
	    			<td><?php echo $response->payment_details; ?></td>
	    			<td><?php echo $response->remarks; ?></td>
	    			<td align="center"><?php echo $response->billing_date; ?></td>
	    			<td align="center"><?php echo $response->due_date; ?></td>
	    		</tr>
	    	<?php } ?>
    	</tbody>
    </table>
</body>
</html>