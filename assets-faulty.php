

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
							<h1 class="m-0">Faulty Assets</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
								<li class="breadcrumb-item active">Faulty Assets</li>
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
								<!-- /.card-header -->
								<div class="card-body">
									<div id="assets_msg"></div>
									<div class="table-responsive" style="width: 100%; overflow-x: auto;">
										<table id="example1" class="table table-bordered table-striped table-sm" style="max-width: 100%;">
											<thead>
												<tr>
													<th>IGR Number</th>
													<th>Voucher Number</th>
													<th>People Name</th>
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
											<tbody id="display_faulty_assets">
												<?php


													$query = mysqli_query($conn, "SELECT f.voucher_number, f.people_id, f.asset_id, f.qty, a.id, a.igr_number, a.igr_date, a.asset_type, a.asset_category, a.asset_name, a.item_type, a.item_size FROM faulty_assets f LEFT JOIN assets a ON f.asset_id=a.id WHERE a.active_status='1' && a.delete_status='0'");

													if(mysqli_num_rows($query) > 0) {

														$i = 1;
														while($result = mysqli_fetch_assoc($query)) {

															echo "<tr>";
															echo "<td>".$result['igr_number']."</td>";
															echo "<td>".$result['voucher_number']."</td>";
															echo "<td>".people_name($result['people_id'])."</td>";
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
															echo "<a class='btn btn-success btn-sm repair_asset' data-id='".$result['id']."'>Repair</a>";
															echo "<a class='btn btn-danger btn-sm defect_asset' data-id='".$result['id']."'>Defect</a>";
															echo "</div></td>";
															echo "</tr>";

														}

													} else {
														echo "<tr><td colspan='12' class='text-center'>No Record Found</td></tr>";
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

					<div class="modal fade" id="repair_assets_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Repair Assets</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="repair_assets_form_msg"></div>
									<form class="form" id="repair_assets_form" method="post">
										
										<div id="repair_assets_container"></div>

										<button type="submit" class="btn btn-primary" id="submit">Submit</button>

									</form>

								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="defect_assets_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Defect Assets</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="defect_assets_form_msg"></div>
									<form class="form" id="defect_assets_form" method="post">
										
										<div id="defect_assets_container"></div>

										<button type="submit" class="btn btn-primary" id="submit">Submit</button>

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


			function display_faulty_assets() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_faulty_assets' },
					success: function(result) {
						$('#display_faulty_assets').html(result);
					}
				});
			}

			// display_faulty_assets();

			$(document).on('click', '.repair_asset', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {

					$('#repair_assets_modal').modal('show');
					$('#repair_assets_form_msg').removeClass('alert alert-danger alert-success').text('');

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'repair_asset_display', id:id },
						success: function(result) {
							$('#repair_assets_container').html(result);
						}
					});

				}

			});

			$('#repair_assets_form').on('submit', function(e){

				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(result) {
						if(result == 2) {
							$('#repair_assets_form_msg').removeClass('alert-danger').addClass('alert alert-success').text('Asset Successfull Repaired');
							setTimeout(function(){
								$('#repair_assets_form_msg').removeClass('alert alert-danger alert-success').text('');
								// display_faulty_assets();
								$("#example1").load("assets-faulty.php #example1");
							}, 1000);
							$('#repair_assets_modal').modal('hide');
						} else if(result == 1) {
							$('#repair_assets_form_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
						}
					}
				});

			});

			$(document).on('click', '.defect_asset', function(){
				var id = $(this).data('id');

				if(id != '' && id != 0) {

					$('#defect_assets_modal').modal('show');
					$('#defect_assets_form_msg').removeClass('alert alert-danger alert-success').text('');

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'defect_asset_display', id:id },
						success: function(result) {
							$('#defect_assets_container').html(result);
						}
					});

				}

			});

			$('#defect_assets_form').on('submit', function(e){

				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(result) {
						if(result == 2) {
							$('#defect_assets_form_msg').removeClass('alert-danger').addClass('alert alert-success').text('Asset Successfull Marked Defected');
							setTimeout(function(){
								$('#defect_assets_form_msg').removeClass('alert alert-danger alert-success').text('');
								// display_faulty_assets();
								$("#example1").load("assets-faulty.php #display_faulty_assets");
							}, 1000);
							$('#defect_assets_modal').modal('hide');
						} else if(result == 1) {
							$('#defect_assets_form_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
						}
					}
				});

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
									// display_assets();
									$("#example1").load("assets-faulty.php #display_faulty_assets");
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
