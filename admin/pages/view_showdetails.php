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
          <h1 class="m-0">View Screen</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Screens</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive p-0" style="">
        <?php
$qry = mysqli_query($con, "SELECT * FROM show_details");
if (mysqli_num_rows($qry)) {
  while ($sd = mysqli_fetch_array($qry)) {
    ?>
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title">Screen: <?php echo $sd['movie_id']; ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text">Seat Row: <?php echo $sd['screen_id']; ?></p>
        <!-- <p class="card-text">Seat Column: <?php echo $sd['seat_column']; ?></p> -->
        <!-- <p class="card-text">Show Time: <?php echo date('h:i A', strtotime($sd['show_time'])); ?></p> -->
      </div>
    </div>
<?php
  }
} else {
  echo "No screen details found";
}
?>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->

</div>

</div>
<!-- /.content-wrapper -->

<?php
include('footer.php');
?>
