<?php include('includes/header.php'); ?>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Register new Patient </h3>
            <a href="patient.list.php" class="btn btn-primary btn-sm mx-3 float-right">Back to list</a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="patient.list.php">


                <h1 class="h5 mb-3 font-weight-normal">Please Insert required info</h1>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" value="" name="first_name" id="first-name" class="form-control" autocomplete="first_name" required autofocus>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" value="" name="last_name" id="last-name" class="form-control" autocomplete="last_name" required>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" value="" name="phone" id="phone" class="form-control" autocomplete="phone" required>
                        </div>

                    </div>
                </div>


                <button class="btn float-right  btn-info my-3 " type="submit">
                    Register
                </button>

            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

</div>
</div>

<?php include('includes/footer.php'); ?>