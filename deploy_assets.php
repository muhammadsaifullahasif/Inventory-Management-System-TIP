<?php

include "head.php";

if(isset($_GET['id']) && isset($_GET['type'])) {

	$id = strip_tags(mysqli_real_escape_string($conn, $_GET['id']));
	$type = strip_tags(mysqli_real_escape_string($conn, $_GET['type']));

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
							<h1 class="m-0">Deployed Assets</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
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

					<div class="row">
						<div class="col-12">
							<div id="deploy_assets_msg"></div>
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="example1">
									
									<thead>
										<tr>
											<th>#</th>
											<th>Voucher Number:</th>
											<th>Voucher Date:</th>
											<th>Item Name:</th>
											<th>Qty</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody id="display_deploy_assets">
										<?php

										if($type == 1) {
											$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE people_id='$id' && deploy_to='$type' && active_status='1' && delete_status='0'");
										} else if($type == 2) {
											$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE department_id='$id' && active_status='1' && delete_status='0'");
										}

										if(mysqli_num_rows($query) > 0) {
											$i = 1;
											while($result = mysqli_fetch_assoc($query)) {

												echo "<tr>";
												echo "<td>".$i."</td>";
												echo "<td>".$result['voucher_number']."</td>";
												echo "<td>".$result['voucher_date']."</td>";
												echo "<td>".asset_name($result['asset_id'])."</td>";
												echo "<td>".$result['qty']."</td>";
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
			
			function display_deploy_assets() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_deploy_assets', id:<?php echo $id; ?>, deploy_to:<?php echo $type; ?> },
					success: function(result) {
						$('#display_deploy_assets').html(result);
					}
				});
			}

			// display_deploy_assets();

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
									$("#example1").load("deploy_assets.php?id=<?php echo $id; ?>&type=<?php echo $type; ?> #display_deploy_assets");
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
								$("#example1").load("deploy_assets.php?id=<?php echo $id; ?>&type=<?php echo $type; ?> #display_deploy_assets");
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
