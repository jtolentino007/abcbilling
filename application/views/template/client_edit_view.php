                                    <h3 class="panel-title panel-heading-01" >DOCUMENTS PROVIDED</h3>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="col-lg-4">
                                    <br>
                                    General Documents: <br>
                                        <div class="container-checkbox">
                                            <div style="padding: 5px 5px 5px 5px;">



<!--                                             <?php foreach ($documents as $key ) {?>
                                                  <input type="checkbox" class="documents" id="<?php echo $key->document_type_id;?>gd" data-value="<?php echo $key->document_type_id;?>">
                                                  <label for="<?php echo $key->document_type_id;?>gd"><?php echo $key->document_type;?></label>
                                              <br>
                                            <?php } ?>
 -->

                                            <?php  foreach ($documents as $key) { ?>
                                                <input type="checkbox" class="documents" id="<?php echo $key->document_type_id;?>gd" data-value="<?php echo $key->document_type_id;?>" value="<?php echo $key->document_type_id ?>"
                                                    <?php foreach($checked as $k => $cur)
                                                    {
                                                        if ($key->document_type_id == $cur->document_id ){
                                                            echo $selected = 'checked';
                                                        }
                                                    }
                                                    ?>
                                                >
                                                 <label for="<?php echo $key->document_type_id;?>gd"><?php echo $key->document_type;?></label>
                                                 <br>
                                            <?php } ?>






                                            </div>
                                        </div><br>
                                    Supporting Documents <br>
                                        <input type="checkbox" class="supporting" id="1sd" data-value="1">
                                            <label for="1sd">SSS, PHIC and HDMF Registration </label><br>
                                        <input type="checkbox" class="supporting" id="2sd" data-value="2">
                                            <label for="2sd">CTC </label>  <br>
                                        <input type="checkbox" class="supporting" id="3sd" data-value="3">
                                            <label for="3sd">Government ID of Owner/Signatory/OIC (atleast 2)</label><br>
                                    </div>
                                    <div class="col-lg-8">
                                    <br>
                                        <div class="col-sm-12 col-lg-12">
                                         Previous Returns: <br>
                                         <table width="100%" border="0" style="border: none!important;">
                                         <tr class="pr-return">
                                         <td>
                                            <input type="checkbox" class="previous" id-post="1" name="checkbox1pr" id="1pr" data-value="1" >
                                            <label for="1pr">Latest Income Tax Return <b>Year</b></label>
                                            
                                         </td>
                                         <td>
                                             <input type="text" dis="1pr" id="text1pr" class="bottom form-control pr-return-input" width="100%">
                                         </td>
                                         </tr>

                                         <tr class="pr-return">
                                            <td>
                                                <input type="checkbox" class="previous" id-post="2" name="checkbox2pr" id="2pr" data-value="2" style="padding-top: 1px;">
                                                <label for="2pr">Percentage Tax <b>Period</b> </label>
                                            </td>
                                            <td>
                                                <input type="text"  dis="2pr" class="bottom form-control pr-return-input" >
                                            </td>
                                         </tr>

                                        <tr class="pr-return">
                                            <td>
                                            <input type="checkbox" class="previous" id-post="3" name="checkbox3pr" id="3pr" data-value="3" style="padding-top: 1px;">
                                            <label for="3pr">Vat Return <b>Period</b></label>
                                            </td>
                                            <td>
                                            <input type="text" dis="3pr" class="bottom form-control pr-return-input" >
                                            </td>
                                         </tr>
                                         <tr class="pr-return">
                                             <td>
                                                <input type="checkbox" class="previous" id-post="4" name="checkbox4pr" id="4pr" data-value="4" style="padding-top: 1px;">
                                                <label for="4pr">Expanded WT <b>Period</b> </label>
                                            </td>
                                            <td>
                                            <input type="text" dis="4pr" class="bottom form-control  pr-return-input" >
                                            </td>
                                        </tr>
                                         <tr class="pr-return">
                                            <td>
                                            <input type="checkbox" class="previous" id-post="5" name="checkbox5pr" id="5pr" data-value="5" style="padding-top: 1px;">
                                            <label for="5pr">WT on  Compensation <b>Period</b></label>
                                            </td>
                                            <td>
                                                <input type="text" dis="5pr" class="bottom form-control  pr-return-input" >
                                            </td>
                                         </tr>

                                         <tr class="pr-return">
                                            <td>

                                            <input type="checkbox" class="previous"  id-post="6" name="checkbox6pr" id="6pr" data-value="6" style="padding-top: 1px;">
                                            <label for="6pr">Others:</label>
                                            </td>
                                            
                                            <td>
                                            <input type="text" dis="6pr" class="bottom form-control  pr-return-input" >
                                            </td>
                                         </tr>


                                         </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>







<?php 

$values = array_map('array_pop', $SD['document_id']);
$imploded = implode(',', $values);
print_r($SD);

?>