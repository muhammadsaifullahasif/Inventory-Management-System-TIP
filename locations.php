<?php include "head.php"; ?>
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
							<h1 class="m-0">Locations</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Locations</li>
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
							<div class="card">
								<div class="card-header">
									<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#add_location_modal">Add Location</button>
									<div id="location_msg"></div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="table-responsive" style="width: 100%; overflow-x: auto;">
										<table id="example1" class="table table-bordered table-striped table-sm" style="max-width: 100%;">
											<thead>
												<tr>
													<th>#</th>
													<th>Location Name</th>
													<th>Address</th>
													<th>City</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="display_locations">
												<?php

												$query = mysqli_query($conn, "SELECT * FROM locations WHERE delete_status='0'");
												if(mysqli_num_rows($query) > 0) {
													$i = 1;
													while($result = mysqli_fetch_assoc($query)) {
														echo "<tr>";
														echo "<td>".$i."</td>";
														echo "<td>".$result['location_name']."</td>";
														echo "<td>".$result['location_address']."</td>";
														echo "<td>".$result['location_city']."</td>";
														echo "<td>";
														if($result['active_status'] == 1) {
															echo "<span class='badge badge-success location_status_btn' data-id='".$result['id']."'>Active</span>";
														} else {
															echo "<span class='badge badge-danger location_status_btn' data-id='".$result['id']."'>Inactive</span>";
														}
														echo "</td>";
														echo "<td><div class='btn-group'>";
														if(is_superadmin() || is_admin()) {
															echo "<button class='btn btn-primary edit_location_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
															echo "<button class='btn btn-danger delete_location_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
														}
														echo "</div></td>";
														echo "</tr>";
														$i++;
													}
												} else {
													echo "<tr><td colspan='5' class='text-center'>No Record Found</td></tr>";
												}

												?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<!-- Adding New Location -->
					<div class="modal fade" id="add_location_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">New Location</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="add_location_form_msg"></div>
									<form class="form" id="add_location_form" method="post">
										<input type="hidden" value="add_location" name="action">
										<div class="mb-3">
											<label>Name:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Location Name" id="add_location_name" name="add_location_name">
										</div>
										<div class="mb-3">
											<label>Address:</label>
											<textarea class="form-control form-control-border" placeholder="Enter Address" id="add_location_address" name="add_location_address"></textarea>
										</div>
										<div class="mb-3">
											<label>City:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter City" id="add_location_city" name="add_location_city">
										</div>
										<button class="btn btn-primary" type="submit" name="add_location_btn" id="add_location_btn">Add Location</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Adding New Location -->


					<!-- Edit Location -->
					<div class="modal fade" id="edit_location_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Edit Location</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="edit_location_form_msg"></div>
									<form class="form" id="edit_location_form" method="post">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Edit Location -->

					
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

			$('#add_location_form_msg').on('shown.bs.modal', function () {
				$('#add_location_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
			});

			$('#edit_location_form_msg').on('shown.bs.modal', function () {
				$('#edit_location_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
			});

			function display_locations() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_locations' },
					success: function(result) {
						$('#display_locations').html(result);
					}
				});
			}
			// display_locations();

			$(document).on('click', '.edit_location_btn', function(){
				$('#edit_location_modal').modal('show');
				$('#edit_location_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_edit_location_form', id:id },
						success: function(result) {
							$('#edit_location_form').html(result);
						}
					});
				}
			});

			$('#edit_location_form').on('submit', function(e){
				e.preventDefault();

				if($('#edit_location_name').val() != '' && $('#edit_location_address').val() != '' && $('#edit_location_city').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#edit_location_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Location Successfully Updated");
								// display_locations();
								$("#example1").load("locations.php #display_locations");
								$('#edit_location_modal').modal('hide');
							} else if(result == 2) {
								$('#edit_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#edit_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Location Name Already Exist");
							} else if(result == 0) {
								$('#edit_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			$('#add_location_form').on('submit', function(e){
				e.preventDefault();

				if($('#add_location_name').val() != '' && $('#add_location_address').val() != '' && $('#add_location_city').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#add_location_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Location Successfully Added");
								// display_locations();
								$("#example1").load("locations.php #display_locations");
								$('#add_location_modal').modal('hide');
							} else if(result == 2) {
								$('#add_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#add_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Location Name Already Exist");
							} else if(result == 0) {
								$('#add_location_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			$(document).on('click', '.delete_location_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete location?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_location', id:id },
							success: function(result) {
								if(result == 2) {
									$('#location_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Location Deleted Successfully");
								} else if(result == 1 || result == 0) {
									$('#location_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
								}
								setTimeout(function(){
									$('#location_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
								}, 1000);
								// display_locations();
								$("#example1").load("locations.php #display_locations");
							}
						});
					}
				}
			});



			$("#example1").DataTable({
				"responsive": true, "lengthChange": false, "autoWidth": false, "lengthChange": true,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
				"pageLength": 50,
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, 'All'],
				],
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		});
	</script>
</body>
</html>
