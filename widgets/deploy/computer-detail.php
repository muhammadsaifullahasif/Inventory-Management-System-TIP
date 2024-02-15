
<?php


include "../../function.php";

$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && asset_type='1' && active_status='1' && delete_status='0'");

if(mysqli_num_rows($query) > 0) {

	$computer_query = mysqli_query($conn, "SELECT * FROM computers WHERE active_status='1' && delete_status='0' && qty!='0'");

	if(mysqli_num_rows($computer_query) > 0) {


		?>
		<div class="mb-3">
			<label>Computer:</label>
			<select class="form-control form-control-border" id="computer" name="computer_id" required>
				<option value="">Select Computer</option>
				<?php

				while($computer_result = mysqli_fetch_assoc($computer_query)) {
					echo "<option value='".$computer_result['id']."'>".$computer_result['brand_name']." - ".$computer_result['model_number']." - ".$computer_result['serial_number']." - ".computer_meta($computer_result['id'], 'processor_detail')." - ".computer_meta($computer_result['id'], 'power_supply')." Power Supply</option>";
				}

				?>
			</select>
		</div>

		<input type="hidden" value="1" name="deploy_quantity">

		<div id="computer_accessories_container"></div>

		<?php

	} else {
		echo "<p class='alert alert-danger'>You haven't any Computer in Inventory</p>";
	}

} else {
	echo "<p class='alert alert-danger'>You haven't any Computer in Inventory</p>";
}

?>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#computer').on('change', function(){

			var id = $(this).val();

			if(id != '' && id != 0) {

				$.ajax({
					url: 'widgets/deploy/computer-accessories-detail.php',
					type: 'POST',
					success: function(result) {
						$('#computer_accessories_container').html(result);
					}
				});

			} else {
				$('#computer_accessories_container').html('');
			}

		});

	});

</script>