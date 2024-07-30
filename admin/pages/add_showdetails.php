<?php
session_start();
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
          <h1 class="m-0">Add showdetails</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add showdetails</li>
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

            <form method=post action="process_add_showdetails.php">
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Select Movies</label>
                  <select name="movie_id" class="form-control form-select-lg mb-3">
                    <option selected>Select Movies</option>
                    <?php
                    $sc = mysqli_query($con, "select * from movie");
                    while ($mov = mysqli_fetch_array($sc)) {
                      ?>
                      <option value="<?php echo $mov['movie_id']; ?>"><?php echo $mov['moviename']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Select Screen</label>
                  <select name="screen_id" class="form-control form-select-lg mb-3" id="screen-select">
                    <option selected>Select Screen</option>
                    <?php
                    $sc = mysqli_query($con, "select * from screen");
                    while ($mov = mysqli_fetch_array($sc)) {
                      ?>
                      <option value="<?php echo $mov['screen_id']; ?>"><?php echo $mov['screen_name']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Select Time</label>
                  <select name="stime" class="form-control form-select-lg mb-3" id="time-select">
                    <option selected disabled>Select Time</option>
                  </select>
                </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add showdetails</button>
                </div>
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

<script>
  $(function () {
    // When the screen selection changes
    $('#screen-select').on('change', function () {
      var screen_id = $(this).val();
      // Make an AJAX request to get the available times for the selected screen
      $.ajax({
        url: 'get_available_times.php',
        type: 'POST',
        data: { screen_id: screen_id },
        success: function (response) {
          // Update the time selection dropdown with the available times
          $('#time-select').html(response);
          // alert("hi");
        }
      });
    });
  });
</script>



<?php
include('footer.php');
?>