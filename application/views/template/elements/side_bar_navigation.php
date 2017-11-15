<style type="text/css">
    .static-sidebar-wrapper {
        transition: .2s;
    }

    .sidebar nav.widget-body > ul.acc-menu ul li a {
        padding: 8px 10px 8px 25px;
        border-left: 3px solid transparent;
    }

    .sidebar nav.widget-body > ul.acc-menu ul {
        padding: 0;
        width: 1000px;
    }

    .sidebar nav.widget-body > ul.acc-menu li.hasChild > a {
        width: 316px;
    }

    .sidebar nav.widget-body > ul.acc-menu ul, .sidebar nav.widget-body > ul.acc-menu ul li a {
        width: 260px;
    }

    .sidebar nav.widget-body > ul.acc-menu ul li a:hover {
        transition: .4s;
        border-left: 3px solid #2196f3;
    }
</style>
<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Explore</span></li>

                        <li><a href="Dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

                        <li class="<?php echo (in_array('1',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('1-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="document_category"><i class="fa fa-files-o"></i> Documents Category</a></li>
                                <li  class="<?php echo (in_array('1-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="documents"><i class="fa fa-file-o"></i> Documents Types</a></li>
                                <li class="<?php echo (in_array('1-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="categories"><i class="fa fa-cogs"></i> Services Category</a></li>
                                <li class="<?php echo (in_array('1-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="service_types"><i class="fa fa-cog"></i> Service Types</a></li>
                                <li class="<?php echo (in_array('1-6',$this->session->user_rights)?'':'hidden'); ?>"><a href="Business_style"><i class="fa fa-building-o"></i> Business Styles</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('4',$this->session->parent_rights)?'':'hidden'); ?>">
                            <a href="#"><i class="ti ti-agenda"></i><span>Transactions</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('4-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Accomplishments"><i class="fa fa-check"></i> Process Accomplishments</a></li>
                                <li class="<?php echo (in_array('4-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Advance_payment"><i class="fa fa-newspaper-o"></i> Advance Payments</a></li>
                                <li class="<?php echo (in_array('4-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Service_invoices"><i class="fa fa-bars"></i> Process Billing</a></li>
                                <li class="<?php echo (in_array('4-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Payments"><i class="fa fa-columns"></i> Collection Entry</a></li>
                                <li class="<?php echo (in_array('4-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="Cancelled_payments"><i class="fa fa-columns"></i> Cancelled Payments</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('2',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('2-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Clients"><i class="fa fa-user"></i> Client Management</a></li>
                                <li class="<?php echo (in_array('2-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Contracts"><i class="fa fa-file-text-o"></i> Contract Management</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('3',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-settings"></i><span>Settings</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('3-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Tax"><i class="fa fa-cube"></i> Tax Setup</a></li>
                                <li class="<?php echo (in_array('3-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="charges"><i class="fa fa-inbox"></i> Charges Setup</a></li>
                                <li class="<?php echo (in_array('3-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="User_groups"><i class="fa fa-code"></i> User Rights Management</a></li>
                                <li class="<?php echo (in_array('3-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="users"><i class="fa fa-group"></i> User Account Management</a></li>
                                <li class="<?php echo (in_array('3-6',$this->session->user_rights)?'':'hidden'); ?>"><a href="DBBackup"><i class="fa fa-database"></i> Backup Database</a></li>
                                <li class="<?php echo (in_array('3-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="company"><i class="fa fa-institution"></i> Company Info Setup</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('5',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-clipboard"></i><span>Reports</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('5-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Customer_ledger">Clients Ledger</a></li>
                                <li class="<?php echo (in_array('5-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Collection_report">Collection Report</a></li>
                                <li class="<?php echo (in_array('5-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Collection_notice"> Collection Notice</a></li>
                                <li class="<?php echo (in_array('5-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Client_summary_report"> Client Payment Summary</a></li>
                                <li class="<?php echo (in_array('5-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="Statement_of_account"> Statement of Account</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--<div class="widget" id="widget-progress">
                <div class="widget-heading">
                    Progress
                </div>
                <div class="widget-body">

                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Bandwidth</div>
                            <div class="pull-right">50%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Storage</div>
                            <div class="pull-right">25%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>
    </div>
</div>
