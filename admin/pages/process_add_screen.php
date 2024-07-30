<?php
session_start();
include('../../config.php');
// extract($_POST);

if(isset($_POST['submit'])){
      $sname = $_POST['screenname'];
      $sr = $_POST['seatrow'];
      $sc= $_POST['seatcolumn'];
      $price=$_POST['price'];
    
      // Check if the screen name already exists in the database
      $result = mysqli_query($con, "SELECT * FROM screen WHERE screen_name = '$sname'");
      if(mysqli_num_rows($result) > 0){
          echo "<script>alert('Screen name already exists')</script>";
      } else {
          if(mysqli_query($con, "INSERT INTO screen (screen_name,row,col,price) VALUES ('$sname','$sr','$sc','$price')")or die('query failed')){
            // header('location:add_screen_time.php?screenname='.$sname.'&message=Screen added successfully');
            $message = "Screen added successfully";
        header("location:add_screen_time.php?screenname=$sname&message=$message");
             
          } else {
              echo "<script>alert('Error')</script>";
          }
      }
    }
?>
