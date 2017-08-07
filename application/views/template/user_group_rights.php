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
                            <form id="frm_user_group_rights_<?php echo $user_group_id; ?>">


                            <input type="hidden" name="user_group_id" value="<?php echo $user_group_id; ?>">

                            <span style="margin-left: 1%"><b><i class="fa fa-list"></i> User Group Rights</b></span>
                            <hr />
                            <div class="table-responsive">
                                <table id="tbl_user_group_rights" class="custom-design table-striped" style="background-color: white;" cellspacing="0" width="100%">
                                    <thead>
                                        <th width="40%">Access Description</th>
                                        <th width="10%" style="text-align: center;">Add</th>   
                                        <th width="10%" style="text-align: center;">Edit</th>                             
                                        <th width="10%" style="text-align: center;">Delete</th>   
                                        <th width="30%" style="text-align: center;"></th>   
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $t = $user_group_id; 
                                        foreach ($references as $reference) { ?>

                                        </tbody>
                                        <tr>
                                            <td>
                                            <input type="hidden" name="link_code[]" value="<?php echo $reference->link_code; ?>">
                                           <!--  <?php echo $reference->access_is_allowed ?> -->
                                            <input type="checkbox" name="access_code[]" class="selectall css-checkbox" id="<?php echo $t; ?><?php echo $reference->link_code; ?>" Value="<?php echo $reference->link_code; ?>" <?php echo ($reference->access_is_allowed == 1?' checked':''); ?> /> 
                                            <label for="<?php echo $t; ?><?php echo $reference->link_code; ?>" class="css-label ">  <?php echo $reference->link_name; ?>
                                            </label>
                                            
                                            </td>
                                            <td style="text-align: center;">
                                                <!-- <input type="hidden" name="link_code[]" value="<?php echo $reference->link_code; ?>"> -->

                                                <?php if ($reference->add_code == null){?> 
                                                <input type='hidden' name='add_code[]' value='0' />
                                                <?php }else { ?>
                                                    <input type="checkbox" name="add_code[]" id="<?php echo $t; ?><?php echo $reference->add_code; ?>" class="css-checkbox" value="<?php echo $reference->add_code; ?>" <?php echo ($reference->add_is_allowed == 1?' checked':''); ?>/>
                                                    <label for="<?php echo $t; ?><?php echo $reference->add_code; ?>" class="css-label ">
                                                     <!--     <?php echo $reference->add_is_allowed;?><?php echo $reference->add_code; ?> -->
                                                    </label>
                                                <?php } ?>
                                             </td>


                                             <td style="text-align: center;">
                                               <?php if ($reference->edit_code == null){?> 
                                                <input type='hidden' name='edit_code[]' value='0' />
                                                <?php }else { ?>
                                                    <input type="checkbox" name="edit_code[]" id="<?php echo $t; ?><?php echo $reference->edit_code; ?>" class="css-checkbox" value="<?php echo $reference->edit_code; ?>" <?php echo ($reference->edit_is_allowed == 1?' checked':''); ?>/>
                                                    <label for="<?php echo $t; ?><?php echo $reference->edit_code; ?>" class="css-label ">
                                                         <!-- <?php echo $reference->edit_is_allowed;?><?php echo $reference->edit_code; ?> -->
                                                    </label>
                                                <?php } ?>
                                             </td>

                                             <td style="text-align: center;">
                                              <?php if ($reference->delete_code == null){?> 
                                                <input type='hidden' name='delete_code[]' value='0' />
                                                <?php }else { ?>
                                                    <input type="checkbox" name="delete_code[]" id="<?php echo $t; ?><?php echo $reference->delete_code; ?>" class="css-checkbox" value="<?php echo $reference->delete_code; ?>" <?php echo ($reference->delete_is_allowed == 1?' checked':''); ?>/>
                                                    <label for="<?php echo $t; ?><?php echo $reference->delete_code; ?>" class="css-label ">
                                                         <!-- <?php echo $reference->delete_is_allowed;?><?php echo $reference->delete_code; ?> -->
                                                    </label>
                                                <?php } ?>
                                             <td>
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

