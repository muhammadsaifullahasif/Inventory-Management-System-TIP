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
							<h1 class="m-0">Dashboard v2</h1>
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
			// var barColors = ["rgba(0,0,255,1.0)", "rgba(0,0,255,0.8)", "rgba(0,0,255,0.6)", "rgba(0,0,255,0.4)", "rgba(0,0,255,0.2)"];
			var xValues = ["Pending", "Archieved", "Ready to Deploy"];
			var yValues = [55, 49, 44];
			var barColors = ["#ff4a46", "#006fa6", "#008941"];
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
		});
	</script>
</body>
</html>
