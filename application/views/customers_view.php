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
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">

    <style>
        html{
            zoom: 0.8;
            zoom: 80%;
        }


        .tab-container .tab-content {
            padding: 5px;
        }

        .dataTables_scrollHead{
            overflow: hidden;
            width: 90px;
        }



        .customer-list > tbody > tr > td{
            border-bottom:1px dashed lightgrey;
            padding: 5px;
            padding-bottom: 10px;
        }


        .typeahead {
            margin-bottom: 10px;
        }

        .image {
          display: block;
          width: 100%;
          height: auto;
          border-radius: 50%;
          border: 1px solid #eaeaea;
        }

        div.dataTables_filter label,
        .form-inline .form-control {
            width: 100%!important;
            margin-bottom: 10px;
            border-radius: 7px;
        }

        .overlay {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 15px;
          right: 0;
          height: 100%;
          width: 90%;
          opacity: 0;
          border-radius: 50%;
          transition: .4s ease;
          background-color: #607d8b;
        }

        .text {
            color: white;
            font-size: 20px;
            font-weight: 200;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .container-img:hover .overlay {
          opacity: .8;
          cursor: pointer;
        }

        body {
            overflow-x: hidden;
        }

        .control-label {
            width: 40%;
            text-align: right;
        }

        .btn-new-customer {
            float: right;
            padding-right: 10px;
            margin-bottom: 10px;
        }

        #tbl_customers.table-bordered > tbody > tr > td, table.fc .fc-view > table > tbody > tr > td {
           border: none;
           border-bottom: 1px dashed #9e9e9e; 
        }

        #tbl_customers.table-bordered > tbody > tr > td:hover, table.fc .fc-view > table > tbody > tr > td:hover {
            transition: .4s;
            background: #eaeaea;
            cursor: pointer;
        }

        @media only screen and (max-width: 600px) {
          .modal-dialog {
            padding: 5px;
          }

          .mobile-view {
            text-align: center;
          }

          .mobile-button {
            width: 100%;
          }

          .btn-new-customer {
            width: 100%;
            clear: both;
          }
        }

        .panel {
            border: none;
            -webkit-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            -moz-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
        }

        .modal-content {
          height: auto;
          min-height: 100%;
          border-radius: 0;
        }

        .breadcrumb
        {
            margin-bottom: 0!important;
        } 
        
        .toolbar {
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
                    <li><a href="customers">Clients</a></li>
                </ol>
            <div class="container-fluid">
                <div data-widget-group="group1">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="div_customer_list">
                                <div class="panel panel-default" style="border: 3px solid black;">

                                    <div class="panel-body">
                                     <!-- style="border-top: 3px solid #2196f3; padding: 10px;" -->
                                        <div class="row">
                                            <div class="container-fluid">
                                                <span style="font-size: 20px;margin-bottom: 0px;float:left;font-weight: bold;" class="pull-left"><i class="fa fa-bars"></i> Client Management</span>
                                                <span class="btn-new-customer" style="padding-right: 20px;">

                                                    <button class="btn btn-success" name="btn_create" style="text-transform: none;font-family:tahoma;height: 40px;border-radius:5px;font-size: 15px;">
                                                        <i class="fa fa-user-plus"></i>&nbsp; New Client
                                                    </button>
                                                </span>
                                                <br /><br />
                                                <hr />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="container-fluid">
                                                <div class="col-xs-12 col-sm-4" style="padding-right: 0; padding-left: 0;">
                                                    <div style="border: 1px solid lightgrey; padding: 10px;">
                                                        <span style="font-size: 17px;"><i class="fa fa-search"></i>&nbsp;Search Clients</span>
                                                        <hr>
                                                        <table id="tbl_customers" class="customer-list" cellspacing="0" width="90%">

                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8" style="padding-left: 5px;">
                                                    <div style="border: 1px solid #e2e2e2; padding: 10px;">
                                                        <span id="client-title" style="font-size: 17px;"><i class="fa fa-bars"></i>&nbsp;Client Info
                                                            <button class="btn btn-info pull-right" name="btn_edit">
                                                                <i class="fa fa-pencil"></i><span class="hidden-xs">&nbsp; Edit Client Info</span>
                                                            </button>
                                                        </span>
                                                        <hr>
                                                        <div class="row">
                                                            <form id="frm_customer">
                                                            <div class="col-xs-12 col-sm-4">

                                                                Customer Code : <br><input type="text" name="customer_code" data-error-msg="Customer Code is required!" class="form-control" required  />

                                                                * Trade name : <br><input class="form-control" name="trade_name" data-error-msg="Trade name is required!" id="txtTradeName" type="text" required /></td>

                                                            </div>


                                                            <div class="col-xs-12 col-sm-4">

                                                                <table width="100%">
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"></td>
                                                                        </tr>
                                                                        <tr>

                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>* Company Name :</strong><br><input class="form-control" name="company_name" data-error-msg="Company name is required!" id="txtCompanyName" type="text" required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>* Head Office Address :</strong><br><textarea class="form-control" name="office_address" data-error-msg="Head Office Address is required!" id="txtHeadOfficeAddress" type="text" required  ></textarea></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>* Billing Address : </strong><br><textarea class="form-control" name="billing_address" data-error-msg="Billing Address is required!" id="txtBilling" type="text" required ></textarea></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>* Contact Person : </strong><br><input class="form-control" name="contact_person" data-error-msg="Contact Person is required!" id="txtContactPerson" type="text" required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong> Designation : </strong><br><input class="form-control" name="designation" id="txtDesignation" type="text" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>* Contact # : </strong><br><input class="form-control" name="contact_no" data-error-msg="Contact number is required!" id="txtContact" type="text" required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong>Email Address :</strong><br><input class="form-control" name="email_address" id="txtEmail" type="text" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                             
                                                                            <td style="width: 60%; padding: 3px;"><strong>* TIN # : </strong><br><input class="form-control" name="tin_no" data-error-msg="TIN number is required!" id="txtTin" type="text" required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 60%; padding: 3px;"><strong> VAT :</strong> <br><select name="tax_type_id" class="form-control" >
                                                                                <?php foreach ($taxes as $tax) { ?>
                                                                                    <option value="<?php echo $tax->tax_type_id; ?>"><?php echo $tax->tax_type; ?></option>
                                                                                <?php } ?>
                                                                            </select></td>
                                                                        </tr>
                                                                    </table>

                                                            </div>
                                                            </form>

                                                            <div class="col-xs-8 col-sm-3 col-sm-offset-1 container-img">
                                                                <img class="img-responsive image" name="img_customer" src="assets/img/default-user-image.png" alt="Image" width="100%">
                                                                <input type="file" name="file_upload[]" class="hidden">
                                                                <div id="btn_browse" class="overlay">
                                                                    <div class="text text-center">Browse Image</div>
                                                                </div>
                                                            </div>


                                                        </div> 
                                                        <div class="row">
                                                            <div class="container-fluid">
                                                                <div class="tab-container tab-top tab-primary">
                                                                    <ul class="nav nav-tabs">
                                                                        <li class="active">
                                                                            <a href="#services" data-toggle="tab">
                                                                                <i class="fa fa-cog"></i>&nbsp;Services
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#document" data-toggle="tab">
                                                                                <i class="fa fa-file"></i>&nbsp;Documents
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div id="document" class="tab-pane fade">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <form>
                                                                                        <label class="" style="font-family: Tahoma;"><strong>Enter Document to add :</strong></label>
                                                                                        <div id="custom-templates">
                                                                                            <input type="text" class="typeahead type_document" placeholder="Enter Document to Search..." />
                                                                                        </div>
                                                                                    </form>
                                                                                    <form id="frm_documents">
                                                                                        <table id="tbl_documents" class="table table-bordered table-striped table-responsive">
                                                                                            <thead style="background: #2196f3; color: white;">
                                                                                                <tr>
                                                                                                    <th>Document Type</th>
                                                                                                    <th>Document Description</th>
                                                                                                    <th>Filename</th>
                                                                                                    <th><center>Action</center></th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody></tbody>
                                                                                        </table>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="services" class="tab-pane fade in active">
                                                                            <div class="row">
                                                                                <div class="container-fluid">
                                                                                    <form>
                                                                                        <label class="" style="font-family: Tahoma;"><strong>Enter Service to add :</strong></label>
                                                                                        <div id="custom-templates">
                                                                                            <input type="text" class="typeahead type_services" placeholder="Enter Service to Search..." />
                                                                                        </div>
                                                                                    </form>
                                                                                    <form id="frm_services">
                                                                                        <table id="tbl_services" class="table table-bordered">
                                                                                            <thead style="background: #2196f3; color: white;">
                                                                                                <tr>
                                                                                                    <td><strong>Code</strong></td>
                                                                                                    <td><strong>Service</strong></td>
                                                                                                    <td><strong>Description</strong></td>
                                                                                                    <td><strong>File Every</strong></td>
                                                                                                    <td class="text-center"><strong>Action</strong></td>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody></tbody>
                                                                                        </table>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <button id="btn_save" class="btn btn-primary"><span class=""></span>&nbsp;<i class="fa fa-save"></i>&nbsp;Save</button>
                                                            <button id="btn_cancel" class="btn btn-danger"><span class=""></span>&nbsp;Cancel</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <div class="modal-content"><!---content-->
            <div class="modal-header" style="background: #f55246;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Message</h4>
            </div>
            <div class="modal-body">
                <p id="modal-body-message">Are you sure you want to delete ?</p>
            </div>

            <div class="modal-footer">
                <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div><!---content-->
    </div>
</div><!---modal-->
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

<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>


<script>
    $(document).ready(function(){
        var dt; var dtDocuments; var _txnMode; var _selectedID; var _selectRowObj; var dtServices;

        var initializeControls=function(){
            disableAllControls();
            $('button[name="btn_edit"]').css("display","none");
            $('#btn_save').attr("disabled","disabled");
            $('#btn_cancel').attr("disabled", "disabled");


            dt=$('#tbl_customers').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "scrollY": "500px",
                "ajax" : "Customers/transaction/list",
                "bPaginate": false,
                "bInfo": false,
                "language": {
                    "searchPlaceholder": "Search Customer name..."
                },
                "columns": [
                    {
                        targets:[0],
                        "render":function(data, type, full, meta) {
                           return '<div class="row customer-row"><div class="container-fluid"><div class="col-xs-12 col-sm-2 text-center"><img style="border-radius: 50%; height: 50px; width: 50px; border: 1px solid #d1d1d1;" src="'+ (full.photo_path == '' ? "assets/img/default-user-image.png" : full.photo_path) +'"/></div><div class="col-xs-12 mobile-view col-sm-8"><span name="view_info" style="font-size: 18x; color:#0b73c5;"><strong style="text-transform: none;font-family:tahoma;">' + full.company_name + '</strong></span> <br/> <span>' + full.office_address + '</span></div><div class="col-xs-12 col-sm-2"><a name="remove_info" class="mobile-button"><i class="fa fa-trash" style="color:gray;"></i></a></div></div></div>';
                        }
                    }
                ]
            });
        }();

        //Typeahead for Services
        var raw_data=<?php echo json_encode($services); ?>;

        var services = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('service_name','service_description','filing_date'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local : raw_data
        });

        var _objTypeHeadServices=$('#custom-templates .type_services');

        _objTypeHeadServices.typeahead(null, {
            name: 'services',
            display: 'description',
            source: services,
            templates: {
                header: [
                    '<table width="100%"><tr><td width="20%">Code</td><td width=30%" style="padding-left: 1%;"><b>Service</b></td><td width="30%"><b>Description</b></td><td width="20%"><b>File Every</b></td></tr></table>'
                ].join('\n'),

                suggestion: Handlebars.compile('<table width="100%"><tr><td width="20%">{{service_code}}</td><td width="30%" style="padding-left: 1%">{{service_name}}</td><td width="30%">{{service_description}}</td><td width="20%">{{filing_month}}</td></tr></table>')
            }
        }).on('keyup', this, function (event) {
            if (event.keyCode == 13) {
                //$('.tt-suggestion:first').click();
                _objTypeHeadServices.typeahead('close');
                _objTypeHeadServices.typeahead('val','');
            }
        }).bind('typeahead:select', function(ev,suggestion) {
            $('#tbl_services > tbody').append(newRowService({
                service_id: suggestion.service_id,
                service_code: suggestion.service_code,
                service_name: suggestion.service_name,
                service_description: suggestion.service_description,
                filing_month: suggestion.filing_month
            }));
        });

        $('div.tt-menu').on('click','table.tt-suggestion',function(){
            _objTypeHeadServices.typeahead('val','');
        });

        //End Typeahead for Services

         //Typeahead for Documents
        var raw_data=<?php echo json_encode($documents); ?>;

        var documents = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('document_type','document_type_description'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local : raw_data
        });

        var _objTypeHeadDocuments=$('#custom-templates .type_document');

        _objTypeHeadDocuments.typeahead(null, {
            name: 'documents',
            display: 'description',
            source: documents,
            templates: {
                header: [
                    '<table width="100%"><tr><td width=50%" style="padding-left: 1%;"><b>Document</b></td><td width="50%"><b>Description</b></td></tr></table>'
                ].join('\n'),

                suggestion: Handlebars.compile('<table width="100%"><tr><td width="50%">{{document_type}}</td><td width="50%" style="padding-left: 1%">{{document_type_description}}</td></tr></table>')
            }
        }).on('keyup', this, function (event) {
            if (event.keyCode == 13) {
                _objTypeHeadDocuments.typeahead('close');
                _objTypeHeadDocuments.typeahead('val','');
            }
        }).bind('typeahead:select', function(ev,suggestion) {
            $('#tbl_documents > tbody').append(newRowDocuments({
                document_type_id: suggestion.document_type_id,
                document_type: suggestion.document_type,
                document_type_description: suggestion.document_type_description
            }));
        });

        $('div.tt-menu').on('click','table.tt-suggestion',function(){
            _objTypeHeadDocuments.typeahead('val','');
        });

        //End Typeahead for Documents

        var newRowDocuments=function(d){
            return '<tr>' +
            '<td style="display:none;"><input name="document_type_id[]" class="form-control" value="'+ d.document_type_id +'"/></td>' + 
            '<td>' + d.document_type + '</td>' +
            '<td>' + d.document_type_description + '</td>' +
            '<td></td>' +
            '<td align="center"><button type="button" name="upload_document" class="btn btn-success"><i class="fa fa-upload"></i></button>&nbsp;<button type="button" name="remove_documents" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>'+
            '</tr>';
        };

        var newRowService=function(d){
            return '<tr>' +
            '<td style="display:none;"><input name="service_id[]" class="form-control" value="'+ d.service_id +'"/></td>' + 
            '<td>' + d.service_code + '</td>' +
            '<td>' + d.service_name + '</td>' +
            '<td>' + d.service_description + '</td>' +
            '<td>' + d.filing_month + '</td>' +
            '<td align="center"><button type="button" name="remove_service" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>'+
            '</tr>';
        };


        var bindEventHandlers=(function(){


            var detailRows = [];

            $('#tbl_customers tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );

                    var d=row.data();

                    $.ajax({
                        "dataType":"html",
                        "type":"POST",
                        "url":"Templates/layout/customer/"+ d.customer_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child( response ).show();
                        reInitializeDatatable($('#tbl_so_'+ d.customer_id));
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });
                }
            } );

            $('#btn_cancel').on('click',function(){
                $('button[name="btn_create"]').css("display","inline-block");
                clearFields();
                disableAllControls();
                $('#tbl_services > tbody, #tbl_services > tbody').html('');
            });

            $('#btn_browse').click(function(event) {
                event.preventDefault();
                $('input[name="file_upload[]"]').click();
            });

            $('#tbl_customers tbody').on('click','span[name="view_info"]',function() {
                    _txnMode = "";
                    _selectRowObj=$(this).closest('tr');
                    var data=dt.row(_selectRowObj).data();
                    _selectedID=data.customer_id;

                    $('img[name="img_customer"]').attr('src', (data.photo_path == '' ? "assets/img/default-user-image.png" : data.photo_path));

                    $('input,textarea,select').each(function(){
                        var _elem=$(this);
                        $.each(data,function(name,value){
                            if(_elem.attr('name')==name){
                                _elem.val(value);
                            }
                        });
                    });

                    $.ajax({
                        url : 'Customers/transaction/documents?cid='+_selectedID,
                        type : 'GET',
                        cache : false,
                        dataType : 'json',
                        processData : false,
                        contentType : false,
                        success : function(response){
                            var rows=response.data;
                            $('#tbl_documents > tbody').html('');

                            $.each(rows, function(i, value) {
                                $('#tbl_documents > tbody').append(newRowDocuments({
                                    document_type_id: value.document_type_id,
                                    document_type: value.document_type,
                                    document_type_description: value.document_type_description,
                                    document_filename: value.document_filename
                                }));
                            });
                        }
                    });

                    $.ajax({
                        url : 'Customers/transaction/services?cid='+_selectedID,
                        type : "GET",
                        cache : false,
                        dataType : "json",
                        processData : false,
                        contentType : false,
                        success : function(response) {
                            var rows=response.data;
                            $('#tbl_services > tbody').html('');

                            $.each(rows,function(i,value) {
                                $('#tbl_services > tbody').append(newRowService({
                                    service_id: value.service_id,
                                    service_code: value.service_code,
                                    service_name: value.service_name,
                                    service_description: value.service_description,
                                    filing_month: value.filing_month
                                }));
                            });
                        }
                    });

                    $('button[name="btn_edit"]').css("display","inline-block");
                    $('button[name="btn_create"]').css("display","inline-block");
                    disableAllControls();
            });

            $('#tbl_customers tbody').on('click','button[name="remove_info"]',function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.customer_id;

                $('#modal_confirmation').modal('show');
            });

            $('#btn_yes').click(function(){
                removeCustomer().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                    clearFields();
                });
            });

            $('button[name="btn_edit"]').on('click', function(){
                _txnMode = "edit";
                $('#btn_save').removeAttr('disabled','disabled');
                $('#btn_cancel').removeAttr('disabled','disabled');
                enableAllControls();
                $('button[name="btn_edit"]').css("display","none");
                $('button[name="btn_create"]').css("display","none");
                $('form').find('input:first').focus();
            });

            $('button[name="btn_create"]').on('click', function(){
                _txnMode = "new";
                $('#btn_save').removeAttr('disabled','disabled');
                $('#btn_cancel').removeAttr('disabled','disabled');
                clearFields();
                enableAllControls();
                $('button[name="btn_edit"]').css("display","none");
                $('button[name="btn_create"]').css("display","none");
                $('form').find('input:first').focus();
            });

            $('input[name="file_upload[]"]').change(function(event){
                var _files=event.target.files;

                var data=new FormData();
                $.each(_files,function(key,value){
                    data.append(key,value);
                });

                $.ajax({
                    url : 'Customers/transaction/upload',
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    success : function(response) {
                        if (response.title == 'Invalid!')
                            showNotification(response);
                        else 
                            $('img[name="img_customer"]').attr('src',response.path);
                    }
                });
            });

            $('#btn_save').click(function(){
                if(validateRequiredFields()){
                    if(_txnMode=="new"){
                        createCustomer().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw();
                            clearFields();
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                        updateCustomer().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                            clearFields();
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }

                    $('button[name="btn_create"]').css("display","inline-block");
                    $('#tbl_services > tbody, #tbl_documents > tbody').html('');
                    $('img[name="img_customer"]').attr('src', 'assets/img/default-user-image.png');
                    $('#btn_save').attr('disabled','disabled');
                    $('#btn_cancel').attr('disabled','disabled');
                    disableAllControls();
                }
            });

            $('#tbl_services > tbody').on('click','button[name="remove_service"]',function(){
                $(this).closest('tr').remove();
            }); 

             $('#tbl_documents > tbody').on('click','button[name="remove_documents"]',function(){
                $(this).closest('tr').remove();
            });

        })();


        var validateRequiredFields=function(){
            var stat=true;
            $('div.form-group').removeClass('has-error');
              $('input[required],textarea','#frm_customer').each(function(){
                  if($(this).val()==""){
                      showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                      $(this).closest('div.form-group').addClass('has-error');
                      stat=false;
                      return false;
                  }
              });

            return stat;
        };


        var createCustomer=function() {
            var _data=$('#frm_customer,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_customer"]').attr('src')});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Customers/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateCustomer=function() {
            var _data=$('#frm_customer,#frm_services,#frm_documents').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_customer"]').attr('src')});
            _data.push({name : "customer_id" ,value : _selectedID});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Customers/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var removeCustomer=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Customers/transaction/delete",
                "data":{customer_id : _selectedID}
            });
        };

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var clearFields=function(){
            $('input,textarea,select', '#frm_customer').val('');
            $('form').find('input:first').focus();
        };

        function enableAllControls(){
            $('form :input').removeAttr("disabled","disabled");
        };

        function disableAllControls(){
            $("form :input").attr("disabled","disabled");
        };

        var reInitializeDatatable=function(tbl){
            tbl.DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false

            });
        };

    });




</script>


</body>


</html>