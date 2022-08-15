<?php include('includes/header.php'); ?>

	<div class="col-12">

		<h4>Patient list </h4>
	</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Patients list</h3>
                <a href="patient.new.php" class="btn btn-primary btn-sm mx-3">New Patient</a>

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

	</div>
</div>

<?php include('includes/footer.php'); ?>