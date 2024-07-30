<?php
session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');

if (isset($_GET['success_msg'])) {
  $success_msg = $_GET['success_msg'];
  echo "<div class='success-msg'>$success_msg</div>";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Movie</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Movie</li>
          </ol>
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
            <form method="post" action="process_add_movie.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Movie Name</label>
                  <input type="text" name="moviename" class="form-control" placeholder="Enter Movie Name" required />
                </div>
                <div class="form-group">
                  <label for="control-label">Director</label>
                  <input type="text" name="director" class="form-control" placeholder="Enter Director Name" required>
                </div>
                <div class="form-group">
                  <label for="control-label">Category</label>
                  <input type="text" class="form-control" name="Category" placeholder="Enter Category" required
                    pattern="[a-zA-Z]+" title="Please enter only letters">
                </div>
                <div class="form-group">
                  <label class="control-label">Release Date</label>
                  <input type="date" class="form-control" name="rdate" required />
                </div>
                <div class="form-group">
                  <label for="control-label">Description</label>
                  <textarea name="desc" class="form-control" placeholder="Enter Movie Description" required></textarea>
                </div>
                <div class="form-group">
                  <label for="control-label">Movie Trailer</label>
                  <input type="text" class="form-control" name="trailer" placeholder="Enter Trailer Link">
                </div>
                <div class="form-group">
                  <label class="control-label">Image</label>
                  <input type="file" name="poster" class="form-control" required />
                </div>
              </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Add Movie</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>

</div>

<!-- /.content-wrapper -->

<?php
include('footer.php');
?>