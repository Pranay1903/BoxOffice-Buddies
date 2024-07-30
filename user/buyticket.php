<?php
session_start();
include_once 'Database.php';
date_default_timezone_set('Asia/Kolkata');
$seatArray = $_POST["seat"]; // Assuming the name of the input field for seat array is "seat"
$seatCount = count($seatArray);

if (isset($_SESSION['uname'])) {
  include("header.php");
}
?>

<head>

  <!-- Css Styles -->
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    buyticket</title>
  <!-- <link href="style.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



</head>
<center>
<h2>Checkout</h2>
</center>
<table class="table table-hover table-bordered text-center">
  <?php
  $query = "SELECT * FROM show_details WHERE show_id = " . $_POST['show_id'];
  $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
  $broadcastInfo = mysqli_fetch_array($record);
  mysqli_free_result($record);

   $query = "SELECT * FROM movie WHERE movie_id = " . $broadcastInfo['movie_id'];
  $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
  $filmInfo = mysqli_fetch_array($record);
  mysqli_free_result($record);
  ?>
  <tr>
  <td>
      Movie Name
    </td>
    <td>
    <?php     
      echo $filmInfo['moviename'];
      ?>
                    </td>
  </tr>
  <tr>
    <td>
      Screen Name
    </td>
    <td>
      <?php
      
      $s = mysqli_query($conn, "select DISTINCT screen_id from show_details where movie_id='" . $broadcastInfo['movie_id'] . "'");
      $shw = mysqli_fetch_array($s);
      $t = mysqli_query($conn, "select * from screen where screen_id='" . $shw['screen_id'] . "'");
      $screen = mysqli_fetch_array($t);
      // echo $filmInfo['moviename'];
      echo $screen['screen_name'];
      ?>
    </td>
  </tr>
  <tr>
    <td>
      Show Time
    </td>
    <td>
      <?php

$ttm = mysqli_query($conn, "select  * from show_time where showtime_id='" . $broadcastInfo['showtime_id'] . "'");
$ttme = mysqli_fetch_array($ttm);
echo date('h:i A', strtotime($ttme['stime']));
?> Show
    </td>
  </tr>
  <tr>
    <td>
      Selected Seats
    </td>
    <td>
  
      <?php
      $names = array(); // initialize an empty array to store the names
      
      for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
        list($row, $col) = explode('|', $_POST['seat'][$i]);
        $rowName = chr(65 + $row - 1);
        $names[] = $rowName . $col; // add the name to the array
      }
      sort($names); // sort the names array in alphabetical order
      echo implode(", ", $names); // join the names with comma separator and display
      ?>
  
    </td>
  </tr>
  <tr>
    <td>
      Number of Seats
    </td>
    <td>
      <form action="pay.php" method="post">
        <input type="hidden" name="screen" value="<?php echo $screen['screen_id']; ?>" />
        <!-- <input type=text id=seats value="<?php echo $seatCount; ?>" /> -->
        <label><?php echo $seatCount; ?></label>
        
      </td>
    </tr>
  <tr>
  
    <td>
      Amount
    </td>
    <td id="amount-display" style="font-weight:bold;font-size:18px">
      Rs
      <?php echo $screen['price'] * $seatCount; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <button class="btn btn-info" style="width:100%">Pay Now</button>
    </td>
  </tr>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
  </div>
  <?php
  include("footer.php");
  ?>