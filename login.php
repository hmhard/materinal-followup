<?php

include 'includes/helpers/session_start.php';
include 'includes/helpers/connection.php';

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel='shortcut icon' type='image/x-icon' href="logo.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel='shortcut icon' type='image/x-icon' href='#' />

	<title>
		AMU
		|
		Dashboard
	</title>

	<meta name=" viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="assets/css/all.min.css">

	<link rel="stylesheet" href="assets/css/fontawesome.min.css">

	<link rel="stylesheet" href="assets/css/tempusdominus-bootstrap-4.min.css">


	<link rel="stylesheet" href="assets/css/adminlte.min.css">

	<link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css">

	<link rel="stylesheet" href="assets/css/daterangepicker.css">
	<link rel="stylesheet" href="assets/css/pace-theme-minimal.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/select2-bootstrap4.min.css">
	<link rel="stylesheet" href="assets/css/sweetalert2.min.css">


</head>

<body class="hold-transtion sidebar-mini hold-transition   pace-primary">
	<div class="wrapper">

		


		<div class="content-wrapper">

			<div class="content-header">
				<div class="container-fluid">

					<div class="row ">

					</div>

				</div>
			</div>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<?php
						// login user and set session
						$msg = '';
						$error = false;

						if (
							isset($_POST['login']) && !empty($_POST['email'])
							&& !empty($_POST['password'])
						) {




							try {

								$sql = "SELECT * FROM user where email=? and password=?";

								$stmt = mysqli_prepare($conn, $sql);
								
 
								mysqli_stmt_bind_param($stmt, 'ss',$_POST['email'], $_POST['password']);
								
								mysqli_stmt_execute($stmt);
								
								$result = mysqli_stmt_get_result($stmt);
								$row = mysqli_fetch_assoc($result);
								
								

								

								if (
									$row && $_POST['email'] == $row['email'] &&
									$_POST['password'] == $row['password']
								) {

									$_SESSION['logged_in'] = true;
									$_SESSION['user_id'] = $row['id'];
									$_SESSION['user'] = $row;


									header('Location:dashboard.php');
								} else {
									$error = true;
									$msg = 'Invalid credentials! Please try again.';
								}
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
						}

						?>


						<div class=" col-md-3 col-sm-12">
							<img src="" class="  ml-auto mr-auto " width="70%" />
						</div>

						<div class="card col-7 ">
							<div class="card-header h3">
								Sign In Page
							</div>
							<div class="card-body">
								<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
									<?php if ($error) { ?>
										<div class="alert alert-danger"><?php echo $msg; ?></div>
									<?php } ?>

									<?php if (false) { ?>
										<div class="mb-3">
											You are logged in as {{ app.user.email }}, <a href="{{ path('app_logout') }}">Logout</a>
										</div>
									<?php } ?>

									<h1 class="h5 mb-3 font-weight-normal">Please sign in</h1>
									<label for="inputemail">email</label>
									<input type="email" value="" name="email" id="inputemail" class="form-control" autocomplete="email" required autofocus>
									<label for="inputPassword">Password</label>
									<input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>

									<input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}">

									<!--
        Uncomment this section and add a remember_me option below your firewall to activate remember me functionality.
        See https://symfony.com/doc/current/security/remember_me.html

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="_remember_me"> Remember me
            </label>
        </div>
			-->

									<input class="btn btn-block  btn-info my-3 " name="login" type="submit" value="Sign in">

									</input>
									<a class=" text-danger my-3 float-right" href="#">
										Forgot Password?
									</a>
								</form>
							</div>
						</div>

						<?php include('includes/footer.php'); ?>