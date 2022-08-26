<?php include('includes/header.php'); ?>

	<div class="col-12">

		<h4>Doctors list </h4>
	</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Doctors list</h3>
        
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
                            <th>Gender</th>
                            <th>Registered At</th>
                            <th>actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $doctors= fetchAllData('doctor');

                        foreach($doctors as $doctor){
                        ?>

                        <tr>
                            <td><?php echo $doctor['id']; ?></td>
                            <td><?php echo $doctor['first_name']. " " .$doctor['middle_name']; ?></td>
                            <td><span class="tag tag-success"><?php echo $doctor['gender']; ?></span></td>
                            <td><?php echo $doctor['registered_at']; ?></td>
                            <td>
								<a href="#" class="btn btn-warning btn-sm">edit</a>
								<a href="#" class="btn btn-danger btn-sm">delete</a>
							 </td>
                            
                        </tr>
                        <?php } ?>


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