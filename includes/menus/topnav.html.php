<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
	
	<!-- Left navbar links -->
		<ul class="navbar-nav"> <li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#">
				<i class="fas fa-bars"></i>
			</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="index.php" class="nav-link">Home</a>
		</li>
		
	</ul>

	<!-- SEARCH FORM -->
	


	<!-- Right navbar links -->

		<ul class="navbar-nav ml-auto"> <!-- Messages Dropdown Menu -->


			<li class="nav-item dropdown"> <a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fas fa-language"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

				
			</div>

		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
				<i class="fas fa-th-large"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
				<span class="dropdown-item dropdown-header">Setting</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-user mr-2"></i>Profile
				</a>
					<a href="#" id="change-room" class="dropdown-item change-room">
						
						</a>
				<div class="dropdown-divi#der"></div>
			</div>

		</li>
	<?php	 if($user) {
	
		?>
		
		<li  class="nav-item">
			<a href="logout.php" class="nav-link">
				<i class="fa fa-sign-out-alt" aria-hidden="true"></i>Logout
			</a>
		</li>
		<?php }else{ ?>
			<li  class="nav-item">
			<a href="login.php" class="nav-link">
				<i class="fa fa-sign-in-alt" aria-hidden="true"></i>Login
			</a>
		</li>
		<?php }?>


	</ul>
</nav>
