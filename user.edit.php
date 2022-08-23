<?php include('includes/header.php'); ?>
<?php



// fetch new user 

$user= fetchData("user",$_GET['id']);


// user edit 
$msg = '';
$error = false;




if (isset($_POST['register'])) {




    $sql = "UPDATE user  SET email=?, phone=?, first_name=?, middle_name=?, last_name=?, gender=? WHERE id=?";



    $stmt = mysqli_prepare($conn, $sql);

    print_r($stmt);

    mysqli_stmt_bind_param($stmt, 'ssssssi', $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['gender'], $_POST['id']);

    $res = mysqli_stmt_execute($stmt);

    if ($res) {

        setMessage("Updated successfully");


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
            <h3 class="card-title">Edit User </h3>
            <a href="user.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return confirm('are you sure?')">
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />

                <h1 class="h5 mb-3 font-weight-normal">Please Insert required info</h1>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" autocomplete="email" value="<?php echo $user->email; ?> " required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" autocomplete="first_name" value="<?php echo $user->first_name; ?>" required autofocus>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control" autocomplete="middle_name" value="<?php echo $user->middle_name; ?>" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" autocomplete="last_name" value="<?php echo $user->last_name; ?>" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" autocomplete="phone" value="<?php echo $user->phone; ?>" required>
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


                <input name="register" value="Update" class="btn float-right  btn-info my-3 " type="submit">

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