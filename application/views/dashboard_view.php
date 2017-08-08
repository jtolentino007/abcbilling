<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


   <?php echo $_def_css_files; ?>

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <style>
        .panel-bg-blue {
            background: -moz-linear-gradient(206deg, #319ef4 0%, #319ef4 22%, #0c85e6 66%, #0b73c5 100%); /* ff3.6+ */
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #0b73c5), color-stop(34%, #0c85e6), color-stop(78%, #319ef4), color-stop(100%, #319ef4)); /* safari4+,chrome */
            background: -webkit-linear-gradient(206deg, #319ef4 0%, #319ef4 22%, #0c85e6 66%, #0b73c5 100%); /* safari5.1+,chrome10+ */
            background: -o-linear-gradient(206deg, #319ef4 0%, #319ef4 22%, #0c85e6 66%, #0b73c5 100%); /* opera 11.10+ */
            background: -ms-linear-gradient(206deg, #319ef4 0%, #319ef4 22%, #0c85e6 66%, #0b73c5 100%); /* ie10+ */
            background: linear-gradient(244deg, #319ef4 0%, #319ef4 22%, #0c85e6 66%, #0b73c5 100%); /* w3c */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0b73c5', endColorstr='#319ef4',GradientType=1 ); /* ie6-9 */
        }

        .panel-bg-red {
            background: -moz-linear-gradient(206deg, #f55246 0%, #f55246 22%, #f55246 65%, #f44336 100%); /* ff3.6+ */
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #f44336), color-stop(35%, #f55246), color-stop(78%, #f55246), color-stop(100%, #f55246)); /* safari4+,chrome */
            background: -webkit-linear-gradient(206deg, #f55246 0%, #f55246 22%, #f55246 65%, #f44336 100%); /* safari5.1+,chrome10+ */
            background: -o-linear-gradient(206deg, #f55246 0%, #f55246 22%, #f55246 65%, #f44336 100%); /* opera 11.10+ */
            background: -ms-linear-gradient(206deg, #f55246 0%, #f55246 22%, #f55246 65%, #f44336 100%); /* ie10+ */
            background: linear-gradient(244deg, #f55246 0%, #f55246 22%, #f55246 65%, #f44336 100%); /* w3c */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f44336', endColorstr='#f55246',GradientType=1 ); /* ie6-9 */
        }

        .panel-bg-green {
           background: rgba(119,41,158,1);
            background: -moz-linear-gradient(left, rgba(119,41,158,1) 0%, rgba(136,40,184,1) 55%, rgba(173,30,245,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(119,41,158,1)), color-stop(55%, rgba(136,40,184,1)), color-stop(100%, rgba(173,30,245,1)));
            background: -webkit-linear-gradient(left, rgba(119,41,158,1) 0%, rgba(136,40,184,1) 55%, rgba(173,30,245,1) 100%);
            background: -o-linear-gradient(left, rgba(119,41,158,1) 0%, rgba(136,40,184,1) 55%, rgba(173,30,245,1) 100%);
            background: -ms-linear-gradient(left, rgba(119,41,158,1) 0%, rgba(136,40,184,1) 55%, rgba(173,30,245,1) 100%);
            background: linear-gradient(to right, rgba(119,41,158,1) 0%, rgba(136,40,184,1) 55%, rgba(173,30,245,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#77299e', endColorstr='#ad1ef5', GradientType=1 );
        }

        .panel-bg-light-blue {
            background: rgba(255,146,10,1);
            background: -moz-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,146,10,1)), color-stop(100%, rgba(255,175,75,1)));
            background: -webkit-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 100%);
            background: -o-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 100%);
            background: -ms-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 100%);
            background: linear-gradient(to right, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff920a', endColorstr='#ffaf4b', GradientType=1 );
        }
    </style>


    <style>
    html {
        zoom: 85%;
    }

    body {
        font-family: 'Source Sans Pro', 'Segoe UI', 'Droid Sans', Tahoma, Arial, sans-serif!important;
        overflow-x: hidden;
    }

    .progress {height: 20px; border-radius: 10px; background: #c8c8c8;}

    .progress-bar { 
        background: #4caf50;
    }

    .group-box-header {
        background: #4caf50; 
        padding: 2px 15px 2px 15px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .group-box {
        padding: 20px;
        background: white;
        border: 1px solid #d1d1d1;
    }

    div.dataTables_filter input {
        border: 1px solid #c8c8c8;
        background: transparent!important;
        border-radius: 0;
    }
    
    table, td  {
        /*border: 1px solid #e1e1e1!important;*/
        border: none;
        vertical-align: middle!important;
    }

    th {
        background: #c1e4c2!important;
        border: 1px solid #c8c8c8!important;
        border-bottom: 3px solid #a9daab!important;
    }

    
    tr:nth-child(even) {
        background: #f3f3f3;
    }

    tr:hover {
        background: #d9eed9;
    }

    table {
        border: 1px solid #e1e1e1!important;
    }

    .transparent-bg {
        box-shadow: none;
        background: rgba(0, 0, 0, .2)!important;
    }

    .modal-dialog {
      width: 95%;
      margin: 0;
      padding-top: 20px;
      padding-left: 100px;
    }

    @media only screen and (max-width: 600px) {
      .modal-dialog {
        padding: 5px;
      }
    }

    .modal-content {
      height: auto;
      min-height: 100%;
      border-radius: 0;
    }

        margin-bottom: 0;
    }

    .tile {
        width: 100%;
        background: #ffffff;
        border: 1px solid #d1d1d1;
        /*border-top: 3px solid #03a9f4;*/
        -webkit-box-shadow: -1px 1px 5px -1px rgba(143,143,143,1);
        -moz-box-shadow: -1px 1px 5px -1px rgba(143,143,143,1);
        box-shadow: -1px 1px 5px -1px rgba(143,143,143,1);
    }

    .tile:hover {
        background: #03a9f4;
        /*border-top: 3px solid transparent;*/
        color: white;
        transition: .80s;
        transform: rotateX(360deg);
    }

    .tile:hover .tile-text {
        color: white;
    }

    .tile-text {
        color: #03a9f4;
        font-weight: 600;
    }

    .tile-icon {
        font-size: 90px;
    }

    .toolbar{
        float: left;
    }

    .panel {
        border-radius: 0;
        border: none;
        /*margin: 0;
        -webkit-box-shadow: 0px 0px 7px 1px rgba(161,161,161,1);
        -moz-box-shadow: 0px 0px 7px 1px rgba(161,161,161,1);
        box-shadow: 0px 0px 7px 1px rgba(161,161,161,1);*/
    }

    hr {
        margin-top: 0;
        margin-bottom: 0;
        border: none;
        height: 3px;
        color: #fff; /* old IE */
        background-color: #fff; /* Modern Browsers */
    }

    h3 {
        margin-top: 0;
        margin-bottom: 0;
    }

    .col-md-3 {
        padding-left: 0;
    }

    .panel-footer,
    .panel-body {
        padding: 20px!important; 
        border-top: 0;
        border-radius: 0!important;
    }

    .btn-white {
        background: white none repeat scroll 0 0;   
        border: 1px solid #e7eaec;
        color: inherit;
        text-transform: none;
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
        <?php echo $_side_bar_navigation;?>
            <div class="static-content-wrapper">
                <div class="static-content">
                    <div class="page-content"  style="padding: 0 20px 0 20px;"><!-- #page-content -->
                        <?php echo $_chat_template; ?>
                        <div class="row" style="margin-bottom: 0;">
                            <div class="container-fluid">
                                <div style="padding: 0 15px 0 15px;">

                    
                     
                                    <h1 style="font-weight: 350; font-size: 60px;">Overview</h1>
                                    <div style="margin-bottom: 5px;">
                                        <div class="container-fluid">
                                            <div class="col-xs-12 col-sm-6">
                                                <h3 style="font-weight: 200;">Hi <strong><?php echo $this->session->user_fullname; ?></strong>,
                                                <?php echo
                                                    ($this->session->user_group_id == 1 ? 'here&#39;s a rundown of your business performance and how your collections are doing individually.' : 'here&#39;s a rundown of your performance and how your collections are doing individually.')
                                                ?></h3> 
                                            </div>  
                                            <?php if ($this->session->user_group_id == 1) { ?>
                                            <div class="col-xs-12 col-sm-3">
                                                <button id="btn_generate" class="btn btn-primary btn-block" style="font-size: 20px; font-weight: 200; border-radius: 10px; margin-top: 5px;">
                                                    Generate Billing Report
                                                </button>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <select id="cbo_month" class="form-control" style="font-size: 20px; font-weight: 200; height: 40px; background: transparent; margin-top: 5px;">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 15px;">
                                        <div class="container-fluid">
                                            <div class="col-xs-12 col-sm-3">
                                                <span style="font-size: 800%; font-weight: 200;"><?php echo number_format($collection_percentage->pc,0); ?>%</span><br>
                                                <h3 style="font-weight: 100;">Collection for this month</h3>
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <canvas id="lineChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body panel-bg-blue">
                                               <h1 class="text-right" style="color: white; font-size: 40px;"><i class="ti ti-user"></i></h1>
                                               <hr>
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-md-10">
                                                            <h1 style="color: white; font-size: 50px; margin-bottom: 0; margin-top: 0;"><?php echo ($this->session->user_group_id == 1 ? (string)$users_count->user_count : (string)$customers_count->customer_count) ?>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                               <h4 style="color: white; font-weight: 200; margin-top: 0; margin-bottom: 0;">
                                                    <?php echo ($this->session->user_group_id == 1 ? 'Users' : 'Clients') ?>
                                               </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body panel-bg-red">
                                               <h1 class="text-right" style="color: white; font-size: 40px;"><i class="ti ti-settings"></i></h1>
                                               <hr>
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-md-10">
                                                            <h1 style="color: white; font-size: 50px; margin-bottom: 0; margin-top: 0;">
                                                                <?php echo $service_count->total_service_count; ?>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                               <h4 style="color: white; font-weight: 200; margin-top: 0; margin-bottom: 0;">
                                                    Total Services
                                               </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body panel-bg-green">
                                               <h1 class="pull-left" style="color: white; font-size: 25px;"></h1>
                                               <h1 class="text-right" style="color: white; font-size: 40px;">#</h1>
                                               <hr>
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-md-10">
                                                            <h1 style="color: white; font-size: 50px; margin-bottom: 0; margin-top: 0;"><?php echo $unpaid_billing->unpaid_count; ?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                               <h4 style="color: white; font-weight: 200; margin-top: 0; margin-bottom: 0;">Total Unpaid billing this month</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body panel-bg-light-blue">
                                               <h1 class="text-right" style="color: white; font-size: 40px;">&#8369;</h1>
                                               <hr>
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-md-10">
                                                            <h1 style="color: white; font-size: 50px; margin-bottom: 0; margin-top: 0;"><?php echo number_format($collection_amount->total_billing_amount,2); ?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                               <h4 style="color: white; font-weight: 200; margin-top: 0; margin-bottom: 0;">Collection this month</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="container-fluid">
                                    <div style="padding: 0 15px 0 5px;">
                                        <div class="col-xs-12 col-sm-8" style="padding: 7px;">
                                            <div class="group-box-header">
                                                <h4 style="color: white;"><i class="fa fa-user"></i> CLIENTS ACCOMPLISHMENTS STATUS</h4>
                                            </div>
                                            <div class="container-fluid group-box">
                                                <h4 style="position: absolute; top: 75px; right:230px;">SEARCH :</h4>
                                                <table id="tbl_clients" class="table" width="100%" style="min-height: 360px; max-height: 395px;">
                                                    <thead>
                                                        <th width="25%">CLIENT NAME</th>
                                                        <th width="20%">CONTACT PERSON</th>
                                                        <th width="10%">CONTACT #</th>
                                                        <th width="30%">PROGRESS</th>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4" style="padding: 7px;">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                     <h4 style="color: white;"><i class="fa fa-newspaper-o"></i> ACTIVITIES FEED</h4>
                                                </div>
                                                <div class="panel-body" style="padding: 0 0 5px 0!important; max-height: 935px; overflow-y: scroll;min-height: 300px;">
                                                <?php if ($this->session->user_group_id == 1) { ?>
                                                    <?php foreach($newsfeeds as $newsfeed) { ?>
                                                        <div class="container-fluid" style="border: 1px dashed #e2e2e2;padding: 10px;">
                                                            <div class="col-xs-12 col-sm-2">
                                                                <img src="<?php echo ($newsfeed->photo_path == null ? 'assets/img/default-user-image.png' : '$newsfeed->photo_path') ?>" width="55" height="50" style="border-radius: 50%;">
                                                            </div>
                                                            <div class="col-xs-12 col-sm-10">
                                                                <strong><span style="text-transform: uppercase;"><?php echo $newsfeed->user; ?></span></strong><br>
                                                                <span><?php echo $newsfeed->description; ?></span><br>
                                                                <i><?php echo $newsfeed->date; ?></i>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { echo "<div class='container-fluid text-center'><h3>Activities feed not available</h3></div>"; } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- #page-content -->
                </div>
                <footer role="contentinfo">
                    <div class="clearfix">
                        <ul class="list-unstyled list-inline pull-left">
                            <li><h6 style="margin: 0;">&copy; JDEV IT BUSINESS SOLUTIONS</h6></li>
                        </ul>
                        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                    </div>
                </footer>
            </div>
        </div>
</div>



<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- CHART -->
<script src="assets/plugins/chartJs/Chart.min.js"></script>

<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<!-- <script>
    var ctx3 = document.getElementById('barChart');
    ctx3.height = 300;
    var dataBar = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Summary",
                backgroundColor: [
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd',
                    '#60ccfd'
                ],
                borderColor: [
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4'
                ],
                borderWidth: 3,
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            }
        ]
    };
    var myBarChart = new Chart(ctx3, {
        type: "bar",
        data: dataBar,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script> -->

<script>
    var ctx2 = document.getElementById("lineChart");
    ctx2.height = 60;
    var dataLine = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "Collection",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 10,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: <?php echo json_encode($collections); ?>,
                spanGaps: false,
            }
        ]
    };

    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: dataLine
    });
</script>


<script>
    (function(){
        var dt;
        var currentTime = new Date();
        var year = currentTime.getFullYear();

        dt=$('#tbl_clients').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "language": {
                "searchPlaceholder": "Search Client"
            },
            "ajax":"Accomplishments/transaction/accomplishment-percentage/",
            "columns":[
                { targets:[0],data: "company_name" },
                { targets:[1],data: "contact_person" },
                { targets:[2],data: "contact_no" },
                { 
                    targets:[3],
                    render: function (data, type, full, meta){
                        return  '<div class="progress" style="margin-top:12px;">'+
                                    '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '+ accounting.formatNumber(full.percentage,2) +'%;">'+
                                         accounting.formatNumber(full.percentage,0) +'% Complete'
                                  '</div>'+
                                '</div>'
                    }
                }
            ]
        });

        var bindEventHandlers=function(){
            $('#btn_generate').click(function(){
                window.open('Service_invoices/transaction/print-all?m='+$('#cbo_month').val()+'&y='+year);
            });

        }();
    })();
</script>

<!-- DATATABLE -->
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
</body>
</html>
