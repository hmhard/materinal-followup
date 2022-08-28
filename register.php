<?php include('includes/header.php'); ?>


<div class=" col-md-4 col-sm-12">
	<img src="" class="  ml-auto mr-auto " width="70%" />
</div>

<div class="card col-6 ">
	<div class="card-header h3">
		Registration Page
	</div>
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data" action="dashboard.php">
			<?php if(false){ ?>
			<div class="alert alert-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
			<?php } ?>

			<?php if(false){ ?>
			<div class="mb-3">
				You are logged in as {{ app.user.First Name }}, <a href="{{ path('app_logout') }}">Logout</a>
			</div>
			<?php } ?>

			<label for="inputFirstname">First Name</label>
			<input type="text"  name="first_name" id="inputFirstname" class="form-control"  required autofocus>
			<label for="inputLastname">Last Name</label>
			<input type="text"  name="last_name" id="inputLastname" class="form-control"  required >
			
			<label for="inputPhone">Phone</label>
			<input type="text"  pattern="(09|\+2519)[0-9]{8}" name="phone" id="inputPhone" class="form-control"  required >
			

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

			<button class="btn btn-block  btn-info my-3 " type="submit">
				Sign in
			</button>
			<a class=" text-danger my-3 float-right" href="#">
				Forgot Password?
			</a>
		</form>
	</div>
</div>

<?php include('includes/footer.php'); ?>