<div id="customer_expand_<?php echo $customer_id; ?>" style="padding: 1%;border: 1px solid darkgray;margin: 1%;">

    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-xs-12 col-lg-5">
                                <h4 style="margin-top: 0px;"><b>Company Profile</b></h4><hr />
                            </div>
                            <div class="col-xs-12 col-lg-7">
                                <h4 style="margin-top: 0px;"><b>Current Contracts Associated to <?php echo $customer_info[0]->company_name;?></b></h4><hr />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-3">
                        Company / Client name : <br />
                        <b style="font-size: 16px;"><?php echo $customer_info[0]->company_name; ?></b>

                        <br /><br />

                        Trade name : <br />
                        <b style="font-size: 16px;"><?php echo $customer_info[0]->trade_name; ?></b>

                        <br /><br />

                        Office Address : <br />
                        <?php echo $customer_info[0]->office_address; ?>

                        <br /><br />
                        Billing Address : <br />
                        <?php echo $customer_info[0]->billing_address; ?>

                        <br /><br />
                        Contact Person : <br />
                        <?php echo $customer_info[0]->contact_person; ?>

                        <br /><br />
                        Designation : <br />
                        <?php echo $customer_info[0]->designation; ?>

                        <br /><br />
                        Tax type : <br />
                        <?php echo $customer_info[0]->tax_type; ?>
                    </div>
                    <div class="col-xs-12 col-lg-2">
                        <img class="img-responsive image" style="border: 1px solid #aaa;" name="img_customer_photo" src="<?php echo $customer_info[0]->photo_path; ?>" alt="Image" width="100%">

                        <br /><br />
                        Contact No. : <br />
                        <b><?php echo $customer_info[0]->contact_no; ?></b>

                        <br /><br />
                        Email : <br />
                        <?php echo $customer_info[0]->email_address; ?>
                    </div>
                    <div class="col-xs-12 col-lg-7">
                        <table id="tbl_contract_<?php echo $customer_id; ?>" class="table-striped custom-design" width="100%">
                            <thead style="border: 1px solid #aaa;">
                                <tr>
                                    <td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Contract #</strong></td>
                                    <td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Date Start</strong></td>
                                    <td style="padding: 5px; border-right: 1px solid #aaa;text-align: right;"><strong>Retainer's Fee</strong></td>
                                    <td width="5%" style="padding: 5px;"><center><strong>Status</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($customer_contracts as $customer_contract) { ?>
                                    <tr>
                                        <td><?php echo $customer_contract->contract_no; ?></td>
                                        <td><?php echo $customer_contract->date_started; ?></td>
                                        <td style="text-align: right;"><?php echo number_format($customer_contract->charge_amount,2); ?></td>
                                        <td><center><?php echo ($customer_contract->is_active == FALSE ? '<i class="fa fa-times-circle" style="color: red;"></i>' : '<i class="fa fa-check-circle" style="color: green;"></i>') ?></center></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
