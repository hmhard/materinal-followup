<?php

include 'helpers/session_start.php';
include 'helpers/connection.php';
include 'helpers/message.php';
include 'helpers/mysqlHelper.php';
include 'helpers/myHelper.php';

const USERS_TYPE_ADMIN=1;
const USERS_TYPE_DOCTOR=2;
const USERS_TYPE_NURSE=3;
const USERS_TYPE_PATIENT=4;

$user_types=["1"=>"Admin","2"=>"Doctor","3"=>"Nurse","4"=>"Patient"];

clearMessages();

$user= new stdClass();

$loggedIn = false;
if (isset($_SESSION['user_id'])) {
	$loggedIn = true;
	$user = (object) $_SESSION['user'];
	$user->fullName = $user->first_name . " " . $user->middle_name;
} else {
	// header('Location:logout.php');
}
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

<body class="hold-transition sidebar-mini hold-transition   pace-primary">
	<div class="wrapper">

		<?php include "includes/menus/topnav.html.php";
		include("includes/menus/sidenav.html.php"); ?>


		<div class="content-wrapper">

			<div class="content-header">
				<div class="container-fluid">

					<?php
					if ($has_message) {
					?>
						<div class="row ">
							<div class="col-12 ">
								<div class="alert alert-<?php echo $message->type; ?>"><?php echo $message->text;
																						$has_message = false; ?></div>

							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>

			<section class="content">
				<div class="container-fluid">
					<div class="row">