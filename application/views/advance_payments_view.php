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
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <style>
        .page-content > .breadcrumb {
            margin-bottom: 0;
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

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->
                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Advance_payment">Advance Payment Entry</a></li>
                    </ol>
                    <div class="container-fluid">
                        <div id="div_list">
                            <div class="panel panel-default">
                                <div class="panel-body table-responsive" style="border-top:5px solid rgb(76, 175, 80);"><h1><span class="fa fa-newspaper-o" style="border: 3px solid rgb(76, 175, 80); padding: 12px 12px 12px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> Advance Payments <small> | Clients</small></h1><hr>
                                    <table id="tbl_advance_payments" width="100%" class="table">
                                        <thead>
                                            <th>Company / Client Name</th>
                                            <th class="text-right">Advance Payment Amount</th>
                                            <th class="text-center">Action</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="modal_entry" class="modal fade" role="dialog"><!--modal-->
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-body" style="border-top:5px solid rgb(76, 175, 80);"><h1><span class="fa fa-newspaper-o" style="border: 3px solid rgb(76, 175, 80); padding: 12px 12px 12px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> Advance Payments <small> | New</small></h1><hr>
                                        <strong>Received From :</strong><br>
                                        <form id="frm_advances">
                                            <select id="cbo_client" name="customer_id" data-error-msg="Client is required" required>
                                                <?php foreach($clients as $client) { ?>
                                                    <option value="<?php echo $client->customer_id; ?>"><?php echo $client->company_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <strong>Amount :</strong><br>
                                            <input type="number" class="form-control text-right" name="advance_payment_amount" value="0.00" data-error-msg="Amount is required" required>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button id="btn_save" type="button" class="btn btn-primary">Save</button>
                                        <button id="btn_cancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div><!---modal-->
                    </div> <!-- .container-fluid -->
                </div> <!-- #page-content -->
                <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content"><!---content-->
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
                        </div><!---content-->
                    </div>
                </div><!---modal-->
            </div>
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
<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script>

$(document).ready(function(){
    var _cboClients; var dt;

    var InitializeControls = function() {
        $('#div_trans').hide();

        _cboClients = $('#cbo_client').select2({
            placeholder: 'Select Client'
        });

        dt = $('#tbl_advance_payments').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "language": {
                "searchPlaceholder":"Search Advance payment"
            },
            "ajax" :{ 
                "url":"Advance_payment/transaction/list",
                "bDestroy":true
            },
            "columns": [
                { targets:[0],data: "company_name" },
                { class: 'text-right', targets:[1], data: "advance_payment_amount" },
                { targets:[8],
                    render: function (data, type, full, meta){
                        var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fa fa-times"></i> </button>';

                        return '<center>'+btn_trash+'</center>';
                    } 
                }
            ]
        });

        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New Document Category" >'+
                '<i class="fa fa-plus-circle"></i> New Advance Payment</button>';
            $("div.toolbar").html(_btnNew);
        }();
    }();

    var bindEventHandlers = function() {
        $('#btn_new').click(function(){
            $('#modal_entry').modal('show');
            clearFields($('#frm_advances'));
            $('#btn_save').removeAttr('disabled','disabled');
        });

        $('#btn_save').click(function(){
            if (validateRequiredFields($('#frm_advances'))) {
                createAdvancePayment().done(function(response){
                    showNotification(response);
                    $('#modal_entry').modal('hide');
                    dt.row.add(response.row_added[0]).draw();
                }).always(function(){
                    showSpinningProgress($('#btn_save'));
                });
            }
        });

        $('#tbl_advance_payments > tbody').on('click','button[name="remove_info"]',function(e){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID = data.advance_payment_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            cancelAdvancePayment().done(function(response){
                showNotification(response);
                if(response.stat=="success"){
                    dt.row(_selectRowObj).remove().draw();
                }
                

            });
        });
    }();

    var validateRequiredFields = function(frm) {
        var stat=true;

            $('div.form-group').removeClass('has-error');
            $('input[required],textarea[required],select[required]',frm).each(function(){

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

    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

    var clearFields = function(frm) {
        $('input[type="number"],textarea',frm).val('');
        $(frm).find('input:first').focus();
        _cboClients.select2('val',null);
    };

    var showSpinningProgress=function(e){
        $(e).attr('disabled','disabled');
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var createAdvancePayment = function(){
        var _data = $('#frm_advances').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Advance_payment/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var cancelAdvancePayment = function() {
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Advance_payment/transaction/cancel",
            "data": {advance_payment_id : _selectedID}
        });
    };
});

</script>

</body>

</html>