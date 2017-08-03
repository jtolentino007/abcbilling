<center>
    <table width="100%" style="font-family: tahoma;">
        <tbody>
        <tr>
            <td>
                <br />

                <div class="tab-container tab-top tab-default">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#user_rights_<?php echo $user_group_id; ?>" data-toggle="tab"><i class="fa fa-users"></i> Information</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="user_rights_<?php echo $user_group_id; ?>" style="min-height: 300px;">
                            <?php echo $user_group_id; ?>
                            <form id="frm_user_group_rights_<?php echo $user_group_id; ?>">

                            <input type="hidden" name="user_group_id" value="<?php echo $user_group_id; ?>">

                            <span style="margin-left: 1%"><b><i class="fa fa-list"></i> User Group Rights</b></span>
                            <hr />
                            <div class="table-responsive">
                                <table id="tbl_user_group_rights" class="custom-design table-striped" style="background-color: white;" cellspacing="0" width="100%">
                                    <thead>
                                        <th width="80%">Description</th>
                                        <th width="20%" style="text-align: center;">Permission</th>                             
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $t = $user_group_id; 
                                        foreach ($references as $reference) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $reference->link_name; ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="link_code[]" value="<?php echo $reference->link_code; ?>">
                                                <input type="checkbox" name="add_code[]" id="<?php echo $t; ?><?php echo $reference->link_code; ?>" class="css-checkbox" value="<?php echo $reference->add_code; ?>" <?php echo ($reference->add_is_allowed == 1?' checked':''); ?>/>
                                                <label for="<?php echo
                                                     $t; ?><?php echo $reference->link_code; ?>" class="css-label "><?php echo $reference->add_is_allowed;?><?php echo $reference->add_code; ?></label>
                                             </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>

                            </form>


                            <hr />
                            <div class="row">
                                <div class="col-lg-12">

                                    <button id="btn_user_group_rights_<?php echo $user_group_id; ?>" class="<?php echo (in_array('3-2-a',$this->session->user_rights)?'':'hidden'); ?> btn btn-primary <?php echo ($user_group_id==1?'disabled':''); ?>" style="text-transform: none;"><i class="fa fa-check-circle"></i><span class=""></span> Save User Group Rights</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </td>
        </tr>
        </tbody>

    </table>
</center>

