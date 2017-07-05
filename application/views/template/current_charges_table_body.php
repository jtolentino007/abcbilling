<?php foreach($fees as $fee){ ?>
<tr>
    <td><?php echo $fee->charge_name; ?><input name="current_charge_id[]" type="hidden" value="<?php echo $fee->charge_id; ?>" readonly></td>
    <td><input name="current_charge_description[]" class="form-control" value="<?php echo $fee->charge_description; ?>" /></td>
    <td align="right"><input name="current_charge_amount[]" class="form-control numeric" value="<?php echo number_format($fee->amount,2); ?>" style="text-align: right;" /></td>
    <td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>
</tr>
<?php } ?>