<?php include('includes/header.php'); ?>
<?php
// login user and set session
$msg = '';
$error = false;

if (isset($_POST['register'])) {




    $sql = "INSERT INTO `user`(`email`, `phone`,  `password`, `first_name`, `middle_name`, `last_name`, `gender`, `user_type_id`,  `registered_by_id`) 
                                VALUES (?,?,?,?,?,?,?,?,?)";

    $password = generate_random_string(6);


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, 'sssssssii', $_POST['email'], $_POST['phone'], $password, $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['gender'], $_POST['user_type'], $user->id);

    mysqli_stmt_execute($stmt);

    if (mysqli_insert_id($conn)) {

        setMessage("Registered successfully! your password is ".$password. " ");


        header('Location:user.list.php');
    } else {
        $error = true;
        $msg = 'error occuered.';
    }
}

?>



<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Register new User </h3>
            <a href="user.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


                <h1 class="h5 mb-3 font-weight-normal">Please Insert required info</h1>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="" name="email" id="email" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" value="" name="first_name" id="first-name" class="form-control" autocomplete="first_name" required autofocus>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" value="" name="middle_name" id="middle_name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" value="" name="last_name" id="last-name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" value="" name="phone" id="phone" class="form-control" autocomplete="phone" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                        <label for="user_type">User Type</label>
                            <select for="user_type"  class="form-control" name="user_type" id="user_type">
                        <option value="1">Admin</option>    
                        <option value="2">Doctor</option>    
                        <option value="3">Nurse</option>    
                         
                        </select>
</select> 
                        
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label>Gender</label>
                            <label for="male">Male</label>
                            <input checked type="radio" name="gender" id="gender" value="male" />
                            <label for="female">Female</label>
                            <input type="radio" name="gender" id="female" value="female" />
                        </div>

                    </div>
                </div>


                <input name="register" value="Register" class="btn float-right  btn-info my-3 " type="submit">

                </input>

            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

</div>
</div>

<?php include('includes/footer.php'); ?>