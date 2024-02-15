<?php include "head.php"; ?>
	<title>Telephone Industries Of Pakistan</title>
	<style type="text/css">
		input {
			text-transform: uppercase;
		}
	</style>
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
							<h1 class="m-0">Check Out</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
								<li class="breadcrumb-item active">Check Out</li>
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
							<div id="check_out_form_msg"></div>
							<form class="form" method="post" id="check_out_form">
								<input type="hidden" value="deploy_assets" name="action">

								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="voucher_detail">
									<label class="custom-control-label" for="voucher_detail">Exsisting Voucher Number</label>
								</div>

								<div id="voucher_number_container">
									
									<div class="mb-3">
										<label>Voucher Number:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter Voucher Number" id="voucher_number" name="voucher_number" required>
										<div id="voucher_number_msg"></div>
									</div>

									<div class="mb-3">
										<label>Voucher Date:</label>
										<input type="text" class="form-control form-control-border datepicker" placeholder="Enter Voucher Date" id="voucher_date" name="voucher_date" required>
									</div>
									
									<div class="mb-3">
										<label>Deploy To:</label>
										<select class="form-control form-control-border" name="deploy_to" id="deploy_to" required>
											<option value="">Select Deploy To</option>
											<option value="1" selected>Person</option>
											<option value="2">Department</option>
										</select>
									</div>

									<div class="mb-3">
										<label>Employee:</label>
										<div class="input-group">
											<select class="form-control form-control-border" name="deploy_people" id="deploy_people" required></select>
											<div class="input-group-append">
												<button class="btn btn-primary" data-toggle="modal" type="button" data-target="#add_employee_modal">Add Employee</button>
											</div>
										</div>
									</div>

									<div class="mb-3">
										<label>Department:</label>
										<div class="input-group">
											<select class="form-control form-control-border" name="deploy_department" id="deploy_department" required></select>
											<div class="input-group-append">
												<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_department_modal">Add Department</button>
											</div>
										</div>
									</div>

								</div>

								<div id="voucher_detail_container"></div>

								<!-- <div class="mb-3">
									<label>IGR Number:</label>
									<select class="form-control form-control-border" name="igr_number" id="igr_number">
										<option value="">Select IGR Number</option>
									</select>
								</div> -->

								<div id="asset_detail_container">
									
									<?php

									$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && active_status='1' && delete_status='0' && parent_id is NULL");
									if(mysqli_num_rows($query) > 0) {

										echo "<div class='table-responsive'><table class='table table-striped table-hover'>";

										$i = 1;
										while($result = mysqli_fetch_assoc($query)) {

											echo "<tr>";
											echo "<td class='col-6'><input type='hidden' name='asset_id[]' value='".$result['id']."'>";
											if($result['asset_type'] == 1) {
												echo $result['igr_number']." - ".$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
												echo asset_meta($result['id'], 'processor_detail')." Processor<br>";
												echo asset_meta($result['id'], 'power_supply')." Power Supply<br>";
												$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$result['id']}' && active_status='1' && delete_status='0'");
												if(mysqli_num_rows($computer_query) > 0) {
													while($computer_result = mysqli_fetch_assoc($computer_query)) {
														if($computer_result['asset_type'] == 2) {
															if($computer_result['asset_category'] == 19) {
																echo "RAM - DDR".$computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$computer_result['qty']."x<br>";
															} else if($computer_result['asset_category'] == 20) {
																echo $computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$result['qty']."x<br>";
															}
														}
													}
												}
											} else if($result['asset_type'] == 2) {
												if($result['asset_category'] == 1) {
													echo asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
													$printer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$result['id']}' && active_status='1' && delete_status='0'");
													if(mysqli_num_rows($printer_query) > 0) {
														while($printer_result = mysqli_fetch_assoc($printer_query)) {
															if($printer_result['asset_type'] == 2) {
																if($printer_result['asset_category'] == 2) {
																	echo $printer_result['asset_name']." - ".asset_meta($printer_result['id'], 'brand_name')." - ".asset_meta($printer_result['id'], 'serial_number')." - ".asset_meta($printer_result['id'], 'model_number')."<br>";
																}
															}
														}
													}
												} else if($result['asset_category'] == 2 || $result['asset_category'] == 3 || $result['asset_category'] == 13) {
													echo $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
												} else if($result['asset_category'] == 4) {
													echo $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')." - Dimension: ".$result['item_size']."\"<br>";
												} else if($result['asset_category'] == 5) {
													echo $result['asset_name']." - ".$result['item_type']."<br>";
												} else if($result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
													echo $result['item_type'].$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
												} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
													echo $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')." - ".$result['item_type']."<br>";
												} else if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17 || $result['asset_category'] == 18) {
													echo $result['asset_name']."<br>";
												} else if($result['asset_category'] == 19) {
													echo "DDR".$result['item_type']." - ".$result['item_size']."GB -".$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
												} else if($result['asset_category'] == 20) {
													echo $result['item_type']." - ".$result['item_size']."GB -".$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
												}
											}
											echo "</td>";
											echo "<td class='col-6'><input type='number' class='form-control form-control-border' placeholder='Enter Quantity Maximum ".$result['qty']."' name='asset_qty[]' max='".$result['qty']."'></td>";

											$i++;
										}

										echo "</table>";

									}

									?>

								</div>

								<button class="btn btn-primary" type="submit" id="submit" name="submit">Submit</button>

							</form>
						</div>
					</div>



					<!-- Adding New Employee -->
					<div class="modal fade" id="add_employee_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">New Employee</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="add_employee_form_msg"></div>
									<form class="form" id="add_employee_form" method="post">
										<input type="hidden" value="add_people" name="action">
										<div class="mb-3">
											<label>ID:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Employee ID" id="add_employee_id" name="add_people_id">
										</div>
										<div class="mb-3">
											<label>Name:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Employee Name" id="add_employee_name" name="add_people_name">
										</div>
										<div class="mb-3">
											<label>Designation:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Employee Designation" id="add_employee_designation" name="add_people_designation">
										</div>
										<div class="mb-3">
											<label>Department:</label>
											<select class="form-control" id="add_employee_department" name="add_people_department"></select>
										</div>
										<button class="btn btn-primary" type="submit" name="add_employee_btn" id="add_employee_btn">Add Employee</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Adding New Employee -->



					<!-- Adding New Department -->
					<div class="modal fade" id="add_department_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">New Department</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="add_department_form_msg"></div>
									<form class="form" id="add_department_form" method="post">
										<input type="hidden" value="add_department" name="action">
										<div class="mb-3">
											<label>Name:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Department Name" id="add_department_name" name="add_department_name">
										</div>
										<div class="mb-3">
											<label>Location:</label>
											<select class="form-control form-control-border" id="add_department_location" name="add_department_location"></select>
										</div>
										<button class="btn btn-primary" type="submit" name="add_department_btn" id="add_department_btn">Add Department</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Adding New Department -->


					
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

			function igr_numbers() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_igr_numbers' },
					success: function(result) {
						$('#igr_number').html(result);
					}
				});
			}
			igr_numbers();

			$('#igr_number').on('change', function(){

				var igr_number = $('#igr_number').val();
				if(igr_number != '' && igr_number != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_igr_assets', igr_number:igr_number },
						success: function(result) {
							$('#asset_detail_container').html(result);
						}
					});
				} else {
					$('#asset_detail_container').html('');
				}

			});

			$(document).on('change', 'select#voucher_number', function(){
				var voucher_number = $(this).val();
				if(voucher_number != '' && voucher_number != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_voucher_detail', voucher_number:voucher_number },
						success: function(result) {
							$('#voucher_detail_container').html(result);
						}
					});
				} else {
					$('#voucher_detail_container').html('');
				}
			});

			$('input#voucher_number').on('blur', function(){
				var voucher_number = $('#voucher_number').val();

				if(voucher_number != '' && voucher_number != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'check_voucher_number', voucher_number:voucher_number },
						success: function(result) {
							if(result == 1) {
								$('#voucher_number').removeClass('is-valid').addClass('is-invalid').val('').attr('disabled', 'disabled');
								$('#voucher_number_msg').removeClass('valid-feedback').addClass('invalid-feedback').text('Voucher Number Already Exist');
								$('#voucher_date').attr('disabled', 'disabled');
							} else {
								$('#voucher_number').removeAttr('disabled');
								$('#voucher_date').removeAttr('disabled');
							}
						}
					});
				}
			});

			function deploy_select_people() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_select_peoples' },
					success: function(result) {
						$('#deploy_people').html(result);
					}
				});
			}
			deploy_select_people();

			function display_select_departments() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_select_departments' },
					success: function(result) {
						$('#add_employee_department').html(result);
					}
				});
			}

			$('#add_employee_modal').on('shown.bs.modal', function () {
				$('#add_employee_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				$('#add_employee_id').focus().val('');
				display_select_departments();
			});

			$('#add_employee_form').on('submit', function(e){
				e.preventDefault();

				if($('#add_employee_id').val() != '' && $('#add_employee_name').val() != '' && $('#add_employee_designation').val() != '' && $('#add_employee_department').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#add_employee_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Employee Successfully Added");
								// display_Employees();
								$('#add_employee_modal').modal('hide');
								deploy_select_people();
							} else if(result == 2) {
								$('#add_employee_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#add_employee_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Employee Already Exist");
							} else if(result == 0) {
								$('#add_employee_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			function deploy_select_department() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_select_departments' },
					success: function(result) {
						$('#deploy_department').html(result);
					}
				});
			}
			deploy_select_department();

			function display_select_locations() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_select_locations' },
					success: function(result) {
						$('#add_department_location').html(result);
					}
				});
			}

			$('#add_department_modal').on('shown.bs.modal', function () {
				$('#add_department_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				$('#add_department_name').focus().val('');
				display_select_locations();
			});

			$('#add_department_form').on('submit', function(e){
				e.preventDefault();

				if($('#add_department_name').val() != '' && $('#add_department_location').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#add_department_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Department Successfully Added");
								deploy_select_department();
								$('#add_department_modal').modal('hide');
							} else if(result == 2) {
								$('#add_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#add_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Department Already Exist");
							} else if(result == 0) {
								$('#add_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			$('#voucher_detail').on('change', function(){
				if($('#voucher_detail').is(':checked')) {
					$('#voucher_number_container').html("<div class='mb-3'><label>Voucher Details:</label><select class='form-control form-control-border' name='voucher_number' id='voucher_number'><option value=''>Select Voucher Number</option></select><div id='voucher_number_msg'></div></div>");
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_voucher_numbers' },
						success: function(result) {
							$('#voucher_number').html(result);
						}
					});
				} else {
					$('#voucher_number_container').html('<div class="mb-3"><label>Voucher Number:</label><input type="text" class="form-control form-control-border" placeholder="Enter Voucher Number" id="voucher_number" name="voucher_number" required><div id="voucher_number_msg"></div></div><div class="mb-3"><label>Voucher Date:</label><input type="text" class="form-control form-control-border datepicker" placeholder="Enter Voucher Date" id="voucher_date" name="voucher_date" required></div><div class="mb-3"><label>Deploy To:</label><select class="form-control form-control-border" name="deploy_to" id="deploy_to" required><option value="">Select Deploy To</option><option value="1" selected>Person</option><option value="2">Department</option></select></div><div class="mb-3"><label>People:</label><select class="form-control form-control-border" name="deploy_people" id="deploy_people" required></select></div><div class="mb-3"><label>Department:</label><select class="form-control form-control-border" name="deploy_department" id="deploy_department" required></select></div>');

					deploy_select_people();
					deploy_select_department();

					$(".datepicker").datepicker();

					$(".datepicker").datepicker( "option", "dateFormat", "d-m-yy" );

				}
			});

			$(".datepicker").datepicker();

			$(".datepicker").datepicker( "option", "dateFormat", "d-m-yy" );


			function asset_detail_container(file_path) {
				$.ajax({
					url: file_path,
					success: function(result) {
						$('#asset_detail_container').html(result);
					}
				});
			}


			$('#check_out_form').on('submit', function(e){
				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					beforeSend: function() {
						$('#submit').addClass('disabled');
					},
					success: function(result) {
						if(result == 2) {
							$('#check_out_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Item Successfully Added");
							$('#voucher_number, #voucher_date').val('');
							$('#deploy_to, #deploy_people, #deploy_department, #asset_type, #igr_number').val('').change();

							$('#asset_category_container').html('');

							$('#asset_detail_container').html('');

							$('#submit').removeClass('disabled');

							setTimeout(function(){
								$('#check_out_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
							}, 1500);
						} else if(result == 1) {
							$('#check_out_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
						} else if(result == 3) {
							$('#check_out_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill all required fields");
						}
					}
				});
			});

		});
	</script>
</body>
</html>
