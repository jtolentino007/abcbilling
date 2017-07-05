<!DOCTYPE html>
<html>
<head>
	<title>Customer Ledger Report</title>
	<style type="text/css">
        body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .data {
            border-bottom: 1px solid #404040;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
            text-transform: uppercase;
        }

        hr {
            border-top: 3px solid #404040;
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
        <tr>
            <td width="10%"><img src="<?php echo base_url().$company_info->logo_path; ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%" class="align-center">
                <h1 class="report-header"><strong><?php echo $company_info->company_name; ?></strong></h1>
                <p><?php echo $company_info->company_address; ?></p>
                <p>AS OF <?php echo $_GET['asOfDate']; ?></p>
            </td>
        </tr>
    </table><hr>
    <div>
    	<h3 class="report-header"><?php echo $customer_name->trade_name.' &#39;s'; ?> Ledger Report</h3>
    </div>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
    	<thead>
    		<th>Txn Date</th>
    		<th>Billing #</th>
    		<th>Receipt #</th>
    		<th>Remarks</th>
    		<th>Debit</th>
    		<th>Credit</th>
    		<th>Balance</th>
    	</thead>
    	<tbody>
    		<?php foreach($customer_ledgers as $customer_ledger) {?>
    			<tr>
    				<td><?php echo $customer_ledger->txn_date; ?></td>
    				<td><?php echo $customer_ledger->billing_no; ?></td>
    				<td><?php echo $customer_ledger->receipt_no; ?></td>
    				<td><?php echo $customer_ledger->remarks; ?></td>
    				<td align="right"><?php echo number_format($customer_ledger->debit_amount,2); ?></td>
    				<td align="right"><?php echo number_format($customer_ledger->credit_amount,2); ?></td>
    				<td align="right"><?php echo number_format($customer_ledger->balance,2); ?></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>
</body>
</html>