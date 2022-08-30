<?php include('includes/header.php'); ?>
<?php
// login patient and set session
$msg = '';
$error = false;
if (isset($_POST['register']))
    $id = $_POST['patient'];
else
    $id = $_GET['id'];

$patient = fetchData("patient", $id);

$res = mysqli_query($conn, "select * from pregnancy_info where patient_id=" . $patient->id);

$pregnancy_info = (object)mysqli_fetch_assoc($res);

if (isset($_POST['register'])) {




    $sql = "INSERT INTO `pregnancy_info`(`patient_id`, `lmp`, `advice`, `danger_sign`, `current_pregnancy_info`,assessed_by) 
    VALUES  (?,?,?,?,?,?)";

    $assessed_by = $user->first_name;


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, 'isssss', $id, $_POST['lmp'], $_POST['advice'], $_POST['danger_sign'], $_POST['current_pregnancy_info'], $assessed_by);

    mysqli_stmt_execute($stmt);

    if (mysqli_insert_id($conn)) {

        setMessage("Registered successfully!");

        $sql = "UPDATE patient SET status=2 WHERE id=" . $id;

        if (mysqli_query($conn, $sql)) {
        }
        if (isset($_POST['appointment_date'])) {

            $sql = "INSERT INTO `appointment`(`patient_id`, `doctor_id`, `appointment_date`, `is_made`, `is_approved`, `status`) 
            VALUES  (?,?,?,?,?,?)";

            $assessed_by = $user->first_name;


            $stmt = mysqli_prepare($conn, $sql);
            $is_made = 0;
            $status = 0;
            $is_approved = 0;


            mysqli_stmt_bind_param($stmt, 'iisiii', $id, $user->id, $_POST['appointment_date'], $is_made, $is_approved, $status);

            mysqli_stmt_execute($stmt);

            if (mysqli_insert_id($conn)) {

                setMessage("Appointment successfully!");
            }
        }


        header('Location:mother.list.php');
    } else {

        $error = true;
        $msg = 'error occuered.';
        print_r(mysqli_error($conn));
    }
}

?>



<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Diagnose </h3>
            <a href="mother.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class=" h2 text-success  text-bold">Personal Information</div>
          
            <table class="table table-striped table-">

                <tbody>
                    <tr>

                        <th>Full Name</th>
                        <td><?php echo $patient->first_name . " " . $patient->middle_name; ?></td>
                        <th>MRN</th>
                        <td><?php echo $patient->mrn; ?></td>
                    </tr>
                    <tr>

                        <th>Date of Birth</th>
                        <td><?php echo $patient->dateof_birth; ?></td>
                        <th>Phone</th>
                        <td><?php echo $patient->phone; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class=" h2 text-pink  text-bold">Pregnancy info</div>
          
            <form >



                <div class="row mt-5">



                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="current_pregnancy_info">Current pregnancy info.</label>
                            <p><?php echo $pregnancy_info->current_pregnancy_info; ?></p>
                        </div>

                    </div>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="current_pregnancy_info">Danger Sign.</label>
                            <p><?php echo $pregnancy_info->danger_sign; ?></p>
                        </div>

                    </div>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="current_pregnancy_info">LMP(last menustrial period).</label>
                            <p><?php echo $pregnancy_info->lmp; ?></p>
                        </div>

                    </div>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="current_pregnancy_info">EDD(Expected date of delivery).</label>
                            <p><?php echo $pregnancy_info->lmp; ?></p>
                        </div>

                    </div>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="current_pregnancy_info">Consultation and advice given.</label>
                            <p><?php echo $pregnancy_info->advice; ?></p>
                        </div>

                    </div>



                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for="appointment_date">Appointment Date</label>

                            <p><?php

                                $res = mysqli_query($conn, "select * from appointment where patient_id=" . $patient->id);

                                $appointment = (object)mysqli_fetch_assoc($res);


                                echo $appointment->appointment_date;
                                ?></p>
                        </div>

                    </div>









                </div>


                
            </form>
           
            <button class="btn float-right  btn-info my-3 ">
                Close
            </button>
            

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

</div>
</div>

<?php include('includes/footer.php'); ?>