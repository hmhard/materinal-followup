<li class="nav-item">
	<a href="dashboard.php" class="nav-link">
		<i class="fa fa-tasks nav-icon"></i>
		<p>Dashboard</p>
	</a>
</li>

<?php if ($user->user_type_id == USERS_TYPE_NURSE) { ?>

	<li class="nav-item">
		<a href="triage.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Triage</p>
		</a>
	</li>
	<li class="nav-item">
		<a href="patient.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Maternal List</p>
		</a>
	</li>
<?php } ?>

<?php if ($user->user_type_id == USERS_TYPE_DOCTOR) { ?>


	<li class="nav-item">
		<a href="mother.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Maternal List(doc)</p>
		</a>
	</li>



	<li class="nav-item">
		<a href="appointment.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Appointment List</p>
		</a>
	</li>

<?php } ?>

<?php if ($user->user_type_id == USERS_TYPE_ADMIN) { ?>



	<li class="nav-item">
		<a href="patient.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Maternal List</p>
		</a>
	</li>

	<li class="nav-item">
		<a href="doctor.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Doctors List</p>
		</a>
	</li>
	<li class="nav-item">
		<a href="user.list.php" class="nav-link">
			<i class="fa fa-tasks nav-icon"></i>
			<p>Users List</p>
		</a>
	</li>
<?php } ?>