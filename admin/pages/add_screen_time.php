<?php
session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');

$screenname = $_GET['screenname'];
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
                    <h1 class="m-0">Add Screen Time</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Screen Time</li>
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

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method=post action="process_add_screen_time.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Screen Name</label>
                                    <input type="text" name="screenname" class="form-control"
                                        value="<?php echo $screenname ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Screen Time</label>
                                    <input type="time" name="time" class="form-control" placeholder="time" />
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Add Screen Time</button>
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