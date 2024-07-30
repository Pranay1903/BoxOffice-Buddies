<?php
session_start();
include_once 'Database.php';
$id = $_GET['pass'];
$result = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id = '" . $id . "'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>

  <!-- Css Styles -->
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php echo $row['moviename']; ?> Movie Details
  </title>
  <!-- <link href="style.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



</head>

<body>
  <?php
  include("header.php");
  ?>

  <section id="aboutUs">
    <div class="container">
      <?php
      include_once 'Database.php';
      $id = $_GET['pass'];
      $result = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id = '" . $id . "'");


      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['movie_id'];
          ?>
          <div class="row feature design">
            <div class="col-lg-4"> <img src="admin/image/<?php echo $row['photo']; ?>" class="resize-detail" alt=""
                width="100%"> </div>
            <div class="col-lg-8">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Movie Details
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <dl class="row">
                    <dt class="col-lg-4">Movie Name</dt>
                    <dd class="col-lg-8">
                      <?php echo $row['moviename']; ?>
                    </dd>
                    <dt class="col-lg-4">Release Date</dt>
                    <dd class="col-lg-8">
                      <?php echo $row['realsedate']; ?>
                    </dd>
                    <dt class="col-lg-4">Director Name</dt>
                    <dd class="col-lg-8">
                      <?php echo $row['director']; ?>
                    </dd>
                    <dt class="col-lg-4">Category</dt>
                    <dd class="col-lg-8">
                      <?php echo $row['category']; ?>
                    </dd>
                    <!-- <dt class="col-lg-4">Language</dt>
                    <dd class="col-lg-8">
                      <?php echo $row['language']; ?>
                    </dd> -->
                    <dt class="col-lg-4">Description</dt>
                    <dd class="col-lg-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti accusamus
                      eveniet perferendis atque excepturi, cupiditate corporis?
                      Jeff Lang (Tobey Maguire), an OBGYN, and his wife Nealy (Elizabeth Banks), who owns a small shop, live
                      in Seattle with their two-year-old son named Miles. Considering a second child, they decide to enlarge
                      their small home and lay expensive new grass in their backyard. Worms in the grass attract raccoons,
                      who destroy the grass, and Jeff goes to great lengths to get rid of the raccoons, mixing poison with a
                      can of tuna. Their neighbor Lila (Laura Linney) tells Jeff that her cat Matthew is missing, and Jeff
                      does not yet realize he may be responsible.</dd>
                  </dl>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

          </div>
          <?php
          // check if the show is available or not.
          $s = mysqli_query($conn, "select DISTINCT screen_id from show_details where movie_id='" . $row['movie_id'] . "'");
          if (mysqli_num_rows($s)) {
            ?>
            <div class="connatiner pt-4 ">
              <h3 style="color:#e0e0e0; background-color: #444;" class="text-center"><b>Available Shows</b></h3>
              <table class="table table-hover table-bordered text-center">
                <thead>
                  <tr>
                    <th class="text-center col-lg-4" style="font-size:16px;">Screen Name</th>
                    <th class="text-center  col-lg-8" style="font-size:16px;">Show Timings</th>
                  </tr>
                </thead>
                <?php



                while ($shw = mysqli_fetch_array($s)) {

                  $t = mysqli_query($conn, "select * from screen where screen_id='" . $shw['screen_id'] . "'");
                  $screen = mysqli_fetch_array($t);
                  ?>


                  <tbody>
                    <tr>
                      <td>
                        <?php echo $screen['screen_name'] ?>
                      </td>
                      <td>
                        <?php
                        $tr = mysqli_query($conn, "select * from show_details where movie_id='" . $row['movie_id'] . "' and screen_id='" . $shw['screen_id'] . "'");
                        while ($shh = mysqli_fetch_array($tr)) {
                          $ttm = mysqli_query($conn, "select  * from show_time where showtime_id='" . $shh['showtime_id'] . "'");
                          $ttme = mysqli_fetch_array($ttm);

                          ?>

                          <!-- <form>
                            
                            <input type="submit" class="btn btn-default" name="submit"
                            value="<?php echo date('h:i A', strtotime($ttme['stime'])); ?>" />
                          </form> -->
                          <a
                            href="seat.php?show_id=<?php echo $shh['show_id']; ?>&movie_id=<?php echo $shh['movie_id']; ?>&screen_id=<?php echo $shw['screen_id']; ?>">
                          <button class=" btn btn-default" name="submit">
                              <?php echo date('h:i A', strtotime($ttme['stime'])); ?>

                            </button>
                          </a>
                          <?php
                        }
                        ?>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                }
                ?>
              </table>
              <?php
          } else {
            ?>
              <h3 style="color:#444; font-size:23px;" class="text-center">Currently there are no any shows
                available!</h3>
              <p class="text-center">Please check back later!</p>
              <?php
          }
          ?>
          </div>

          <?php
        }
      }
      ?>
    </div>

  </section>

  <?php
  include("footer.php");
  ?>

</body>

</html>

<?php
// if (isset($_SESSION['uname'])) {
//   header('location:seat.php');
// } else {
//   header('location:login.php');
// }
?>