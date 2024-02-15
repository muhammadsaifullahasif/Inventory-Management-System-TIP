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
							<h1 class="m-0">Check In</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="assets.php">Assets</a></li>
								<li class="breadcrumb-item active">Check In</li>
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
							
							<div class="form">
								
								<div class="mb-3">
									<label>Voucher Number:</label>
									<select class="form-control form-control-border" name="voucher_number" id="voucher_number">
										<option value="">Select Voucher Number</option>
									</select>
								</div>

								<div class="mb-3">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>IGR Number</th>
												<th>Name</th>
												<th>Deploy Quantity</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="display_check_in_assets_container"></tbody>
									</table>
								</div>

							</div>

						</div>
					</div>

					<div class="modal fade" id="check_in_modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-heading">Check In Asset</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div id="check_in_form_msg"></div>
									<form id="check_in_form" method="post">
										<div id="check_in_form_container"></div>
										<button class="btn btn-primary" type="submit" name="submit" id="submit">Check In</button>
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

			$(document).on('click', '.check_in_btn', function(){

				var id = $(this).data('id');

				if(id != '' && id != 0) {

					$('#check_in_modal').modal('show');
					$('#check_in_form_msg').removeClass('alert alert-danger alert-success').text('');

					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_check_in_form', id:id },
						success: function(result) {
							$('#check_in_form_container').html(result);
						}
					});

				}

			});

			$(".datepicker, #igr_date").datepicker();

			$(".datepicker, #igr_date").datepicker( "option", "dateFormat", "d-m-yy" );

			function display_voucher_numbers() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_voucher_numbers' },
					success: function(result) {
						$('#voucher_number').html(result);
					}
				});
			}
			display_voucher_numbers();

			function display_voucher_assets(voucher_number) {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_check_in_assets', voucher_number:voucher_number },
					success: function(result) {
						$('#display_check_in_assets_container').html(result);
					}
				});
			}

			$('#voucher_number').on('change', function(){
				var voucher_number = $('#voucher_number').val();
				if(voucher_number != '') {
					display_voucher_assets(voucher_number);
				} else {
					$('#display_check_in_assets_container').html('');
				}
			});

			$('#check_in_form').on('submit', function(e){
				e.preventDefault();

				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(result) {
						if(result == 2) {
							$('#check_in_form_msg').removeClass('alert-danger').addClass('alert alert-success').text('Asset Successfully Checked In');
							setTimeout(function(){
								$('#check_in_form_msg').removeClass('alert alert-danger alert-success').text('');
								$('#check_in_modal').modal('hide');
								display_voucher_assets($('#voucher_number').val());
							}, 1000);
						} else if(result == 1) {
							$('#check_in_form_msg').removeClass('alert-success').addClass('alert alert-danger').text('Please Try Again');
						}
					}
				});

			});
		});
	</script>
</body>
</html>
