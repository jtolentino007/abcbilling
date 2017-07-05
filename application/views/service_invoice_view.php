
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
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



    <style>
        table.custom-design{
            width: 100%;
        }

        #tbl_billing td:nth-child(6),#tbl_billing th:nth-child(6){
            text-align: right;
        }



        .datepicker{z-index:99999999 !important;}


        table.custom-design > tbody > tr > td{
            border:1px solid #acb8b1;
            padding: 7px;
        }

        table.custom-design > thead > tr > th{
            border:1px solid #acb8b1;
            padding: 7px;

        }

        table.custom-design > tfoot > tr > td{
            border:1px solid #acb8b1;
            padding: 7px;

        }

        .custom-design-header{
            background-color: #4f9f63;
        }

        .select2-container{
            min-width: 100%;
            z-index: 9999999999;!important;
        }

    </style>

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <link type="text/css" href="assets/plugins/zTree/zTreeStyle.css" rel="stylesheet">

    <style>
        html{
            zoom: 0.77;
            zoom: 77%;
        }

        .toolbar{
            float: left;
        }

        .billing_menu{
            float: left;
        }

        #tbl_customers td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        #tbl_customers tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        #tbl_billing td.details-control {
            background: url('assets/img/print.png') no-repeat center center;
            cursor: pointer;
        }
        #tbl_billing tr.details td.details-control {
            background: url('assets/img/print.png') no-repeat center center;
        }



        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        .select2-container{
            min-width: 100%;
        }


        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .zTreeDemoBackground {
            overflow: auto;
        }

        div.zTreeDemoBackground {width:100%;height:500px;text-align:left;margin: 2%;overflow: auto;border: 0px solid white;}

        ul.ztree {margin-top: 10px;background: white;width:100%;height:100%;}
        ul.ztree li span{font-size: 11pt;}
        ul.log {border: 1px solid #617775;background: #f0f6e4;width:300px;height:100%;overflow: hidden;}
        ul.log.small {height:45px;}
        ul.log li {color: #666666;list-style: none;padding-left: 10px;}
        ul.log li.dark {background-color: #E3E3E3;}

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
                    <ol class="breadcrumb" style="margin:0;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Service_invoice">Process Billing</a></li>
                    </ol>
                    <div class="container-fluid">
                        <div data-widget-group="group1">

                            <div class="row">

                                <div class="col-md-12">
                                    <div id="div_chart_list">
                                        <div class="panel panel-default">

                                            <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading" style="background: #2ecc71;border-bottom: 1px solid lightgrey;"><b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i> Billing Statements</b></div></a>

                                            <div class="row">

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="zTreeDemoBackground" style="margin-left: 10px;margin-top: 10px;margin-bottom: 20px;border: 0px solid black;">
                                                        <ul id="treeDemo" class="ztree"></ul>
                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-lg-10">
                                                    <div class="panel-body table-responsive" style="padding-left: 1px!important;">


                                                        <div class="tab-container tab-default tab-default">
                                                            <ul class="nav nav-tabs">


                                                                <li class="active"><a href="#billing_statement" data-toggle="tab"><i class="fa fa-bars"></i> Billing Statement</a></li>

                                                                <li class=""><a href="#customer_list" data-toggle="tab"><i class="fa fa-bars"></i> Company / Client List</a></li>

                                                            </ul>
                                                            <div class="tab-content">


                                                                <div class="tab-pane active" id="billing_statement" style="min-height: 250px;">
                                                                    <div style="padding: 0.5%;">
                                                                        <span style="font-size: 14pt;">Billing as of <b class="lbl_date"><?php echo date('F'); ?> 2017</b></span><hr />

                                                                        <table id="tbl_billing" class=" table-striped" cellspacing="0" width="100%">
                                                                            <thead class="">
                                                                            <tr>
                                                                                <th width="5%">&nbsp;&nbsp;</th>
                                                                                <th width="20%">SOA/Billing #</th>
                                                                                <th width="35%">Company / Client</th>
                                                                                <th width="10%">Billing Date</th>
                                                                                <th width="10%">Due Date</th>
                                                                                <th width="5%">Status</th>
                                                                                <th width="10%">Total Due</th>
                                                                                <th class="text-center" width="20%">Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            </tbody>
                                                                        </table>


                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane " id="customer_list" style="min-height: 250px;">
                                                                    <div style="padding: 1%;">
                                                                        <span style="font-size: 14pt;">Account / Contract Billing Status as of <b class="lbl_date"><?php echo date('F'); ?> 2017</b></span><hr />

                                                                        <table id="tbl_customers" class="table-striped" cellspacing="0" width="100%">
                                                                            <thead class="">
                                                                            <tr>
                                                                                <th width="5%">&nbsp;&nbsp;</th>
                                                                                <th width="15%">Account #</th>
                                                                                <th width="30%">Company / Client</th>
                                                                                <th width="20%">Trade Name</th>
                                                                                <th width="10%">Contact No</th>
                                                                                <th width="5%" style="text-align: center;">Status(Billing)</th>
                                                                                <th width="5%">Process</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            </tbody>
                                                                        </table>

                                                                        <br /><br />


                                                                    </div>

                                                                </div>



                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="panel-footer"></div> -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- .container-fluid -->

                </div> <!-- #page-content -->
            </div>


            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>

                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->




            <div id="modal_process_billing" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog" style="width: 65%;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Billing Statement</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frm_billing">
                            <div style="border: 1px solid gray;padding: 2%;border-radius: 5px;">


                                <input type="hidden" name="contract_id" readonly>
                                <input type="hidden" name="customer_id" readonly>

                                <input type="hidden" name="month_id" readonly>
                                <input type="hidden" name="year_id" readonly>


                                <div class="row">

                                    <div class="col-lg-3">
                                        <b>SOA Number : </b><br />

                                        <div id="div_billing_no_loader">
                                            <img src="assets/img/loader/facebook.gif" />
                                        </div>

                                        <div id="div_billing_no">
                                            <input name="billing_no" id="txt_billing_no" type="text" class="form-control" value="<?php echo date('Ymd'); ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6"></div>

                                    <div class="col-lg-3">
                                        <b>Billing Date :</b><br />
                                        <input name="date_billed" type="text" class="date-picker form-control" value="<?php echo date('m/d/Y'); ?>" />
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-lg-6">
                                        <b>Company / Client :</b><br />
                                        <input name="company_name" type="text" class="form-control" value="Paul Christian Rueda" />
                                    </div>
                                    <div class="col-lg-3">
                                        <b>Account / Contract # :</b><br />
                                        <input name="contract_no" type="text" class="form-control" value="C1200012" />
                                    </div>
                                    <div class="col-lg-3">
                                        <b>Due Date :</b><br />
                                        <input name="date_due" type="text" class="date-picker form-control" value="<?php echo date('m/d/Y'); ?>" />
                                    </div>

                                </div>


                            </div>

                            <br />
                            <caption><b style="font-size: 12pt;font-weight: 500;">Current Charges :</b></caption>
                            <div style="border: 1px solid gray;padding: 2%;border-radius: 5px;">

                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-lg-12">
                                        <b>Select Charges to add (Optional) :</b><br />
                                        <select id="cbo_current_charges" class="form-control">
                                            <?php foreach($charges as $charge){ ?>
                                                <option value="<?php echo $charge->charge_id; ?>" data-charge-description="<?php echo $charge->charge_description; ?>"  data-charge-amount="<?php echo $charge->charge_amount; ?>"><?php echo $charge->charge_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <table id="tbl_current_charges" class="custom-design table-striped">

                                    <thead>
                                        <tr>
                                            <th width="20%">Charge Name</th>
                                            <th width="45%">Description</th>
                                            <th width="20%" style="text-align: right;">Amount</th>
                                            <th width="5%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Retainers fee</td>
                                            <td>Monthly Retainers fee</td>
                                            <td align="right"><input class="form-control" value="5,500.00" style="text-align: right;" /></td>
                                            <td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" align="right"><b>Total Current Charges : </b></td>
                                            <td colspan="1" align="right" id="td_total_current_charges"><b>5,500.00</b></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>



                            </div>

                            <br />

                            <caption><b style="font-size: 12pt;font-weight: 500;">Beginning Balance :</b></caption>
                            <div style="border: 1px solid gray;padding: 2%;border-radius: 5px;">

                                <!-- <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-lg-12">
                                        <b>Select Charges to add (Optional) :</b><br />
                                        <select id="cbo_previous_charges" class="form-control">
                                            <?php foreach($charges as $charge){ ?>
                                                <option value="<?php echo $charge->charge_id; ?>" data-charge-description="<?php echo $charge->charge_description; ?>"  data-charge-amount="<?php echo $charge->charge_amount; ?>"><?php echo $charge->charge_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->

                                <table id="tbl_beginning_balances" class="custom-design table-striped">

                                    <thead>
                                    <tr>
                                        <th width="20%">Charge Name</th>
                                        <th width="15%">SOA # <span style="font-color: gray;">(Unpaid)</span></th>
                                        <th width="42%">Description</th>
                                        <th width="18%" style="text-align: right;">Amount</th>
                                        <th width="5%" style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>Previous Balance</td>
                                        <td><a href="#" style="text-decoration: underline;">SOA # 2017001222</a></td>
                                        <td>SOA # 2017001222</td>
                                        <td align="right"><input class="form-control" value="5,500.00" style="text-align: right;" /></td>
                                        <td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>

                                    </tr>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><b>Total Beginning Balance : </b></td>
                                        <td align="right" id="td_total_beginning_balances"><b>5,500.00</b></td>
                                        <td></td>
                                    </tr>
                                    </tfoot>
                                </table>


                            </div>




<br />

                            <div style="border: 1px solid gray;padding: 1%;border-radius: 5px;">
                            <div class="row">
                                <div class="col-lg-12">
                                   <table width="100%">
                                       <tr>
                                           <td align="right" width="80%" valign="center" style="padding: 10px;"><b style="font-size: 12pt;font-weight: 500;">TOTAL :</b></td>
                                           <td align="right" width="20%" valign="center"><input type="text" name="total_billing_amount" id="txt_total" class="form-control" value="" style="text-align: right;font-weight: 600;" readonly /></td>
                                       </tr>
                                       <tr>
                                           <td align="right" width="80%" valign="center" style="padding: 10px;"><i>Less Advance Payment : </i> (<a href="#">Browse Advances</a>)</td>
                                           <td align="right" width="20%" valign="center"><input type="text" name="advance_payment" id="txt_advance" class="form-control numeric"  style="text-align: right;font-weight: 600;" value="" /></td>
                                       </tr>

                                       <tr>
                                           <td align="right" width="80%" valign="center" style="padding: 10px;"><b style="font-size: 12pt;font-weight: 600;">Total Amount Due :</b></td>
                                           <td align="right" width="20%" valign="center"><input type="text" name="total_amount_due" id="txt_total_amount_due" class="form-control"  style="text-align: right;font-weight: 600;" value="" readonly /></td>
                                       </tr>
                                   </table>
                                </div>
                                <div class="col-lg-4">


                                </div>
                            </div>
                            </div>



                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_finalize" type="button" class="btn btn-primary" style="text-transform: capitalize;"><i class="fa fa-save"></i> <span class=""></span> Finalize Billing Statement</button>
                            <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: none;">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <div id="modal_confirmation_cancel" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Message</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to cancel?
                        </div>
                        <div class="modal-footer">
                            <button id="btn_yes_cancel" class="btn btn-danger">Yes</button>
                            <button id="btn_no" class="btn btn-default">No</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT BUSINESS SOLUTION</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>




        </div>
    </div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>



<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<script type="text/javascript" src="assets/plugins/zTree/jquery.ztree.core.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj;
        var zNodes; var setting; var _monthID; var _year; var dtBilling;
        var _cboCurrentCharges;var _cboPreviousCharges;

        var reInitializeTreeView=function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        };

        function reloadBilling(){

            dtBilling=$('#tbl_billing').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "bPaginate":false,
                "language": {
                    "searchPlaceholder": "Search Billing",
                    "loadingRecords": "<br /><center><img src='assets/img/loader/facebook.gif'></center><br />"
                },
                "ajax": {
                    "url": "Service_invoices/transaction/invoice-list",
                    "type": "GET",
                    "bDestroy": true,
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "month_id" : _monthID,
                            "year": _year
                        });
                    }
                },
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "billing_no" },
                    { targets:[2],data: "company_name" },
                    { targets:[3],data: "date_billed" },
                    { targets:[4],data: "date_due" },
                    {
                        targets:[5],data: "is_active",
                        render: function(data,type,full,meta){
                            return "<center><i class='fa fa-"+(data=="1"?"check":"times")+"-circle' style='color:"+(data=="1"?"green":"red")+";'></i></center>";
                        }
                    },
                    { targets:[6],
                        data: "total_amount_due",
                        render: function(data, type, full, meta){
                            return accounting.formatNumber(data,2);
                        }
                    },

                    {
                        targets:[7],
                        render: function(data, type, full, meta){
                            var _btnNew='<button class="btn btn-success"  id="btn_print" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Print" >'+
                                '<i class="fa fa-print"></i></button>';

                            var _btnCancel='<button class="btn btn-danger"  id="btn_cancel" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Print" >'+
                                '<i class="fa fa-times"></i></button>';

                            return '<table style="border:none!important;">'+
                                        '<tr>'+
                                            '<td>'+
                                                _btnNew +
                                            '</td>'+ 
                                            '<td>'+
                                                _btnCancel+
                                            '</td>'+
                                        '</tr>'
                                    '</table>';
                        }
                    }
                ],
                "rowCallBack": function(a,b,c){
                    console.log(b);
                }
            });

            var createToolBarButton=function() {
                var _btnNew='<button class="btn btn-default"  id="btn_print_all" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Print all" >'+
                    '<i class="fa fa-print"></i> Print all </button>';
                $("div.toolbar").html(_btnNew);
            }();
        };


        var reloadContractBillingStatus=function(){
            dt= $('#tbl_customers').DataTable({
                "bLengthChange":false,
                "bPaginate": false,
                "language": {
                    "searchPlaceholder": "Search Customer",
                    "loadingRecords": "<br /><center><img src='assets/img/loader/facebook.gif'></center><br />"
                },
                "ajax" : {
                    "url":  "Service_invoices/transaction/contract-billing-status-list",
                    "type": "GET",
                    "bDestroy": true,
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "month_id" : _monthID,
                            "year_id": _year
                        });
                    }
                },
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "contract_no" },
                    { targets:[2],data: "company_name" },
                    { targets:[3],data: "trade_name" },
                    { targets:[4],data: "contact_no" },
                    {
                        targets:[5],
                        data: "bill_status",
                        render: function(data, type, full, meta){

                            return "<center><i class='fa fa-"+(data=="1"?"check":"times")+"-circle' style='color:"+(data=="1"?"green":"red")+";'></i></center>";
                        }
                    },

                    {
                        targets:[6],
                        render: function(data, type, full, meta){
                            return "<center><button name='process_billling' class='btn btn-primary' style='text-transform: none;'><i class='fa fa-bars'></i> Process</button></center>";
                        }
                    }

                ]
            });


        };



        var initializeControls=function(){

            $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            _cboCurrentCharges=$('#cbo_current_charges').select2({
                placeholder: "Please select charge.",
                allowClear: true
            });

            // _cboPreviousCharges=$('#cbo_previous_charges').select2({
            //     placeholder: "Please select charge.",
            //     allowClear: true
            // });


            $('#cbo_current_charges').select2('val',null);
            // $('#cbo_previous_charges').select2('val',null);

            _monthID=<?php echo json_encode(date('m')); ?>;
            _year=<?php echo json_encode(date('Y')); ?>;

            reloadBilling();
            reloadContractBillingStatus();


            //**************************************************************************************************************
            setting= {
                view: {

                    addDiyDom: addDiyDom
                },
                data: {
                    key: {
                        title: "title"
                    },
                    simpleData: {
                        enable: true
                    }
                },
                callback: {
                    onClick:function(){

                    }
                }

            };

            zNodes=[
                <?php foreach($years as $year){ ?>
                {"id":"<?php echo $year; ?>","pId":"","name":"<?php echo $year; ?><?php echo ($year==date("Y")?"(Current Year)":""); ?>","title":"<?php echo $year; ?>","open":"<?php echo ($year==date("Y")?"true":false); ?>","icon":"assets\/plugins\/zTree\/img\/diy\/4.png"},
                <?php foreach($months as $month){ ?>
                {"id":"<?php echo $year; ?>-<?php echo $month; ?>","pId":"<?php echo $year; ?>","name":"<?php echo $month; ?>","title":"<?php echo $month; ?>","open":"<?php echo ($year==date("Y")?"true":false); ?>","icon":"assets\/plugins\/zTree\/img\/diy\/11.png"},
                <?php } ?>
                <?php } ?>

            ];
            reInitializeTreeView();
        }();

        var bindEventHandlers=(function(){
            var detailRows = [];

            $('#tbl_customers tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );
                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();
                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    var d=row.data();
                    $.ajax({
                        "dataType":"html",
                        "type":"POST",
                        "url":"Accomplishments/transaction/expand-view?id="+ d.customer_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child( response ).show();
                        reInitializeServiceDataTable($('#tbl_services_'+ d.customer_id));

                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });
                }
            });

            $('#tbl_billing tbody').on('click','#btn_print', function(){
                _selectRowObj=$(this).closest('table').closest('tr');
                var data=dtBilling.row(_selectRowObj).data();
                _selectedID=data.billing_id;

                window.open('Service_invoices/transaction/billing_statement?bid='+_selectedID);
            });

            $('#tbl_billing tbody').on('click','#btn_cancel', function(){
                _selectRowObj=$(this).closest('table').closest('tr');
                var data=dtBilling.row(_selectRowObj).data();
                _selectedID=data.billing_id;

                $('#modal_confirmation_cancel').modal('show');
            });

            $('#btn_no').click(function(){
                $('#modal_confirmation_cancel').modal('hide');
            });

            $('#btn_yes_cancel').click(function(){
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Service_invoices/transaction/cancel-billing",
                    "data":{billing_id : _selectedID}
                }).done(function(response){
                    $('#modal_confirmation_cancel').modal('hide');
                    showNotification(response);
                    dtBilling.row(_selectRowObj).remove().draw();
                });
            });

            $('#btn_finalize').click(function(){

                var btn=$(this);
                var _data=$('#frm_billing').serializeArray();
                _data.push({name:"total_billing_current_amount",value:$('#td_total_current_charges').text()});
                _data.push({name:"total_billing_previous_amount",value:$('#td_total_beginning_balances').text()});


                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Service_invoices/transaction/finalize",
                    "data":_data,
                    "beforeSend": function(){
                        showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        $('#modal_process_billing').modal('hide');
                        dtBilling.destroy();
                        reloadBilling();
                        //dt.destroy();
                        //reloadContractBillingStatus();

                        dt.row(_selectRowObj).data(response.contract_row[0]).draw(false);
                    }
                }).always(function(){
                    showSpinningProgress(btn);
                });


            });

            $('#txt_advance').on('keyup',function(){
                reComputeBillingSummary();
            });

            // _cboPreviousCharges.on('select2:select',function(e){
            //     var i=$(this).select2('val');
            //     var charges=$('#cbo_previous_charges').find('option[value="'+i+'"]');


            //     var charge_id=i;
            //     var charge_name=charges.html();
            //     var charge_description=charges.data('charge-description');
            //     var charge_amount=charges.data('charge-amount');


            //     $('#tbl_beginning_balances tbody').append(newRowBeginningCharges(
            //         {
            //             "charge_id":charge_id,
            //             "charge_name":charge_name,
            //             "charge_description":charge_description,
            //             "charge_amount":charge_amount
            //         }
            //     ));

            //     reInitializeNumeric();
            //     $(this).select2('val',null);
            // });


            _cboCurrentCharges.on('select2:select',function(e){
                var i=$(this).select2('val');
                var charges=$('#cbo_current_charges').find('option[value="'+i+'"]');


                var charge_id=i;
                var charge_name=charges.html();
                var charge_description=charges.data('charge-description');
                var charge_amount=charges.data('charge-amount');


                $('#tbl_current_charges tbody').append(newRowCurrentCharges(
                    {
                        "charge_id":charge_id,
                        "charge_name":charge_name,
                        "charge_description":charge_description,
                        "charge_amount":charge_amount
                    }
                ));

                reInitializeNumeric();
                $(this).select2('val',null);



            });

            $('#tbl_current_charges tbody').on( 'keyup', 'input.numeric', function () {
                reComputeTotalCurrentCharges();
                reComputeBillingSummary();
            });

            $('#tbl_beginning_balances tbody').on( 'keyup', 'input.numeric', function () {
                reComputeTotalBeginningCharges();
                reComputeBillingSummary();
            });

            $('#tbl_current_charges tbody').on( 'click', 'button[name="remove_charge"]', function () {
                var row=$(this).closest('tr');
                    row.remove();
                    reComputeTotalCurrentCharges();
                    reComputeBillingSummary();
            });

            $('#tbl_beginning_balances tbody').on( 'click', 'button[name="remove_charge"]', function () {
                var row=$(this).closest('tr');
                    row.remove();
                    reComputeTotalBeginningCharges();
                    reComputeBillingSummary();
            });


            $('#tbl_customers tbody').on( 'click', 'button[name="process_billling"]', function () {

                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.contract_id;

                $('input[name="month_id"]').val(_monthID);
                $('input[name="year_id"]').val(_year);


                $('input,textarea,select',$('#frm_billing')).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                //get all current charges of current contract
                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Service_invoices/transaction/billing-current-charges?contract_id="+ data.contract_id+"&month_id="+_monthID+"&year_id="+_year,
                    "beforeSend" : function(){

                        $('#div_billing_no_loader').show();
                        $('#div_billing_no').hide();

                        $('#tbl_current_charges > tbody').html('<tr><td colspan="4"><center><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></center></td></tr>');
                        $('#tbl_beginning_balances > tbody').html('<tr><td colspan="5"><center><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></center></td></tr>');

                    }
                }).done(function(response){
                    $('#div_billing_no_loader').hide();
                    $('#div_billing_no').show();

                    if(response.stat=="success"){
                        $('#txt_billing_no').val(response.billing_no);

                        $('#tbl_current_charges > tbody').html(response.current_charges);
                        $('#tbl_beginning_balances > tbody').html(response.beginning_balances);


                        reInitializeNumeric();
                        reComputeTotalCurrentCharges();
                        reComputeTotalBeginningCharges();
                        reComputeBillingSummary();
                    }else{
                        showNotification(response);
                        $('#modal_process_billing').modal('hide');
                    }


                });

                $('#modal_process_billing').modal('show');
            });

            $('.zTreeDemoBackground').on('click','ul.ztree li span',function(){
                var sMonth=$(this).closest('li').text();
                var sYear=$(this).closest('ul').closest('li').find('a').attr('title');
                var YearOnly=$(this).closest('.level0').attr('title');

                //get month id and year
                _monthID=$(this).closest('li').index()+1;
                _year=sYear;

                if ($(this).parent().hasClass('level0')) {
                    if ($(this).parent().hasClass('curSelectedNode'))
                        _year = YearOnly;
                    else
                        _year = $(this).closest('li').find('a').attr('title');

                    $('.lbl_date').html(_year);
                } else {
                    $('.lbl_date').html(sMonth+" "+sYear);
                }

                //reload billing list
                dtBilling.destroy();
                reloadBilling();

                //reload contract list
                dt.clear().destroy();
                reloadContractBillingStatus();
            });

            $(document).on('click','#btn_print_all',function(){
                window.open('Service_invoices/transaction/print-all?m='+_monthID+'&y='+_year);
            });

        })();

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        function addDiyDom(treeId, treeNode) {
            var aObj = $("#" + treeNode.tId);

            if(!isNaN(treeNode.id)){

                //aObj.closest('a').text("Test");


            }
        };

        var reInitializeServiceDataTable=function(tbl){
            var dtService;
            dtService=tbl.DataTable({
                "bLengthChange":false,
                "language": {
                    "searchPlaceholder": "Search Services"
                },
                "pageLength":8
            });

            tbl.on('click','a#link_accomplished',function(){
                alert("dd");
            });
        };


        var newRowCurrentCharges=function(d){
            return '<tr>'+
                        '<td>'+ d.charge_name +'<input name="current_charge_id[]" type="hidden" value="'+ d.charge_id+'" readonly></td>'+
                        '<td><input name="current_charge_description[]" class="form-control" value="'+ d.charge_description +'" /></td>'+
                        '<td align="right"><input name="current_charge_amount[]" class="numeric form-control" value="0.00" style="text-align: right;" /></td>'+
                        '<td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+
                    '</tr>';
        };

        function newRowBeginningCharges(d){
            return '<tr>'+
                '<td>'+ d.charge_name+'<input type="hidden" name="beginning_balance_charge_id[]" value="'+ d.charge_id+'" readonly></td>'+
                '<td>na</td>'+
                '<td><input name="beginning_balance_description[]" class="form-control" value="'+ d.charge_name+'" /></td>'+
                '<td align="right"><input name="beginning_balance_remaining[]" class="form-control numeric" value="0.00" style="text-align: right;" /></td>'+
                '<td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+
                '</tr>';

        };

        var reInitializeNumeric=function(){
            $('.numeric').autoNumeric('init',{mDec:2});
        };

        var getFloat=function(f){
            return parseFloat(accounting.unformat(f));
        };

        var reComputeTotalCurrentCharges=function(){
            var rows=$('#tbl_current_charges > tbody  tr');

            var totalCurrentCharge=0;
            $.each(rows,function(){

                totalCurrentCharge+=getFloat($(this).find('input.numeric').val());

            });

            $('#td_total_current_charges').html('<b>'+accounting.formatNumber(totalCurrentCharge,2)+'</b>');

        };

        var reComputeTotalBeginningCharges=function(){
            var rows=$('#tbl_beginning_balances > tbody  tr');

            var totalCharge=0;
            $.each(rows,function(){

                totalCharge+=getFloat($(this).find('input.numeric').val());

            });

            $('#td_total_beginning_balances').html('<b>'+accounting.formatNumber(totalCharge,2)+'</b>');

        };


        var reComputeBillingSummary=function(){
            var totalCurrent=getFloat($('#td_total_current_charges').text());
            var totalBeginning=getFloat($('#td_total_beginning_balances').text());
            var total=totalCurrent+totalBeginning;

            var total_advance=getFloat($('#txt_advance').val());
            var total_due=total-total_advance;


            $('#txt_total').val(accounting.formatNumber(totalCurrent+totalBeginning,2));
            $('#txt_total_amount_due').val(accounting.formatNumber(total_due,2));

        };

        var showSpinningProgress=function(e){
            $(e).toggleClass('disabled');
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };


    });




</script>


</body>


</html>