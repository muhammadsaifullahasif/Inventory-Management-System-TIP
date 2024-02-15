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
<div class='mb-3'>
	<label>ROM Type:</label>
	<select class="form-control form-control-border" id="item_type" name="item_type" required>
		<option value="">Select ROM Type</option>
		<option value="HDD">HDD</option>
		<option value="SSD">SSD</option>
	</select>
	<div id="rom_type_msg"></div>
</div>
<div class='mb-3'>
	<label>RAM Size:</label>
	<div class="input-group">
		<input type="number" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" id="item_size" name="item_size">
		<div class="input-group-append">
			<span class="input-group-text bg-light text-dark">GB</span>
		</div>
		<div id="rom_size_msg"></div>
	</div>
</div>
<input type="hidden" value="1" name="purchased_quantity">
<!-- <div class='mb-3'>
	<label>Quantity Purchased:</label>
	<input type='number' class='form-control form-control-border' placeholder='Enter Quantity' id='purchased_quantity' name='purchased_quantity' required>
	<div id="purchased_quantity_msg"></div>
</div> -->