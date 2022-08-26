<?php include('includes/header.php'); ?>

<?php

if (isset($_POST['delete'])) {

    $sql = "DELETE FROM patient WHERE id=" . $_POST['patient_id'];
    if (mysqli_query($conn, $sql)) {

        setMessage("Deleted successfully");

        header('Location:patient.list.php');
    }
}


// login patient and set session
$msg = '';
$error = false;

$sql = "SELECT * FROM patient where status=0 order by id DESC";
$result = mysqli_query($conn, $sql);

$triages=fetchAllData('triage',"id","DESC");




?>


<div class="col-12">

    <h4>patient list </h4>
</div>

<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Triage list</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>MRN</th>

                        <th>Full Name</th>

                        <th>Phone</th>

                        <th>Registered At</th>
                        <th>actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr>
                                <td><?php echo $row['mrn'] ?></td>

                                <td><?php echo $row['first_name'] . " " . $row['middle_name']; ?></td>
                                <td><?php echo $row['phone'] ?></td>

                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="triage.new.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Assess</a>

                                </td>
                            </tr>

                    <?php

                        }
                    } else {
                        echo "0 results";
                    }


                    ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Assessed list</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>Card Number</th>

                        <th>Temp</th>

                        <th>RR</th>

                        <th>Pulse</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        foreach ($triages as $triage) {

                    ?>
                            <tr>
                                <td><?php echo $triage['card_no'] ?></td>

                                <td><?php echo $triage['temp'] ?></td>
                                <td><?php echo $triage['rr'] ?></td>

                                <td><?php echo $triage['pulse_rate'] ?></td>
                                <td><?php echo $triage['weight'] ?></td>
                                <td><?php echo $triage['height'] ?></td>
                                <td>
                             
                                </td>
                            </tr>

                    <?php

                        }
                    } else {
                        echo "0 results";
                    }


                    ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

</div>
</div>

<?php include('includes/footer.php'); ?>