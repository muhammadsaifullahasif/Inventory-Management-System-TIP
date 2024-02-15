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
							<h1 class="m-0">Users</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Users</li>
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
									<?php if(is_superadmin() || is_admin()) { ?>
									<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#add_user_modal">Add User</button>
									<?php } ?>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="table-responsive" style="width: 100%; overflow-x: auto;">
										<table id="example1" class="table table-bordered table-striped table-sm" style="max-width: 100%;">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Username</th>
													<th>Role</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="display_users">
												<?php

												$query = mysqli_query($conn, "SELECT * FROM users WHERE delete_status='0'");
												if(mysqli_num_rows($query) > 0) {
													$i = 1;
													while($result = mysqli_fetch_assoc($query)) {

														echo "<tr>";
														echo "<td>".$i."</td>";
														echo "<td>".display_name($result['id'])."</td>";
														echo "<td>".$result['user_login']."</td>";
														echo "<td>";
														if($result['role'] == 0 && $result['type'] == 0) {
															echo "Super Admin";
														} else if($result['role'] == 0 && $result['type'] == 1) {
															echo "Admin";
														} else if($result['role'] == 1 && $result['type'] == 1) {
															echo "User";
														}
														echo "</td>";
														echo "<td>";
														if($result['active_status'] == 1) {
															echo "<span class='badge badge-success user_status_btn' data-id='".$result['id']."'>Active</span>";
														} else {
															echo "<span class='badge badge-danger user_status_btn' data-id='".$result['id']."'>Inactive</span>";
														}
														echo "</td>";
														echo "<td><div class='btn-group'>";
														if(is_superadmin()) {
															echo "<button class='btn btn-primary edit_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
															if(($result['role'] == 0 && $result['type'] == 1) || ($result['role'] == 1 && $result['type'] == 1)) {
																echo "<button class='btn btn-danger delete_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
															}
														} else if(is_admin()) {
															if($result['role'] == 1 && $result['type'] == 1) {
																echo "<button class='btn btn-primary edit_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
																echo "<button class='btn btn-danger delete_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
															}
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

					<!-- Adding New User -->
					<div class="modal fade" id="add_user_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">New User</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="add_user_form_msg"></div>
									<form class="form" id="add_user_form" method="post">
										<input type="hidden" value="add_user" name="action">
										<div class="mb-3">
											<label>Display Name:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Display Name" id="add_display_name" name="add_display_name">
										</div>
										<div class="mb-3">
											<label>Username:</label>
											<input type="text" class="form-control form-control-border" placeholder="Enter Username" id="add_user_login" name="add_user_login">
										</div>
										<div class="mb-3">
											<label>Password:</label>
											<input type="password" class="form-control form-control-border" placeholder="Enter Password" id="add_user_password" name="add_user_password">
										</div>
										<div class="mb-3">
											<label>Role:</label>
											<select class="form-control" id="add_user_role" name="add_user_role">
												<option value="">Select Role</option>
												<option value="0">Super Admin</option>
												<option value="1">Admin</option>
												<option value="2">User</option>
											</select>
										</div>
										<button class="btn btn-primary" type="submit" name="add_user_btn" id="add_user_btn">Add User</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Adding New User -->


					<!-- Edit User -->
					<div class="modal fade" id="edit_user_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Edit User</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="edit_user_form_msg"></div>
									<form class="form" id="edit_user_form" method="post">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Edit User -->

					
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

			$('#edit_user_modal').on('shown.bs.modal', function () {
				$('#edit_user_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
			});

			function display_users() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_users' },
					success: function(result) {
						$('#display_users').html(result);
					}
				});
			}
			// display_users();

			$(document).on('click', '.edit_user_btn', function(){
				$('#edit_user_modal').modal('show');
				$('#edit_user_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_edit_user_form', id:id },
						success: function(result) {
							$('#edit_user_form').html(result);
						}
					});
				}
			});

			$('#edit_user_form').on('submit', function(e){
				e.preventDefault();

				if($('#edit_user_name').val() != '' && $('#edit_user_location').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#edit_user_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>User Successfully Updated");
								// display_users();
								$("#example1").load("users.php #display_users");
								$('#edit_user_modal').modal('hide');
							} else if(result == 2) {
								$('#edit_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#edit_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>User Already Exist");
							} else if(result == 0) {
								$('#edit_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			function display_select_departments() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action: 'display_select_departments' },
					success: function(result) {
						$('#add_user_department').html(result);
					}
				});
			}

			$('#add_user_modal').on('shown.bs.modal', function () {
				$('#add_user_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				$('#add_display_name').focus().val('');
				$('#add_user_login').val('');
				$('#add_user_password').val('');
				display_select_departments();
			});

			$('#add_user_form').on('submit', function(e){
				e.preventDefault();

				if($('#add_user_login').val() != '' && $('#add_user_password').val() != '' && $('#add_user_role').val() != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 3) {
								$('#add_user_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>User Successfully Added");
								// display_users();
								$("#example1").load("users.php #display_users");
								$('#add_user_modal').modal('hide');
							} else if(result == 2) {
								$('#add_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
							} else if(result == 1) {
								$('#add_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>User Already Exist");
							} else if(result == 0) {
								$('#add_user_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill Required Fields");
							}
						}
					});
				}
			});

			$(document).on('click', '.delete_user_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete user?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_user', id:id },
							success: function(result) {
								if(result == 2) {
									$('#user_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>User Deleted Successfully");
								} else if(result == 1 || result == 0) {
									$('#user_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please Try Again");
								}
								setTimeout(function(){
									$('#user_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
								}, 1000);
								// display_users();
								$("#example1").load("users.php #display_users");
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
