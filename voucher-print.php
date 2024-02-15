<?php


include "head.php";


if(isset($_GET['voucher_number']) && isset($_GET['voucher_date'])) {
	$voucher_number = strip_tags(mysqli_real_escape_string($conn, $_GET['voucher_number']));
	$voucher_date = strip_tags(mysqli_real_escape_string($conn, $_GET['voucher_date']));

	if($voucher_number != '' && $voucher_number != 0) {

		$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE voucher_number='$voucher_number' && active_status='1' && delete_status='0' && parent_id is NULL");

		$people_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE voucher_number='$voucher_number' && parent_id is NULL");

		$people_result = mysqli_fetch_assoc($people_query);

		if(mysqli_num_rows($query) == 0) {
			header('location: vouchers.php');
		}

	} else {
		header('location: vouchers.php');
	}
} else {
	header('location: vouchers.php');
}


?>
	<title>Telephone Industries Of Pakistan</title>
	<style type="text/css">
		* {
			font-size: 20px;
		}
		body {
			overflow-x: hidden;
		}
		tr td {
			text-align: left !important;
		}
		.table-bordered th, .table-bordered td {
			border:  2px solid #000 !important;
		}

		@media print {
			.position_container {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		}
	</style>
</head>
<body onload="window.print()">

	<div class="container pt-1">
		<div class="row">
			<div class="col-3">
				<img src="logo.png" style="width: 100%">
			</div>
			<div class="col-9 align-self-center">
				<h1 class="text-center" style="font-weight: 700; font-size: 40px;">TELEPHONE INDUSTRIES OF PAKISTAN</h1>
			</div>
		</div>
		<div class="row text-center" style="border-bottom: 2px solid #000;">
			<div class="col-9">
			</div>
			<div class="col-3">
				<div class="card" style="border: 2px solid #000;">
					<h4><b>IT DEPARTMENT</b></h4>
				</div>
			</div>
		</div>

		<h1 class="text-center mt-3 text-bold" style="font-size: 30px; text-decoration: underline;">ISSUE VOUCHER</h1>
		<p class="text-right mb-0">NO: <?php echo $voucher_number; ?></p>
		<p class="text-right mb-0">Dated: <?php echo $voucher_date; ?></p>


		<div class="row">
			<div class="col-12 table-responsive">
				
				<table class="table table-striped table-hover table-bordered table-sm">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Description</th>
							<th>Quantity</th>
						</tr>
					</thead>

					<tbody>
						
						<?php

						$i = 1;

						while($result = mysqli_fetch_assoc($query)) {

							$asset_id = $result['asset_id'];

							$assets_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='$asset_id' && parent_id is NULL");

							if(mysqli_num_rows($assets_query) > 0) {

								while($assets_result = mysqli_fetch_assoc($assets_query)) {

									echo "<tr>";
									echo "<td><p class='mb-0'>".$i."</p></td>";
									echo "<td><p class='mb-0'>";

									if($assets_result['asset_type'] == 1) {
										echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
										echo asset_meta($assets_result['id'], 'processor_detail')." Processor<br>";
										echo asset_meta($assets_result['id'], 'power_supply')." Power Supply<br>";
										$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$assets_result['id']}' && active_status='1' && delete_status='0'");
										if(mysqli_num_rows($computer_query) > 0) {
											while($computer_result = mysqli_fetch_assoc($computer_query)) {
												if($computer_result['asset_type'] == 2) {
													if($computer_result['asset_category'] == 19) {
														echo "RAM - DDR".$computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$computer_result['qty']."x<br>";
													} else if($computer_result['asset_category'] == 20) {
														echo $computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$result['qty']."x<br>";
													}
												}
											}
										}
									} else if($assets_result['asset_type'] == 2) {
										if($assets_result['asset_category'] == 1) {
											echo asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
											$printer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$result['id']}' && active_status='1' && delete_status='0'");
											if(mysqli_num_rows($printer_query) > 0) {
												while($printer_result = mysqli_fetch_assoc($printer_query)) {
													if($printer_result['asset_type'] == 2) {
														if($printer_result['asset_category'] == 2) {
															echo $printer_result['asset_name']." - ".asset_meta($printer_result['id'], 'brand_name')." - ".asset_meta($printer_result['id'], 'serial_number')." - ".asset_meta($printer_result['id'], 'model_number')."<br>";
														}
													}
												}
											}
										} else if($assets_result['asset_category'] == 2 || $assets_result['asset_category'] == 3 || $assets_result['asset_category'] == 13) {
											echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
										} else if($assets_result['asset_category'] == 4) {
											echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - Dimension: ".$assets_result['item_size']."\"<br>";
										} else if($assets_result['asset_category'] == 5) {
											echo $assets_result['asset_name']." - ".$assets_result['item_type']."<br>";
										} else if($assets_result['asset_category'] == 6 || $assets_result['asset_category'] == 7 || $assets_result['asset_category'] == 8 || $assets_result['asset_category'] == 9) {
											echo $assets_result['item_type'].$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
										} else if($assets_result['asset_category'] == 10 || $assets_result['asset_category'] == 11 || $assets_result['asset_category'] == 12) {
											echo $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - ".$assets_result['item_type']."<br>";
										} else if($assets_result['asset_category'] == 14 || $assets_result['asset_category'] == 15 || $assets_result['asset_category'] == 16 || $assets_result['asset_category'] == 17 || $assets_result['asset_category'] == 18) {
											echo $assets_result['asset_name']."<br>";
										} else if($assets_result['asset_category'] == 19) {
											echo "DDR".$assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
										} else if($assets_result['asset_category'] == 20) {
											echo $assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
										}
									}
									echo "</p></td>";
									echo "<td><p class='mb-0'>".$result['qty']."</p></td>";
									echo "</tr>";

								}

							}

							$i++;

						}

						?>

					</tbody>

				</table>

			</div>
		</div>


		<div class="row" style="position: fixed; bottom: 0; width: 100%;" class="position_container">
			<div class="col-12">

				<p><b>Please Note:- </b>Officer/staff being issued the above mentioned equipment is responsible for:</p>
				<ul>
					<li>Any damage caused due to mishandling of the equipment.</li>
					<li>Any Component/Accessories loss.</li>
				</ul>
				
				<table class="table table-borderless">
					<tr>
						<td>
							<p><b>Issued By:</b></p>
						</td>
						<td>
							<p><b>Received By:</b></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Name: <b>Muhammad Fahad Yousuf</b></p>
						</td>
						<td>
							<p>Name: <b><?php echo people_name($people_result['people_id']); ?></b> - <b>(Emp ID: <?php echo employee_id($people_result['people_id']); ?>)</b></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Desig: <b>Chief Information Officer</b></p>
						</td>
						<td>
							<p>Desig: <b><?php echo people_designation($people_result['people_id']); ?></b></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Signature: ________________________________</p>
						</td>
						<td>
							<p>Signature: ________________________________</p>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<p>Verified by GM/HOD:_____________________________</p>
						</td>
					</tr>
				</table>

			</div>
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			window.on('load', function(){
				window.print();
			});
		});
	</script>

</body>
</html>