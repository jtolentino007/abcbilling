<!DOCTYPE html>
<html>
<head>
	<title>Collection Notice</title>
	<style type="text/css">
        body {
            font-family: 'Courier New', Courier, 'Lucida Sans Typewriter', 'Lucida Typewriter', monospace;
          font-size: 12px!important;
            -webkit-print-color-adjust: exact;
             margin: 10mm 10mm 10mm 10mm;
             font-size: 9px;
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
        thead{
            background-color: #d9eed9!important;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 2px 2px 2px;
        }   
        .footer {
          position: absolute;
          right: 5mm;
          bottom: 5mm;
          left: 5mm;
          
        }
        .no-border{
            border:none!important;
        }
 </style>

    <script>
    	(function(){
    		window.print();
    	})();
    </script>
</head>
<body>
    <table width="60%" class="no-border" >
        <tr class="no-border">
            <td width="10%" class="no-border" style="font-family: Cambria, Georgia, serif!important;"><img src="<?php echo base_url().$company_info->logo_path; ?>" style="height: 80px; width: 120px; text-align: left;"></td>
            <td width="50%" class="align-left no-border" style="font-family: Cambria, Georgia, serif!important;">
                <p  style="font-family: Cambria, Georgia, serif!important;padding:0; margin:0;"> <strong><?php echo $company_info->company_name; ?><br>
                AB&C Partnership Firm<br>
                <?php echo $company_info->company_address; ?></strong></p>
            </td>
        </tr>
    </table><hr>
<p align="right"><b>
<?php $str = date("m-d-Y");
$dateObj = DateTime::createFromFormat('m-d-Y', $str);
echo $dateObj->format('F d, Y');
?></b>
</p>
<b style="text-transform:uppercase;"><?php echo $items[0]->company_name; ?></b>
<h1 style="font-family: 'Courier New'; letter-spacing: 5px;text-align: center;font-size: 30px!important;">COLLECTION NOTICE</h1>
<p>Dear Messier/Madame, </p>
 <p style="text-align:justify;text-indent: 50px;font-size: 12px;"> Please note that on your account, there are one or more billing statements that
are past the 15-day due date from the date of release. These Statements of Account are
itemized below for your convenience. Please remit the past due balance of <b>PHP
    <?php $total=0;
    foreach ($items as $key) { $total+=$key->gross; }
    echo number_format($total,2); ?></b> as
soon as you are able or contact our office if you have any questions regarding these.
Please keep in mind that all billing statements on your account carry 15-day terms
unless otherwise specified.
</p>

<table border="1" width="100%" style="font-family: 'Calibri',sans-serif!important;">
<thead>

<tr>
<td colspan="4" style="background-color: #98e098!important;text-align: center; font-size: 14px;"><b style="text-transform:uppercase;"><?php echo $items[0]->company_name; ?></b></td>
</tr>
<tr>
    <td colspan="2" align="left" style="padding-left: 5px;"><b>DESCRIPTION</b></td>
    <td colspan="2" align="right" style="padding-right: 5px;"><b>AMOUNT</b></td>
</tr>

<?php foreach ($items as $header) { 
echo '<thead>';
echo "<tr>";    
        echo '<td align="left" colspan="4" style="padding-left:10px;"> <b>SOA Number:</b> '.$header->billing_no .' <b style="padding-left:20px;"> Date Billed:</b> '.$header->date_billed.'<b style="padding-left:20px;"> Due Date:</b> '.$header->date_due.'<b style="padding-left:20px;"> Gross Amount:</b> '.$header->gross.'</td>';
    echo "</tr>";   
echo '</thead>';
echo '<tbody>';
    foreach ($customers as $body) {
        if ($header->billing_id == $body->billing_id){
            echo '<tr>';
            echo '<td colspan="2" >'.$body->charge_name.'</td>';
            echo '<td colspan="2" align="right"><b>'.number_format($body->charge_line_total,2).'</b></td>';
            echo '</tr>';


        }
    }
echo '</tbody>';
} 

?>
<tfoot>
<tr>
<td colspan="2" align="right" style="padding-right: 10px;"><b>TOTAL RECEIVABLES</b></td>
<td colspan="2" align="right" style="background-color: #ffff75;"><b>
    <?php $total=0;
    foreach ($items as $key) { $total+=$key->gross; }
    echo number_format($total,2); ?></b>
</td>
</tr>
</tfoot>
</table>
<br>
We appreciate your efforts in bringing the account current.<br><br>
Your business is very important to us!<br>
Thank you.
<br><br>
<br>


 
<table style="width: 100%;border:none!important;">
<tr style="width: 100%;border:none!important;">
<td style="width: 50%;border:none!important;">Prepared By:</td>
<td style="width: 50%;padding-left: 50px;border:none!important;">Noted by:</td>
</tr>
</table>
<br><br><br><br><br><br><br><br>
<b style="text-align: left!important;">NOTE:</b><br><br>

__ 30-days past due (1st Collection Notice)<br>
__ 45-days past due (2nd Collection Notice)<br>
__ 60-days past due (3rd Collection Notice)
<br><br><br>





</body>
</html> 