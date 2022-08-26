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
            <h3 class="card-title">Diagnose </h3>
            <a href="mother.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


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

                   
                    
                    <div class="col-sm-12">
                        
                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="danger_sign">Danger Signs</label>
                            <textarea  rows="8" name="danger_sign" id="danger_sign" class="form-control" autocomplete="danger_sign" required></textarea>
                        </div>

                    </div>
                 
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label for="lmp">LMP</label>
                            <input type="date" name="lmp" id="lmp" class="form-control"  required></input>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label for="edd">Expected date of delivery(EDD)</label>
                            <input type="text" name="edd" id="edd" class="form-control"  required readonly></input>
                        </div>

                    </div>
                    <div class="col-sm-12">
                        
                        <div class="form-group">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control"  required></input>
                        </div>

                    </div>

                    <div class="col-sm-12">
                        
                        <div class="form-group">
                            <input type="hidden" name="patient" value="<?php echo $id; ?>" />
                            <label for="advise">Consultation and advise given</label>
                            <textarea  rows="8" name="advise" id="advise" class="form-control" autocomplete="advise" required></textarea>
                        </div>

                    </div>
                 
                 





                </div>


                <input name="register" value="Diagnose" class="btn float-right  btn-info my-3 " type="submit">

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