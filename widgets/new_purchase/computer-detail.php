<div class="mb-3">
	<label>Brand Name:</label>
	<input type="text" class="form-control form-control-border" placeholder="Enter Brand Name" id="brand_name" name="brand_name" required>
	<div id="brand_name_msg"></div>
</div>
<div class="mb-3">
	<label>Serial Number:</label>
	<input type="text" class="form-control form-control-border" placeholder="Enter Serial Number" id="serial_number" name="serial_number" required>
	<div id="serial_number_msg"></div>
</div>
<div class="mb-3">
	<label>Model Number:</label>
	<input type="text" class="form-control form-control-border" placeholder="Enter Model Number" id="model_number" name="model_number" required>
	<div id="model_number_msg"></div>
</div>
<div class="mb-3">
	<label>Processor:</label>
	<input type="text" class="form-control form-control-border" placeholder="Enter Processor Detail Cores & GHz" id="processor_detail" name="processor_detail" required>
	<div id="processor_detail_msg"></div>
</div>
<div class="mb-3">
	<label>Number of Power Supply:</label>
	<input type="text" class="form-control form-control-border" placeholder="Enter Number of Power Supply" id="power_supply" name="power_supply" required>
	<div id="power_supply_msg"></div>
</div>
<div class="mb-3 table-responsive">
	<table class="table table-striped table-hover" id="ram_detail_table">
		<tr>
			<td>RAM Type</td>
			<td>RAM Size</td>
			<td>Quantity</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-light text-dark">DDR</span>
					</div>
					<input type="number" class="form-control form-control-border ram_type" placeholder="Enter RAM Type 2 or 3" name="ram_type[]" required>
					<div class="ram_type_msg"></div>
				</div>
			</td>
			<td>
				<div class="input-group">
					<input type="number" class="form-control form-control-border ram_size" placeholder="Enter RAM Size 2GB or 4GB or 6GB" name="ram_size[]" required>
					<div class="input-group-append">
						<span class="input-group-text bg-light text-dark">GB</span>
					</div>
					<div id="ram_size_msg"></div>
				</div>
			</td>
			<td>
				<input type="text" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="ram_qty[]" required>
				<div id="ram_qty_msg"></div>
			</td>
			<td><button class="btn btn-primary btn-sm ram_add_btn" type="button">+</button></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.ram_add_btn', function(){
			$('#ram_detail_table').append('<tr><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-light text-dark">DDR</span></div><input type="number" class="form-control form-control-border ram_type" placeholder="Enter RAM Type 2 or 3" name="ram_type[]" required><div class="ram_type_msg"></div></div></td><td><div class="input-group"><input type="number" class="form-control form-control-border ram_size" placeholder="Enter RAM Size 2GB or 4GB or 6GB" name="ram_size[]" required><div class="input-group-append"><span class="input-group-text bg-light text-dark">GB</span></div><div id="ram_size_msg"></div></div></td><td><input type="text" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="ram_qty[]" required><div id="ram_qty_msg"></div></td><td><button class="btn btn-danger btn-sm ram_delete_btn" type="button">x</button></td></tr>');
		});
		$(document).on('click', '.ram_delete_btn', function(){
			$(this).parents('tr').remove();
		});
	});
</script>


<div class="mb-3 table-responsive">
	<table class="table table-striped table-hover" id="rom_detail_table">
		<tr>
			<td>ROM Type</td>
			<td>ROM Size</td>
			<td>Quantity</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<select class="form-control form-control-border" name="rom_type[]" required>
					<option value="">Select ROM Type</option>
					<option value="HDD">HDD</option>
					<option value="SSD">SSD</option>
				</select>
				<div class="rom_type_msg"></div>
			</td>
			<td>
				<div class="input-group">
					<input type="text" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" name="rom_size[]" required>
					<div class="input-group-append">
						<span class="input-group-text bg-light text-dark">GB</span>
					</div>
					<div class="rom_size_msg"></div>
				</div>
			</td>
			<td>
				<input type="text" class="form-control form-control-border" placeholder="Enter ROM Quantity" name="rom_qty[]" required>
				<div class="rom_qty_msg"></div>
			</td>
			<td><button class="btn btn-primary btn-sm rom_add_btn" type="button">+</button></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.rom_add_btn', function(){
			$('#rom_detail_table').append('<tr><td><select class="form-control form-control-border" name="rom_type[]" required><option value="">Select ROM Type</option><option value="HDD">HDD</option><option value="SSD">SSD</option></select><div class="rom_type_msg"></div></td><td><div class="input-group"><input type="text" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" name="rom_size[]" required><div class="input-group-append"><span class="input-group-text bg-light text-dark">GB</span></div><div class="rom_size_msg"></div></div></td><td><input type="text" class="form-control form-control-border" name="rom_qty[]" placeholder="Enter ROM Quantity" required><div class="rom_qty_msg"></div></td><td><button class="btn btn-danger btn-sm rom_delete_btn" type="button">x</button></td></tr>');
		});
		$(document).on('click', '.rom_delete_btn', function(){
			$(this).parents('tr').remove();
		});
	});
