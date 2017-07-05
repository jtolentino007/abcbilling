<style type="text/css">
    .static-sidebar-wrapper {
        transition: .2s;
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

                        <!-- <li class="<?php echo (in_array('6',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-wallet"></i><span>Financing</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('6-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="General_journal">General Journal</a></li>
                                <li class="<?php echo (in_array('6-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Cash_disbursement">Cash Disbursement</a></li>
                            </ul>
                        </li> -->

                        <li class="<?php echo (in_array('1',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li  class="<?php echo (in_array('1-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="documents">Documents Management</a></li>
                                <li class="<?php echo (in_array('1-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="service_types">Service Types Management</a></li>
                                <li class="<?php echo (in_array('1-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="categories">Category Management</a></li>
                                <!-- <li class="<?php echo (in_array('1-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_classes">Account classes Management</a></li> -->
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('4',$this->session->parent_rights)?'':'hidden'); ?>">
                            <a href="#"><i class="ti ti-agenda"></i><span>Transactions</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('4-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Accomplishments">Process Accomplishments</a></li>
                                <li class="<?php echo (in_array('4-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Service_invoices">Process Billing</a></li>
                                <li class="<?php echo (in_array('4-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Payments">Collection Entry</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('2',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('2-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Clients">Client Management</a></li>
                               <!--  <li class="<?php echo (in_array('2-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Suppliers">Suppliers Management</a></li> -->
                                <li class="<?php echo (in_array('2-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Contracts">Contract Management</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('3',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-settings"></i><span>Settings</span></a>
                            <ul class="acc-menu">
                                <!-- <li class="<?php echo (in_array('3-7',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_titles">Chart of Accounts</a></li> -->
                                <li class="<?php echo (in_array('3-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Tax">Tax Setup</a></li>
                                <li class="<?php echo (in_array('3-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="charges">Charges Setup</a></li>
                                <li class="<?php echo (in_array('3-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="User_groups">User Rights Management</a></li>
                                <li class="<?php echo (in_array('3-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="users">User Account Management</a></li>
                                <li class="<?php echo (in_array('3-6',$this->session->user_rights)?'':'hidden'); ?>"><a href="DBBackup">Backup Database</a></li>
                                <li class="<?php echo (in_array('3-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="company">Company Info Setup</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('5',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-clipboard"></i><span>Reports</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('5-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Customer_ledger">Clients Ledger</a></li>
                                <li class="<?php echo (in_array('5-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Collection_report">Collection Report</a></li>
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
