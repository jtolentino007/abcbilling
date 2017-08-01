<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>JCORE - <?php echo $title; ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Avenxo Admin Theme">
        <meta name="author" content="">

        <?php echo $_def_css_files; ?>

        <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

        <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
        <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
        <style>
            html {
                zoom: 85%;
            }

            .panel.panel-default .panel-heading {
                border-color: transparent;
            }

            .row-border .form-group {
                padding: 5px 0;
            }
            
            .modal-content {
                border: 1px solid #404040;
            }

            .panel {
                border: none;
                -webkit-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
                -moz-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
                box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            }

            .breadcrumb {
                margin-bottom: 0!important;
            }    

            .toolbar{
                float: left;
            }

            td.details-control {
                background: url('assets/img/Folder_Closed.png') no-repeat center center;
                cursor: pointer;
            }
            tr.details td.details-control {
                background: url('assets/img/Folder_Opened.png') no-repeat center center;
            }

            .child_table{
                padding: 5px;
                border: 1px #ff0000 solid;
            }

            .glyphicon.spinning {
                animation: spin 1s infinite linear;
                -webkit-animation: spin2 1s infinite linear;
            }

            @keyframes spin {
                from { transform: scale(1) rotate(0deg); }
                to { transform: scale(1) rotate(360deg); }
            }

            @-webkit-keyframes spin2 {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }
            .numericCol{
              text-align:right;
            }

        </style>

    </head>

    <body class="animated-content">

    <?php echo $_top_navigation; ?>

        <div id="wrapper">
            <div id="layout-static">

            <?php echo $_side_bar_navigation;?>
                <div class="static-content-wrapper white-bg">
                    <div class="static-content"  >
                        <div class="page-content"><!-- #page-content -->
                            <?php echo $_chat_template; ?>
                            <ol class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="Client_payment_summary">Client Payment Summary</a></li>
                            </ol>

                            <div class="container-fluid">
                                <div data-widget-group="group1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_documents_list">
                                                <div class="panel panel-default" style="border-top:5px solid rgb(76, 175, 80);">
                                                    <!-- <div class="panel-heading">
                                                        <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Collection Report</b>
                                                    </div> -->
                                                    <h1 style="padding-left: 20px;"><span class="fa fa-bars" aria-hidden="true" style="color: rgb(76, 175, 80);"></span> Statement of Account <small>| Report</small></h1><hr>
                                                    <div class="panel-body table-responsive">
                                                        <div class="col-xs-12 col-sm-4" style="margin-bottom: 10px;">
                                                            <div class="form-group">
                                                                <strong>Month: </strong><br>
                                                                <div >
                                                                <select name="month" id="month" class="form-control">
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4" style="margin-bottom: 10px;">
                                                            <div class="form-group">
                                                                <strong>Year: </strong><br>
                                                                <div >
                                                                <select name="year" id="year" class="form-control">
                                                                    <?php 
                                                                    $now = date('Y');

                                                                    $minyear=date('Y', strtotime('-3 years')); 
                                                                    $maxyear=date('Y', strtotime('+3 years'));
                                                                      while($minyear!=$maxyear){
                                                                          echo '<option value='.$minyear.' '.($now == $minyear ? 'selected' : '').'>'.$minyear.'</option>';
                                                                          $minyear++;
                                                                      }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-2" style="margin-bottom: 10px;">
                                                            <button id="btn_print" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-file-excel-o"></i>&nbsp;Export to excel</button>
                                                        </div>
                                                        <table id="tbl_collection" class="table-striped custom-design" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="10%">SOA Number</th>
                                                                    <th width="7%">Account Code</th>
                                                                    <th width="7%">Trade Name</th>
                                                                    <th width="15%">Client Name</th>
                                                                    <th width="15%">Description</th>
                                                                    <th width="7%">Beginning Balance</th>
                                                                    <th width="7%">Current Charges</th>
                                                                    <th width="7%">Amount Due</th>
                                                                    <th width="7%">Amount Paid</th>
                                                                    <th width="7%">Discount</th>
                                                                    <th width="7%">Cash Advance</th>
                                                                    <th width="7%">Ending Balance</th>
                                                                    <th width="7%">Billing Date</th>
                                                                    <th width="7%">Due Date</th>
                                                                    <th>Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <div class="panel-footer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .container-fluid -->
                    </div> <!-- #page-content -->
                </div>

                <footer role="contentinfo">
                    <div class="clearfix">
                        <ul class="list-unstyled list-inline pull-left">
                            <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT BUSINESS SOLUTIONS</h6></li>
                        </ul>
                        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                    </div>
                </footer>

                </div>
        </div>
    </div>


    <?php echo $_switcher_settings; ?>
    <?php echo $_def_js_files; ?>

    <script src="assets/plugins/spinner/dist/spin.min.js"></script>
    <script src="assets/plugins/spinner/dist/ladda.min.js"></script>


    <script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/select2/select2.full.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="assets/plugins/fullcalendar/moment.min.js"></script>
    <!-- Data picker -->
    <script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- numeric formatter -->
    <script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
    <script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

    <script>
        (function(){

            var dt;

            var initializeControls=function(){
     //              $("#date-picker").datepicker( {
     //                format: "mm-yyyy",
     //                startView: "months", 
     //                minViewMode: "months",


     // onClose: function() {

     //    var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();

     //    var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

     //    $(this).datepicker('setDate', new Date(iYear, iMonth, 1));

     // }
     //            });
                initializeDataTable();
            }();

            var bindEventHandlers=function(){
                $('#month').on('change',function(){
                    dt.destroy();
                    initializeDataTable();
                });

                $('#year').on('change',function(){
                    dt.destroy();
                    initializeDataTable();
                });


                $('#btn_print').on('click',function(){
                    window.open('Statement_of_account/transaction/export?m='+$('#month').val()+'&y='+$('#year').val());
                });
            }();

            function initializeDataTable() {
                dt=$('#tbl_collection').DataTable({
                    "dom":'<"toolbar">frtip',
                    "bLengthChange":false,

                    "bFilter":false,
                    "ajax": {

                        "url":"Statement_of_account/transaction/list",
                        "type":"GET",
                        "bDestroy":true,
                        "data": function ( d ) {
                            return $.extend( {}, d, {
                                "month" : $('#month').val(),
                                "year" : $('#year').val(),
                            });
                        }
                    },
                    "columns":[
                                { targets:[0], data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.billing_no+' '+d;
            } },
                    // { targets:[0],data: "billing_no" },
                        { targets:[1],data: "customer_code" },
                        { visible:false,targets:[2],data: "trade_name" },
                        { targets:[3],data: "company_name" },
                        { targets:[4],data: "payment_details" },
                        { 
                            class:"text-right",
                            targets:[5],data: "beginning_balance",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[6],data: "billed_amount",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[7],data: "monthly_due",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[8],data: "collected",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[9],data: "discount",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[10],data: "advance_amount",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { 
                            class:"text-right",
                            targets:[11],data: "outstanding_balance",
                            render:function(data,type,full,meta){
                                return accounting.formatNumber(data,2);
                            }
                        },
                        { visible:false,targets:[12],data: "billing_date" },
                        { visible:false,targets:[13],data: "due_date" },
                        { visible:false,targets:[14],data: "remarks" },
                    ]
                });
            }
        })();
    </script>

    </body>

</html>