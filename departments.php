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
							<h1 class="m-0">Departments</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Departments</li>
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
									<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#add_department_modal">Add Department</button>
									<div id="department_msg"></div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="table-responsive" style="width: 100%; overflow-x: auto;">
										<table id="example1" class="table table-bordered table-striped table-sm" style="max-width: 100%;">
											<thead>
												<tr>
													<th>#</th>
													<th>Department Name</th>
													<th>Location</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="display_departments">
												<?php

												$query = mysqli_query($conn, "SELECT * FROM departments WHERE delete_status='0'");
												if(mysqli_num_rows($query) > 0) {
													$i = 1;
													while($result = mysqli_fetch_assoc($query)) {

														echo "<tr>";
														echo "<td>".$i."</td>";
														echo "<td><a href='deploy_assets.php?id=".$result['id']."&type=2' class='text-white' style='text-decoration: underline;'>".department_name($result['id'])."</a></td>";
														echo "<td>".location_name($result['location_id'])."</td>";
														echo "<td>";
														if($result['active_status'] == 1) {
															echo "<span class='badge badge-success location_status_btn' data-id='".$result['id']."'>Active</span>";
														} else {
															echo "<span class='badge badge-danger location_status_btn' data-id='".$result['id']."'>Inactive</span>";
														}
														echo "</td>";
														echo "<td><div class='btn-group'>";
														if(is_superadmin() || is_admin()) {
															echo "<button class='btn btn-primary edit_department_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
															echo "<button class='btn btn-danger delete_department_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
														}
														echo "</div></td>";
														echo "</tr>";

														$i++;
													}
												} else {
													echo "<tr><td colspan='4' class='text-center'>No Record Found</td></tr>";
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


					<!-- Edit Department -->
					<div class="modal fade" id="edit_department_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Edit Department</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="edit_department_form_msg"></div>
									<form class="form" id="edit_department_form" method="post">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Edit Department -->

					
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

			$('#edit_department_modal').on('shown.bs.modal', function () {
				$('#edit_department_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
			});

			function display_departments() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_departments' },
					success: function(result) {
						$('#display_departments').html(result);
					}
				});
			}
			// display_departments();

			$(document).on('click', '.edit_department_btn', function(){
				$('#edit_department_modal').modal('show');
				$('#edit_department_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_edit_department_form', id:id },
						success: function(result) {
							$('#edit_department_form').html(result);
						}
					});
				}
			});

			$('#edit_department_form').on('submit', function(e){
				e.preventDefault();

				if($('#edit_department_name').val() != '' && $('#edit_department_location').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#edit_department_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Department Successfully Updated");
								// display_departments();
								$("#example1").load("departments.php #display_departments");
								$('#edit_department_modal').modal('hide');
							} else if(result == 2) {
								$('#edit_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#edit_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Department Already Exist");
							} else if(result == 0) {
								$('#edit_department_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

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
			display_select_locations();

			$('#add_department_modal').on('shown.bs.modal', function () {
				$('#add_department_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				$('#add_department_name').focus().val('');
				// display_select_locations();
				$("#example1").load("departments.php #display_departments");
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
								// display_departments();
								$("#example1").load("departments.php #display_departments");
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

			$(document).on('click', '.delete_department_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete department?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_department', id:id },
							success: function(result) {
								if(result == 2) {
									$('#department_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Department Deleted Successfully");
								} else if(result == 1 || result == 0) {
									$('#department_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
								}
								setTimeout(function(){
									$('#department_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
								}, 1000);
								// display_departments();
								$("#example1").load("departments.php #display_departments");
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
