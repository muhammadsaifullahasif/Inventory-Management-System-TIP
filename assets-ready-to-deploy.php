

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
							<h1 class="m-0">Assets</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Assets Ready To Deploy</li>
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
									<div id="assets_msg"></div>
									<div class="table-responsive" style="width: 100%; overflow-x: auto;">
										<table id="example1" class="table table-bordered table-striped table-sm" style="max-width: 100%;">
											<thead>
												<tr>
													<th>IGR Number</th>
													<th>Asset Name</th>
													<th>Brand Name</th>
													<th>Serial</th>
													<th>Model</th>
													<th>Type</th>
													<th>Size</th>
													<th>Category</th>
													<th>Quantity</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="display_ready_to_deploy_assets">
												<?php

													$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && active_status='1' && delete_status='0' && parent_id is NULL");

													if(mysqli_num_rows($query) > 0) {

														$i = 1;
														while($result = mysqli_fetch_assoc($query)) {

															echo  "<tr>";
															echo  "<td>".$result['igr_number']."</td>";
															echo  "<td>".$result['asset_name']."</td>";
															if($result['asset_type'] == 2) {
																if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
																	echo  "<td></td><td></td><td></td>";
																} else {
																	echo  "<td>".asset_meta($result['id'], 'brand_name')."</td>";
																	echo  "<td>".asset_meta($result['id'], 'serial_number')."</td>";
																	echo  "<td>".asset_meta($result['id'], 'model_number')."</td>";
																}
															} else {
																echo  "<td>".asset_meta($result['id'], 'brand_name')."</td>";
																echo  "<td>".asset_meta($result['id'], 'serial_number')."</td>";
																echo  "<td>".asset_meta($result['id'], 'model_number')."</td>";
															}
															echo  "<td>";
															if($result['asset_type'] == 2) {
																if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
																	echo  $result['item_type'];
																} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
																	echo  $result['item_type']." Ports";
																} else if($result['asset_category'] == 19) {
																	echo  "DDR".$result['item_type'];
																} else if($result['asset_category'] == 20) {
																	echo  $result['item_type'];
																}
															}
															echo  "</td>";
															echo  "<td>";
															if($result['asset_type'] == 2) {
																if($result['asset_category'] == 4) {
																	echo  $result['item_size'].'"';
																} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
																	echo  $result['item_size']."GB";
																}
															}
															echo  "</td>";
															echo  "<td>";
															if($result['asset_type'] == 1) {
																echo  "Computer";
															} else if($result['asset_type'] == 2) {
																if($result['asset_category'] == 1) {
																	echo  "Printer";
																} else if($result['asset_category'] == 2) {
																	echo  "Tonor";
																} else if($result['asset_category'] == 3) {
																	echo  "Scanner";
																} else if($result['asset_category'] == 4) {
																	echo  "Computer Screen";
																} else if($result['asset_category'] == 5) {
																	echo  "Cable";
																} else if($result['asset_category'] == 6) {
																	echo  "Keyboard";
																} else if($result['asset_category'] == 7) {
																	echo  "Mouse";
																} else if($result['asset_category'] == 8) {
																	echo  "Speaker";
																} else if($result['asset_category'] == 9) {
																	echo  "Microphone";
																} else if($result['asset_category'] == 10) {
																	echo  "Network Switch";
																} else if($result['asset_category'] == 11) {
																	echo  "Network HUB";
																} else if($result['asset_category'] == 12) {
																	echo  "Network Router";
																} else if($result['asset_category'] == 13) {
																	echo  "Media Converter";
																} else if($result['asset_category'] == 14) {
																	echo  "Extension";
																} else if($result['asset_category'] == 15) {
																	echo  "Tools";
																} else if($result['asset_category'] == 16) {
																	echo  "Ethernet Connector";
																} else if($result['asset_category'] == 17) {
																	echo  "Tie";
																} else if($result['asset_category'] == 18) {
																	echo  "Network Cable";
																} else if($result['asset_category'] == 19) {
																	echo  "RAM";
																} else if($result['asset_category'] == 20) {
																	echo  "ROM";
																}
															}
															echo  "</td>";
															echo  "<td>";
															if($result['asset_type'] == 2) {
																if($result['asset_category'] == 18) {
																	echo  $result['qty']." Feet";
																} else {
																	echo  $result['qty'];
																}
															} else {
																echo  $result['qty'];
															}
															echo  "</td>";
															echo  "<td><div class='btn-group'>";
															// echo  "<a class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
															if(is_superadmin() || is_admin()) {
																if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM deploy_assets WHERE asset_id='{$result['id']}' && active_status='1' && delete_status='0'")) == 0) {
																	echo  "<a href='asset-edit.php?id=".$result['id']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>";
																	echo  "<a class='btn btn-danger btn-sm asset_delete_btn' data-id='".$result['id']."'><i class='fas fa-trash'></i></a>";
																}
															}
															echo  "</div></td>";
															echo  "</tr>";

														}

													} else {
														echo  "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
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


			function display_ready_to_deploy_assets(asset_type = 'all') {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_ready_to_deploy_assets', asset_type:asset_type },
					success: function(result) {
						$('#display_ready_to_deploy_assets').html(result);
					}
				});
			}

			// display_ready_to_deploy_assets();


			$(document).on('click', '.asset_delete_btn', function(){

				var id = $(this).data('id');

				if(id != '' && id != 0) {

					if(confirm('Are you sure to delete this?')) {
						$.ajax({
							url: 'ajax.php',
							type: 'POST',
							data: { action:'delete_assets', id:id },
							success: function(result) {
								if(result == 2) {
									$('#assets_msg').removeClass('alert-danger').addClass('alert alert-success').text('Asset Deleted Successfully');
									// display_assets();
									$("#example1").load("assets-ready-to-deploy.php #display_ready_to_deploy_assets");
								} else if(result == 1) {
									$('#assets_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
								}

								setTimeout(function(){
									$('#assets_msg').removeClass('alert alert-danger alert-success').text('');
								}, 1000);
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
