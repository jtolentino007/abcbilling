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
        .datepicker{z-index:99999999 !important;}


        .container-img:hover .overlay {
            opacity: .8;
            cursor: pointer;
        }
        .image {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 50%;
            border: 1px solid #eaeaea;
        }
        .container-img:hover .overlay {
            opacity: .8;
            cursor: pointer;
        }
        .numeriCol {
            text-align: right;
        }

        .select2-container{
            min-width: 100%;
            z-index: 999999;
        }

        /*input.form-control,select.form-control{
            border:1px solid gray;
            border-radius: 5px;
        }*/

        /*textarea.form-control{
            border:1px solid gray;
        }*/

    </style>


    <style>
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
        textarea {
            resize: none;
        }
        #img_user {
            padding-bottom: 15px;
        }


    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->
                    <?php echo $_chat_template; ?>
                    <ol class="breadcrumb" style="margin:0%;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Contracts">Contracts</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_supplier_list">
                                        <div class="panel panel-default">

                                            <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading" style="background: #2ecc71;border-bottom: 1px solid lightgrey;"><b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i> Contract Management</b></div></a>

                                            <div class="panel-body table-responsive">
                                                <table id="tbl_clients" class="custom-design table-striped" cellspacing="0" width="100%">
                                                    <thead class="">

                                                    <tr>
                                                        <th>&nbsp;&nbsp;</th>
                                                        <th>Account / Contract #</th>
                                                        <th>Company / Client</th>
                                                        <th>Date Started</th>
                                                        <th>TIN #</th>
                                                        <th>Contact #</th>
                                                        <th>Status</th>
                                                        <th width="6%"><center>Action</center></th>
                                                    </tr>

                                                    </thead>
                                                    <tbody>
                                                    </tbody>
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

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>
                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div><!---modal-->

            <div id="modal_confirm_cancel" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color: white"><span id="modal_mode"> </span>Confirm Cancellation</h4>
                        </div>
                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="btn_yes_contract" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close_contract" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div><!---modal-->

            <div id="modal_upload" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                            <h3 id="upload_title" style="color: white;"><i class="fa fa-upload"></i>&nbsp;</h3>
                        </div>
                        <div class="modal-body">
                            <div class="fileUpload">
                                <input id="attach_files" type="file" class="upload" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btn_attach_files" class="btn btn-info" style="text-transform: none;"><span class=""></span> Attach Files</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal_contract_entry" class="modal fade" role="dialog"><!--modal-->
                <div class="modal-dialog" style="width: 30%;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Account / Contract Profile</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frm_contract">
                                <div class="row">
                                    <div class="col-lg-12">
                                        Account/Contract # : <br><input type="text" name="contract_no" data-error-msg="Account / Contract # is required!" class="form-control" required  />
                                        Company / Client Name * : <br>
                                        <select id="cbo_clients" name="customer_id" class="form-control" data-error-msg="Company / Client is required!" required>
                                            <option value="0">[ New Company / Client ]</option>
                                            <?php foreach($customers as $customer){ ?>
                                            <option value="<?php echo $customer->customer_id; ?>" data-tin="<?php echo $customer->tin_no; ?>" data-billing-add="<?php echo $customer->billing_address; ?>" data-contact-person="<?php echo $customer->contact_person; ?>"><?php echo $customer->company_name; ?></option>
                                            <?php } ?>
                                        </select>

                                        Date Start * :<br><input class="form-control date-picker" name="date_started" style="z-index: 999999;" value="<?php echo date('m/d/Y'); ?>" data-error-msg="Date is required!" id="txt_date_start" type="text" required />
                                        TIN # : <br><input class="form-control" name="tin_no" />
                                        Billing Address : <br><textarea class="form-control" name="billing_address" data-error-msg="Billing Address is required!" id="txtBilling" type="text" ></textarea>
                                        Contact Person : <br><input class="form-control" name="contact_person" />
                                    </div>


                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_save" type="button" class="btn btn-primary" style="text-transform: none;"><span class=""></span> Save Contract Profile</button>
                            <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: none;">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <!-- data-backdrop="static" and data-keyboard="false" prevents the modal from closing when clicking outside of it -->
            <div id="modal_add_client" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" id="close_client" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>New Company / Client</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frm_client">
                                Customer Code *: <br><input type="text" name="customer_code" data-error-msg="Customer Code is required!" class="form-control" required  />
                                Trade name * : <br><input class="form-control" name="trade_name" data-error-msg="Trade name is required!" id="txtTradeName" type="text" required /></td>
                                Company Name * : <br><input class="form-control" name="company_name" data-error-msg="Company name is required!" id="txtCompanyName" type="text" required />
                                TIN # : <br><input type="text" class="form-control" name="tin_no" />
                                Billing Address : <br><textarea class="form-control" name="billing_address"></textarea>
                                Contact Person : <br><input class="form-control" name="contact_person" />
                            </form>
                            <br>
                            <strong style="color: #f44336; float: right;"><i>Note: Fields with (*) are required.</i></strong><br>
                        </div>
                        <div class="modal-footer">
                            <button id="btn_save_client" class="btn btn-primary">Save Changes</button>
                            <button id="btn_cancel_client" class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
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


