<?php
// session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script>alert('$message')</script>";
    echo "<script>window.history.replaceState({}, document.title, window.location.href.split('?')[0]);</script>";
}
        ?>
        <script>
            window.history.replaceState({}, document.title, window.location.href.split('?')[0]);
            </script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Screen</h1>
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
            <form method=post action="process_add_screen" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Screen Name</label>
                  <input type="text" name="screenname" class="form-control" placeholder="Enter Screen Name" />
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">Release Date</label>
                  <input type="Date" class="form-control">
                </div> -->
                <div class="form-group">
                  <label class="control-label">Screen Seat Row</label>
                  <input type="number" name="seatrow" class="form-control" placeholder="Enter The Row of seat in that Screen" />
                </div>
                <div class="form-group">
                  <label class="control-label">Screen Seat Column</label>
                  <input type="number" name="seatcolumn" class="form-control" placeholder="Enter The Column of seat in that Screen" />
                </div>
                <div class="form-group">
                  <label class="control-label">Price</label>
                  <input type="text" name="price" class="form-control" placeholder="Enter Price Of Screen" />
                </div>
                <!-- <div class="form-group">
                  <label class="control-label">Release Date</label>
                  <input type="date" class="form-control" name="rdate" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="desc" class="form-control" placeholder="Enter Movie Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Movie Trailer</label>
                  <input type="text" class="form-control" name="trailer" placeholder="Enter Trailer Link">
                </div>
                <div class="form-group">
                  <label class="control-label">Image</label>
                  <input type="file" name="poster" class="form-control" />
                </div> -->
                <!-- <div class="form-group">
                  <label class="control-label">Status</label>
                  <select class="form-control form-select-lg mb-3">
                    <option selected>Select Option</option>
                    <option value="Running">Running</option>
                    <option value="Upcomoning">Upcoming</option>
                  </select>
                </div> -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Add Screen</button>
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