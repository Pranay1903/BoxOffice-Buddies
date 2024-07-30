<?php
// session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Upcoming Movies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Movies News</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <section class="content">
      <!-- <div class="container-fluid">
        <div class="row"> -->
          
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Movies</h3>
        </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputFile">Movie Poster</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Movie Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Movie Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Caster</label>
                    <input type="text" class="form-control"  placeholder="Enter Cast Names">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Movie Description</label>
                    <input type="text" class="form-control"  placeholder="Enter Cast Names">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Release Date</label>
                    <input type="Date" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Movie Trailer</label>
                    <input type="text" class="form-control"  placeholder="Enter Trailer Link">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Movie Poster</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- </div>
      </section> -->
      
    </div> 
    </div>

  </div> 
   
  </div>
  <!-- /.content-wrapper -->

<?php
include('footer.php');
?>