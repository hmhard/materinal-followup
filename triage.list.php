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

$sql = "SELECT * FROM patient where status=0";
$result = mysqli_query($conn, $sql);





?>


<div class="col-12">

    <h4>patient list </h4>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> patients list</h3>
            <a href="patient.new.php" class="btn btn-primary btn-sm mx-3">New patient</a>

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
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Kebele</th>
                        <th>Woreda</th>
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
                                <td><span class="tag tag-success"><?php echo $row['gender'] ?></span></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['kebele'] ?></td>
                                <td><?php echo $row['woreda'] ?></td>
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
</div>

</div>
</div>

<?php include('includes/footer.php'); ?>