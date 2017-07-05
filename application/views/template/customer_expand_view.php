
<div id="customer_expand_<?php echo $contract_id; ?>" style="padding: 1%;border: 1px solid darkgray;margin: 1%;">

    <div class="row">

        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-7">
                    <h4 style="margin-top: 0px;"><b>Company Profile</b></h4><hr />


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

                <div class="col-lg-5">


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

        <div class="col-lg-7">
            <div class="tab-container tab-default tab-default">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#documents_<?php echo $contract_id; ?>" data-toggle="tab"><i class="fa fa-bars"></i> Documents</a></li>
                    <li class=""><a href="#services_<?php echo $contract_id; ?>" data-toggle="tab"><i class="fa fa-bars"></i> Services</a></li>
                    <li class=""><a href="#search_files_<?php echo $contract_id; ?>" data-toggle="tab"><i class="fa fa-bars"></i> Manage Uploaded Files</a></li>
                    <li class=""><a href="#fee_template_<?php echo $contract_id; ?>" data-toggle="tab"><i class="fa fa-bars"></i> Fees </a></li>


                </ul>
                <div class="tab-content">


                    <div class="tab-pane active" id="documents_<?php echo $contract_id; ?>" style="min-height: 250px;">

                        <table id="tbl_documents_<?php echo $contract_id; ?>" class="custom-design table-striped"  cellspacing="0" width="100%">

                            <thead>
                            <tr>

                                <th width="20%">Document type</th>
                                <th width="40%">Description</th>
                                <th width="15%">Submitted</th>
                                <th width="10%" style="text-align: center;"><i class="fa fa-paperclip"></th>
                                <th width="15%" style="text-align: center;">Upload</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($documents as $document){ ?>
                                <tr>
                                    <td><?php echo $document->document_type; ?></td>
                                    <td><?php echo $document->document_type_description; ?></td>
                                    <td align="center"><a href="#" id="link_doc_type_status" class="" data-contract-id="<?php echo $contract_id; ?>" data-document-type-id="<?php echo $document->document_type_id; ?>"><i class="fa fa-<?php echo ($document->doc_type_stat>0?"check":"times"); ?>-circle" style="color: <?php echo ($document->doc_type_stat>0?"#4caf50":"#f44336"); ?>; font-size: 12px;"></i></a></td>
                                    <td align="right"><?php echo number_format($document->documents_count,0); ?> File(s)</i></td>
                                    <td align="center" width="5%"><a href="" id="link_upload" class="" data-contract-id="<?php echo $contract_id; ?>" data-document-type-id="<?php echo $document->document_type_id; ?>"><i class="fa fa-upload" style="color:#2196f3;"></i></a></td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane " id="services_<?php echo $contract_id; ?>" style="min-height: 250px;">

                        <table id="tbl_services_<?php echo $contract_id; ?>" class="custom-design table-striped"  cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Service</th>
                                <th>Description</th>
                                <th style="text-align: right;">Service Fee</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($services as $service){ ?>
                                <tr>
                                    <td><?php echo $service->service_name; ?></td>
                                    <td><?php echo $service->service_description; ?></td>
                                    <td style="text-align: right;">na</td>
                                    <td align="center"><a href="" id="link_status" data-contract-id="<?php echo $contract_id; ?>"  data-service-id="<?php echo $service->service_id; ?>"><i class="fa fa-<?php echo ($service->stat==1?'check':'times'); ?>-circle" style="color: <?php echo ($service->stat==1?'green':'red'); ?>;"></i></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="tab-pane " id="search_files_<?php echo $contract_id; ?>" style="min-height: 250px;">

                        <table id="tbl_search_files_<?php echo $contract_id; ?>" class="custom-design table-striped table-files-class"  cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Filename</th>
                                <th>Document</th>
                                <th>Upload Date</th>
                                <th>Upload by</th>
                                <th>Delete</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($customer_files as $customer_file){ ?>
                                <tr>

                                    <td><?php echo $customer_file->document_filename; ?></td>
                                    <td><?php echo $customer_file->document_type; ?></td>
                                    <td><?php echo $customer_file->date_posted; ?></td>
                                    <td><?php echo $customer_file->user_name; ?></td>
                                    <td align="center"><a href="" id="link_delete" data-file-id="<?php echo $customer_file->customer_file_id; ?>"><i class="fa fa-trash" style="color:black;"></i></a></td>
                                    <td align="center"><a href="https://docs.google.com/viewerng/viewer?url=<?php echo base_url($customer_file->document_path); ?>" target="_blank" id="link_search" data-file-id="<?php echo $customer_file->customer_file_id; ?>"><i class="fa fa-search" style="color:blue;"></i></a></td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>


                    <div class="tab-pane " id="fee_template_<?php echo $contract_id; ?>" style="min-height: 250px;">
                        <br />

                            <button id="btn_save_fees" class="btn btn-primary" data-contract-id="<?php echo $contract_id; ?>" style="border:1px solid black;text-transform: none;margin-bottom: 1%;"><i class="fa fa-save"></i> <span class=""></span> Save this Fees</button>

                        <form>
                            <table id="tbl_fees_<?php echo $contract_id; ?>" class="custom-design table-striped table-files-class"  cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th width="30%">Item</th>
                                    <th width="50%">Description</th>
                                    <th width="20%">Amount</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($fees as $fee){ ?>
                                    <tr>
                                        <td style="display: none;"><input type="hidden" name="charge_id[]" value="<?php echo $fee->charge_id; ?>"></td>
                                        <td><?php echo $fee->charge_name; ?></td>
                                        <td><?php echo $fee->charge_description; ?></td>
                                        <td align="right"><input type="text" name="charge_amount[]" class="form-control numeric" style="text-align: right" value="<?php echo number_format($fee->charge_amount,2); ?>"></th>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>