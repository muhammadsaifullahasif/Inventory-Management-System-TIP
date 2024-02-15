<?php

// session_start();

include "function.php";

// $login_query = mysqli_query($conn, "UPDATE users SET login_status='0' WHERE user_login='{$_SESSION['tip_inventory_management_user_login']}'");

unset($_SESSION['tip_inventory_management_user_login']);

header('location: login.php');

?>