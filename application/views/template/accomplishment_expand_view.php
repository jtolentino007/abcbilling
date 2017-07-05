
<div id="customer_expand_<?php echo $customer_id; ?>" style="padding: 1%;border: 1px solid darkgray;margin: 1%;">


    <div class="row">
        <div class="col-lg-7">
            <h4 style="margin-top: 0px;">Completed Services</h4><hr />

            <table id="tbl_services_<?php echo $customer_id; ?>" width="100%" class="custom-design table-striped">

                <thead>
                <tr>
                    <th width="25%">Service</th>
                    <th width="40%">Narration</th>
                    <th width="25%">Date Completed</th>
                    <th width="10%" style="text-align: center;">Completed</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($services as $service){  ?>

                    <tr>
                        <td><?php echo $service->service_name;  ?></td>
                        <td><?php echo $service->narration;  ?></td>
                        <td><?php echo $service->date_accomplished;;  ?></td>
                        <td align="center"><a href="#" id="link_accomplished" data-customer-id="<?php echo $customer_id; ?>" data-service-id="<?php echo $service->service_id; ?>"><i class="fa fa-<?php echo ($service->status?'check':'times'); ?>-circle" style="color: <?php echo ($service->status?'green':'red'); ?>"></i></a> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-5">

            <div class="row">
                <div class="col-lg-7">
                    <h4 style="margin-top: 0px;">Company / Client Profile</h4><hr />


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
                    Vatted

                </div>

                <div class="col-lg-5">

                    <br /><br /><br /><br />
                    <img class="img-responsive image" name="img_customer_photo" src="<?php echo $customer_info[0]->photo_path; ?>" alt="Image" width="100%">

                    <br /><br />
                    Contact No. : <br />
                    <b><?php echo $customer_info[0]->contact_no; ?></b>

                    <br /><br />
                    Email : <br />
                    <?php echo $customer_info[0]->email_address; ?>
                </div>
            </div>




        </div>
    </div>

    <hr />


</div>