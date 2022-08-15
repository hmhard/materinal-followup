<?php include('includes/header.php'); ?>


<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> <a href="patient.list.php" class="small-box-footer">
                        Total Patients
                    </a></span>
                <span class="info-box-number">1400</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="" class="small-box-footer">
                         Appointments
                    </a></span>
                <span class="info-box-number">22</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-envelope-open"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="doctor.list.php" class="small-box-footer">
                        Total Doctors
                    </a></span>
                <span class="info-box-number">100</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-envelope-open"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="user.list.php" class="small-box-footer">
                        Total Users
                    </a></span>
                <span class="info-box-number">200</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
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
                            <th>Gender</th><th>actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>183</td>
                            <td>Abebe Bekele</td>
                            <td>0912121212</td>
                             <td><span class="tag tag-success">Male</span></td>
                            <td>
								<a href="#" class="btn btn-warning btn-sm">edit</a>
								<a href="#" class="btn btn-danger btn-sm">delete</a>
							 </td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>




<?php include('includes/footer.php'); ?>