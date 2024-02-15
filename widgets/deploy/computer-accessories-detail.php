<div class="mb-3 table-responsive">
	<input type="hidden" value="1" name="total_ram" id="total_ram">
	<table class="table table-striped table-hover" id="ram_detail_table">
		<tr>
			<td>RAM Type with Size</td>
			<td>Quantity</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<div class="input-group">
					<select class="form-control form-control-border ram" name="computer_ram[]" id="ram_1" required>
						<option value="">Select RAM Type with Size</option>
					</select>
				</div>
			</td>
			<td>
				<input type="number" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="computer_ram_qty[]" required>
				<div id="ram_qty_msg"></div>
			</td>
			<td><button class="btn btn-primary btn-sm ram_add_btn" type="button">+</button></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		function display_deploy_asset_computer_ram(select_id) {
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: { action: 'display_deploy_asset_computer_ram' },
				success: function(result) {
					$('#'+select_id).html(result);
				}
			});
		}

		display_deploy_asset_computer_ram('ram_1');

		$(document).on('click', '.ram_add_btn', function(){
			var total_ram = parseInt($('#total_ram').val());
			total_ram = total_ram + 1;
			$('#ram_detail_table').append('<tr><td><div class="input-group"><input type="hidden" value="1" name="total_ram"><select class="form-control form-control-border ram" name="computer_ram[]" id="ram_'+total_ram+'" required><option value="">Select RAM Type with Size</option></select></div></td><td><input type="number" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="computer_ram_qty[]" required><div id="ram_qty_msg"></div></td><td><button class="btn btn-danger btn-sm ram_delete_btn" type="button">x</button></td></tr>');
			display_deploy_asset_computer_ram('ram_'+total_ram);
			$('#total_ram').val(total_ram);
		});
		$(document).on('click', '.ram_delete_btn', function(){
			$(this).parents('tr').remove();
		});

		$(document).on('change', 'select.ram', function(){
			var id = $(this).val();
			var element_id = $(this).attr('id');
			if(id != '' && id != 0) {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_deploy_asset_computer_ram_qty', id:id },
					success: function(result) {
						if(result == 0) {
							alert("You haven't any RAM in Inventory");
						}
					}
				});
			}
		});

	});
</script>




<div class="mb-3 table-responsive">
	<input type="hidden" value="1" name="total_rom" id="total_rom">
	<table class="table table-striped table-hover" id="rom_detail_table">
		<tr>
			<td>ROM Type with Size</td>
			<td>Quantity</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<div class="input-group">
					<select class="form-control form-control-border rom" name="computer_rom[]" id="rom_1" required>
						<option value="">Select ROM Type with Size</option>
					</select>
				</div>
			</td>
			<td>
				<input type="number" class="form-control form-control-border rom_qty" placeholder="Enter ROM Quantity" name="computer_rom_qty[]" required>
				<div id="rom_qty_msg"></div>
			</td>
			<td><button class="btn btn-primary btn-sm rom_add_btn" type="button">+</button></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		function display_deploy_asset_computer_rom(select_id) {
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: { action: 'display_deploy_asset_computer_rom' },
				success: function(result) {
					$('#'+select_id).html(result);
				}
			});
		}

		display_deploy_asset_computer_rom('rom_1');

		$(document).on('click', '.rom_add_btn', function(){
			var total_rom = parseInt($('#total_rom').val());
			total_rom = total_rom + 1;
			$('#rom_detail_table').append('<tr><td><select class="form-control form-control-border rom" name="computer_rom[]" id="rom_'+total_rom+'" required><option value="">Select ROM Type with Size</option></select></div></td><td><input type="number" class="form-control form-control-border rom_qty" placeholder="Enter ROM Quantity" name="computer_rom_qty[]" required><div id="rom_qty_msg"></div></td><td><button class="btn btn-danger btn-sm rom_delete_btn" type="button">x</button></td></tr>');
			display_deploy_asset_computer_rom('rom_'+total_rom);
			$('#total_rom').val(total_rom);
		});
		$(document).on('click', '.rom_delete_btn', function(){
			$(this).parents('tr').remove();
		});

		$(document).on('change', 'select.rom', function(){
			var id = $(this).val();
			var element_id = $(this).attr('id');
			if(id != '' && id != 0) {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_deploy_asset_computer_rom_qty', id:id },
					success: function(result) {
						if(result == 0) {
							alert("You haven't any ROM in Inventory");
						}
					}
				});
			}
		});

	});
</script>