<?php
session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');

if (isset($_GET['movie_id'])) {
    $edit_id = $_GET['movie_id'];
    $get_product_query = "SELECT * FROM `movie` WHERE movie_id = $edit_id";
    // $img_path = "SELECT image_path FROM `products` WHERE product_id = $edit_id";
    $run_get_product_query = mysqli_query($con, $get_product_query);
    $data_product = mysqli_fetch_assoc($run_get_product_query);

    // data product
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Movie</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Movie</li>
          </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- <div class="card-header">
              <h3 class="card-title">Add Movies</h3>
            </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method=post action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Movie Name</label>
                                    <input type="text" name="moviename" class="form-control"
                                        placeholder="Enter Movie Name" value="<?php echo $moviename ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Director</label>
                                    <input type="text" name="director" class="form-control"
                                        placeholder="Enter Director Name" value="<?php echo $director ?>">
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
                                    <input type="text" class="form-control" name="trailer"
                                        placeholder="Enter Trailer Link" value="<?php echo $trailer ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="poster" class="form-control"
                                        value="<?php echo $photo ?>" />
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Movie</button>
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

<?php
if (isset($_POST['submit'])) {

    $mname = $_POST['moviename'];
    $director = $_POST['director'];
    $rdate = $_POST['rdate'];
    $Category = $_POST['Category'];
    $Description = $_POST['desc'];
    $trailer = $_POST['trailer'];

    $flname = $_FILES["poster"]["name"];

    $tempname = $_FILES["poster"]["tmp_name"];

    $folder = "../image/" . $flname;

    // Update query
    $update_query = "UPDATE `movie` SET moviename='$mname', director='$director', realsedate='$rdate', category='$Category', description='$Description', trailer='$trailer', photo='$flname' WHERE movie_id=$edit_id";
    $run_update_query = mysqli_query($con, $update_query);

    if($run_update_query) {
        // Success message
        echo "<script>alert('Succeed Updating!')</script>";
        // echo "Movie updated successfully!";
    } else {
 
        echo "<script>alert('Succeed Updakjhkuhuihiuhiuhting!')</script>";
        // Error message
        echo "Error: " . mysqli_error($con);
    }
}

// if (isset($_POST['submit'])) {

//     $mname = $_POST['moviename'];
//     $director = $_POST['director'];
//     $rdate = $_POST['rdate'];
//     $Category = $_POST['Category'];
//     $Description = $_POST['desc'];
//     $trailer = $_POST['trailer'];

//     $flname = $_FILES["poster"]["name"];

//     $tempname = $_FILES["poster"]["tmp_name"];

//     $folder = "../image/" . $flname; //where file will save after thee query runs
//     // mysqli_query($con, "insert into movie (moviename,director,realsedate,category,description,trailer,photo) VALUES ('$mname','$director','$rdate','$Category','$Description','$trailer','$flname')") or die('query failed');
//     // mysqli_query($con, "insert into 'movie' (moviename,director,category,description,trailer,photo,action) VALUES ('$mname','$director','$Category','$Description','$trailer','$flname','running')")or die('query failed');


//     // $update_query = "UPDATE `movie` SET `moviename` = $mname, `director` = $director,
//     //                     `realsedate` = '$realsedate', `category` = '$Category',
//     //                     `description` = '$description',
//     //                     `trailer` = '$trailer',
//     //                     `photo` = '$flname'
//     //                     WHERE movie_id = '$edit_id'";
//     $insert = mysqli_query($con, "UPDATE movie SET moviename='$mname', director='$director', realsedate='$rdate', category='$Category', description='$Description', trailer='$trailer', photo='$flname' WHERE movie_id='$edit_id'") or die(mysqli_error($con));

//     $run_update_query = mysqli_query($con, $insert);
//     // move_uploaded_file($tempname, $folder);
//     if ($run_update_query) {
//         echo "<script>alert('Succeed Updating!')</script>";
//         // echo "<script>window.open('index.php ','_self')</script>";
//     } else {
//         echo "<script>alert('Succeed Updatingerror!')</script>";
//         // echo "<script>alert('" . mysqli_error($con) . "')</script>";
//         // echo mysqli_error($con);
//     }
// }
?>