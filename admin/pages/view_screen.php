<?php
// session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');
if (isset($_GET['message'])) {
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
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Screen Name</th>
                <th>Seat Row</th>
                <th>Seat Column</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $qry = mysqli_query($con, "select * from screen ORDER BY screen_id ASC");
              if (mysqli_num_rows($qry)) {
                while ($c = mysqli_fetch_array($qry)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $c['screen_id'] ?>
                    </td>
                    <td>
                      <?php echo $c['screen_name'] ?>
                    </td>
                    <td>
                      <?php echo $c['row'] ?>
                    </td>
                    <td>
                      <?php echo $c['col'] ?>
                    </td>

                    </td>
                    <td>
                      <!--  <a href="edit_screen.php?screen_id=<?php echo $screen['screen_id']; ?>" class="btn btn-primary edit-btn" onclick="return confirm('Are you sure you want to edit this screen?')">Edit</a> -->

                      <a href="edit_screen.php?screen_id=<?php echo $c['screen_id'] ?>" class="btn btn-primary btn-sm"><i
                          class="fas fa-edit"></i>
                        Edit</a>
                    </td>
                    <td>
                      <a href="delete_screen.php?screen_id=<?php echo $c['screen_id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this screen?');"
                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>

                      <!-- <a href="delete_screen.php?screen_id=<?php echo $c['screen_id'] ?>" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                  </tr>

                  <?php
                }
              } ?>
            </tbody>
          </table>
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