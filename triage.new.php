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

if (isset($_POST['register'])) {




    $sql = "INSERT INTO `triage`(`card_no`, `status`, `order_no`, `doctor_id`, `patient_id`, `temp`, `bp`, `pulse_rate`, `rr`, `weight`, `height`) 
                  VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $allergies = "";
    $registered_by_id = $user->id;
    $status = 0;
    $house_number = rand(10, 1000);


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, 'sisiiiiiiii', $_POST['card_number'], $status, $_POST['order_number'], $_POST['doctor'], $_POST['patient'], $_POST['temperature'], $_POST['bp'], $_POST['pulse_rate'], $_POST['rr'], $_POST['weight'], $_POST['height']);

    mysqli_stmt_execute($stmt);

    if (mysqli_insert_id($conn)) {

        setMessage("Registered successfully!");

        $sql = "UPDATE patient SET status=1 WHERE id=" . $id;

        if (mysqli_query($conn, $sql)) {
        }


        header('Location:triage.list.php');
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
            <h3 class="card-title">Triage Result </h3>
            <a href="patient.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-">

                <tbody>
                    <tr>

                        <th>Full Name</th>
                        <td><?php echo $patient->first_name . " " . $patient->middle_name; ?></td>
                        <th>MRN</th>
                        <td><?php echo $patient->mrn; ?></td>
                    </tr>
                </tbody>
            </table>
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



                <div class="row mt-5">

                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" value="<?php echo rand(); ?>" name="card_number" id="card_number" class="form-control" autocomplete="card_number" required autofocus>
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="order_number">Order Number</label>
                            <input type="order_number" value="<?php echo rand(1, 100); ?>" name="order_number" id="order_number" class="form-control" required readonly>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="temperature">Temperature(℃)</label>
                            <input type="number" min="1" max="60"  name="temperature" id="temperature" class="form-control" autocomplete="temperature" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="bp">BP-blood pressure (mm/Hg)</label>
                            <input type="number"  name="bp" id="bp" class="form-control" autocomplete="bp" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="pulse_rate">Pulse Rate(bpm)</label>
                            <input type="number" min="1" name="pulse_rate" id="pulse_rate" class="form-control" autocomplete="pulse_rate" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="rr">RR(respiration rate)- RPM</label>
                            <input type="number" min="1"  name="rr" id="rr" class="form-control" autocomplete="rr" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="weight">weight (kg)</label>
                            <input type="number" min="10" max="150" name="weight" id="weight" class="form-control" autocomplete="weight" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="height">height (cm)</label>
                            <input type="number" min="1" max="1000" name="height" id="height" class="form-control" autocomplete="height" required>
                        </div>

                    </div>


                    <div class="col-sm-4">

                        <div class="form-group">
                            <?php $doctors = fetchAllData("doctor");

                            ?>
                            <label for="doctor"> Assign Doctor</label>
                            <select for="doctor" class="form-control" name="doctor" id="doctor" required>
                                <option>Select Doctor</option>
                                <?php foreach ($doctors as $key => $doctor) {
                                ?>
                                    <option value="<?php echo $doctor['id']; ?>"><?php echo "Dr. " .ucwords($doctor['first_name'] . " " . $doctor['middle_name']) ?></option>

                                <?php } ?>

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