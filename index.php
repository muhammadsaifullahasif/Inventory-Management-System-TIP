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
							<h1 class="m-0">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Info boxes -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box">
								<span class="info-box-icon bg-info elevation-1"><i class="fas fa-barcode"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Assets</span>
									<span class="info-box-number">
										<?php

										$total_assets = 0;
										$asset_query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && asset_category!='18' && active_status='1' && delete_status='0'");
										if(mysqli_num_rows($asset_query) > 0) {
											while($asset_result = mysqli_fetch_assoc($asset_query)) {
												$total_assets = $total_assets + $asset_result['qty'];
											}
										}

										echo $total_assets;

										?>
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-map-marker-alt"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Locations</span>
									<span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM locations WHERE active_status='1' && delete_status='0'")); ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>

						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Departments</span>
									<span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM departments WHERE active_status='1' && delete_status='0'")); ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Peoples</span>
									<span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM peoples WHERE active_status='1' && delete_status='0'")); ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-md-8">
							<!-- TABLE: LATEST ORDERS -->
							<div class="card">
								<div class="card-header border-transparent">
									<h3 class="card-title">Recent Assets</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<div class="table-responsive">
										<table class="table m-0">
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
										</table>
									</div>
									<div class="table-responsive" style="height: 100%; max-height: 250px; overflow-y: auto;">
										<table class="table m-0">
											<tbody id="display_assets">
												<?php

												$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && active_status='1' && delete_status='0' && parent_id is NULL");

												if(mysqli_num_rows($query) > 0) {

													$i = 1;
													while($result = mysqli_fetch_assoc($query)) {

														echo "<tr>";
														echo "<td>".$result['igr_number']."</td>";
														echo "<td>".$result['asset_name']."</td>";
														if($result['asset_type'] == 2) {
															if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
																echo "<td></td><td></td><td></td>";
															} else {
																echo "<td>".asset_meta($result['id'], 'brand_name')."</td>";
																echo "<td>".asset_meta($result['id'], 'serial_number')."</td>";
																echo "<td>".asset_meta($result['id'], 'model_number')."</td>";
															}
														} else {
															echo "<td>".asset_meta($result['id'], 'brand_name')."</td>";
															echo "<td>".asset_meta($result['id'], 'serial_number')."</td>";
															echo "<td>".asset_meta($result['id'], 'model_number')."</td>";
														}
														echo "<td>";
														if($result['asset_type'] == 2) {
															if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
																echo $result['item_type'];
															} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
																echo $result['item_type']." Ports";
															} else if($result['asset_category'] == 19) {
																echo "DDR".$result['item_type'];
															} else if($result['asset_category'] == 20) {
																echo $result['item_type'];
															}
														}
														echo "</td>";
														echo "<td>";
														if($result['asset_type'] == 2) {
															if($result['asset_category'] == 4) {
																echo $result['item_size'].'"';
															} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
																echo $result['item_size']."GB";
															}
														}
														echo "</td>";
														echo "<td>";
														if($result['asset_type'] == 1) {
															echo "Computer";
														} else if($result['asset_type'] == 2) {
															if($result['asset_category'] == 1) {
																echo "Printer";
															} else if($result['asset_category'] == 2) {
																echo "Tonor";
															} else if($result['asset_category'] == 3) {
																echo "Scanner";
															} else if($result['asset_category'] == 4) {
																echo "Computer Screen";
															} else if($result['asset_category'] == 5) {
																echo "Cable";
															} else if($result['asset_category'] == 6) {
																echo "Keyboard";
															} else if($result['asset_category'] == 7) {
																echo "Mouse";
															} else if($result['asset_category'] == 8) {
																echo "Speaker";
															} else if($result['asset_category'] == 9) {
																echo "Microphone";
															} else if($result['asset_category'] == 10) {
																echo "Network Switch";
															} else if($result['asset_category'] == 11) {
																echo "Network HUB";
															} else if($result['asset_category'] == 12) {
																echo "Network Router";
															} else if($result['asset_category'] == 13) {
																echo "Media Converter";
															} else if($result['asset_category'] == 14) {
																echo "Extension";
															} else if($result['asset_category'] == 15) {
																echo "Tools";
															} else if($result['asset_category'] == 16) {
																echo "Ethernet Connector";
															} else if($result['asset_category'] == 17) {
																echo "Tie";
															} else if($result['asset_category'] == 18) {
																echo "Network Cable";
															} else if($result['asset_category'] == 19) {
																echo "RAM";
															} else if($result['asset_category'] == 20) {
																echo "ROM";
															}
														}
														echo "</td>";
														echo "<td>";
														if($result['asset_type'] == 2) {
															if($result['asset_category'] == 18) {
																echo $result['qty']." Feet";
															} else {
																echo $result['qty'];
															}
														} else {
															echo $result['qty'];
														}
														echo "</td>";
														echo "<td><div class='btn-group'>";
														// echo "<a class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
														if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM deploy_assets WHERE asset_id='{$result['id']}' && active_status='1' && delete_status='0'")) == 0) {
															if(is_superadmin() || is_admin()) {
																echo "<a href='asset-edit.php?id=".$result['id']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>";
																echo "<a class='btn btn-danger btn-sm asset_delete_btn' data-id='".$result['id']."'><i class='fas fa-trash'></i></a>";
															}
														}
														echo "</div></td>";
														echo "</tr>";

													}

												} else {
													echo "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
												}

												?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
									<a href="check-in.php" class="btn btn-sm btn-success float-left mr-2">Check In</a>
									<a href="check-out.php" class="btn btn-sm btn-danger float-left mr-2">Check Out</a>
									<a href="new-purchase.php" class="btn btn-sm btn-info float-right mr-2">Add New Asset</a>
									<a href="assets.php" class="btn btn-sm btn-secondary float-right mr-2">View All Assets</a>
								</div>
								<!-- /.card-footer -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Assets Usage</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="chart-responsive">
												<canvas id="pieChart" height="200" width="200"></canvas>
											</div>
											<!-- ./chart-responsive -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
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

			function display_assets(asset_type = 'all') {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_assets', asset_type:asset_type },
					success: function(result) {
						$('#display_assets').html(result);
					}
				});
			}

			// display_assets();

			// var barColors = ["rgba(0,0,255,1.0)", "rgba(0,0,255,0.8)", "rgba(0,0,255,0.6)", "rgba(0,0,255,0.4)", "rgba(0,0,255,0.2)"];
			var xValues = ["Already Deployed", "Faulty", "Defected"];
			var yValues = [
			<?php

			$total_deploy_assets = 0;
			$deploy_asset_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE active_status='1' && delete_status='0'");
			if(mysqli_num_rows($deploy_asset_query) > 0) {
				while($deploy_asset_result = mysqli_fetch_assoc($deploy_asset_query)) {
					$total_deploy_assets = $total_deploy_assets + $deploy_asset_result['qty'];
				}
			}
			echo $total_deploy_assets;

			?>,
			<?php

			$total_faulty_assets = 0;
			$faulty_asset_query = mysqli_query($conn, "SELECT * FROM faulty_assets WHERE active_status='1' && delete_status='0'");
			if(mysqli_num_rows($faulty_asset_query) > 0) {
				while($faulty_asset_result = mysqli_fetch_assoc($faulty_asset_query)) {
					$faulty_deploy_assets = $faulty_deploy_assets + $faulty_asset_result['qty'];
				}
			}
			echo $total_faulty_assets;

			?>,
			<?php

			$total_defect_assets = 0;
			$defect_asset_query = mysqli_query($conn, "SELECT * FROM defect_assets WHERE active_status='1' && delete_status='0'");
			if(mysqli_num_rows($defect_asset_query) > 0) {
				while($defect_asset_result = mysqli_fetch_assoc($defect_asset_query)) {
					$total_defect_assets = $total_defect_assets + $defect_asset_result['qty'];
				}
			}
			echo $total_defect_assets;

			?>];
			var barColors = ["#008941", "#006fa6", "#ff4a46"];
			new Chart("pieChart", {
				type: "pie",
				data: {
					labels: xValues,
					datasets: [{
						backgroundColor: barColors,
						data: yValues
					}]
				},
				options: {
					title: {
						display: true,
						text: "World Wide Wine Production"
					}
				}
			});

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
									display_assets('all');
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
		});
	</script>
</body>
</html>
