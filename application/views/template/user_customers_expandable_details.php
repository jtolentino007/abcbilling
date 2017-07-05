<div style="padding: 0% 3% 0% 3%;">
	<h4 style="float: left;"><i class="fa fa-users"></i>&nbsp;Clients Affiliated to <strong><?php echo $user_info->user_fname.' '.$user_info->user_lname; ?></strong></h4>
	<table id="tbl_customers_<?php echo $user_info->user_id; ?>" class="table-striped custom-design" width="100%">
		<hr style="border: 1px solid transparent;">
		<thead style="border: 1px solid #aaa;">
			<tr>
				<td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Client Name</strong></td>
				<td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Trade Name</strong></td>
				<td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Office Address</strong></td>
				<td style="padding: 5px; border-right: 1px solid #aaa;"><strong>Contact Person</strong></td>
				<td width="5%"><strong><center>Affiliated?</center></strong></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($customers as $customer) { ?>
				<tr>
					<td><?php echo $customer->company_name; ?></td>
					<td><?php echo $customer->trade_name; ?></td>
					<td><?php echo $customer->office_address; ?></td>
					<td><?php echo $customer->contact_person; ?></td>
					<td><center><button name="btn_assign" type="button" class="btn <?php echo ($customer->is_assign==1 ? 'btn-success' : 'btn-danger'); ?>" value="<?php echo $customer->customer_id; ?>"><i class="<?php echo ($customer->is_assign==1 ? 'fa fa-check' : 'fa fa-times'); ?>"></i></button></center></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>