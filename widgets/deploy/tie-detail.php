
<?php


include "../../function.php";

$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && asset_type='2' && active_status='1' && delete_status='0'");

if(mysqli_num_rows($query) > 0) {

	$accessories_query = mysqli_query($conn, "SELECT * FROM accessories WHERE item_category='17' && active_status='1' && delete_status='0' && qty!='0'");

	if(mysqli_num_rows($accessories_query) > 0) {

		$accessories_result = mysqli_fetch_assoc($accessories_query);

		echo "<input type='hidden' value='".$accessories_result['id']."' name='asset_id'>";

		echo "<div class='mb-3'><label>Quantity Deployed:</label><input type='number' class='form-control form-control-border' placeholder='Enter Quantity' max='".$accessories_result['qty']."' id='deploy_quantity' name='deploy_quantity' required><div id='deploy_quantity_msg'></div></div>";

	} else {
		echo "<p class='alert alert-danger'>You haven't any Cable Tie in Inventory</p>";
	}

} else {
	echo "<p class='alert alert-danger'>You haven't any Cable Tie in Inventory</p>";
}

?>