</script>

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
			$('#cable_detail_table').append('<tr><td><select class="form-control form-control-border" name="cable_type[]" required><option value="">Select Cable Type</option><option value="HDMI">HDMI</option><option value="VGA">VGA</option><option value="POWER">Power Cable</option><option value="PRINTER">Printer Cable</option></select><div class="cable_type_msg"></div></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Cable Quantity" name="cable_qty[]" required><div class="cable_qty_msg"></div></td><td><button class="btn btn-danger btn-sm cable_delete_btn" type="button">x</button></td></tr>');
		});
		$(document).on('click', '.cable_delete_btn', function(){
			$(this).parents('tr').remove();
		});

	});

</script>

<div class="custom-control custom-switch mb-3">
	<input type="checkbox" class="custom-control-input" id="computer_screen_detail" name="computer_screen_detail" value="1">
	<label class="custom-control-label" for="computer_screen_detail">Is Computer Screen Available</label>
</div>

<div id="computer_screen_detail_container"></div>


<script type="text/javascript">
	
	$(document).ready(function(){

		$('#computer_screen_detail').on('change', function(){
			if($('#computer_screen_detail').is(':checked')) {
				$('#computer_screen_detail_container').html('<div class="mb-3 table-responsive"><table class="table table-striped table-hover" id="screen_detail_table"><tr><td>Brand Name</td><td>Serial Number</td><td>Model Number</td><td>Screen Dimensions</td><td>Quantity</td><td></td></tr><tr><td><input type="text" class="form-control form-control-border" placeholder="Enter Brand Name" name="screen_brand_name[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Serial Number" name="screen_serial_number[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Model Number" name="screen_model_number[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Screen Dimensions" name="screen_dimension[]"></td><td><button class="btn btn-primary btn-sm screen_add_btn" type="button">+</button></td></tr></table></div>');
			} else {
				$('#computer_screen_detail_container').html('');
			}
		});

		$(document).on('click', '.screen_add_btn', function(){
			$('#screen_detail_table').append('<tr><td><input type="text" class="form-control form-control-border" placeholder="Enter Brand Name" name="screen_brand_name[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Serial Number" name="screen_serial_number[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Model Number" name="screen_model_number[]" required></td><td><input type="text" class="form-control form-control-border" placeholder="Enter Screen Dimensions" name="screen_dimension[]"></td><td><button class="btn btn-danger btn-sm screen_delete_btn" type="button">x</button></td></tr>');
		});
		$(document).on('click', '.screen_delete_btn', function(){
			$(this).parents('tr').remove();
		});

	});

</script>


<div class="custom-control custom-switch mb-3">
	<input type="checkbox" class="custom-control-input" id="keyboard_detail" name="keyboard_detail" value="1">
	<label class="custom-control-label" for="keyboard_detail">Is Keyboard Available</label>
</div>

<div id="keyboard_detail_container"></div>


<script type="text/javascript">
	
	$(document).ready(function(){

		$('#keyboard_detail').on('change', function(){
			if($('#keyboard_detail').is(':checked')) {
				$('#keyboard_detail_container').html("<div class='row mb-3'><div class='col-md-3'><label>Brand Name:</label><input type='text' class='form-control form-control-border' placeholder='Enter Brand Name' name='keyboard_brand_name' required></div><div class='col-md-3'><label>Serial Number:</label><input type='text' class='form-control form-control-border' placeholder='Enter Serial Number' name='keyboard_serial_number' required></div><div class='col-md-3'><label>Model Number:</label><input type='text' class='form-control form-control-border' placeholder='Enter Model Number' name='keyboard_model_number' required></div><div class='col-md-3'><label>Keyboard Type:</label><select class='form-control form-control-border' name='keyboard_item_type' required><option value=''>Select Keyboard Type</option><option value='Wired'>Wired</option><option value='Wireless'>Wireless</option></select></div></div><input type='hidden' value='1' name='keyboard_purchased_quantity'>");
			} else {
				$('#keyboard_detail_container').html('');
			}
		});

	});

</script>


<div class="custom-control custom-switch mb-3">
	<input type="checkbox" class="custom-control-input" id="mouse_detail" name="mouse_detail" value="1">
	<label class="custom-control-label" for="mouse_detail">Is Mouse Available</label>
</div>

<div id="mouse_detail_container"></div>


<script type="text/javascript">
	
	$(document).ready(function(){

		$('#mouse_detail').on('change', function(){
			if($('#mouse_detail').is(':checked')) {
				$('#mouse_detail_container').html("<div class='row mb-3'><div class='col-md-3'><label>Brand Name:</label><input type='text' class='form-control form-control-border' placeholder='Enter Brand Name' name='mouse_brand_name' required></div><div class='col-md-3'><label>Serial Number:</label><input type='text' class='form-control form-control-border' placeholder='Enter Serial Number' name='mouse_serial_number' required></div><div class='col-md-3'><label>Model Number:</label><input type='text' class='form-control form-control-border' placeholder='Enter Model Number' name='mouse_model_number' required></div><div class='col-md-3'><label>Keyboard Type:</label><select class='form-control form-control-border' name='mouse_item_type' required><option value=''>Select Keyboard Type</option><option value='Wired'>Wired</option><option value='Wireless'>Wireless</option></select></div></div><input type='hidden' value='1' name='mouse_purchased_quantity'>");
			} else {
				$('#mouse_detail_container').html('');
			}
		});

	});

</script>