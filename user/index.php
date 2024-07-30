<?php
session_start();
include('Database.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boxoffice buddies</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .heading {
            padding-top: 20px;
        }
        .card {
            width: 100%;
        }
        html, body {
            height: 100%;
            font-family: "Nunito Sans", sans-serif;
        }
        .card-img-top {
            width: 100%;
            height: 28vw;
            object-fit: cover;
        }
        .btn {
            margin-top: auto;
        }
        .container-custom {
            padding-left: 25px;
            padding-right: 25px;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
  <body>

  <?php
include("header.php");
?>

<div class="container-custom">
   <img src=image/theatre_2.jpg alt="" class="image-resize" style="width: 100%; height: 400px;">
</div>

<div class=" container-custom">
    <h1 class="heading">Movies</h1>
    <div class="row">
        <?php
        $select_product = mysqli_query($conn, "SELECT * FROM `movie`") or die('query failed');
        if (mysqli_num_rows($select_product) > 0) {
            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                <div class="col-lg-3 mt-5">
                    <div class="card h-100 d-flex flex-column">
                        <img src="admin/image/<?php echo $fetch_product['photo']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo $fetch_product['moviename'];?></b></h5>
                            <p class="card-text"><?php echo $fetch_product['description'];?></p>
                            <a href="movie_details.php?pass=<?php echo $fetch_product['movie_id'];?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<div class="container">
    <!-- <h1 class="heading">Upcoming Movies</h1> -->
    <div class="row ">

        <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `movie`") or die('query failed');
      // if (mysqli_num_rows($select_product) > 0) {
      //   while($fetch_product = mysqli_fetch_array($select_product)) {
      //       if($fetch_product['action']== "upcoming"){
      if(mysqli_num_rows($select_product) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_product)){
              ?>

            <!-- <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="admin/image/<?php echo $fetch_product['image']?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo $fetch_product['movie_name'];?></b></h5>
                    <p class="card-text"><?php echo $fetch_product['decription'];?></p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
            </div> -->
<!-- 
            <div class="col-lg-3 mt-5" style="width: 20rem;" >
            <div class="card h-100 d-flex flex-column" >
            <img src="admin/image/<?php echo $fetch_product['image']?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class=-card-title><b><?php echo $fetch_product['movie_name'];?></b></h5>
                <p class="card-text"><?php echo $fetch_product['decription'];?></p> -->
            <!-- <a href="movie_details.php?pass=<?php echo $fetch_product['id'];?>" class="btn btn-primary">Book Now</a> -->
                <!-- <input type="submit" value="Book Now" name="add_to_cart" class="btn mt-auto btn-primary "> -->
            </div>
            </div>
        </div>

        <?php
}
  }
// }
?>

</div>
</div>

<?php
include("footer.php");
?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>