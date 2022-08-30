<?php include('includes/header.php'); ?>

<?php

if (isset($_POST['delete'])) {

    $sql = "DELETE FROM patient WHERE id=" . $_POST['patient_id'];
    if (mysqli_query($conn, $sql)) {

        setMessage("Deleted successfully");

        header('Location:patient.list.php');
    }
}

if (isset($_GET['change'])) {
    
    $val=$_GET['action'];
    
    
   
    $id=$_GET['appointment_id'];

    $sql = "UPDATE  appointment SET status=$val WHERE id=" . $id;
    if (mysqli_query($conn, $sql)) {

        setMessage("Updated successfully");

        header('Location:appointment.list.php');
    }
}

// login patient and set session
$msg = '';
$error = false;

$sql = "SELECT *, a.id as appointment_id,a.status as a_status  FROM appointment a, patient as p where p.id=a.patient_id";
$result = mysqli_query($conn, $sql);





?>


<div class="col-12">

    <h4>Appointment list </h4>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Appointment list</h3>
            
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
                       
                        <th> Date</th>
                        <th>Status</th>
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
                             
                                <td><?php echo $row['appointment_date']; ?></td>
                                <td><span class="badge badge-success"><?php echo  $row['a_status']==1?"Done":"Not Active"; ?></span></td> 
                              
                               
                                <td>
                                    <?php
                                $dated=date_difference(new \DateTime(),new \DateTime($row['appointment_date']));
                               if($row['a_status']!=1){ 
                                  
                                echo "".$dated->days ." days ".$dated->h." hours ".$dated->i." minutes ".$dated->s." seconds."; 
                             }
                             else{
                                 echo "Aldready Done";
                             }
                             ?>
                             </td>
                             <td>
                                    <?php if($row['a_status']==1){ ?>
                                    <a href="?change=true&action=0&appointment_id=<?php echo $row['appointment_id'];?>" class="btn btn-warning btn-sm">Cancel</a>
                                    
                                    <?php }
                                    else{ ?>
                                    <a href="?change=true&action=1&appointment_id=<?php echo $row['appointment_id'];?>" class="btn btn-success btn-sm">Done</a>
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