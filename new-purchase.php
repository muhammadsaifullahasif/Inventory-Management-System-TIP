<?php include "head.php"; ?>
	<title>Telephone Industries Of Pakistan</title>

	<style type="text/css">
		input {
			text-transform: uppercase;
		}
	</style>

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
							<h1 class="m-0">New Purchase</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active">New Purchase</li>
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
							<div id="new_purchase_form_msg"></div>
							<form class="form" method="post" id="new_purchase_form" autocomplete="off">
								<input type="hidden" value="new_purchase" name="action">

								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="igr_detail">
									<label class="custom-control-label" for="igr_detail">Exsisting IGR</label>
								</div>

								<div id="igr_detail_container">
									<div class="mb-3">
										<label>IGR Number:</label>
										<input type="text" class="form-control form-control-border" placeholder="Enter IGR Number" id="igr_number" name="igr_number" required>
										<div id="igr_number_msg"></div>
									</div>
									<div class="mb-3">
										<label>IGR Date:</label>
										<input type="text" class="form-control form-control-border datepicker" placeholder="Enter IGR Date" id="igr_date" name="igr_date" required>
										<div id="igr_date_msg"></div>
									</div>
								</div>
								<div id="igr_date_container"></div>

								<div class="mb-3">
									<label>Item Name:</label>
									<input type="text" class="form-control form-control-border" placeholder="Enter Item Name" id="item_name" name="item_name" required>
									<div id="item_name_msg"></div>
								</div>
								<div class="mb-3">
									<label>Asset Type:</label>
									<select class="form-control form-control-border" id="asset_type" name="asset_type" required>
										<option value="">Select Asset Type</option>
										<option value="1">Computer</option>
										<option value="2">Accessories</option>
									</select>
									<div id="item_type_msg"></div>
								</div>
								<div id="item_category_container"></div>
								<div id="item_detail_container"></div>
								<button class="btn btn-primary" type="submit" id="submit" name="submit">Submit</button>
							</form>
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

			$(document).on('change', 'select#igr_number', function(){
				var igr_number = $(this).val();
				if(igr_number != '' && igr_number != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_igr_date', igr_number:igr_number },
						success: function(result) {
							$('#igr_date_container').html(result);
						}
					});
				} else {
					$('#igr_date_container').html('');
				}
			});

			$('#igr_detail').on('change', function(){
				if($('#igr_detail').is(':checked')) {
					$('#igr_detail_container').html("<div class='mb-3'><label>IGR Number:</label><select class='form-control form-control-border' name='igr_number' id='igr_number'><option value=''>Select IGR Number</option></select></div>");
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'display_igr_numbers' },
						success: function(result) {
							$('#igr_number').html(result);
						}
					});
				} else {
					$('#igr_detail_container').html('<div class="mb-3"><label>IGR Number:</label><input type="text" class="form-control form-control-border" placeholder="Enter IGR Number" id="igr_number" name="igr_number" required><div id="igr_number_msg"></div></div><div class="mb-3"><label>IGR Date:</label><input type="text" class="form-control form-control-border datepicker" placeholder="Enter IGR Date" id="igr_date" name="igr_date" required><div id="igr_date_msg"></div></div>');
					$(".datepicker, #igr_date").datepicker();

					$(".datepicker, #igr_date").datepicker( "option", "dateFormat", "d-m-yy" );
				}
			});

			$('input#igr_number').on('blur', function(){
				var igr_number = $('#igr_number').val();

				if(igr_number != '' && igr_number != 0) {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: { action:'check_igr_number', igr_number:igr_number },
						success: function(result) {
							if(result == 1) {
								$('#igr_number').removeClass('is-valid').addClass('is-invalid').val('').attr('disabled', 'disabled');
								$('#igr_number_msg').removeClass('valid-feedback').addClass('invalid-feedback').text('IGR Number Already Exist');
								$('#igr_date').attr('disabled', 'disabled');
							} else {
								$('#igr_number').removeAttr('disabled');
								$('#igr_date').removeAttr('disabled');
							}
						}
					});
				}
			});

			$(".datepicker, #igr_date").datepicker();

			$(".datepicker, #igr_date").datepicker( "option", "dateFormat", "d-m-yy" );

			function item_detail_container(file_path) {
				$.ajax({
					url: file_path,
					success: function(result) {
						$('#item_detail_container').html(result);
					}
				});
			}
			
			$('#asset_type').on('change', function(){
				if($('#asset_type').val() == '1') {
					$('#item_category_container').html('');
					item_detail_container('widgets/new_purchase/computer-detail.php');
				} else if($('#asset_type').val() == '2') {
					$('#item_detail_container').html('');
					$('#item_category_container').html("<div class='mb-3'><label>Category:</label><select class='form-control form-control-border' id='asset_category' name='asset_category'><option value=''>Select Item Category</option><option value='1'>Printer</option><option value='2'>Tonor</option><option value='3'>Scanner</option><option value='4'>Computer Screen</option><option value='5'>Cable</option><option value='6'>Keyboard</option><option value='7'>Mouse</option><option value='8'>Speaker</option><option value='9'>Microphone</option><option value='10'>Network Switch</option><option value='11'>Wireless Router / Access Point</option><option value='12'>Network Router</option><option value='13'>Media Converter</option><option value='14'>Extension with Wire</option><option value='15'>Working Tools</option><option value='16'>Ethernet Connector</option><option value='17'>Tie</option><option value='18'>Network Cable</option><option value='19'>RAM</option><option value='20'>ROM</option></select><div id='item_category_msg'></div>");
				}

			});


			$(document).on('change', '#asset_category', function(){
				// var asset_category = $('#asset_category').val();
				if($('#asset_category').val() == '1') { // Printer Details
					item_detail_container('widgets/new_purchase/printer-detail.php');
				} else if($('#asset_category').val() == '2') { // Tonor Details
					item_detail_container('widgets/new_purchase/tonor-detail.php');
				} else if($('#asset_category').val() == '3') { // Scanner Details
					item_detail_container('widgets/new_purchase/scanner-detail.php');
				} else if($('#asset_category').val() == '4') { // Computer Screen Detail
					item_detail_container('widgets/new_purchase/computer-screen-detail.php');
				} else if($('#asset_category').val() == '5') { // Cable Details
					item_detail_container('widgets/new_purchase/cable-detail.php');
				} else if($('#asset_category').val() == '6') { // Keyboard Details
					item_detail_container('widgets/new_purchase/keyboard-detail.php');
				} else if($('#asset_category').val() == '7') { // Mouse Details
					item_detail_container('widgets/new_purchase/mouse-detail.php');
				} else if($('#asset_category').val() == '8') { // Speaker Details
					item_detail_container('widgets/new_purchase/speaker-detail.php');
				} else if($('#asset_category').val() == '9') { // Microphone Details
					item_detail_container('widgets/new_purchase/microphone-detail.php');
				} else if($('#asset_category').val() == '10') { // Network Switch Detail
					item_detail_container('widgets/new_purchase/network-switch-detail.php');
				} else if($('#asset_category').val() == '11') { // Wireless Details
					item_detail_container('widgets/new_purchase/wireless-detail.php');
				} else if($('#asset_category').val() == '12') { // Network Router Detail
					item_detail_container('widgets/new_purchase/network-router-detail.php');
				} else if($('#asset_category').val() == '13') { // Media Converter
					item_detail_container('widgets/new_purchase/media-converter-detail.php');
				} else if($('#asset_category').val() == '14') { // Extension with Wire
					item_detail_container('widgets/new_purchase/extension-detail.php');
				} else if($('#asset_category').val() == '15') { // Working Tools Details
					item_detail_container('widgets/new_purchase/tools-detail.php');
				} else if($('#asset_category').val() == '16') { // Ethernet Connectors Details
					item_detail_container('widgets/new_purchase/ethernet-connector-detail.php');
				} else if($('#asset_category').val() == '17') { // Ties Details
					item_detail_container('widgets/new_purchase/tie-detail.php');
				} else if($('#asset_category').val() == '18') { // Network Cable Details
					item_detail_container('widgets/new_purchase/network-cable-detail.php');
				} else if($('#asset_category').val() == '19') { // RAM Details
					item_detail_container('widgets/new_purchase/ram-detail.php');
				} else if($('#asset_category').val() == '20') { // ROM Details
					item_detail_container('widgets/new_purchase/rom-detail.php');
				}
			});


			$('#new_purchase_form').on('submit', function(e) {
				e.preventDefault();


				$(this).validate(); 


				if($('#item_name').val() != '' && $('#item_type') != '') {
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						data: $(this).serialize(),
						success: function(result) {
							if(result == 0) {
								$('#new_purchase_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Fill All Required Fields");
							} else if(result == 1) {
								$('#new_purchase_form_msg').removeClass('alert-success').addClass('alert alert-danger alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Please try again");
							} else if(result == 2) {
								$('#new_purchase_form_msg').removeClass('alert-danger').addClass('alert alert-success alert-dismissible').html("<button type='button' class='close' data-dismiss='alert'>×</button>Item Successfully Added");

								$('#igr_number, #igr_date, #item_name').val('');
								$('#asset_type').val('').change();

								$('#item_category_container').html('');

								$('#item_detail_container').html('');

								setTimeout(function(){
									$('#new_purchase_form_msg').removeClass('alert alert-danger alert-success alert-dismissible').html('');
								}, 1000);
							}

						}
					});
				}

			});

		});
	</script>
</body>
</html>
