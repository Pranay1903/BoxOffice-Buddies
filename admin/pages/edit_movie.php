<?php
include('../../config.php');

if(isset($_POST['submit'])){
    $movie_id = $_POST['movie_id'];
    $moviename = $_POST['moviename'];
    $director = $_POST['director'];
    $realsedate = $_POST['realsedate'];
    $category = $_POST['category'];
    $description = $_POST['desc'];
    $trailer = $_POST['trailer'];
    $photo = $_POST['photo'];
    $file_path_1 = "";

    if ($_FILES['poster']['name']) {
        $file_name_1 = $_FILES['poster']['name'];
        $file_tmp_1 = $_FILES['poster']['tmp_name'];
        $file_ext_1 = strtolower(pathinfo($file_name_1, PATHINFO_EXTENSION));
        $extensions_1 = array("jpeg", "jpg", "png");
        $file_path_1 = "uploads/" . time() . "_" . rand(1000, 9999) . "." . $file_ext_1;

        if (in_array($file_ext_1, $extensions_1) === false) {
            echo "Extension not allowed, please choose a JPEG or PNG file.";
            exit();
        }

        if (move_uploaded_file($file_tmp_1, "../../" . $file_path_1) === false) {
            echo "Could not upload file, please try again.";
            exit();
        }
    }
    
    $query = "UPDATE movie SET moviename='$moviename', director='$director', realsedate='$realsedate', category='$category', description='$description', trailer='$trailer', photo='$photo' ";

    if ($file_path_1) {
        $query .= ", photo='$file_path_1' ";
    }

    $query .= "WHERE movie_id='$movie_id'";
    
    if(mysqli_query($con, $query)){
        header("Location: view_movie.php?message=Movie details updated successfully");
        exit();
    } else{
        echo "Error: " . mysqli_error($con);
    }
}

if (isset($_GET['movie_id'])) {
    $edit_id = $_GET['movie_id'];
    $get_product_query = "SELECT * FROM `movie` WHERE movie_id = $edit_id";
    $run_get_product_query = mysqli_query($con, $get_product_query);
    $data_product = mysqli_fetch_assoc($run_get_product_query);

    $movie_id = $data_product['movie_id'];
    $moviename = $data_product['moviename'];
    $director = $data_product['director'];
    $realsedate = $data_product['realsedate'];
    $category = $data_product['category'];
    $description = $data_product['description'];
    $trailer = $data_product['trailer'];
    $photo = $data_product['photo'];
    $file_path_1 = "";
}
?>


<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Screen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="view_screen.php">View Screens</a></li>
                        <li class="breadcrumb-item active">Edit Screen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Screen Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="">
                            <div class="card-body">
                            <div class="form-group">
                    <label class="control-label">Movie Name</label>
                    <input type="text" name="moviename" class="form-control" placeholder="Enter Movie Name"
                        value="<?php echo $moviename ?>" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Director</label>
                    <input type="text" name="director" class="form-control" placeholder="Enter Director Name"
                        value="<?php echo $director ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <input type="text" class="form-control" name="Category" placeholder="Enter Category"
                        value="<?php echo $category ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Release Date</label>
                    <input type="date" class="form-control" name="rdate" class="form-control"
                        value="<?php echo $realsedate ?>" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="desc" class="form-control"
                        placeholder="Enter Movie Description">"<?php echo $description ?>"</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Movie Trailer</label>
                    <input type="text" class="form-control" name="trailer" placeholder="Enter Trailer Link"
                        value="<?php echo $trailer ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="poster" class="form-control" value="<?php echo $photo ?>" />
                </div>
                                </div>
              <!-- /.card-body -->

              <div class="card-footer">
              <button type="submit" name=submit class="btn btn-primary">Update Screen</button>  
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>

</div>
</div>

</div>

</div>
<!-- /.content-wrapper -->

<?php
include('footer.php');
?>