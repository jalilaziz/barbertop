<?php
	session_start();

	// IF THE USER HAS ALREADY LOGGED IN
	if(isset($_SESSION['admin_email_barbertop']) && isset($_SESSION['password_barbertop']))
	{
		header('Location: index.php');
		exit();
	}
	// ELSE
	$pageTitle = 'Admin Login';
	include 'connect.php';
	include 'Includes/functions.php';


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Login</title>
		<!-- FONTS FILE -->
		<link href="Design/fonts/css/all.min.css" rel="stylesheet" type="text/css">

		<!-- Nunito FONT FAMILY FILE -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- CSS FILES -->
		<link href="Design/css/sb-admin-2.min.css" rel="stylesheet">
		<link href="Design/css/main.css" rel="stylesheet">
	</head>
	<body>
		<div class="login">
			<form class="login-container validate-form" name="login-form" method="POST" action="login.php" onsubmit="return validateLogInForm()">
				<div style="display:flex;">
					<span class="login100-form-title p-b-32">
						Admin Login
					</span>
					<a href="../barber" class="loginasbarber">Log in as a Barber</a>
				</div>
				<!-- PHP SCRIPT WHEN SUBMIT -->

				<?php

					if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin-button']))
					{
						$admin_email = test_input($_POST['admin_email']);
						$password = test_input($_POST['password']);
						$hashedPass = sha1($password);

						//Check if User Exist In database

						$stmt = $con->prepare("Select admin_id, admin_email,password from barber_admin where admin_email = ? and password = ?");
						$stmt->execute(array($admin_email,$hashedPass));
						$row = $stmt->fetch();
						$count = $stmt->rowCount();

						// Check if count > 0 which mean that the database contain a record about this admin_email

						if($count > 0)
						{

							$_SESSION['admin_email_barbertop'] = $admin_email;
							$_SESSION['password_barbertop'] = $password;
							$_SESSION['admin_id_barbertop'] = $row['admin_id'];
							header('Location: index.php');
							die();
						}
						else
						{
							?>

							<div class="alert alert-danger">
								<button data-dismiss="alert" class="close close-sm" type="button">
									<span aria-hidden="true">X</span>
								</button>
								<div class="messages">
									<div style="color:red;">Email and/or password are incorrect!</div>
								</div>
							</div>

							<?php
						}
					}

				?>

				<!-- email INPUT -->

				<div class="form-input">
					<span class="txt1">Email</span>
					<input type="text" name="admin_email" class = "form-control" oninput = "getElementById('required_email').style.display = 'none'" autocomplete="off">
					<span class="invalid-feedback" id="required_email">Email is required!</span>
				</div>
				
				<!-- PASSWORD INPUT -->

				<div class="form-input">
					<span class="txt1">Password</span>
					<input type="password" name="password" class="form-control" oninput = "getElementById('required_password').style.display = 'none'" autocomplete="new-password">
					<span class="invalid-feedback" id="required_password">Password is required!</span>
				</div>
				
				<!-- SIGN IN BUTTON -->

				<p>
					<button type="submit" name="signin-button" >Sign In</button>
				</p>

				<!-- FORGOT YOUR PASSWORD LINK -->

				<span class="forgotPW">Forgot your password ? <a href="#">Reset it here.</a></span>
			</form>
		</div>
		
		<!-- Footer -->
		<footer class="sticky-footer bg-white" style="text-align:center;">
			<div class="container my-auto">
		  		<div class="copyright text-center my-auto">
					<span>Copyright &copy; BarberTop 2024</span>
		  		</div>
			</div>
	  	</footer>
		<!-- End of Footer -->

		<!-- INCLUDE JS SCRIPTS -->
		<script src="Design/js/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="Design/js/bootstrap.bundle.min.js"></script>
		<script src="Design/js/sb-admin-2.min.js"></script>
		<script src="Design/js/main.js"></script>
	</body>
</html>