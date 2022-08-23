<?php include('includes/header.php'); ?>

<?php

if(isset($_POST['delete'])){
 
    $sql = "DELETE FROM user WHERE id=".$_POST['user_id'];
    if(mysqli_query($conn, $sql)){
        
       setMessage("Deleted successfully");

        header('Location:user.list.php');
    }
    

}


						// login user and set session
						$msg = '';
						$error = false;

                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($conn, $sql);
                
                       
                         
        

						?>


	<div class="col-12">

		<h4>User list </h4>
	</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Users list</h3>
                <a href="user.new.php" class="btn btn-primary btn-sm mx-3">New User</a>

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
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Registered At</th>
                            <th>actions</th>

                        </tr>
                    </thead>
                    <tbody>
<?php

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><span class="tag tag-success"><?php echo $row['gender'] ?></span></td>
                            <td><?php echo $row['registered_at'] ?></td>
                            <td>
								<a href="#" class="btn btn-warning btn-sm">edit</a>
                                <form method="post" onsubmit="return confirm('are you sure you want to delete this user');" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal form-inline" >
                                <input type="hidden" name="user_id" value="<?php echo $row['id'];?>"/>
                                <input type="hidden" name="delete" value="true"/>
                                    <button  class="btn btn-danger btn-sm">delete</button>
    </form>
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