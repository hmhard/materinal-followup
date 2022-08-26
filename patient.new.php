<?php include('includes/header.php'); ?>
<?php
// login patient and set session
$msg = '';
$error = false;

if (isset($_POST['register'])) {




    $sql = "INSERT INTO `patient`(`nationality`, `woreda`, `registered_by_id`, `mrn`, `first_name`, `middle_name`, `last_name`, `gender`, `dateof_birth`, `house_number`, `phone`, `martial_status`, `kebele`, `allergies`, `religion_id`,status)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $allergies = "";
    $registered_by_id = $user->id;
    $status = 0;
    $house_number=rand(10,1000);


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, 'ssisssssssssssii', $_POST['nationality'], $_POST['woreda'], $registered_by_id,$_POST['mrn'], $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['gender'], $_POST['birth_date'],$house_number,$_POST['phone'],$_POST['marital_status'],$_POST['kebele'],$allergies,$_POST['religion'],$status);

    mysqli_stmt_execute($stmt);

    if (mysqli_insert_id($conn)) {

        setMessage("Registered successfully!");


        header('Location:patient.list.php');
    } else {
        $error = true;
        $msg = 'error occuered.';
    }
}

?>



<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Register new patient </h3>
            <a href="patient.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


                <h1 class="h5 mb-3 font-weight-normal">Please Insert required info</h1>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="mrn">mrn</label>
                            <input type="mrn" value="<?php echo rand(); ?>" name="mrn" id="mrn" class="form-control" required readonly>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" autocomplete="first_name" required autofocus>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" autocomplete="last_name" required>
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
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" autocomplete="phone" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="birth_date">Date of Birth</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" autocomplete="birth_date" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="nationality"> Nationality</label>
                            <select for="nationality" class="form-control" name="nationality" id="nationality">
                                <option value="Ethiopian">Ethiopian</option>
                                <option value="Non Ethiopian">Non Ethiopian</option>


                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="marital_status"> Marital Status</label>
                            <select for="marital_status" class="form-control" name="marital_status" id="marital_status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="widowed">Widowed</option>


                            </select>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="kebele">Kebele</label>
                            <input type="text" name="kebele" id="kebele" class="form-control" autocomplete="kebele" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="woreda">Woreda</label>
                            <input type="text" name="woreda" id="woreda" class="form-control" autocomplete="woreda" >
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="religion"> Religion</label>
                            <select for="religion" class="form-control" name="religion" id="religion">
                                <option value="1">Protestant</option>
                                <option value="2">Orthodox</option>
                                <option value="3">other</option>


                            </select>

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