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

    <style type="text/css">
        input[type=checkbox] {
                position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
            }

            input[type=checkbox] + label.css-checkbox {
                padding-left:30px;
                height:25px; 
                display:inline-block;
                line-height:25px;
                background-repeat:no-repeat;
                background-position: 0 0;
                font-size:12px;
                vertical-align:middle;
                cursor:pointer;

            }

            input[type=checkbox]:checked + label.css-checkbox {
                background-position: 0 -25px;
            }

            label.css-checkbox {
                background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_391ce065f36b1460c4845fa9b5173fba.png);
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            input[type=radio] {
                position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
            }

            input[type=radio] + label.css-radio {
                padding-left:26px;
                height:21px; 
                display:inline-block;
                line-height:21px;
                background-repeat:no-repeat;
                background-position: 0 0;
                font-size:12px;
                vertical-align:middle;
                cursor:pointer;

            }

            input[type=radio]:checked + label.css-radio {
                background-position: 0 -21px;
            }
            label.css-radio {
                background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_5ab92245cf78caac21ff087cfc374219.png);
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .modal {
              overflow-y:auto;
            }
    </style>

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
.container-checkbox { border:2px solid #ccc; width:100%; height: 250px; overflow-y: scroll;}
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
            background: url('assets/img/closed.png') no-repeat center center;
            cursor: pointer;
        }

        tr.details td.details-control {
            background: url('assets/img/open.png') no-repeat center center;
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

        label {
            font-weight: 700;
            margin-top: 10px;
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
         input.bottom{
            border: 1px solid #aaa;
            margin: 1px 0px 0px 0px;
            border-radius: 5px;

/*        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid  #aaa;*/
        }
        .panel-heading-01{
            padding: 2.5px  2.5px  2.5px  2.5px;
            background-color: black;
            color:white;
            text-align:center;
            font-style: italic;

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
                        <li><a href="Clients">Clients</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div_supplier_list">
                                        <div class="panel panel-default" style="border-top:5px solid rgb(76, 175, 80);">
                                        <h1 style="padding-left: 20px;"><span class="fa fa-user" style="border: 3px solid rgb(76, 175, 80); padding: 10px 12px 10px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> Client <small> | Management</small></h1><hr>
                                            <!-- <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading" style="background: #2ecc71;border-bottom: 1px solid lightgrey;"><b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i> Client Management</b></div></a> -->
                                            <div class="panel-body table-responsive" >
                                                
                                                <table id="tbl_clients" class="" cellspacing="0" width="100%">
                                                    <thead class="">
                                                    <tr>
                                                        <th>&nbsp;&nbsp;</th>
                                                        <th>Customer Code</th>
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
                <div class="modal-dialog modal-md">
                    <div class="modal-content" style="border-top:5px solid rgb(76, 175, 80);">
                    <h1 style="padding-left: 20px;"><span class="fa fa-user" style="border: 3px solid rgb(76, 175, 80); padding: 10px 12px 10px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> Client<small> | Confirm Deletion </small></h1><hr>
<!--                         <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div> -->
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
                <div class="modal-dialog modal-lg" style="width:60%;"> 
                    <div class="modal-content">
                        <div class="modal-body" style="border-top: 5px solid #56b65a;">
                            <div class="row" style="padding: 20px;">
                                <div class="container-fluid">
                                    <div class="col-xs-6 col-sm-2">
                                        <img src="<?php echo $company_info->logo_path; ?>" style="height: 80px; width: 100%;">
                                    </div>
                                    <div class="col-xs-6 col-sm-5 hidden-xs">
                                        <strong style="font-size: 18px;"><?php echo $company_info->company_name; ?></strong>
                                        <address style="font-size: 16px;"><?php echo $company_info->company_address; ?></address>
                                    </div>
                                    <div class="col-xs-3 col-sm-5">
                                    </div>
                                </div>
                            </div>
                            <div class="row hidden-xs">
                                <div class="container-fluid">
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-10">
                                        <strong style="font-size: 18px;">CLIENT REGISTRATION FORM</strong>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="container-fluid text-center" style="background: #36474f; padding: 5px 0;">
                                    <strong style="color: white;">CLIENT INFORMATION</strong>
                                </div>
                            </div><br>
                            <form id="frm_customer">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * Corporate/ Individual Name: </label>
                                            <input class="form-control" type="text" name="company_name" data-error-msg="Corporate name is required" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * Trade Name: </label>
                                            <input class="form-control" type="text" name="trade_name" data-error-msg="Trade name is required" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * Office Address: </label>
                                            <input class="form-control" type="text" name="office_address" data-error-msg="Office address is required" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * Owner / Person-in-charge: </label>
                                            <input class="form-control" type="text" name="contact_person" data-error-msg="Person-in-charge is required" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * E-mail address: </label>
                                            <input class="form-control" type="email" name="email_address" data-error-msg="Email is required" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label> * Contact nos.: </label>
                                            <input class="form-control" type="text" name="contact_no" data-error-msg="Contact nos. are required" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>RDO No.: </label>
                                            <input class="form-control" type="text" name="rdo_no">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>TIN</label>
                                            <input class="form-control" type="text" name="tin_no">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>Industry</label>
                                            <input class="form-control" type="text" name="industry">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>SEC / DTI</label>
                                            <input class="form-control" type="text" name="sec_dti">
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="col-xs-12 col-sm-2">
                                            <label> * Business Type : </label>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <div style="padding: 0 5px; margin-top: 10px; max-height: 120px; overflow-y: auto; border: 1px solid #d1d1d1;">
                                                <input id="singleProp" type="radio" name="business_type" data-value="01" checked>
                                                <label class="css-radio" for="singleProp">Single Proprietorship</label><br>
                                                <input id="partner" type="radio" name="business_type" data-value="02">
                                                <label class="css-radio" for="partner">Partnership</label><br>
                                                <input id="corp" type="radio" name="business_type" data-value="03">
                                                <label class="css-radio" for="corp">Corporation</label><br>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <label> * Business Style : </label>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="bs-container" style="padding: 0 5px; margin-top: 10px; max-height: 120px; overflow-y: auto; border: 1px solid #d1d1d1;">
                                                <?php foreach($business_styles as $business_style) { ?>
                                                    <input id="<?php echo 'bs_'.$business_style->business_style_id; ?>" type="radio" name="business_style_id" data-value="<?php echo $business_style->business_style_id; ?>" <?php echo ($business_style->business_style_id == 1 ? 'checked' : '') ?> >
                                                    <label class="css-radio" for="<?php echo 'bs_'.$business_style->business_style_id; ?>"><?php echo $business_style->business_style_name; ?></label><br>
                                                <?php } ?>
                                            </div><br>
                                            <button id="btn_new_business" class="btn btn-primary btn-block">
                                                <i class="fa fa-plus"></i>&nbsp; New Business Style
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="container-fluid text-center" style="background: #36474f; padding: 5px 0;">
                                        <strong style="color: white;">DOCUMENTS PROVIDED</strong>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <label style="color: white;"><span class="fa fa-file-o"></span>&nbsp; GENERAL DOCUMENTS</label>
                                                </div>
                                                <div class="panel-body">
                                                    <?php foreach ($general_docs as $general_doc) { ?>
                                                        <input class="general_docs" id="<?php echo $general_doc->document_type_id.'GD'; ?>" type="checkbox" name="document_id[]" data-document-type="GD" value="<?php echo $general_doc->document_type_id.'GD'; ?>">
                                                        <label class="css-checkbox" for="<?php echo $general_doc->document_type_id.'GD'; ?>"><?php echo $general_doc->document_type; ?></label><br>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <label style="color: white;"><span class="fa fa-files-o"></span>&nbsp; SUPPORTING DOCUMENTS</label>
                                                </div>
                                                <div class="panel-body">
                                                    <?php foreach ($supporting_docs as $supporting_doc) { ?>
                                                        <input class="supporting_docs" id="<?php echo $supporting_doc->document_type_id.'SD'; ?>" type="checkbox" name="document_id[]" data-document-type="SD" value="<?php echo $supporting_doc->document_type_id.'SD'; ?>">
                                                        <label class="css-checkbox" for="<?php echo $supporting_doc->document_type_id.'SD'; ?>"><?php echo $supporting_doc->document_type; ?></label><br>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <label style="color: white;"><span class="fa fa-files-o"></span>&nbsp; PREVIOUS RETURNS</label>
                                                </div>
                                                <div class="panel-body">
                                                    <form id="frm_items">
                                                        <div class="pr-container" style="max-height: 250px; overflow-y: auto;">
                                                            <?php foreach ($previous_returns as $previous_return) { ?>
                                                                <input class="chk-returns previous_returns" id="<?php echo $previous_return->document_type_id.'PR'; ?>" type="checkbox" name="previous_id[]" data-document-type="PR" data-value="<?php echo $previous_return->document_type_id; ?>" value="<?php echo $previous_return->document_type_id.'PR'; ?>">  
                                                                <label class="css-checkbox" for="<?php echo $previous_return->document_type_id.'PR'; ?>"><?php echo $previous_return->document_type; ?>
                                                                </label> 
                                                                <input id="<?php echo $previous_return->document_type_id; ?>" class="txt-pr form-control pull-right" type="text" name="value[]" style="margin-top: 10px; width: 150px;" placeholder="<?php echo ($previous_return->unit_time == 'Y' ? 'Year' : 'Period'); ?>" disabled><br>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <button id="btn_add_prevreturns" class="btn btn-primary btn-block">
                                                        <i class="fa fa-plus"></i>&nbsp; Add New Previous Returns
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btn_save" class="btn btn-primary">
                                Save Changes
                            </button>
                            <button id="btn_cancel" class="btn btn-default">
                                Cancel
                            </button>
                        </div>
                    </div><!---content-->
                </div>
            </div><!---modal-->

            <div id="modal_business_style" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                            <h3 style="color: white;">Document Category Information</h3>
                        </div> -->
                        <div class="modal-body" style="border-top:5px solid rgb(76, 175, 80);">
                        <h1><span class="fa fa-files-o" style="border: 3px solid rgb(76, 175, 80); padding: 10px 12px 10px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> Business Style <small class="title-modal"> | Reference</small></h1><hr>
                            <form id="frm_BusinessStyle" role="form" class="form-horizontal row-border">
                                <div class="form-group">
                                    <label class="col-xs-12 ">* Business Style Name :</label>
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <input type="text" name="business_style_name" class="form-control" placeholder="Name" data-error-msg="Business Style Name Name is required!" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 ">Business Style Description :</label>
                                    <div class="col-xs-12">
                                        <textarea name="business_style_description" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <br />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button id="btn_save_business" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Save
                                    </button>
                                    <button id="btn_cancel_business" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal_documents" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                            <h3 style="color: white;">Document Type Information</h3>
                        </div> -->
                        <div class="modal-body" style="border-top:5px solid rgb(76, 175, 80);">
                    <h1><span class="fa fa-file-text-o" style="border: 3px solid rgb(76, 175, 80); padding: 10px 12px 10px 12px; border-radius: 50%; color: rgb(76, 175, 80);"></span> New Previous Returns <small class="title-modal"> | Reference</small></h1><hr>
                            <form id="frm_documents" role="form" class="form-horizontal row-border">
                                <div class="form-group">
                                    <label class="col-xs-12 ">* Previous Return Document :</label>
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <input type="text" name="document_type" class="form-control" placeholder="Document Name" data-error-msg="Document name is required!" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12">* Unit of Time (e.g. Year or Period) :</label>
                                    <div class="col-xs-12">
                                        <select id="cbo_time_unit" class="form-control" name="unit_time" data-error-msg="Unit of time is required" required>
                                            <option value="Y">Year</option>
                                            <option value="P">Period</option>
                                        </select>
                                    </div>
                                </div>
                                <br />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button id="btn_save_returns" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Save
                                    </button>
                                    <button id="btn_cancel_returns" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"> Cancel
                                    </button>
                                </div>
                            </div>
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
<script type="text/javascript" src="assets/js/chat.js"></script>
<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboItemTypes;
        var _files; var _customerID; var _docTypeID; var _docSelectedRowObj; var _selectedDocTBL;
        var _selectedFileTBL; var _selectedServiceTBL; var _cboUnitTime;



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
                        { targets:[1],data: "customer_code" },
                        { targets:[2],data: "company_name" },
                        { targets:[3],data: "trade_name" },
                        { targets:[4],data: "office_address" },
                        { targets:[5],data: "contact_no" },
                        { targets:[6],data: "email_address" },
                        {
                            targets:[7],
                            render: function (data, type, full, meta){
                                var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left:-5px;"><i class="fa fa-pencil"></i> </button>';
                                var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash" style="margin-right:-5px;"><i class="fa fa-trash-o"></i> </button>';
                                return '<center>'+btn_edit+'&nbsp;'+btn_trash+'</center>';
                            }
                        }
                    ]
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

            _cboUnitTime = $('#cbo_time_unit').select2({
                allowClear: true,
                placeholder: 'Please Select Unit of Time'
            });
            _cboUnitTime.select2('val',null);

        }();
        var bindEventHandlers=(function(){
            var detailRows = [];

            $('.chk-returns').click(function(){
                $.each($(this), function(){
                    if ($(this).is(':checked')){
                        $('#'+$(this).data('value')).removeAttr('disabled');
                        $('#'+$(this).data('value')).attr('required','required');
                        $('#'+$(this).data('value')).attr('data-error-msg','Year/Period is required');
                    } else {
                        $('#'+$(this).data('value')).prop('disabled',true);
                        $('#'+$(this).data('value')).val('');
                        $('#'+$(this).data('value')).removeAttr('required');
                        $('#'+$(this).data('value')).removeAttr('data-error-msg');
                    }
                });
            });

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

            $('#btn_add_prevreturns').click(function(){
                clearFields($('#frm_documents'));
                _cboUnitTime.select2('val',null);
                $('#modal_customer').modal('hide');
                $('#modal_documents').modal('show');
            });

            $('#btn_new_business').click(function(){
                clearFields($('#frm_BusinessStyle'));
                $('#modal_customer').modal('hide');
                $('#modal_business_style').modal('show');
            });

            $('#btn_new').click(function(){
                _txnMode="new";
                clearFields($('#frm_customer'));
                $('#singleProp').prop('checked','checked');
                $('#bs_1').prop('checked','checked');
                $('.general_docs').prop('checked',false);
                $('.supporting_docs').prop('checked',false);
                $('.previous_returns').prop('checked',false);
                $('.txt-pr').prop('disabled',true);
                $('.txt-pr').val('');
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
                $('#singleProp').prop('checked','checked');
                $('#bs_1').prop('checked','checked');

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

                $('input[data-value=' + data.business_type+']').prop('checked',true);
                $('#bs_' + data.business_style_id).prop('checked',true);

                $.ajax({
                    url : 'Clients/transaction/get-client-ind-documents',
                    type : "POST",
                    data:{ Id : _selectedID },
                    dataType : 'json',
                    success : function(response){
                        var _customerItems = response;

                        $('.general_docs, .supporting_docs, .chk-returns').each(function(){
                            $(this).prop('checked',false);
                        });

                        $('.txt-pr').prop('disabled',true);
                        $('.txt-pr').val('');

                        $.each(response.data, function(key, value){
                            $('#' + value.document_id + value.document_type).prop('checked',true);
                            $('#'+ value.document_id).val(value.value);
                            $('#'+ value.document_id).prop('disabled',false);
                        });
                    }
                })


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

            $('#btn_cancel_returns').click(function(){
                clearFields($('#frm_documents'));
                $('#modal_documents').modal('hide');
                $('#modal_customer').modal('show');
            });

            $('#btn_cancel_business').click(function(){
                clearFields($('#frm_BusinessStyle'));
                $('#modal_business_style').modal('hide');
                $('#modal_customer').modal('show');
            });

            $('#btn_cancel').click(function(){
                $('#modal_customer').modal('hide');
            });

            $('#btn_save_returns').click(function(){
                if (validateRequiredFields($('#frm_documents'))) {
                    createPreviousReturns().done(function(response){
                        showNotification(response);
                        _prevReturn = response.row_added[0];
                        $('.pr-container').append(
                            '<input class="chk-returns" id="'+ _prevReturn.document_type_id + 'PR' + '" type="checkbox" name="document_id[]" data-document-type="PR" data-value="'+ _prevReturn.document_type_id +'">' + 
                            '<label class="css-checkbox" for="'+ _prevReturn.document_type_id + 'PR' + '">' + _prevReturn.document_type + '</label> ' + 
                            '<input id="'+ _prevReturn.document_type_id +'" class="txt-pr form-control pull-right" type="text" name="value[]" style="margin-top: 10px; width: 150px;" placeholder="' + (_prevReturn.unit_time == 'Y' ? 'Year' : 'Period') + '" disabled><br>'
                        );
                        $('#modal_documents').modal('hide');
                        $('#modal_customer').modal('show');
                    }).always(function(){
                        showSpinningProgress($('#btn_save_returns'));
                    });
                }
            });

            $('#btn_save_business').click(function(){
                if (validateRequiredFields($('#frm_BusinessStyle'))) {
                    createBusinessStyle().done(function(response){
                        showNotification(response);

                        _businessStyle = response.row_added[0];

                        $('.bs-container').append(
                            '<input id="' + 'bs_' + _businessStyle.business_style_id + '" type="radio" name="business_style_id" data-value="' + _businessStyle.business_style_id + '" checked>' + 
                            '<label class="css-radio" for="'+ 'bs_' + _businessStyle.business_style_id +'">' + _businessStyle.business_style_name + '</label><br>'
                        );

                        clearFields($('#frm_BusinessStyle'));
                        $('#modal_business_style').modal('hide');
                        $('#modal_customer').modal('show');
                    }).always(function(){
                        showSpinningProgress($('#btn_save_business'));
                    });
                }
            });

            $('#btn_save').click(function(){
                if(validateRequiredFields($('#frm_customer,#frm_items'))){
                    if(_txnMode=="new"){
                        createCustomer().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw();
                            console.log(response.row_added[0]);
                            $('#modal_customer').modal('hide');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                        updateCustomer().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw(false);
                            console.log(response.row_updated[0]);
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

        var createPreviousReturns=function(){
            var _data=$('#frm_documents').serializeArray();
            _data.push({ name: "document_category_id", value: 3 });

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Documents/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save_returns'))
            });
        };

        var createBusinessStyle=function(){
            var _data=$('#frm_BusinessStyle').serializeArray();

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Business_style/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save_business'))
            });
        };

        var createCustomer=function() {
            var _data=$('#frm_customer').find(':input').not('[name=business_type]').not('[name=business_style_id]').serializeArray();

            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            _data.push({name : "business_type", value : $('input[name=business_type]:checked').data('value') });
            _data.push({name : "business_style_id", value : $('input[name=business_style_id]:checked').data('value') });

            $('.general_docs').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "document_id[]", value: $(this).attr('id') });
                    _data.push({ name: "document_type[]", value: $(this).data('document-type') });
                }
            });

            $('.supporting_docs').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "document_id[]", value: $(this).attr('id') });
                    _data.push({ name: "document_type[]", value: $(this).data('document-type') });
                }
            });

            $('.previous_returns').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "previous_id[]", value: $(this).attr('id') });
                    _data.push({ name: "pr_document_type_id[]", value: $(this).data('document-type') });
                }
            });

            $('.txt-pr').each(function(){
                if ($('#'+$(this).attr('id')).val() != "") {
                    _data.push({ name: "value[]", value: $('#'+$(this).attr('id')).val() });
                }
            });

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Clients/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateCustomer=function() {
            var _data=$('#frm_customer').find(':input').not('[name=business_type]').not('[name=business_style_id]').serializeArray();

            _data.push({name : "customer_id" ,value : _selectedID});
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            _data.push({name : "business_type", value : $('input[name=business_type]:checked').data('value') });
            _data.push({name : "business_style_id", value : $('input[name=business_style_id]:checked').data('value') });

            $('.general_docs').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "document_id[]", value: $(this).attr('id') });
                    _data.push({ name: "document_type[]", value: $(this).data('document-type') });
                }
            });

            $('.supporting_docs').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "document_id[]", value: $(this).attr('id') });
                    _data.push({ name: "document_type[]", value: $(this).data('document-type') });
                }
            });

            $('.previous_returns').each(function(){
                if ($(this).is(':checked')){
                    _data.push({ name: "previous_id[]", value: $(this).attr('id') });
                    _data.push({ name: "pr_document_type_id[]", value: $(this).data('document-type') });
                }
            });

            $('.txt-pr').each(function(){
                if ($('#'+$(this).attr('id')).val() != "") {
                    _data.push({ name: "value[]", value: $('#'+$(this).attr('id')).val() });
                }
            });

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
