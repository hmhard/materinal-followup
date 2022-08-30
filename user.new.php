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

    $last_id=mysqli_insert_id($conn);
    if ($last_id) {


        
        if($_POST['user_type'] ==USERS_TYPE_DOCTOR){
            

        $sql = "INSERT INTO `doctor`(`first_name`, `middle_name`, `last_name`, `gender`, `birth_date`, `user_id`)
        VALUES (?,?,?,?,?,?)";



            $stmt = mysqli_prepare($conn, $sql);
            $reg_date=(new \DateTime())->format('Y-m-d H:i:s');


            mysqli_stmt_bind_param($stmt, 'sssssi', $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'] ,$_POST['gender'],$_POST['date_of_birth'], $last_id);

            mysqli_stmt_execute($stmt);
            print_r(mysqli_error($conn));
        }

        setMessage("Registered successfully! your password is ".$password. " ");


        header('Location:user.list.php');
    } else {
        $error = true;
        $msg = 'error occuered.';
        echo '<div class="alert alert-danger">'.mysqli_error($conn)."</div>";
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
                            <input type="email"  name="email" id="email" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text"  name="first_name" id="first-name" class="form-control" autocomplete="first_name" required autofocus>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text"  name="middle_name" id="middle_name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text"  name="last_name" id="last-name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text"  name="phone" id="phone" pattern="(09|\+2519)[0-9]{8}" class="form-control" autocomplete="phone" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="date_of_birth">Birth Date</label>
                            <input type="date"  name="date_of_birth" id="date_of_birth"  class="form-control" autocomplete="date_of_birth" required>
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


                <input name="register" value="Register" class="btn float-right  btn-info my-3 " type="submit" />

                

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