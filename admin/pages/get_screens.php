<?php
// Assuming $conn is your database connection object
session_start();
// include('header.php');
// include('navbar.php');
// include('sidebar.php');
include('../../config.php');

if (isset($_GET['movie_id'])) {
  $movie_id = $_GET['movie_id'];

//   $query = "SELECT DISTINCT screen_id FROM show_details WHERE movie_id = {$movie_id}";
  $query = "SELECT * FROM screen";
  $result = mysqli_query($con, $query);
  if ($result) {
      
      //   echo"<script>alert('Hi');</script>";
      echo "<label for='screens'>Select Screen:</label>";
      echo "<select name='screens' id='screens'>";
      echo "<option value=''>Select Screen Name</option>";
      while ($row = mysqli_fetch_assoc($result)) {
            //   $query = "SELECT * FROM screen WHERE screen_id = {$row['screen_id']}";
            //   $res = mysqli_query($con, $query); 
            //   $rw = mysqli_fetch_assoc($res);
            echo "<option value='{$row['screen_id']}'>{$row['screen_name']}</option>";
          echo "Error fetching screens.";
    }
    echo "</select>";
  } else {
    echo "Error fetching screens.";
  }
}
?>
