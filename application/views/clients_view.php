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
        /*.container-img:hover .overlay {
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
        }*/

        .numeriCol {
            text-align: right;
        }
    </style>


    <?php echo $_switcher_settings; ?>
    <?php echo $_def_js_files; ?>


    <script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


    <!-- Select2 -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>

    <!-- touchspin -->
    <script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>
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

        .img-container {
          position: relative;
          width: 50%;
        }

        .image {
            display: block;
            width: 200%;
            height: auto;
            border: 1px solid #eaeaea;
        }

        .overlay {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          height: auto;
          width: 200%;
          opacity: 0;
          transition: .5s ease;
          cursor: pointer;
          background-color: rgba(0, 140, 186, .6);
        }

        .img-container:hover .overlay {
          opacity: 1;
        }

        .text {
          color: white;
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
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
                        <li><a href="Clients">Customers</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div_supplier_list">
                                        <div class="panel panel-default">
                                            <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading" style="background: #2ecc71;border-bottom: 1px solid lightgrey;"><b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i> Client Management</b></div></a>
                                            <div class="panel-body table-responsive">
                                                <table id="tbl_clients" class="custom-design table-striped" cellspacing="0" width="100%">
                                                    <thead class="">
                                                    <tr>
                                                        <th>&nbsp;&nbsp;</th>
                                                        <th>Company Name</th>
                                                        <th>Trade Name</th>
                                                        <th>Office Address</th>
                                                        <th>Contact No</th>
                                                        <th>Email</th>
                                                        <th><center>Action</center></th>
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

            <div id="modal_customer" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog" style="width: 65%;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Client Information</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frm_customer">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Customer Code *: <br><input type="text" name="customer_code" data-error-msg="Customer Code is required!" class="form-control" required  />
                                        Trade name * : <br><input class="form-control" name="trade_name" data-error-msg="Trade name is required!" id="txtTradeName" type="text" required /></td>
                                        Company Name * :<br><input class="form-control" name="company_name" data-error-msg="Company name is required!" id="txtCompanyName" type="text" required />
                                        Head Office Address :<br><textarea class="form-control" name="office_address" data-error-msg="Head Office Address is required!" id="txtHeadOfficeAddress"></textarea>
                                        Billing Address : <br><textarea class="form-control" name="billing_address" data-error-msg="Billing Address is required!" id="txtBilling" type="text" ></textarea>
                                        Contact Person : <br><input class="form-control" name="contact_person" />
                                    </div>
                                    <div class="col-lg-4">
                                        Designation : <br><input type="text" class="form-control" name="designation" id="txtDesignation" />
                                        Contact # : <br><input type="text" class="form-control" name="contact_no" />
                                        Email Address :<br><input type="text" class="form-control" name="email_address" id="txtEmail" />
                                        TIN # : <br><input type="text" class="form-control" name="tin_no" />
                                        VAT : <br><select name="tax_type_id" class="form-control" >
                                            <?php foreach ($taxes as $tax) { ?>
                                                <option value="<?php echo $tax->tax_type_id; ?>"><?php echo $tax->tax_type; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="img-container" style="height: 240px;">
                                            <img class="image" name="img_user" src="assets/img/default-user-image.png" alt="Image" style="max-height: 100%; min-height: 100%;">
                                            <input type="file" name="file_upload[]" class="hidden">
                                            <div id="btn_browse" class="overlay" style="height: 240px;">
                                                <div class="text text-center">Browse Image</div>
                                            </div>
                                        </div>
                                        <div id="div_img_loader" style="display: none;">
                                            <img name="img_loader" src="assets/img/loader/ajax-loader-sm.gif" style="display: block;margin:40% auto auto auto; " />
                                        </div>
                                        <div>
                                            <button type="button" id="btn_remove_photo" class="btn btn-danger btn-block">Remove Photo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_save" type="button" class="btn btn-primary" style="text-transform: none;"><span class=""></span> Save Changes</button>
                            <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: none;">Cancel</button>
                        </div>
                    </div><!---content-->
                </div>
            </div><!---modal-->

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
<script type="text/javascript" src="assets/js/chat.js"></script>
<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboItemTypes;
        var _files; var _customerID; var _docTypeID; var _docSelectedRowObj; var _selectedDocTBL;
        var _selectedFileTBL; var _selectedServiceTBL;



        var initializeControls=function(){
            var initializeControls=function() {
                dt=$('#tbl_clients').DataTable({
                    "dom": '<"toolbar">frtip',
                    "bLengthChange":false,
                    "pageLength":15,
                    "language": {
                        "searchPlaceholder":"Search Client"
                    },
                    "ajax" : "Clients/transaction/list/"+<?php echo $this->session->user_id; ?>,
                    "columns": [
                        {
                            "targets": [0],
                            "class":          "details-control",
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ""
                        },
                        { targets:[1],data: "company_name" },
                        { targets:[2],data: "trade_name" },
                        { targets:[3],data: "office_address" },
                        { targets:[4],data: "contact_no" },
                        { targets:[5],data: "email_address" },
                        {
                            targets:[6],
                            render: function (data, type, full, meta){
                                var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left:-5px;"><i class="fa fa-pencil"></i> </button>';
                                var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash" style="margin-right:-5px;"><i class="fa fa-trash-o"></i> </button>';
                                return '<center>'+btn_edit+'&nbsp;'+btn_trash+'</center>';
                            }
                        }
                    ],
                    "initComplete": function () {
                        $('#tbl_clients tr:lt(5) td.details-control').click();
                    }
                });
                var createToolBarButton=function() {
                    var _btnNew='<button class="btn btn-green"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New Client Record" >'+
                        '<i class="fa fa-plus-circle"></i> New Client Record</button>';
                    $("div.toolbar").html(_btnNew);
                }();
            }();


            $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


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
                        "url":"Clients/transaction/expand-view/"+ d.customer_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child(response).show();
                        reInitializeDataTable($('#tbl_contract_'+ d.customer_id));
                        // reInitializeServiceDataTable($('#tbl_services_'+ d.customer_id));
                        // reInitializeDocumentDataTable($('#tbl_documents_'+ d.customer_id));
                        // reInitializeFilesDataTable($('#tbl_search_files_'+d.customer_id));
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });
                }
            });


            $('#attach_files').on('change',function(event){

                _files=event.target.files;
            });



            $('#btn_attach_files').click(function(){
                var data=new FormData();
                var btn=$(this);

                $.each(_files,function(key,value){
                    data.append(key,value);
                });

                $.ajax({
                    url : 'Clients/transaction/upload-attachments?cid='+_customerID+'&did='+_docTypeID,
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

                            var stat=(details.doc_type_stat>0?"<i class='fa fa-check-circle' style='color: green;'></i>":"<i class='fa fa-times-circle' style='color: red;'></i>");
                            var document=[
                                details.document_type,
                                details.document_type_description,
                                '<a href="#" id="link_doc_type_status" class="" data-customer-id="'+_customerID+'" data-document-type-id="'+_docTypeID+'">'+stat+'</a>',
                                details.documents_count+" File(s)",
                                '<a href="" id="link_upload" class="" data-customer-id="'+_customerID+'" data-document-type-id="'+_docTypeID+'"><i class="fa fa-upload" style="color:blue;"></i></a>'
                            ];
                            _selectedDocTBL.row(_docSelectedRowObj).data(document).draw(false);


                            details=response.new_file[0];
                            var document=[
                                details.document_filename,
                                details.document_type,
                                details.date_posted,
                                details.user_name,
                                '<center><a href="" id="link_delete" data-file-id="'+details.customer_file_id+'"><i class="fa fa-trash" style="color:black;"></i></a></center>',
                                '<center><a href="" id="link_search" data-file-id="'+details.customer_file_id+'"><i class="fa fa-search" style="color:blue;"></i></a></center>'
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
                _txnMode="new";
                clearFields($('#modal_customer'));
                $('#modal_customer').modal('show');
            });
            $('#btn_browse').click(function(event){
                event.preventDefault();
                $('input[name="file_upload[]"]').click();
            });
            $('#btn_remove_photo').click(function(event){
                event.preventDefault();
                $('img[name="img_user"]').attr('src','assets/img/default-user-image.png');
            });

            $('#tbl_clients tbody').on('click','button[name="edit_info"]',function(){
                _txnMode="edit";
                $('#modal_customer').modal('show');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.customer_id;
                if(data.photo_path==""){
                    $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
                }
                else{
                    $('img[name="img_user"]').attr('src',data.photo_path);
                }
                $('input,textarea,select').each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });
            });
            $('#tbl_clients tbody').on('click','button[name="remove_info"]',function(){
                $('#modal_confirmation').modal('show');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.customer_id;
            });
            $('#btn_yes').click(function(){
                removeCustomer().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });
            $('input[name="file_upload[]"]').change(function(event){
                var _files=event.target.files;

                $('#div_img_loader').show();
                $('.img-container').hide();
                $('#btn_remove_photo').hide();

                var data=new FormData();
                $.each(_files,function(key,value){
                    data.append(key,value);
                });
                console.log(_files);
                $.ajax({
                    url : 'Clients/transaction/upload',
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    success : function(response){
                        $('#div_img_loader').hide();
                        $('.img-container').show();
                        $('#btn_remove_photo').show();
                        $('img[name="img_user"]').attr('src',response.path);
                    }
                });
            });
            $('#btn_cancel').click(function(){
                showList(true);
            });
            $('#btn_save').click(function(){
                if(validateRequiredFields()){
                    if(_txnMode=="new"){
                        createCustomer().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw(false);
                            $('#modal_customer').modal('hide');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                        updateCustomer().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw(false);
                            $('#modal_customer').modal('hide');
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
        var createCustomer=function() {
            var _data=$('#frm_customer,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Clients/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };
        var updateCustomer=function() {
            var _data=$('#frm_customer,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            _data.push({name : "customer_id" ,value : _selectedID});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Clients/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };
        var removeCustomer=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Clients/transaction/delete",
                "data":{customer_id : _selectedID}
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

        var reInitializeDataTable=function(tbl){
            var dtContracts;
            dtContracts=tbl.DataTable({
                "bLengthChange":false,
                "pageLength":6,
                "language": {
                    "searchPlaceholder": "Search Contracts..."
                }
            });
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
                var customer_id=$(this).data('customer-id');
                _selectedServiceTBL=$(this).closest('table').DataTable();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Clients/transaction/service-status",
                    "data":[{name : "service_id",value: service_id},{name : "customer_id" ,value:  customer_id}],
                    "beforeSend": function(){
                        row.find('td').eq(3).html('<center><img src="assets/img/loader/facebook.gif" /></center>');
                    }
                }).done(function(response){
                    showNotification(response);

                    var data=response.row_updated[0];
                    if(response.stat=="success"){
                        var htmlStat=(data.stat=="1"?'<i class="fa fa-check-circle" style="color: green;"></i></center>':'<center><i class="fa fa-times-circle" style="color: red;"></i></center>');

                        var data_update=[
                            data.service_name,
                            data.service_description,
                            "na",
                            '<center><a href="" id="link_status" data-customer-id="'+customer_id+'" data-service-id="'+service_id+'">'+htmlStat+'</a>'
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
                var customer_id=$(this).data('customer-id');
                var row=$(this).closest('tr');
                _selectedDocTBL=$(this).closest('table').DataTable();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Clients/transaction/doc-type-status",
                    "data":[{name : "doc_type_id",value: doc_type_id},{name : "customer_id" ,value:  customer_id}],
                    "beforeSend": function(){
                        row.find('td').eq(2).html('<center><img src="assets/img/loader/facebook.gif" /></center>');
                    }
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){


                        var details=response.doc_details[0];
                        var stat=(details.doc_type_stat>0?"<i class='fa fa-check-circle' style='color: green;'></i>":"<i class='fa fa-times-circle' style='color: red;'></i>");
                        var document=[
                            details.document_type,
                            details.document_type_description,
                            '<a href="#" id="link_doc_type_status" class="" data-customer-id="'+customer_id+'" data-document-type-id="'+doc_type_id+'">'+stat+'</a>',
                            details.documents_count+" File(s)",
                            '<a href="" id="link_upload" class="" data-customer-id="'+customer_id+'" data-document-type-id="'+doc_type_id+'"><i class="fa fa-upload" style="color:blue;"></i></a>'
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

                _customerID=$(this).data('customer-id');
                _docTypeID=$(this).data('document-type-id');
                _docSelectedRowObj=$(this).closest('tr');


                _selectedDocTBL=$(this).closest('table').DataTable();
                _selectedFileTBL=$(this).closest('div.tab-content').find('table.table-files-class').DataTable();


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
                    "url":"Clients/transaction/file-delete",
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
