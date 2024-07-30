<?php
// Assuming $conn is your database connection object
session_start();
// include('header.php');
// include('navbar.php');
// include('sidebar.php');
include('../../config.php');

if (isset($_GET['movie_id'])) {
  $movie_id = $_GET['movie_id'];

  $query = "SELECT DISTINCT screen_id FROM show_details WHERE movie_id = {$movie_id}";
  $result = mysqli_query($con, $query);
  if ($result) {
    if($row = mysqli_fetch_assoc($result)){

        echo "hi".$row['screen_id'] ;
    }
    else{
        echo "hifgd" ;
    }
      
      //   echo"<script>alert('Hi');</script>";
      // echo "<label for='screens'>Select Screen:</label>";
      // echo "<select name='screens' id='screens'>";
      // echo "<option value=''>Select Screen Name</option>";
      while ($row) {
          //     $query = "SELECT * FROM screen WHERE screen_id = {$row['screen_id']}";
          //     $res = mysqli_query($con, $query); 
          //     $rw = mysqli_fetch_assoc($res);
          //   echo "<option value='{$row['screen_id']}'>{$rw['screen_name']}</option>";
          echo "hi".$row['screen_id'] ;
    }
    echo "</select>";
  } else {
    echo "Error fetching screens.";
  }
}
?>
