<?php

include "config.php";

// $query = mysqli_query($conn, "INSERT INTO users(user_login, user_pass, display_name, role, type, time_created) VALUES('admin', 'admin', 'Admin', '0', '0', '$time_created')");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="index.php"><b>Admin</b>LTE</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<?php

				if(isset($_POST['submit'])) {
					$user_login = strip_tags(mysqli_real_escape_string($conn, $_POST['user_login']));
					$password = strip_tags(mysqli_real_escape_string($conn, $_POST['password']));

					if($user_login != '' && $password != '') {
						$query = mysqli_query($conn, "SELECT * FROM users WHERE user_login='$user_login' && user_pass='$password'");
						if(mysqli_num_rows($query) > 0) {

							$_SESSION['tip_inventory_management_user_login'] = $user_login;
							header('location: index.php');
							// echo "This";

							/*$login_status_query = mysqli_query($conn, "SELECT * FROM users WHERE login_status='1'");
							if(mysqli_num_rows($login_status_query) > 0) {
								$login_status_result = mysqli_fetch_assoc($login_status_query);

								if($login_status_result['user_login'] == $user_login) {
									$_SESSION['tip_inventory_management_user_login'] = $user_login;
									header('location: index.php');
								} else {
									echo "<div class='alert alert-danger'>Sorry only one user can login in at once</div>";
								}
							} else {
								$_SESSION['tip_inventory_management_user_login'] = $user_login;
								$login_status = mysqli_query($conn, "UPDATE users SET login_status='1' WHERE user_login='$user_login'");
								header('location: index.php');
							}*/

						} else {
							echo "<div class='alert alert-danger'>No User Found</div>";
						}
					} else {
						echo "<div class='alert alert-danger'>Please fill required fields</div>";
					}

					// echo mysqli_error($conn);
				}

				?>

				<form method="POST">
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="user_login" name="user_login" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<!-- <div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">Remember Me</label>
							</div> -->
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<!-- <div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div> -->
				<!-- /.social-auth-links -->

				<!-- <p class="mb-1">
					<a href="forgot-password.html">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p> -->
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#user_login').focus();
		});
	</script>
</body>
</html>
