<?php
include('../../config.php');

if(isset($_POST['submit'])){
    $screen_id = $_POST['screen_id'];
    $screen_name = $_POST['screen_name'];
    $row = $_POST['row'];
    $col = $_POST['col'];
    
    $query = "UPDATE screen SET screen_name='$screen_name', row='$row', col='$col' WHERE screen_id='$screen_id'";
    
    if(mysqli_query($con, $query)){
        header("Location: view_screen.php?message=Screen details updated successfully");
        exit();
    } else{
        echo "Error: " . mysqli_error($con);
    }
}

if(isset($_GET['screen_id'])){
    $screen_id = $_GET['screen_id'];
    $query = "SELECT * FROM screen WHERE screen_id = '$screen_id'";
    $result = mysqli_query($con, $query);
    $screen = mysqli_fetch_assoc($result);
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
                                    <label for="screen_id">Screen ID</label>
                                    <input type="text" class="form-control" id="screen_id" name="screen_id" value="<?php echo $screen['screen_id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="screen_name">Screen Name</label>
                                    <input type="text" class="form-control" id="screen_name" name="screen_name" value="<?php echo $screen['screen_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="row">Seat Row</label>
                                    <input type="text" class="form-control" id="row" name="row" value="<?php echo $screen['row']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="col">Seat Column</label>
                                    <input type="text" class="form-control" id="col" name="col" value="<?php echo $screen['col']; ?>" required>
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