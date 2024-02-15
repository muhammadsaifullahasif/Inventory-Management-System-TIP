<?php

include "head.php";

if(isset($_GET['id'])) {

	$id = strip_tags(mysqli_real_escape_string($conn, $_GET['id']));

	$check_deploy_asset = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE asset_id='$id' && active_status='1' && delete_status='0'");

	if(mysqli_num_rows($check_deploy_asset) == 0) {
		$query = mysqli_query($conn, "SELECT * FROM assets WHERE id='$id' && active_status='1' && delete_status='0'");
		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
		} else {
			header('location: assets.php');
		}
	} else {
		header('location: assets.php');
	}

} else {
	header('location: assets.php');
}

?>
	<title>Telephone Industries Of Pakistan</title>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		<?php include "nav.php"; ?>

		<?php include "sidebar.php"; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Edit Asset</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
								<li class="breadcrumb-item active">Edit Asset</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-12">
							<div id="edit_asset_form_msg"></div>
							<form class="form" class="form mb-3" id="edit_asset_form">
								<input type="hidden" value="<?php echo $id; ?>" name="id">
								<input type="hidden" value="edit_asset" name="action">
								<input type="hidden" value="<?php echo $result['asset_type']; ?>" name="asset_type">
								<input type="hidden" value="<?php echo $result['asset_category']; ?>" name="asset_category">

								<div class="mb-3">
									<label>IGR Number:</label>
									<input type="text" value="<?php echo $result['igr_number']; ?>" class="form-control form-control-border" placeholder="Enter IGR Number" id="igr_number" name="igr_number" required>
								</div>

								<div class="mb-3">
									<label>IGR Date:</label>
									<!-- <input type="text" class="form-control form-control-border datepicker" placeholder="Enter IGR Date" id="igr_date" value="<?php echo $result['igr_date']; ?>" name="igr_date" required> -->
									<input type="text" class="form-control form-control-border" placeholder="Enter IGR Date" id="igr_date" name="igr_date">
								</div>

								<div class="mb-3">
									<label>Item Name:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Item Name" id="item_name" value="<?php echo $result['asset_name']; ?>" name="item_name" required>
								</div>

								<?php

								if($result['asset_type'] == 1 || (($result['asset_type'] == 2) && ($result['asset_category'] == 1 || $result['asset_category'] == 2 || $result['asset_category'] == 3 || $result['asset_category'] == 4 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9 || $result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12 || $result['asset_category'] == 13 || $result['asset_category'] == 19 || $result['asset_category'] == 20))) {

								?>

									<div class="mb-3">
										<label>Brand Name:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Brand Name" id="brand_name" value="<?php echo asset_meta($id, 'brand_name'); ?>" name="brand_name" required>
									</div>

									<div class="mb-3">
										<label>Serial Number:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Serial Number" id="serial_number" value="<?php echo asset_meta($id, 'serial_number'); ?>" name="serial_number" required>
									</div>

									<div class="mb-3">
										<label>Model Number:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Model Number" id="model_number" value="<?php echo asset_meta($id, 'model_number'); ?>" name="model_number" required>
									</div>

								<?php

								}

								if($result['asset_type'] == 1) {

								?>

									<div class="mb-3">
										<label>Processor:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Processor Detail" id="processor_detail" value="<?php echo asset_meta($id, 'processor_detail'); ?>" name="processor_detail" required>
									</div>

									<div class="mb-3">
										<label>Power Supply:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Power Supply" id="power_supply" value="<?php echo asset_meta($id, 'power_supply'); ?>" name="power_supply" required>
									</div>

									<div class="mb-3 table-responsive">
										<label>Adding New RAMs</label>
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
														<input type="number" class="form-control form-control-border ram_type" placeholder="Enter RAM Type 2 or 3" name="ram_type[]">
														<div class="ram_type_msg"></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<input type="number" class="form-control form-control-border ram_size" placeholder="Enter RAM Size 2GB or 4GB or 6GB" name="ram_size[]">
														<div class="input-group-append">
															<span class="input-group-text bg-light text-dark">GB</span>
														</div>
														<div id="ram_size_msg"></div>
													</div>
												</td>
												<td>
													<input type="text" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="ram_qty[]">
													<div id="ram_qty_msg"></div>
												</td>
												<td><button class="btn btn-primary btn-sm ram_add_btn" type="button">+</button></td>
											</tr>
										</table>
									</div>

									<div class="mb-3 table-responsive">
										<label>Adding New ROMs</label>
										<table class="table table-striped table-hover" id="rom_detail_table">
											<tr>
												<td>ROM Type</td>
												<td>ROM Size</td>
												<td>Quantity</td>
												<td></td>
											</tr>
											<tr>
												<td>
													<select class="form-control form-control-border" name="rom_type[]">
														<option value="">Select ROM Type</option>
														<option value="HDD">HDD</option>
														<option value="SSD">SSD</option>
													</select>
													<div class="rom_type_msg"></div>
												</td>
												<td>
													<div class="input-group">
														<input type="text" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" name="rom_size[]">
														<div class="input-group-append">
															<span class="input-group-text bg-light text-dark">GB</span>
														</div>
														<div class="rom_size_msg"></div>
													</div>
												</td>
												<td>
													<input type="text" class="form-control form-control-border" placeholder="Enter ROM Quantity" name="rom_qty[]">
													<div class="rom_qty_msg"></div>
												</td>
												<td><button class="btn btn-primary btn-sm rom_add_btn" type="button">+</button></td>
											</tr>
										</table>
									</div>
								<?php

								} else if($result['asset_type'] == 2) {
									if($result['asset_category'] == 4) {

								?>
								<div class="mb-3">
									<label>Screen Dimensions:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Screen Dimensions" id="screen_dimension" value="<?php echo $result['item_size']; ?>" name="item_size" required>
								</div>
								<?php		

									} else if($result['asset_category'] == 6) {
								?>
								<div class="mb-3">
									<label>Keyboard Type:</label>
									<select class='form-control form-control-border' id='item_type' name='item_type' required>
										<option value=''>Select Keyboard Type</option>
										<option value='Wired' <?php if($result['item_type'] == 'WIRED') echo 'selected'; ?>>Wired</option>
										<option value='Wireless' <?php if($result['item_type'] == 'WIRELESS') echo 'selected'; ?>>Wireless</option>
									</select>
								</div>
								<?php
									} else if($result['asset_category'] == 7) {
								?>
								<div class="mb-3">
									<label>Mouse Type:</label>
									<select class='form-control form-control-border' id='item_type' name='item_type' required>
										<option value=''>Select Mouse Type</option>
										<option value='Wired' <?php if($result['item_type'] == 'WIRED') echo 'selected'; ?>>Wired</option>
										<option value='Wireless' <?php if($result['item_type'] == 'WIRELESS') echo 'selected'; ?>>Wireless</option>
									</select>
								</div>
								<?php
									} else if($result['asset_category'] == 8) {
								?>
								<div class="mb-3">
									<label>Speaker Type:</label>
									<select class='form-control form-control-border' id='item_type' name='item_type' required>
										<option value=''>Select Speaker Type</option>
										<option value='Wired' <?php if($result['item_type'] == 'WIRED') echo 'selected'; ?>>Wired</option>
										<option value='Wireless' <?php if($result['item_type'] == 'WIRELESS') echo 'selected'; ?>>Wireless</option>
									</select>
								</div>
								<?php
									} else if($result['asset_category'] == 9) {
								?>
								<div class="mb-3">
									<label>Microphone Type:</label>
									<select class='form-control form-control-border' id='item_type' name='item_type' required>
										<option value=''>Select Microphone Type</option>
										<option value='Wired' <?php if($result['item_type'] == 'WIRED') echo 'selected'; ?>>Wired</option>
										<option value='Wireless' <?php if($result['item_type'] == 'WIRELESS') echo 'selected'; ?>>Wireless</option>
									</select>
								</div>
								<?php
									} else if($result['asset_category'] == 10) {
								?>
								<div class="mb-3">
									<label>Number of Ports:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Number of Ports" id="item_type" value="<?php echo $result['item_type']; ?>" name="item_type" required>
								</div>
								<?php
									} else if($result['asset_category'] == 11) {
								?>
								<div class="mb-3">
									<label>Number of Ports:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Number of Ports" id="item_type" value="<?php echo $result['item_type']; ?>" name="item_type" required>
								</div>
								<?php
									} else if($result['asset_category'] == 12) {
								?>
								<div class="mb-3">
									<label>Number of Ports:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Number of Ports" id="item_type" value="<?php echo $result['item_type']; ?>" name="item_type" required>
								</div>
								<?php
									} else if($result['asset_category'] == 19) {
								?>
								<div class='mb-3'>
									<label>RAM Type:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text bg-light text-dark">DDR</span>
										</div>
										<input type="number" class="form-control form-control-border" placeholder="Enter RAM TYPE 2 or 3" id="item_type" value="<?php echo $result['item_type']; ?>" name="item_type" required>
									</div>
									<div id="ram_type_msg"></div>
								</div>
								<div class='mb-3'>
									<label>RAM Size:</label>
									<div class="input-group">
										<input type="number" class="form-control form-control-border" placeholder="Enter RAM Size 2GB or 4GB" value="<?php echo $result['item_size']; ?>" id="item_size" name="item_size" reuired>
										<div class="input-group-append">
											<span class="input-group-text bg-light text-dark">GB</span>
										</div>
									</div>
									<div id="ram_size_msg"></div>
								</div>
								<?php
									} else if($result['asset_category'] == 20) {
								?>
								<div class='mb-3'>
									<label>ROM Type:</label>
									<select class="form-control form-control-border" id="item_type" name="item_type" required>
										<option value="">Select ROM Type</option>
										<option value="HDD" <?php if($result['item_type'] == 'HDD') echo 'selected'; ?>>HDD</option>
										<option value="SSD" <?php if($result['item_type'] == 'SSD') echo 'selected'; ?>>SSD</option>
									</select>
									<div id="rom_type_msg"></div>
								</div>
								<div class='mb-3'>
									<label>RAM Size:</label>
									<div class="input-group">
										<input type="number" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" value="<?php echo $result['item_size']; ?>" id="item_size" name="item_size">
										<div class="input-group-append">
											<span class="input-group-text bg-light text-dark">GB</span>
										</div>
										<div id="rom_size_msg"></div>
									</div>
								</div>
								<?php
									}
								?>
								<div class='mb-3'>
									<label>Quantity Purchased:</label>
									<input type='number' class='form-control form-control-border' placeholder='Enter Quantity' id='purchased_quantity' value="<?php echo $result['qty']; ?>" name='purchased_quantity' required>
									<div id="purchased_quantity_msg"></div>
								</div>
								<?php
								}

								?>

								<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>

							</form>

							<?php if($result['asset_type'] == 1) { ?>

							<div class="mb-3 table-responsive">
								<label>Previous RAMs:</label>
								<table class="table table-striped table-hover">
									<tr>
										<td>RAM Type</td>
										<td>RAM Size</td>
										<td>Quantity</td>
										<td></td>
									</tr>

								<?php


								$ram_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='$id' && asset_type='2' && asset_category='19' && active_status='1' && delete_status='0'");

								if(mysqli_num_rows($ram_query) > 0) {

									$i = 0;

									while($ram_result = mysqli_fetch_assoc($ram_query)) {
								?>
									<tr>
										<td>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text bg-light text-dark">DDR</span>
												</div>
												<input type="number" class="form-control form-control-border previous_ram_type" data-id="<?php echo $ram_result['id']; ?>" placeholder="Enter RAM Type 2 or 3" value="<?php echo $ram_result['item_type']; ?>" name="previous_ram_type[]" required>
												<div class="ram_type_msg"></div>
											</div>
										</td>
										<td>
											<div class="input-group">
												<input type="number" class="form-control form-control-border previous_ram_size" placeholder="Enter RAM Size 2GB or 4GB or 6GB" data-id="<?php echo $ram_result['id']; ?>" value="<?php echo $ram_result['item_size']; ?>" name="previous_ram_size[]" required>
												<div class="input-group-append">
													<span class="input-group-text bg-light text-dark">GB</span>
												</div>
												<div id="ram_size_msg"></div>
											</div>
										</td>
										<td>
											<input type="text" class="form-control form-control-border previous_ram_qty" placeholder="Enter RAM Quantity" data-id="<?php echo $ram_result['id']; ?>" value="<?php echo $ram_result['qty']; ?>" name="previous_ram_qty[]" required>
											<div id="ram_qty_msg"></div>
										</td>
										<td><button class="btn btn-danger btn-sm ram_asset_delete_btn" data-id="<?php echo $ram_result['id']; ?>" type="button">x</button></td>
									</tr>
									<?php
										$i++;
									}

								}

								?>

								</table>
							</div>

							<div class="mb-3 table-responsive">
								<label>Previous ROMs:</label>
								<table class="table table-striped table-hover">
									<tr>
										<td>ROM Type</td>
										<td>ROM Size</td>
										<td>Quantity</td>
										<td></td>
									</tr>

								<?php


								$rom_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='$id' && asset_type='2' && asset_category='20' && active_status='1' && delete_status='0'");

								if(mysqli_num_rows($rom_query) > 0) {

									$i = 0;

									while($rom_result = mysqli_fetch_assoc($rom_query)) {
								?>
									<tr>
										<td>
											<div class="input-group">
												<select class="form-control form-control-border" name="rom_type[]" required>
													<option value="">Select ROM Type</option>
													<option value="HDD" <?php if($rom_result['item_type'] == 'HDD') echo 'selected'; ?>>HDD</option>
													<option value="SSD" <?php if($rom_result['item_type'] == 'SSD') echo 'selected'; ?>>SSD</option>
												</select>
												<div class="ram_type_msg"></div>
											</div>
										</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" value="<?php echo $rom_result['item_type']; ?>" name="previous_rom_size[]" required>
												<div class="input-group-append">
													<span class="input-group-text bg-light text-dark">GB</span>
												</div>
												<div class="rom_size_msg"></div>
											</div>
										</td>
										<td>
											<input type="text" class="form-control form-control-border" placeholder="Enter ROM Quantity" name="previous_rom_qty[]" value="<?php echo $rom_result['item_size']; ?>" required>
											<div class="rom_qty_msg"></div>
										</td>
										<td><button class="btn btn-danger btn-sm rom_asset_delete_btn" data-id="<?php echo $rom_result['id']; ?>" type="button">x</button></td>
									</tr>
									<?php
										$i++;
									}

								}

								?>

								</table>
							</div>

							<?php } ?>

						</div>
					</div>
					
				</div><!--/. container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<?php include "footer.php"; ?>
	</div>
	<!-- ./wrapper -->

	<?php include "js.php"; ?>
	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on('change, blur', '.ram_type', function(){

				if($(this).val() != '') {
					// $(this).nextUntil('tr').addAttr('required');
				}

			});

			$(".datepicker, #igr_date").datepicker();

			$(".datepicker, #igr_date").datepicker( "option", "dateFormat", "d-mm-yy" ).val('<?php echo $result['igr_date']; ?>');


			$('#edit_asset_form').on('submit', function(e){
				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(result) {
						if(result == 2) {
							$('#edit_asset_form_msg').removeClass('alert-danger').addClass('alert alert-success').html('Asset Update Successfully');
							setTimeout(function(){
								$('#edit_asset_form_msg').removeClass('alert alert-success alert-danger').html('');
								window.top.location = window.top.location;
							}, 1500);
						} else if(result == 1) {
							$('#edit_asset_form_msg').removeClass('alert-success').addClass('alert alert-danger').html('Please Try Again');
						} else if(result == 0) {
							$('#edit_asset_form_msg').removeClass('alert-success').addClass('alert alert-danger').html('Please Fill Required Fields');
						}
					}
				});
			});


			$(document).on('click', '.ram_asset_delete_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete this RAM?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_assets', id:id },
							success: function(result) {
								if(result == 1) {
									alert('Please Try Again');
								} else if(result == 2) {
									alert('RAM deleted Successfully');
									window.top.location = window.top.location;
								}
							}
						});
					}
				}
			});


			$(document).on('click', '.rom_asset_delete_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete this ROM?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_assets', id:id },
							success: function(result) {
								if(result == 1) {
									alert('Please Try Again');
								} else if(result == 2) {
									alert('ROM deleted Successfully');
									window.top.location = window.top.location;
								}
							}
						});
					}
				}
			});

			$(document).on('blur', '.previous_ram_type', function(){
				var id = $(this).data('id');
				var previous_ram_type = $(this).val();

				if(id != '' && id != 0 && previous_ram_type != '' && previous_ram_type != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_ram_type', id:id, previous_ram_type:previous_ram_type },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter RAM Type');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.ram_type_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter RAM Type');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.ram_type_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('RAM Type updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.ram_type_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('RAM Type updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.ram_type_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});


			$(document).on('blur', '.previous_ram_size', function(){
				var id = $(this).data('id');
				var previous_ram_size = $(this).val();

				if(id != '' && id != 0 && previous_ram_size != '' && previous_ram_size != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_ram_size', id:id, previous_ram_size:previous_ram_size },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter RAM Size');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.ram_size_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter RAM Size');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.ram_size_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('RAM Size updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.ram_size_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('RAM Size updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.ram_size_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});


			$(document).on('blur', '.previous_ram_qty', function(){
				var id = $(this).data('id');
				var previous_ram_qty = $(this).val();

				if(id != '' && id != 0 && previous_ram_qty != '' && previous_ram_qty != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_ram_qty', id:id, previous_ram_qty:previous_ram_qty },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter RAM Qty');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.ram_qty_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter RAM Qty');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.ram_qty_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('RAM Qty updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.ram_qty_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('RAM Qty updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.ram_qty_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});


			$(document).on('blur', '.previous_rom_type', function(){
				var id = $(this).data('id');
				var previous_rom_type = $(this).val();

				if(id != '' && id != 0 && previous_rom_type != '' && previous_rom_type != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_rom_type', id:id, previous_rom_type:previous_rom_type },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter ROM Type');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.rom_type_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter ROM Type');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.rom_type_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('ROM Type updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.rom_type_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('ROM Type updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.rom_type_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});


			$(document).on('blur', '.previous_rom_size', function(){
				var id = $(this).data('id');
				var previous_rom_size = $(this).val();

				if(id != '' && id != 0 && previous_rom_size != '' && previous_rom_size != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_rom_size', id:id, previous_rom_size:previous_rom_size },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter ROM Size');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.rom_size_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter ROM Size');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.rom_size_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('ROM Size updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.rom_size_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('ROM Size updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.rom_size_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});


			$(document).on('blur', '.previous_rom_qty', function(){
				var id = $(this).data('id');
				var previous_rom_qty = $(this).val();

				if(id != '' && id != 0 && previous_rom_qty != '' && previous_rom_qty != 0) {

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'previous_ram_qty', id:id, previous_rom_qty:previous_rom_qty },
						success: function(result) {
							if(result == 0) {
								alert('Please Enter ROM Qty');
								$(this).addClass('is-invalid').removeClass('is-valid');
								$(this).next('div.rom_qty_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Enter ROM Qty');
							} else if(result == 1) {
								alert('Please Try Again');
								$(this).addClass('is-invalid').removeClass('is-vaild');
								$(this).next('div.rom_qty_msg').addClass('invalid-feedback').removeClass('valid-feedback').text('Please Try Again');
							} else if(result == 2) {
								alert('ROM Qty updated Successfully');
								$(this).addClass('is-valid').removeClass('is-invalid');
								$(this).next('div.rom_qty_msg').addClass('valid-feedback').removeClass('invalid-feedback').text('ROM Qty updated successfully');

								setTimeout(function(){
									$(this).removeClass('is-invalid is-valid');
									$(this).next('div.rom_qty_msg').removeClass('invalid-feedback valid-feedback').text('');
								}, 1000);
							}
						}
					});

				}
			});

			$(document).on('click', '.ram_add_btn', function(){
				$('#ram_detail_table').append('<tr><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-light text-dark">DDR</span></div><input type="number" class="form-control form-control-border ram_type" placeholder="Enter RAM Type 2 or 3" name="ram_type[]" required><div class="ram_type_msg"></div></div></td><td><div class="input-group"><input type="number" class="form-control form-control-border ram_size" placeholder="Enter RAM Size 2GB or 4GB or 6GB" name="ram_size[]" required><div class="input-group-append"><span class="input-group-text bg-light text-dark">GB</span></div><div id="ram_size_msg"></div></div></td><td><input type="text" class="form-control form-control-border ram_qty" placeholder="Enter RAM Quantity" name="ram_qty[]" required><div id="ram_qty_msg"></div></td><td><button class="btn btn-danger btn-sm ram_delete_btn" type="button">x</button></td></tr>');
			});
			$(document).on('click', '.ram_delete_btn', function(){
				$(this).parents('tr').remove();
			});


			$(document).on('click', '.rom_add_btn', function(){
				$('#rom_detail_table').append('<tr><td><select class="form-control form-control-border" name="rom_type[]" required><option value="">Select ROM Type</option><option value="HDD">HDD</option><option value="SSD">SSD</option></select><div class="rom_type_msg"></div></td><td><div class="input-group"><input type="text" class="form-control form-control-border" placeholder="Enter ROM Size 80GB or 128GB or 300GB" name="rom_size[]" required><div class="input-group-append"><span class="input-group-text bg-light text-dark">GB</span></div><div class="rom_size_msg"></div></div></td><td><input type="text" class="form-control form-control-border" name="rom_qty[]" placeholder="Enter ROM Quantity" required><div class="rom_qty_msg"></div></td><td><button class="btn btn-danger btn-sm rom_delete_btn" type="button">x</button></td></tr>');
			});
			$(document).on('click', '.rom_delete_btn', function(){
				$(this).parents('tr').remove();
			});
		});
	</script>
</body>
</html>
