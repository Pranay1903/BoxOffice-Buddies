<?php
session_start();
include('../../config.php');
// extract($_POST);

if(isset($_POST['submit'])){

    // Get the screen name and time from the form
    $screenName = $_POST['screenname'];
    $time = $_POST['time'];
  

    // Check if the screen name and time already exist in the database
    // $query = "SELECT * FROM show_time WHERE screen_id = (SELECT screen_id FROM screen WHERE screen_name = '$screenName') AND time = '$time'";
    // $result = mysqli_query($con, $query);
    // $count = mysqli_fetch_array($result);
    $query = "SELECT * FROM show_time WHERE screen_id IN (SELECT screen_id FROM screen WHERE screen_name = '$screenName')";
    $result = mysqli_query($con, $query);
    
    $found = false;
    while($row = mysqli_fetch_assoc($result)) {
      if($row['time'] == $time) {
        // If the screen name and time already exist, set the $found variable to true
        $found = true;
        break;
      }
    }
    
    if($found) {
      // If the screen name and time already exist, show an error message
      $_SESSION['message'] = 'Error: The screen and show time already exist.';
      header('location:add_screen.php?message=' . urlencode($_SESSION['message']));
      exit(); // redirect and exit to prevent further execution of this script
    } else {
      // If the screen name and time do not exist, insert them into the database
      $query = "INSERT INTO show_time (screen_id, stime) VALUES ((SELECT screen_id FROM screen WHERE screen_name = '$screenName' limit 1), '$time')";
      if(mysqli_query($con, $query)) {
        $_SESSION['message'] = 'The screen and show time were added successfully.';
        header('location:add_screen.php?message=' . urlencode($_SESSION['message']));
        exit(); // redirect and exit to prevent further execution of this script
      } else {
        $_SESSION['message'] = 'Error: Could not add the screen and show time.'. mysqli_error($con);
        header('location:add_screen.php?message=' . urlencode($_SESSION['message']));
        exit(); // redirect and exit to prevent further execution of this script
      }
    }

}
?>