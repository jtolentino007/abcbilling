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
        
        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

        <!--/twitter typehead-->
        <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">

        <style>
            html {
                zoom: 85%;
            }

            .row-border .form-group {
                padding: 5px 0;
            }


            .panel.panel-default .panel-heading {
                border-color: transparent;
            }

            .select2-container{
                min-width: 100%;
                z-index: 9999999999;
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
                                <li><a href="service_types">Service Types</a></li>
                            </ol>

                            <div class="container-fluid">
                                <div data-widget-group="group1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_services_list">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Service Types</b>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <table id="tbl_services" class="table-striped custom-design" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Service Code</th>
                                                                    <th>Service Type</th>
                                                                    <th>Service Type Description</th>
                                                                    <th>Filed Every</th>
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
                                                <div id="modal_services" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: white;">Service Type Information</h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="frm_services" role="form" class="form-horizontal row-border">
                                                                    <div class="form-group">
                                                                        <label class="col-xs-12 ">* Service Code :</label>
                                                                        <div class="col-xs-12">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-code"></i>
                                                                                </span>
                                                                                <input type="text" name="service_code" class="form-control" placeholder="Service Code" data-error-msg="Service Code is required!" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-xs-12 ">* Service Type :</label>
                                                                        <div class="col-xs-12">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-cogs"></i>
                                                                                </span>
                                                                                <input type="text" name="service_name" class="form-control" placeholder="Service Type" data-error-msg="Service Type is required!" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-xs-12 ">Category :</label>
                                                                        <div class="col-xs-12">
                                                                            <select id="cbo_category" name="category_id" class="form-control">
                                                                                <option value="0">[Create New Category]</option>
                                                                                <?php foreach($categories as $category) { ?>
                                                                                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-xs-12 ">Service Type Description :</label>
                                                                        <div class="col-xs-12">
                                                                            <textarea name="service_description" class="form-control" placeholder="Description"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-xs-8 ">File Every :</label>
                                                                        <label class="col-xs-4">on Day :</label>
                                                                        <div class="col-xs-8">
                                                                            <select id="cbo_filling_month" name="filing_month" class="form-control">
                                                                                <option>Month</option>
                                                                                <option>Quarter</option>
                                                                                <option>Semi-Annual</option>
                                                                                <option>Annual</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <input class="form-control" type="number" name="filing_date">
                                                                        </div>
                                                                    </div>
                                                                    <br />
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Save
                                                                        </button>
                                                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"> Cancel
                                                                        </button>
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

                <div id="modal_categories" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 style="color: white;">Create New Category</h3>
                            </div>
                            <div class="modal-body">
                                <form id="frm_categories" role="form" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <label class="col-xs-12 ">* Category Name :</label>
                                        <div class="col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </span>
                                                <input type="text" name="category_name" class="form-control" placeholder="Category Name" data-error-msg="Category name is required!" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 ">Category Description :</label>
                                        <div class="col-xs-12">
                                            <textarea name="category_description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button id="btn_save_category" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Save
                                        </button>
                                        <button id="btn_cancel_category" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content"><!---content--->
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
                        </div><!---content---->
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

    <!-- Select2 -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

    <script>

    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboCategory;

        $('#btn_cancel').on('click', function() {
            $('#modal_services').modal('hide');
        });

        var initializeControls=function(){
            dt=$('#tbl_services').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "language": {
                    "searchPlaceholder":"Search Service Type"
                },
                "ajax" : "service_types/transaction/list",
                "columns": [
                    { targets:[0],data: "service_code" },
                    { targets:[1],data: "service_name" },
                    { targets:[2],data: "service_description" },
                    {targets:[3],data: "filing_month"},
                    {
                        targets:[4],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                            return '<center>'+btn_edit+'&nbsp;'+btn_trash+'</center>';
                        }
                    }
                ]
            });

            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New category" >'+
                    '<i class="fa fa-users"></i> New Service Type</button>';
                $("div.toolbar").html(_btnNew);
            }();
        }();

        var bindEventHandlers=(function(){
            var detailRows = [];

            $('#tbl_categories tbody').on( 'click', 'tr td.details-control', function () {
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

                    row.child( format( row.data() ) ).show();

                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            } );

            _cboCategory=$("#cbo_category").select2({
                placeholder: "Please select category.",
                allowClear: true
            });

            _cboCategory.select2('val',null);

            $('#btn_new').click(function(){
                _txnMode="new";
                //showList(false);
                clearFields();
                _cboCategory.select2('val',null);
                 $('#modal_services').modal('show');
            });

            $('#tbl_services tbody').on('click','button[name="edit_info"]',function(){
                _txnMode="edit";
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID = data.service_id;

                $('input,textarea').each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                _cboCategory.select2('val',data.category_id);

                $('#modal_services').modal('show');
            });

            $('#tbl_services tbody').on('click','button[name="remove_info"]',function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID = data.service_id;

                $('#modal_confirmation').modal('show');
            });

            $('#cbo_category').on('change',function(){
                if($('#cbo_category').val()==0){
                    $('input[name="category_name"]').val('');
                    $('textarea[name="category_description"]').val('');
                    $('#modal_categories').modal('show');
                    $('#modal_services').modal('hide');
                }
            }); 

            $('#btn_yes').click(function(){
                removeServiceType().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });

            $('#btn_save_category').click(function(){
               if(validateRequiredFields($('#frm_categories'))){
                    createCategory().done(function(response){
                        showNotification(response);
                    }).done(function(response){
                        var category=response.row_added[0];
                        $('#cbo_category').append('<option value="'+category.category_id+'" selected>'+category.category_name+'</option>');
                        _cboCategory.select2('val',category.category_id);
                        $('#modal_categories').modal('hide');
                        $('#modal_services').modal('show');
                    });
                }
            });

            $('#btn_cancel_category').click(function(){
                $('#modal_categories').modal('hide');
            })

            $('#btn_save').click(function(){
                if(validateRequiredFields()){
                    if(_txnMode=="new"){
                            createServiceType().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw();
                            clearFields();
                            $('#modal_services').modal('hide');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                            updateServiceType().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                            clearFields();
                            $('#modal_services').modal('hide');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }
                }
            });
        })();

        var validateRequiredFields=function(){
            var stat=true;

            $('div.form-group').removeClass('has-error');
            $('input[required],textarea','#frm_category').each(function(){
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    stat=false;
                    return false;
                }
            });
            return stat;
        };

        var createCategory=function(){
            var _data=$('#frm_categories').serializeArray();

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Categories/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save_category'))
            });
        };

        var createServiceType=function(){
            var _data=$('#frm_services').serializeArray();

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Service_types/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateServiceType=function(){
            var _data=$('#frm_services').serializeArray();
            _data.push({name : "service_id" ,value : _selectedID});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Service_types/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var removeServiceType=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Service_types/transaction/delete",
                "data":{service_id : _selectedID}
            });
        };

        var showList=function(b){
            if(b){
                $('#div_services_list').show();
                $('#div_category_fields').hide();
            }else{
                $('#div_services_list').hide();
                $('#div_category_fields').show();
            }
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
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var clearFields=function(){
            $('input[required],input[type=number],textarea','#frm_services').val('');
            $('form').find('input:first').focus();
        };
    });

    </script>

    </body>

</html>