<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboItemTypes;
        var _files; var _contractID; var _docTypeID; var _docSelectedRowObj; var _selectedDocTBL;
        var _selectedFileTBL; var _selectedServiceTBL; var _cboClients;

        var initializeControls=function(){
            var initializeControls=function() {
                dt=$('#tbl_clients').DataTable({
                    "dom": '<"toolbar">frtip',
                    "bLengthChange":false,
                    "pageLength":15,
                    "language": {
                        "searchPlaceholder":"Search Contract"
                    },
                    "ajax" : "Contracts/transaction/list",
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
                        { targets:[3],data: "date_started" },
                        { targets:[4],data: "tin_no" },
                        { targets:[5],data: "contact_no" },
                        { targets:[6],data: "is_active",
                            render: function (data, type, full, meta){
                                return (data==1?"<center><i class='fa fa-check-circle' style='color:#4caf50;'></i></center>":"<center><i class='fa fa-times-circle' style='color:#f44336;'></i></center>");
                            }
                        },
                        {
                            targets:[7],
                            render: function (data, type, full, meta){
                                var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left:-5px;"><i class="fa fa-pencil"></i> </button>';
                                var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash" style="margin-right:-5px;"><i class="fa fa-trash-o"></i> </button>';

                                var btn_cancel='<button class="btn btn-default btn-sm" name="set_inactive"  data-toggle="tooltip" data-placement="top" title="Mark as Inactive/Active" style="margin-right:-5px;"><i class="fa fa-times"></i> </button>';

                                return  '<table style="border:none!important;" cellspacing="5">'+
                                            '<tr>'+
                                                '<td width="40%">'+
                                                    btn_edit +
                                                '</td>'+
                                                '<td width="40%">'+
                                                    btn_trash +
                                                '</td>'+
                                                '<td width="40%">'+
                                                    btn_cancel + 
                                                '</td>'+
                                            '</tr>'+
                                        '</table>';
                            }
                        }
                    ],
                    "drawCallback": function ( settings ) {
                        /**var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;

                        api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class="group"><td colspan="7" align="center"><b>'+group+'</b></td></tr>'
                                );

                                last = group;
                            }
                        } );*/
                    },
                    "initComplete": function () {
                        //$('#tbl_clients tr:lt(5) td.details-control').click();
                    }
                });
                var createToolBarButton=function() {
                    var _btnNew='<button class="btn btn-green"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New Contract Profile" >'+
                        '<i class="fa fa-plus-circle"></i> New Contract Profile</button>';
                    $("div.toolbar").html(_btnNew);
                }();


                _cboClients = $('#cbo_clients').select2({
                    placeholder: "Please select contracts.",
                    allowClear: true
                });

                _cboClients.select2('val',null);

                $('.date-picker').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });



            }();
        }();
        var bindEventHandlers=(function(){
            var detailRows = [];
            $('#tbl_clients tbody').on( 'click', 'tr td.details-control', function () {
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
                        "url":"Contracts/transaction/expand-view/"+ d.contract_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child( response ).show();
                        reInitializeServiceDataTable($('#tbl_services_'+ d.contract_id));
                        reInitializeDocumentDataTable($('#tbl_documents_'+ d.contract_id));
                        reInitializeFilesDataTable($('#tbl_search_files_'+d.contract_id));
                        reInitializeFeeTable($('#fee_template_'+d.contract_id));
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });
                }
            });


            $('#attach_files').on('change',function(event){
                _files=event.target.files;
            });

            _cboClients.on('select2:select', function(){
                var i=$(this).select2('val');
                var obj_customers=$('#cbo_clients').find('option[value="' + i + '"]');
                $('#txtBilling').val(obj_customers.data('billing-add'));
                $('input[name="tin_no"]').val(obj_customers.data('tin'));
                $('input[name="contact_person"]').val(obj_customers.data('contact-person'));

                if(_cboClients.val() == 0) {
                    $('#modal_add_client').modal('show');
                    $('#modal_contract_entry').modal('hide');
                    $('#btn_save_client').removeClass('disabled');
                }
            });

            $('#btn_attach_files').click(function(){
                var data=new FormData();
                var btn=$(this);

                $.each(_files,function(key,value){
                    data.append(key,value);
                });

                $.ajax({
                    url : 'Contracts/transaction/upload-attachments?cid='+_contractID+'&did='+_docTypeID,
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    beforeSend : function(){
                        showSpinningProgress(btn);
                    },
                    success : function(response){
                        showNotification(response);

                        if(response.stat=="success"){
                            $('#modal_upload').modal('hide');

                            //document list
                            var details=response.doc_details[0];

                            var stat=(details.doc_type_stat>0?"<i class='fa fa-check-circle' style='color: #4caf50;'></i>":"<i class='fa fa-times-circle' style='color: #f44336;'></i>");
                            var document=[
                                details.document_type,
                                details.document_type_description,
                                '<a href="#" id="link_doc_type_status" class="" data-contract-id="'+_contractID+'" data-document-type-id="'+_docTypeID+'">'+stat+'</a>',
                                details.documents_count+" File(s)",
                                '<a href="" id="link_upload" class="" data-contract-id="'+_contractID+'" data-document-type-id="'+_docTypeID+'"><i class="fa fa-upload" style="color:#2196f3;"></i></a>'
                            ];
                            _selectedDocTBL.row(_docSelectedRowObj).data(document).draw(false);


                            details=response.new_file[0];
                            var document=[
                                details.document_filename,
                                details.document_type,
                                details.date_posted,
                                details.user_name,
                                '<center><a href="" id="link_delete" data-file-id="'+details.customer_file_id+'"><i class="fa fa-trash" style="color:black;"></i></a></center>',
                                '<center><a href="https://docs.google.com/viewerng/viewer?url=<?php echo base_url(); ?>'+details.document_path+'" id="link_search" target="_blank" data-file-id="'+details.customer_file_id+'"><i class="fa fa-search" style="color:#2196f3;"></i></a></center>'
                            ];

                            _selectedFileTBL.row.add(document).draw(false);

                        }

                    },
                    complete : function(){
                        showSpinningProgress(btn);
                    }
                });
            });

            $('#btn_new').click(function(){
                var currentDate=<?php echo json_encode(date('m/d/Y')); ?>;
                _txnMode="new";
                clearFields($('#modal_contract_entry'));
                $('.date-picker').val(currentDate);
                $('#modal_contract_entry').modal('show');
            });

            $('#tbl_clients tbody').on('click','button[name="edit_info"]',function(){
                _txnMode="edit";

                $('#modal_contract_entry').modal('show');
                _selectRowObj=$(this).closest('table').closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.contract_id;
                $('input,textarea,select').each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                _cboClients.select2('val',data.customer_id);

            });

            $('#tbl_clients tbody').on('click','button[name="remove_info"]',function(){
                $('#modal_confirmation').modal('show');
                _selectRowObj=$(this).closest('table').closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.contract_id;
            });

            $('#tbl_clients tbody').on('click','button[name="set_inactive"]',function(){
                _selectRowObj=$(this).closest('table').closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.contract_id;
                $('#modal_confirm_cancel').modal('show');
            });

            $('#btn_yes_contract').click(function() {
                updateContractStatus().done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw(false);
                    }
                });
            });

            $('#btn_save_client').on('click', function(){
               if(validateRequiredFields('#frm_client')){
                    createClient().done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){   
                            var client=response.row_added[0];

                            $('#cbo_clients').append('<option value="'+client.customer_id+'" selected>'+client.company_name+'</option>');
                            _cboClients.select2('val',client.customer_id);

                            $('#txtBilling').val(client.billing_address);
                            $('input[name="tin_no"]').val(client.tin_no);
                            $('input[name="contact_person"]').val(client.contact_person);
                            $('#modal_contract_entry').modal('show');
                            $('#modal_add_client').modal('hide');
                            clearFields('#frm_client');
                        }   
                    }).always(function(){
                        showSpinningProgress($(this));
                    });
               }
            });

            $('#close_client, #btn_cancel_client').on('click', function(){
                $('#modal_contract_entry').modal('show');
                $('#modal_add_client').modal('hide');
                _cboClients.select2('val',null);
            });

            $('#btn_yes').click(function(){
                removeContract().done(function(response){
                    console.log(response)
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });
            $('input[name="file_upload[]"]').change(function(event){
                var _files=event.target.files;
                var data=new FormData();
                $.each(_files,function(key,value){
                    data.append(key,value);
                });
                console.log(_files);
                $.ajax({
                    url : 'Contracts/transaction/upload',
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    success : function(response){
                        $('img[name="img_user"]').attr('src',response.path);
                    }
                });
            });

            $('#btn_cancel').click(function(){
                $('#modal_confirmation').modal('hide');
            });
            
            $('#btn_save').click(function(){
                if(validateRequiredFields('#frm_contract')){
                    if(_txnMode=="new"){
                        createContract().done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                dt.row.add(response.row_added[0]).draw(false);
                                $('#modal_contract_entry').modal('hide');

                                $('#tbl_clients >tbody > tr:last td.details-control').click();
                            }

                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                        updateContract().done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                dt.row(_selectRowObj).data(response.row_updated[0]).draw(false);
                                $('#modal_contract_entry').modal('hide');
                            }

                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }
                }
            });
        })();
        var validateRequiredFields=function(f){
            var stat=true;
            $('div.form-group').removeClass('has-error');
            $('input[required],textarea[required],select[required]',f).each(function(){
                if($(this).is('select')){
                    if($(this).val()==0){
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
        var clearFields=function(parent){
            $('input,textarea',parent).val('');
            $('img[name="img_user"]').attr('src','assets/img/default-user-image.png');
        };

        var createContract=function() {
            var _data=$('#frm_contract,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Contracts/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var createClient=function(){
            var _dataClient=$('#frm_client').serializeArray();
            _dataClient.push({name : "photo_path" ,value : 'assets/img/default-user-image.png'});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Clients/transaction/create",
                "data":_dataClient,
                "beforeSend": showSpinningProgress($('#btn_save_client'))
            });
        };

        var updateContract=function() {
            var _data=$('#frm_contract,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            _data.push({name : "contract_id" ,value : _selectedID});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Contracts/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };
        var removeContract=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Contracts/transaction/delete",
                "data":{contract_id : _selectedID}
            });
        };

        var updateContractStatus=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Contracts/transaction/update-contract-status",
                "data":{contract_id : _selectedID},
                "beforeSend" : function(){
                    //_selectRowObj.html('<td colspan="8" align="center"><img src="assets/img/loader/facebook.gif" /></td>')
                }
            });
        };

        var showNotification=function(obj){
            PNotify.removeAll();
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };
        var showSpinningProgress=function(e){
            $(e).toggleClass('disabled');
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var reInitializeServiceDataTable=function(tbl){
            var dtService;
            dtService=tbl.DataTable({
                "bLengthChange":false,
                "pageLength":6,
                "language": {
                    "searchPlaceholder": "Search Services"
                }
            });

            tbl.on('click','a#link_status',function(e){
                e.preventDefault();

                var row=$(this).closest('tr');
                var service_id=$(this).data('service-id');
                var contract_id=$(this).data('contract-id');
                _selectedServiceTBL=$(this).closest('table').DataTable();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Contracts/transaction/service-status",
                    "data":[{name : "service_id",value: service_id},{name : "contract_id" ,value:  contract_id}],
                    "beforeSend": function(){
                        row.find('td').eq(3).html('<center><img src="assets/img/loader/facebook.gif" /></center>');
                    }
                }).done(function(response){
                    showNotification(response);

                    var data=response.row_updated[0];
                    if(response.stat=="success"){
                        var htmlStat=(data.stat=="1"?'<i class="fa fa-check-circle" style="color: #4caf50;"></i></center>':'<center><i class="fa fa-times-circle" style="color: #f44336;"></i></center>');

                        var data_update=[
                            data.service_name,
                            data.service_description,
                            "na",
                            '<center><a href="" id="link_status" data-contract-id="'+contract_id+'" data-service-id="'+service_id+'">'+htmlStat+'</a>'
                        ];
                        _selectedServiceTBL.row(row).data(data_update).draw(false);
                    }

                }).always(function(){

                });

            });
        };
        var reInitializeDocumentDataTable=function(tbl){
            var dtDocument;
            dtDocument=tbl.DataTable({
                "bLengthChange":false,
                "pageLength":6,
                "language": {
                    "searchPlaceholder": "Search Documents"
                }
            });

            tbl.on('click','a#link_doc_type_status',function(e){
                e.preventDefault();
                var doc_type_id=$(this).data('document-type-id');
                var contract_id=$(this).data('contract-id');
                var row=$(this).closest('tr');
                _selectedDocTBL=$(this).closest('table').DataTable();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Contracts/transaction/doc-type-status",
                    "data":[{name : "doc_type_id",value: doc_type_id},{name : "contract_id" ,value:  contract_id}],
                    "beforeSend": function(){
                        row.find('td').eq(2).html('<center><img src="assets/img/loader/facebook.gif" /></center>');
                    }
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){


                        var details=response.doc_details[0];
                        var stat=(details.doc_type_stat>0?"<i class='fa fa-check-circle' style='color: #4caf50;'></i>":"<i class='fa fa-times-circle' style='color: #f44336;'></i>");
                        var document=[
                            details.document_type,
                            details.document_type_description,
                            '<a href="#" id="link_doc_type_status" class="" data-contract-id="'+contract_id+'" data-document-type-id="'+doc_type_id+'">'+stat+'</a>',
                            details.documents_count+" File(s)",
                            '<a href="" id="link_upload" class="" data-contract-id="'+contract_id+'" data-document-type-id="'+doc_type_id+'"><i class="fa fa-upload" style="color:#2196f3;"></i></a>'
                        ];
                        _selectedDocTBL.row(row).data(document).draw(false);
                    }
                }).always(function(){

                });


            });


            tbl.on('click','a#link_upload',function(e){
                e.preventDefault();

                var trDocument = $(this).closest('tr');
                var rowDocument = dtDocument.row( trDocument );
                var dataDocument = rowDocument.data();

                $('#modal_upload').modal('show');
                $('#upload_title').html('<i class="fa fa-upload"></i>&nbsp;'+dataDocument[0]);

                _contractID=$(this).data('contract-id');
                _docTypeID=$(this).data('document-type-id');
                _docSelectedRowObj=$(this).closest('tr');


                _selectedDocTBL=$(this).closest('table').DataTable();
                _selectedFileTBL=$(this).closest('div.tab-content').find('table.table-files-class').DataTable();


            });
        };


        var reInitializeFeeTable=function(div){


            div.on('click','button#btn_save_fees',function(e){
                var data=$(this).closest('div').find('form').serializeArray();
                data.push({name:"contract_id",value:$(this).data('contract-id')});
                var btn=$(this);

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Contracts/transaction/contract-fee-template",
                    "data":data,
                    "beforeSend": showSpinningProgress(btn)
                }).done(function(response){
                    showNotification(response);
                }).always(function(){
                    showSpinningProgress(btn);
                });

            });
        };


        var reInitializeFilesDataTable=function(tbl){
            var dtFiles;
            dtFiles=tbl.DataTable({
                "bLengthChange":false,
                "pageLength":6,
                "language": {
                    "searchPlaceholder": "Search Files"
                }
            });

            tbl.on('click','a#link_delete',function(e){
                e.preventDefault();
                var row=$(this).closest('tr');
                var file_id=$(this).data('file-id');
                var dtFile=$(this).closest('table').DataTable();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Contracts/transaction/file-delete",
                    "data":{file_id : file_id},
                    "beforeSend": function(){
                        row.html('<td colspan="6" align="center"><img src="assets/img/loader/facebook.gif"></td>');
                    }
                }).done(function(response){
                    showNotification(response);

                    if(response.stat=="success"){
                        dtFile.row(row).remove().draw();
                    }

                }).always(function(){

                });

            });

        };

        $('#btn_choose').click(function(){

        });
    });
</script>



</body>

</html>