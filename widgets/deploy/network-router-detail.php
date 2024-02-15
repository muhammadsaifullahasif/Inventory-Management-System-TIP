
<?php


include "../../function.php";

$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && asset_type='2' && active_status='1' && delete_status='0'");

if(mysqli_num_rows($query) > 0) {

	$accessories_query = mysqli_query($conn, "SELECT * FROM accessories WHERE item_category='12' && active_status='1' && delete_status='0' && qty!='0'");

	if(mysqli_num_rows($accessories_query) > 0) {


		?>
		<div class="mb-3">
			<label>Network Router:</label>
			<select class="form-control form-control-border" id="network_router" name="asset_id" required>
				<option value="">Select Network Router</option>
				<?php

				while($accessories_result = mysqli_fetch_assoc($accessories_query)) {
					echo "<option value='".$accessories_result['id']."'>".$accessories_result['brand_name']." - ".$accessories_result['model_number']." - ".$accessories_result['serial_number']." - ".$accessories_result['type']."</option>";
				}

				?>
			</select>
		</div>

		<div id="quantity"></div>
		<?php

	} else {
		echo "<p class='alert alert-danger'>You haven't any Network Router in Inventory</p>";
	}

} else {
	echo "<p class='alert alert-danger'>You haven't any Network Router in Inventory</p>";
}

?>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#network_router').on('change', function(){

			var id = $(this).val();

			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: { action:'display_quantity', id:id },
				success: function(result) {
					$('#quantity').html(result);
				}
			})

		});

	});

</script>