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

$sql = "SELECT * FROM appointment a, patient as p where p.id=a.patient_id";
$result = mysqli_query($conn, $sql);





?>


<div class="col-12">

    <h4>Appointment list </h4>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Appointment list</h3>
            <a href="patient.new.php" class="btn btn-primary btn-sm mx-3">New appointment</a>

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
                        <th>#</th>
                        <th>MRN</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Appointment Date</th>
                        <th>Remaining time</th>
              
                        <th>actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $count=0;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr>
                                <td><?php  echo ++$count; ?></td>
                                <td><?php echo $row['mrn'] ?></td>
                             
                                <td><?php echo $row['first_name'] . " " . $row['middle_name']; ?></td>
                                <td><?php echo $row['phone'] ?></td>
                              
                                <td><?php
                              
                                echo $row['appointment_date']; ?></td>
                               
                                <td><?php
                                $dated=date_difference(new \DateTime(),new \DateTime($row['appointment_date']));
                                echo "".$dated->days ." days ".$dated->h." hours ".$dated->i." minutes ".$dated->s." seconds."; ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">edit</a>
                                  
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