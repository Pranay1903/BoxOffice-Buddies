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
                    <h1 class="m-0">Edit Movie</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Movie Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" class="form-control" id="inputTitle" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="inputGenre">Genre</label>
                                <input type="text" class="form-control" id="inputGenre" placeholder="Enter genre">
                            </div>
                            <div class="form-group">
                                <label for="inputDirector">Director</label>
                                <input type="text" class="form-control" id="inputDirector" placeholder="Enter director">
                            </div>
                            <div class="form-group">
                                <label for="inputReleaseDate">Release Date</label>
                                <input type="text" class="form-control" id="inputReleaseDate" placeholder="Enter release date">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea class="form-control" id="inputDescription" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Movie Poster</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputPoster">Poster URL</label>
                                <input type="text" class="form-control" id="inputPoster" placeholder="Enter poster URL">
                            </div>
                            <div class="form-group">
                                <img src="#" alt="Movie Poster" id="moviePoster" style="max-width: 100%; max-height: 300px;">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


</div>
</div>

</div>

</div>
<!-- /.content-wrapper -->

<?php
include('footer.php');
?>