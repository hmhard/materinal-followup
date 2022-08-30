<?php include('includes/header.php');

$patients_count=count(fetchAllData("patient"));
$appointment_count=count(fetchAllData("appointment"));
$doctor_count=count(fetchAllData("doctor"));
$user_count=count(fetchAllData("user"));
$triage_count=count(fetchAllData("triage"));

$patients=fetchAllData("patient","id","DESC");

?>



<div class="row container">
    
<?php if ($user->user_type_id == USERS_TYPE_NURSE || $user->user_type_id == USERS_TYPE_ADMIN) { ?>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> <a href="patient.list.php" class="small-box-footer">
                        Total Mothers
                    </a></span>
                <span class="info-box-number"><?php echo $patients_count;?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> <a href="triage.list.php" class="small-box-footer">
                        Total Triage
                    </a></span>
                <span class="info-box-number"><?php echo $triage_count;?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <?php } ?>
   
    <!-- /.col -->
    <?php if ($user->user_type_id == USERS_TYPE_DOCTOR || $user->user_type_id == USERS_TYPE_ADMIN) { ?>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="mother.list.php" class="small-box-footer">
                         Mothers List
                    </a></span>
                <span class="info-box-number"><?php echo $patients_count; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="appointment.list.php" class="small-box-footer">
                         Appointments
                    </a></span>
                <span class="info-box-number"><?php echo $appointment_count; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <?php } ?>
    <?php if ($user->user_type_id == USERS_TYPE_ADMIN) { ?>

    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-envelope-open"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="doctor.list.php" class="small-box-footer">
                        Total Doctors
                    </a></span>
                <span class="info-box-number"><?php echo $doctor_count;?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
  
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-envelope-open"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="user.list.php" class="small-box-footer">
                        Total Users
                    </a></span>
                <span class="info-box-number"><?php echo $user_count;?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <?php } ?>
</div>
</div>



<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Patients</h3>

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
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                          

                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($patients as $key=>$patient){
                        
                        if($key>4)
                        break;
                        ?>
                        <tr>
                            <td><?php echo $patient['id'] ?></td>
                            <td><?php echo $patient['first_name'] ?></td>
                            <td><?php echo $patient['phone'] ?></td>
                             <td><span class="tag tag-success"><?php echo $patient['gender'] ?></span></td>
                            
                        </tr>
                        <?php }?>


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>




<?php include('includes/footer.php'); ?>