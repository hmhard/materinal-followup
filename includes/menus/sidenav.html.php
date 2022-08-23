<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white     sidebar-light-blue">
	<!-- Brand Logo -->
	<a href="#" class="brand-link navbar-lightblue"> <img src="amu.logo" height="100" width="80" alt="AMU logo" class="brand-image img-circle elevation-5" style="opacity: .8">
		<span class="brand-text font-weight-light">AMU</span>
	</a>
	
	<!-- Sidebar -->
	<div class="sidebar">
		<?php 
		if(1==1){
			 ?>

			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">

					<img src="../../assets/dist/img/amulogo.png" class="img-circle elevation-2" alt="User Image">


				</div>
				<div class="info">
					<a href="#" class="d-block"><?php 
					if($loggedIn)
					echo $user->fullName;
					 ?></a>



				</div>
			</div>
		<?php } ?>


		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class																																																															               with font-awesome or any other icon font library -->

				<?php include('includes/menus/service.html.php') ?>






			</ul>

		</nav>
		<!-- /.sidebar-menu -->
	</div>
	
	<!-- /.sidebar -->
</aside>