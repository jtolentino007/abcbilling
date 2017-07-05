<!DOCTYPE html>
<html>
<head>
	<title>Collection Report</title>
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
                <p>DATE: <?php echo $_GET['sDate'].' to '.$_GET['eDate']; ?></p>
            </td>
        </tr>
    </table><hr>
    <div>
    	<h3 class="report-header">Collection Report</h3>
    </div>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
    	<thead>
    		<th>Txn Date</th>
    		<th>Receipt #</th>
            <th>Client name</th>
    		<th>Remarks</th>
    		<th>Amount</th>
    	</thead>
    	<tbody>
            <?php $sum=0; ?>
    		<?php foreach($collections as $collection) {?>
    			<tr>
    				<td><?php echo $collection->date_paid; ?></td>
    				<td><?php echo $collection->receipt_no; ?></td>
                    <td><?php echo $collection->company_name; ?></td>
    				<td><?php echo $collection->remarks; ?></td>
    				<td align="right"><?php echo number_format($collection->total_amount_paid,2); ?></td>    	
                </tr>
                <?php $sum+=$collection->total_amount_paid; ?>
    		<?php } ?>
            <tr>
                <td colspan="4" align="right">Total amount:</td>
                <td align="right"><?php echo number_format($sum,2)?></td>
            </tr>
    	</tbody>
    </table>
</body>
</html>