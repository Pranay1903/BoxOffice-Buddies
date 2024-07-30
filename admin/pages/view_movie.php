<?php
// session_start();
include('header.php');
include('navbar.php');
include('sidebar.php');
include('../../config.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Movie</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Movies</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">View Movies</h3>

                
              </div> -->
              <!-- /.card-header -->


              <div class="card-body table-responsive p-0" style="">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Movie Name</th>
                      <th>Realse Date</th>
                      <!-- <th>Status</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                        $qry=mysqli_query($con,"select * from movie");
                        if(mysqli_num_rows($qry))
                        {
                        while($c=mysqli_fetch_array($qry))
                        {
                        ?>
                    <tr>
                      <td><?php echo $c['movie_id']?></td>
                      <td><?php echo $c['moviename']?></td>
                      <td><?php echo $c['realsedate']?></td>
                      <td><a href="edit_movie.php?movie_id=<?php echo $c['movie_id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
Edit</a>
                    </td>
                    <td>
                    <a href="delete_movie.php?movie_id=<?php echo $c['movie_id']; ?>" onclick="return confirm('Are you sure you want to delete this movie?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>

                      <!-- <a href="delete_screen.php?screen_id=<?php echo $c['screen_id'] ?>" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                      <!-- <td><span class="tag tag-success">Approved</span></td> -->
                      <!-- <td class='text-center text-wrap'><a href='edit_movie.php?movie_id=<?php echo $c['movie_id']; ?>'><button class='fa-solid fa-pen-to-square' style='border:none;'></button></a></td> -->
                        <!-- <td class='text-center text-wrap'><a href='edit_movie.php?delete_products=<?php echo $product_id ?>' onclick="return confirm('are you sure to delete this product!')"><i class='fa-solid fa-trash' style='color: #344055;'></i></a></td> -->
                      <!-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
                    </tr>
                    <!-- <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr> -->
                    <?php
                    }
                    }?>
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