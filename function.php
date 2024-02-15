<?php

require "config.php";


function is_login() {
	if(isset($_SESSION['tip_inventory_management_user_login'])) {
		return 1;
	} else {
		return 0;
	}
}

if(is_login()) {
	$user_login = $_SESSION['tip_inventory_management_user_login'];
} else {
	unset($_SESSION['tip_inventory_management_user_login']);
	header('location: login.php');
}

function user_id($user_login) {
	global $conn;
	$query = mysqli_query($conn, "SELECT id FROM users WHERE user_login='$user_login' && active_status='1' && delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['id'];
	}
}

$user_id = user_id($user_login);

/*$login_query = mysqli_query($conn, "SELECT * FROM users WHERE login_status='1' && user_login='{$_SESSION['tip_inventory_management_user_login']}'");

if(mysqli_num_rows($login_query) == 0) {
	unset($_SESSION['tip_inventory_management_user_login']);
	header('location: login.php');
}*/

function is_superadmin() {
	global $conn;
	if(isset($_SESSION['tip_inventory_management_user_login'])) {
		$query = mysqli_query($conn, "SELECT * FROM users WHERE user_login='{$_SESSION['tip_inventory_management_user_login']}' && active_status='1' && delete_status='0'");

		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			if($result['role'] == 0 && $result['type'] == 0) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	} else {
		return 0;
	}
}

function is_admin() {
	global $conn;
	if(isset($_SESSION['tip_inventory_management_user_login'])) {
		$query = mysqli_query($conn, "SELECT * FROM users WHERE user_login='{$_SESSION['tip_inventory_management_user_login']}' && active_status='1' && delete_status='0'");

		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			if($result['role'] == 0 && $result['type'] == 1) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	} else {
		return 0;
	}
}

function display_name($user_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT display_name FROM users WHERE id='$user_id' && active_status='1' && delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['display_name'];
	} else {
		return '-';
	}
}

function department_id($user_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT department_id FROM users WHERE id='$user_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['department_id'];
	} else {
		return 0;
	}
}

function department_location_id($department_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT location_id FROM departments WHERE id='$department_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['location_id'];
	} else {
		return 0;
	}
}

function department_name($department_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT department_name FROM departments WHERE id='$department_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['department_name'];
	} else {
		return '-';
	}
}


function location_name($location_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT location_name FROM locations WHERE id='$location_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['location_name'];
	} else {
		return '-';
	}
}


function asset_meta($asset_id, $meta_key) {
	global $conn;
	$query = mysqli_query($conn, "SELECT meta_value FROM asset_meta WHERE asset_id='$asset_id' && meta_key='$meta_key'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['meta_value'];
	}
}

function asset_name($asset_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT asset_name FROM assets WHERE id='$asset_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['asset_name'];
	} else {
		return '';
	}
}

function asset_qty($asset_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT qty FROM assets WHERE id='$asset_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['qty'];
	} else {
		return '';
	}
}

function update_asset_meta($asset_id, $meta_key, $meta_value) {
	global $conn;
	$query = mysqli_query($conn, "UPDATE asset_meta SET meta_value='$meta_value' WHERE asset_id='$asset_id' && meta_key='$meta_key'");
	if($query) {
		return true;
	} else {
		return false;
	}
}


function employee_id($people_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT people_id FROM peoples WHERE id='$people_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['people_id'];
	} else {
		return '-';
	}
}


function people_name($people_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT people_name FROM peoples WHERE id='$people_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['people_name'];
	} else {
		return '-';
	}
}


function people_designation($people_id) {
	global $conn;
	$query = mysqli_query($conn, "SELECT designation FROM peoples WHERE id='$people_id'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['designation'];
	} else {
		return '-';
	}
}


function igr_meta($igr_id, $meta_key) {
	global $conn;
	$query = mysqli_query($conn, "SELECT meta_value FROM igr_asset_meta WHERE igr_asset_id='$igr_id' && meta_key='$meta_key'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		return $result['meta_value'];
	} else {
		return '';
	}
}


?>