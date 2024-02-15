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
							<h1 class="m-0">Issue Vouchers</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">Voucher</li>
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
							
							<div class="table-responsive">
								
								<table id="example1" class="display table table-bordered table-striped table-sm" style="max-width: 100%;">
									<thead>
										<tr>
											<th>#</th>
											<th>Voucher Number</th>
											<th>Emp ID</th>
											<th>Employee Name</th>
											<th>Department</th>
											<th>Date</th>
											<th>User</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody id="display_vouchers">
										<?php

										$query = mysqli_query($conn, "SELECT distinct(voucher_number), user_id, voucher_date, people_id, department_id FROM deploy_assets WHERE active_status='1' && delete_status='0'");

										if(mysqli_num_rows($query) > 0) {

											$i = 1;
											while($result = mysqli_fetch_assoc($query)) {

												echo "<tr>";
												echo "<td>".$i."</td>";
												echo "<td>".$result['voucher_number']."</td>";
												echo "<td>".employee_id($result['people_id'])."</td>";
												echo "<td>".people_name($result['people_id'])."</td>";
												echo "<td>".department_name($result['department_id'])."</td>";
												echo "<td>".$result['voucher_date']."</td>";
												echo "<td>".display_name($result['user_id'])."</td>";
												echo "<td><a class='btn btn-primary print_voucher_btn' target='_blank' href='voucher-print.php?voucher_number=".$result['voucher_number']."&voucher_date=".$result['voucher_date']."'><i class='fas fa-print'></i></a></td>";
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

			$(document).on('click', '.print_voucher_btn', function(){
				window.open(this.href,'targetWindow',
                                   `toolbar=no,
                                    location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=SomeSize,
                                    height=SomeSize`);
				return false;
			});

			function display_vouchers() {
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					data: { action:'display_vouchers' },
					success: function(result) {
						$('#display_vouchers').html(result);
					}
				});
			}

			// display_vouchers();

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
