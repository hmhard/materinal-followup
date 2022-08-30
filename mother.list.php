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

$sql = "SELECT p.* FROM patient as p , triage as t,doctor as d where t.patient_id=p.id  and t.doctor_id=d.id and d.user_id= ".$user->id." ORDER by p.id DESC";
$result = mysqli_query($conn, $sql);





?>


<div class="col-12">

    <h4>Mothers list </h4>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Mothers list</h3>


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
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['kebele'] ?></td>
                                <td><?php echo $row['woreda'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <?php if($row['status']!=2){ ?>
                                    <a href="diagnose.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">diagnose</a>
                                    <?php }
                                    else{
                                    ?>
                                    <a href="mother.show.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">view</a>
                                   <?php } ?>
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