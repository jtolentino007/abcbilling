<?php foreach($previous_fees as $fee){ ?>

    <tr>
        <td><?php echo $fee->charge_name; ?><input type="hidden" name="beginning_balance_charge_id[]" value="<?php echo $fee->charge_id; ?>" readonly></td>
        <td><a href="#" style="text-decoration: underline;">SOA # <?php echo $fee->billing_no; ?></a></td>
        <td><input name="beginning_balance_description[]" class="form-control" value="SOA # <?php echo $fee->billing_no; ?> (<?php echo $fee->date_billed; ?>-<?php echo $fee->date_due; ?>)" /></td>
        <td align="right"><input name="beginning_balance_remaining[]" class="form-control numeric" value="<?php echo number_format($fee->remaining_balance,2); ?>" style="text-align: right;" /></td>
        <td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>

    </tr>



<?php } ?>