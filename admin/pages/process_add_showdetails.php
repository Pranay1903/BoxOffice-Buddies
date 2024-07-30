<?php
session_start();
include('../../config.php');

if(isset($_POST['submit'])) {
  $movie_id = $_POST['movie_id'];
  $screen_id = $_POST['screen_id'];
  $time = $_POST['stime'];

  // Convert the input time to time format (HH:MM:SS)
  $time_formatted = date("H:i:s", strtotime($time));

  // Select the showtime_id from show_time table based on the selected time
  $sql1 = "SELECT showtime_id FROM show_time WHERE stime = '$time_formatted'";
  $result = mysqli_query($con, $sql1);
  $row = mysqli_fetch_assoc($result);
  $showtime_id = $row['showtime_id'];


  $sql_check = "SELECT COUNT(*) AS count FROM show_details WHERE movie_id = $movie_id AND screen_id = $screen_id AND showtime_id = $showtime_id";
$result = mysqli_query($con, $sql_check);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
  // A row with the same values already exists
  $message = "Data already exists.";
  header("Location: add_showdetails.php?message=" . urlencode($message));
  exit;
} else {
  // Insert data into the show_details table
  $sql2 = "INSERT INTO show_details (movie_id, screen_id, showtime_id) VALUES ($movie_id, $screen_id, $showtime_id)";
  if(mysqli_query($con, $sql2)) {
    // Data inserted successfully
    $message = "Data inserted successfully.";
    header("Location: add_showdetails.php?message=" . urlencode($message));
    exit;
  } else {
    // Error inserting data
    echo "Error: " . mysqli_error($con);
  }
}

//   // Insert data into the show_details table
//   $sql2 = "INSERT INTO show_details (movie_id, screen_id, showtime_id) VALUES ($movie_id, $screen_id, $showtime_id)";

//   if(mysqli_query($con, $sql2)) {
//       // Data inserted successfully
//       $message = "Data inserted successfully.";
//       header("Location: add_showdetails.php?message=" . urlencode($message));
//       exit;
//     } else {
//         // Error inserting data
//         echo "Error: " . mysqli_error($con);
//     }
}
  
?>

