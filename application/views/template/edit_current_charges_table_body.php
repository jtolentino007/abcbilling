<?php foreach($billing_items as $items){ ?>
<tr>
    <td><?php echo $items->charge_name; ?><input name="current_charge_id[]" type="hidden" value="<?php echo $items->charge_id; ?>" readonly></td>
    <td><input name="current_charge_description[]" class="form-control" value="<?php echo $items->description; ?>" /></td>
    <td align="right"><input name="current_charge_amount[]" class="form-control numeric" value="<?php echo number_format($items->charge_line_total,2); ?>" style="text-align: right;" /></td>
    <td align="center"><button name="remove_charge" class="btn btn-default"><i class="fa fa-trash"></i></button></td>
</tr>
<?php } ?>