<div class='mb-3'>
	<label>Brand Name:</label>
	<input type='text' class='form-control form-control-border' placeholder='Enter Brand Name' id='brand_name' name='brand_name' required>
	<div id="brand_name_msg"></div>
</div>
<div class='mb-3'>
	<label>Serial Number:</label>
	<input type='text' class='form-control form-control-border' placeholder='Enter Serial Number' id='serial_number' name='serial_number' required>
	<div id="serial_number_msg"></div>
</div>
<div class='mb-3'>
	<label>Model Number:</label>
	<input type='text' class='form-control form-control-border' placeholder='Enter Model Number' id='model_number' name='model_number' required>
	<div id="model_number_msg"></div>
</div>
<input type="hidden" value="1" name="purchased_quantity">
<!-- <div class='mb-3'>
	<label>Quantity Purchased:</label>
	<input type='number' class='form-control form-control-border' placeholder='Enter Quantity' id='purchased_quantity' name='purchased_quantity' required>
	<div id="purchased_quantity_msg"></div>
</div> -->

<div class="custom-control custom-switch mb-3">
	<input type="checkbox" class="custom-control-input" id="cable_detail" name="cable_detail" value="1">
	<label class="custom-control-label" for="cable_detail">Is Cables Available</label>
</div>

<div id="cable_detail_container"></div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#cable_detail').on('change', function(){
				if($('#cable_detail').is(':checked')) {
					$('#cable_detail_container').html('<div class="mb-3 table-responsive"><table class="table table-striped table-hover" id="cable_detail_table"><tr><td>Cable Type</td><td>Quantity</td><td></td></tr><tr><td><select class="form-control form-control-border" name="cable_type[]" required><option value="">Select Cable Type</option><option value="HDMI">HDMI</option><option value="VGA">VGA</option><option value="POWER">Power Cable</option><option value="PRINTER">Printer Cable</option></select><div class="cable_type_msg"></div></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Cable Quantity" name="cable_qty[]" required><div class="cable_qty_msg"></div></td><td><button class="btn btn-primary btn-sm cable_add_btn" type="button">+</button></td></tr></table></div>');
				} else {
					$('#cable_detail_container').html('');
				}
			});

		$(document).on('click', '.cable_add_btn', function(){
			console.log('This');
			$('#cable_detail_table').append('<tr><td><select class="form-control form-control-border" name="cable_type[]" required><option value="">Select Cable Type</option><option value="HDMI">HDMI</option><option value="VGA">VGA</option><option value="POWER">Power Cable</option><option value="PRINTER">Printer Cable</option></select><div class="cable_type_msg"></div></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Cable Quantity" name="cable_qty[]" required><div class="cable_qty_msg"></div></td><td><button class="btn btn-danger btn-sm cable_delete_btn" type="button">x</button></td></tr>');
		});
		$(document).on('click', '.cable_delete_btn', function(){
			$(this).parents('tr').remove();
		});

	});

</script>