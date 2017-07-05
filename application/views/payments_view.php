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

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <!--/twitter typehead-->
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">

    <style>
        html {
                zoom: 85%;
            }

            .numeriCol {
                text-align: right;
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
    </style>
</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">


        <?php echo $_side_bar_navigation; ?>


        <div class="static-content-wrapper white-bg">
            <div class="static-content">
                <div class="page-content"><!-- #page-content -->
                    <?php echo $_chat_template; ?>
                    <ol class="breadcrumb"  style="margin-bottom: 0;">
                        <li><a href="Dashboard">Dashboard</a></li>
                        <li><a href="Payments">Collection Entry</a></li>
                    </ol>
                    <div class="container-fluid">
                        <div id="payments_list"> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Collection Entry</b>
                                </div>
                                <div class="panel-body">
                                    <table id="tbl_payments" class="table-striped custom-design" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">Receipt #</th>
                                                <th width="20%">Client</th>
                                                <th width="10%">Method</th>
                                                <th width="20%">Remarks</th>
                                                <th width="15%">Posted by</th>
                                                <th width="10%">Date Paid</th>
                                                <th width="5%">Status</th>
                                                <th width="10%" style="text-align: right;">Amount</th>
                                                <th>
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>

                            <div id="modal_payment" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="width: 90%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Collection Entry</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="frm_payment_info">
                                                <div style="border: 1px solid #c0c0c0; padding: 20px 0px 30px 0px; margin-bottom: 10px;">
                                                    <div class="row" style="margin-bottom: 10px;">
                                                        <div class="container-fluid">
                                                                <div class="col-xs-12 col-sm-5">
                                                                    <strong>Receipt #:</strong>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                             <i class="fa fa-code"></i>
                                                                        </span> 
                                                                        <input type="text" class="form-control" name="receipt_no" placeholder="Enter Receipt # here" data-error-msg="Receipt # is required!" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-4 col-sm-offset-3">
                                                                    <strong>Payment Date:</strong><br>
                                                                    <div class="input-group">
                                                                         <span class="input-group-addon">
                                                                             <i class="fa fa-calendar"></i>
                                                                        </span>
                                                                        <input type="text" name="date_paid" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Invoice" data-error-msg="Please set the date this items are issued!" required>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <div class="col-xs-12 col-sm-5">
                                                                <strong>Payment Method:</strong><br>
                                                                <select id="cbo_payment_method" name="payment_method_id" class="form-control" style="width: 100%;" data-error-msg="Payment method is required!" required>
                                                                    <?php foreach($methods as $method) { ?>
                                                                        <option value="<?php echo $method->payment_method_id; ?>">
                                                                            <?php echo $method->payment_method; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-3 check-prop hidden">
                                                                <strong>Check Date :</strong><br>
                                                                <div class="input-group">
                                                                     <span class="input-group-addon">
                                                                         <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    <input type="text" name="check_date" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Check Date">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-4 check-prop hidden">
                                                                <strong>Check # :</strong>
                                                                <div class="input-group">
                                                                     <span class="input-group-addon">
                                                                         <i class="fa fa-code"></i>
                                                                    </span>
                                                                    <input type="text" name="check_no" class="form-control" placeholder="Check #">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                                <div style="border: 1px solid #c0c0c0; padding: 10px 20px 30px 20px;margin-bottom: 10px;">

                                                <form id="frm_payment_items">
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <strong>Client:</strong><br>
                                                            <select id="cbo_customers" name="customer_id" class="form-control" style="width: 100%;" data-error-msg="Please select customer to continue" required>
                                                                <?php foreach ($customers as $customer) { ?>
                                                                    <option value="<?php echo $customer->customer_id ?>"><?php echo $customer->company_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <table id="tbl_receivables" class="table-striped  custom-design" cellspacing="0" width="100%" style="font-font:tahoma;border: 1px solid #c0c0c0;">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="hidden">Billing ID</th>
                                                                        <th class="hidden">Contract ID</th>
                                                                        <th width="7%">Contract/Account #</th>
                                                                        <th width="7%">Billing #</th>
                                                                        <th width="5%">Billing Date</th>
                                                                        <th width="5%">Due Date</th>
                                                                        <th width="15%">Remarks</th>
                                                                        <th width="10%" style="text-align: right;">Amount Due</th>
                                                                        <th width="10%" style="text-align: right;">Discount</th>
                                                                        <th width="10%" style="text-align: right;">Payment</th>
                                                                        <th width="5%"><center>Action</center></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="5" align="right"><b>Total : </b></td>
                                                                            <td id="td_total_amount_due" align="right"><b>0.00</b></td>
                                                                            <td id="td_total_discount" align="right"><b>0.00</b></td>
                                                                            <td colspan="1" id="td_total_payment_amount" align="right"><b>0.00</b></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div style="border: 1px solid #c0c0c0; padding: 10px 20px 30px 20px;">
                                                    <strong>Remarks :</strong><br>
                                                    <textarea class="form-control" name="remarks"></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn_save" class="btn btn-primary">Record Payment</button>
                                            <button id="btn_cancel" class="btn btn-default">Cancel</button>
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
                <div class="modal-header ">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Confirm Cancellation</h4>

                </div>

                <div class="modal-body">
                    <p id="modal-body-message">Are you sure you want to cancel this payment?</p>
                </div>

                <div class="modal-footer">
                    <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
                </div>
            </div><!---content---->
        </div>
    </div><!---modal-->



    <footer role="contentinfo">
        <div class="clearfix">
            <ul class="list-unstyled list-inline pull-left">
                <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT Business Solutions</h6></li>
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




<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>



<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        var _cboCustomers, _cboPayments, _txnMode, _cell;
        var total_after_discount=0;
        var rows;

        var initializeControls=function(){
            InitializeDatatable();
            _cboCustomers=$("#cbo_customers").select2({
                placeholder: "Please select Client.",
                allowClear: true
            });

            _cboPayments=$("#cbo_payment_method").select2({
                placeholder: "Please select Payment Method.",
                allowClear: true
            });

             $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true

            });

            _cboCustomers.select2('val',null);
            _cboPayments.select2('val',null);

            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New payment" >'+ '<i class="fa fa-plus-circle"></i> New Payment</button>';
                $("div.toolbar").html(_btnNew);
            }();

            $('#payment_trans').hide();
        }();

        function InitializeDatatable() {
            dt=$('#tbl_payments').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "language": {
                    "searchPlaceholder":"Search Payment"
                },
                "ajax" :{ 
                    "url":"Payments/transactions/list",
                    "bDestroy":true
                },
                "columns": [
                    { targets:[0],data: "receipt_no" },
                    { targets:[1],data: "company_name" },
                    { targets:[2],data: "payment_method" },
                    { targets:[3],data: "remarks" },
                    { targets:[4],data: "user_name" },
                    { targets:[5],data: "date_paid" },
                    { targets:[6],data: "active_status",
                        render: function (data, type, full, meta){
                            return (data==1?"<center><i class='fa fa-check-circle' style='color:#4caf50;'></i></center>":"<center><i class='fa fa-times-circle' style='color:#f44336;'></i></center>");
                        }
                    },
                    { 
                        class: "numeriCol",
                        targets:[7],data: "total_amount_paid",
                        render: function (data, type, full) {
                             return accounting.formatNumber(data, 2, ",");
                        }
                    },
                    {
                        targets:[8],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fa fa-times"></i> </button>';

                            return '<center>'+btn_trash+'</center>';
                        }
                    }
                ]
            });
        }

        var bindEventHandlers=function(){
            $('#btn_new').on('click',function(){
                _txnMode="new";
                $('#modal_payment').modal('show');
                $('#btn_save').removeAttr('disabled','disabled');
            });

            $('#btn_cancel').on('click',function(){
                $('#modal_payment').modal('hide');
                clearFields();
            });

            _cboPayments.on('change', function() {
                if (_cboPayments.val() == 2)
                    $('.check-prop').removeClass('hidden');
                else 
                    $('.check-prop').addClass('hidden');
            });

            _cboCustomers.on('change', function() {
                $.ajax({
                    url : 'Payments/transactions/get-customer-billings/'+_cboCustomers.val(),
                    type : "GET",
                    dataType: "json",
                    beforeSend : function(){
                        $('#tbl_receivables > tbody').html('<tr><td align="center" colspan="8"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                    },
                    success : function(response) {
                        var data=response.data;
                        $('#tbl_receivables > tbody').html('');

                        $.each(data, function(i,value) {
                            $('#tbl_receivables > tbody').append(newRowItem({
                                billing_id : value.billing_id,
                                contract_id : value.contract_id,
                                contract_no : value.contract_no,
                                billing_no : value.billing_no,
                                date_billed : value.date_billed,
                                date_due : value.date_due,
                                notes : value.notes,
                                amount_due : value.amount_due,
                                discount : value.discount,
                                payment_amount : value.payment_amount
                            }));
                        });
                        reInitializeNumeric();
                        reComputeDetails();
                    }
                })
            });

            $('#btn_save').on('click', function(){
                var rowCount = $('#tbl_receivables tr').length - 2;
                if(validateRequiredFields($('#frm_payment_info'))){
                    if (rowCount > 0) {
                        if(_txnMode=="new"){
                            postPayment().done(function(response){
                                showNotification(response);
                                if(response.stat=="success"){
                                    dt.row.add(response.row_added[0]).draw();
                                    clearFields($('#frm_payment_info'));
                                    _cboPayments.select2('val',null);
                                    $('textarea[name="remarks"]').val('');
                                    $('#modal_payment').modal('hide');
                                }
                            }).always(function(){
                                showSpinningProgress($('#btn_save'));
                            });
                        }
                    } else {
                        showNotification({title: 'Error!', msg: 'No Billing Transaction found.', stat: 'error' });
                    }
                }
            });

            $('#tbl_receivables > tbody').on('keyup','input.numeric',function(e){
                var row=$(this).closest('tr');

                var payment=getFloat(row.find('input[name="payment_amount[]"]').val());
                var discount=getFloat(row.find('input[name="discount[]"]').val());
                var payable=getFloat(row.find('input[name="amount_due[]"]').val());

                var total_after_discount = payment + discount;

                if (total_after_discount > payable) {
                    showNotification({
                        "title": "Invalid!",
                        "stat" : "error",
                        "msg" : "Sorry, the total of discount and payment must not be greater than payable amount."
                    });

                    $(this).val('');
                }

                if(payment>payable){
                    showNotification({
                        "title": "Invalid!",
                        "stat" : "error",
                        "msg" : "Sorry, payment amount is greater than payable amount."
                    });

                    $(this).val('');
                }

                if(discount>payable){
                    showNotification({
                        "title": "Invalid!",
                        "stat" : "error",
                        "msg" : "Sorry, your discount is greater than payable amount."
                    });

                    $(this).val('');
                }

                reComputeDetails();

            });

            $('#tbl_receivables > tbody').on('click','button#btn_pay_all',function(e){
                var row=$(this).closest('tr');
                var payableAmount=getFloat(row.find('input[name="amount_due[]"]').val());
                var discountAmount=getFloat(row.find('input[name="discount[]"]').val());
                var TotalAfterDiscount = discountAmount + payableAmount;

                if (TotalAfterDiscount > payableAmount) {
                    showNotification({
                        "title": "Invalid!",
                        "stat" : "error",
                        "msg" : "Sorry, the total of discount and payment must not be greater than payable amount."
                    });

                    $('input[name="payment_amount[]"]').val('0.00');
                } else {
                    row.find('input[name="payment_amount[]"]').val(accounting.formatNumber(payableAmount,2));
                }

                reComputeDetails();
            });

            $('#tbl_payments > tbody').on('click','button[name="remove_info"]',function(e){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID = data.payment_id;
                _cell=dt.cell(this);

                if (data.active_status == 0) {
                    showNotification({
                        "title":"Error!",
                        "stat":"error",
                        "msg":"Cannot cancel payment. Payment already cancelled."
                    });
                } else {
                    $('#modal_confirmation').modal('show');
                }
            });

            $('#btn_yes').click(function(){
                cancelPayment().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                });
            });
        }();

        var clearFields=function(f){
            $('input:not(.date-picker),textarea',f).val('');

            $(f).find('input:first').focus();

            $('#tbl_receivables > tbody').html('');

            _cboCustomers.select2('val',null);
        };

        var validateRequiredFields=function(f){
            var stat=true;

            $('div.form-group').removeClass('has-error');
            $('input[required],textarea[required],select[required]',f).each(function(){

                if($(this).is('select')){
                    if($(this).select2('val')==0||$(this).select2('val')==null){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }
                }else{
                    if($(this).val()==""){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }
                }

            });

            return stat;
        };

        var showSpinningProgress=function(e){
            $(e).attr('disabled','disabled');
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var postPayment=function(){
            var _data=$('#frm_payment_info,#frm_payment_items').serializeArray();
            _data.push({name:"remarks",value:$('textarea[name="remarks"]').val()});
            _data.push({name:"total_amount_paid",value:getFloat($('#td_total_payment_amount').text())});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Payments/transactions/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var cancelPayment=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Payments/transactions/cancel",
                "data":{payment_id : _selectedID}
            })
        };

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        var showList=function(txn){
            if(txn === true) {
                $('#payment_trans').hide();
                $('#payments_list').show();
            } else {
                $('#payment_trans').show(); 
                $('#payments_list').hide();
            }
        };

        var newRowItem=function(d){
            return '<tr>'+
            '<td class="hidden"><input name="billing_id[]" type="hidden" value="'+ d.billing_id +'">'+ d.billing_id +'</td>' +
            '<td class="hidden"><input name="contract_id[]" type="hidden" value="'+ d.contract_id +'">'+ d.contract_id +'</td>' +
            '<td><input name="contract_no[]" type="hidden" value="' + d.contract_no + '">'+ d.contract_no +'</td>' +
            '<td><input name="billing_no[]" type="hidden" value="'+ d.billing_no +'">'+ d.billing_no +'</td>'+
            '<td><input name="date_billed[]" type="hidden" value="'+ d.date_billed +'">'+d.date_billed+'</td>'+
            '<td><input name="date_due[]" type="hidden" value="'+ d.date_due+'">'+ d.date_due +'</td>'+
            '<td><input name="item_remarks[]" type="text" class="form-control" value="'+(d.notes == null ? '' : d.notes)+'"></td>'+
            '<td><input name="amount_due[]" class="numeric form-control" style="text-align: right;" value="'+accounting.formatNumber(d.amount_due,2)+'" disabled></td>'+
            '<td><input name="discount[]" class="numeric form-control" style="text-align: right;" value="'+accounting.formatNumber(d.discount,2)+'"></td>'+
            '<td><input name="payment_amount[]" type="text" class="numeric form-control" value="'+accounting.formatNumber(0,2)+'" style="text-align:right;"></td>'+
            '<td align="center"><button type="button" id="btn_pay_all" class="btn btn-success"><i class="fa fa-check"></i></button></td>'+
            '</tr>';
        };

        var reComputeDetails=function(){
            rows=$('#tbl_receivables > tbody > tr');
            var total_amount_due=0; var total_payment=0; var total_discount=0; var total_before_discount=0;

            $.each(rows,function(i,value){
                var row=$(this);
                total_amount_due+=getFloat(row.find('input[name="amount_due[]"]').val());
                total_discount+=getFloat(row.find('input[name="discount[]"]').val());
                total_payment+=getFloat(row.find('input[name="payment_amount[]"]').val());
            });

            $('#td_total_amount_due').html('<b>'+accounting.formatNumber(total_amount_due,2)+'</b>');
            $('#td_total_discount').html('<b>'+accounting.formatNumber(total_discount,2)+'</b>');
            $('#td_total_payment_amount').html('<b>'+accounting.formatNumber(total_payment,2)+'</b>');
        };

        var resetSummaryDetails=function(){
            $('#td_total_amount_due').html('<b>0.00</b>');
            $('#td_total_discount').html('<b>0.00</b>');
            $('#td_total_payment_amount').html('<b>0.00</b>');
        };

        var getFloat=function(f){
            return parseFloat(accounting.unformat(f));
        };

        var reInitializeNumeric=function(){
            $('.numeric').autoNumeric('init',{mDec:2});
        };
    });



</script>


</body>


</html>