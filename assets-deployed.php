<?php

include "head.php";

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
							<h1 class="m-0">All Deployed</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
								<li class="breadcrumb-item active">All Deployed</li>
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
									<ul class="nav nav-pills">
										<li class="nav-item mx-1"><a href="check-in.php" class="nav-link text-white btn btn-success"><i class="fas fa-arrow-down mr-1"></i>Check In</a></li>
										<li class="nav-item mx-1"><a href="check-out.php" class="nav-link text-white btn btn-danger"><i class="fas fa-arrow-up mr-1"></i>Check Out</a></li>
									</ul>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div id="deploy_assets_msg"></div>
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered" id="example1">
											
											<thead>
												<tr>
													<th>#</th>
													<th>Voucher Number:</th>
													<th>Voucher Date:</th>
													<th>Emp ID</th>
													<th>Employee Name</th>
													<th>Department</th>
													<th>Item Name:</th>
													<th>Qty</th>
													<th>User</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody id="display_all_deploy_assets">
												<?php

													$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE active_status='1' && delete_status='0'");

													if(mysqli_num_rows($query) > 0) {
														$i = 1;
														while($result = mysqli_fetch_assoc($query)) {

															$assets_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='{$result['asset_id']}' && active_status='1' && delete_status='0'");
															$assets_result = mysqli_fetch_assoc($assets_query);

															echo "<tr>";
															echo "<td>".$i."</td>";
															echo "<td>".$result['voucher_number']."</td>";
															echo "<td>".$result['voucher_date']."</td>";
															echo "<td>".employee_id($result['people_id'])."</td>";
															echo "<td>".people_name($result['people_id'])."</td>";
															echo "<td>".department_name($result['department_id'])."</td>";
															echo "<td>";

															if($assets_result['asset_type'] == 1) {
																echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																echo asset_meta($assets_result['id'], 'processor_detail')." Processor<br>";
																$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$assets_result['id']}' && active_status='1' && delete_status='0'");
															} else if($assets_result['asset_type'] == 2) {
																if($assets_result['asset_category'] == 1) {
																	echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																} else if($assets_result['asset_category'] == 2 || $assets_result['asset_category'] == 3 || $assets_result['asset_category'] == 13) {
																	echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																} else if($assets_result['asset_category'] == 4) {
																	echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - Dimension: ".$assets_result['item_size']."\"<br>";
																} else if($assets_result['asset_category'] == 5) {
																	echo $assets_result['asset_name']." - ".$assets_result['item_type']."<br>";
																} else if($assets_result['asset_category'] == 6 || $assets_result['asset_category'] == 7 || $assets_result['asset_category'] == 8 || $assets_result['asset_category'] == 9) {
																	echo $assets_result['item_type']." - ".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																} else if($assets_result['asset_category'] == 10 || $assets_result['asset_category'] == 11 || $assets_result['asset_category'] == 12) {
																	echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".$assets_result['item_type']."<br>";
																} else if($assets_result['asset_category'] == 14 || $assets_result['asset_category'] == 15 || $assets_result['asset_category'] == 16 || $assets_result['asset_category'] == 17 || $assets_result['asset_category'] == 18) {
																	echo $assets_result['asset_name']."<br>";
																} else if($assets_result['asset_category'] == 19) {
																	echo "DDR".$assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																} else if($assets_result['asset_category'] == 20) {
																	echo $assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')."<br>";
																}
															}

															echo "</td>";
															echo "<td>";
															if($assets_result['asset_type'] == 2 && $assets_result['asset_category'] == 18) {
																echo $result['qty']." Feet";
															} else {
																echo $result['qty'];
															}
															echo "</td>";
															echo "<td>".display_name($result['user_id'])."</td>";
															echo "<td><div class='btn-group'>";
															if(is_superadmin() || is_admin()) {
																echo "<button class='btn btn-primary edit_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
																echo "<button class='btn btn-danger delete_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
															}
															echo "</div></td>";
															echo "</tr>";

															$i++;
														}
													}

												?>
											</tbody>

										</table>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="modal fade" id="edit_deploy_asset_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Edit Deploy Asset</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									
									<div id="edit_deploy_asset_msg"></div>
									<form class="form" method="post" id="edit_deploy_asset_form">
										
										<div id="edit_deploy_asset_container"></div>

									</form>

								</div>
							</div>
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
			
			function display_all_deploy_assets() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_all_deploy_assets' },
					success: function(result) {
						$('#display_all_deploy_assets').html(result);
					}
				});
			}

			// display_all_deploy_assets();

			$(document).on('click', '.delete_deploy_asset_btn', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {
					if(confirm('Are you sure to delete this asset?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_deploy_asset', id:id },
							success: function(result) {
								if(result == 2) {
									$('#deploy_assets_msg').removeClass('alert-danger').addClass('alert alert-success').text('Asset Deleted Successfully');
									// display_deploy_assets();
									$("#example1").load("assets-deployed.php #display_all_deploy_assets");
								} else {
									$('#deploy_assets_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
								}
								setTimeout(function(){
									$('#deploy_assets_msg').removeClass('alert alert-danger alert-success').text('');
								}, 1000);
							}
						});
					}
				}
			});

			$(document).on('click', '.edit_deploy_asset_btn', function(){

				var id = $(this).data('id');

				if(id != '' && id != 0) {
					$('#edit_deploy_asset_modal').modal('show');
					$('#edit_deploy_asset_container input').focus();
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'edit_deploy_asset_display', id:id },
						success: function(result) {
							$('#edit_deploy_asset_container').html(result);
						}
					});
				}

			});

			$('#edit_deploy_asset_form').on('submit', function(e){
				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(result) {
						if(result == 2) {
							$('#edit_deploy_asset_msg').removeClass('alert-danger').addClass('alert alert-success').text('Quantity Updated Successfully');
							setTimeout(function(){
								$('#edit_deploy_asset_msg').removeClass('alert alert-danger alert-success').text('');
								$('#edit_deploy_asset_modal').modal('hide');
								// display_deploy_assets();
								$("#example1").load("assets-deployed.php #display_all_deploy_assets");
							}, 1000);
						} else {
							$('#edit_deploy_asset_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
						}
					}
				});

			});

			$('#edit_deploy_asset_modal').on('shown.bs.modal', function () {
				$('#edit_deploy_asset_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
				$('#edit_deploy_asset_modal input').focus();
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
