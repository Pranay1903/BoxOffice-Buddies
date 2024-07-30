<?php
include('../../config.php');

// Get the selected screen ID
$screen_id = $_POST['screen_id'];

// Make a query to get the available times for the selected screen
$result = mysqli_query($con, "SELECT showtime_id FROM show_deatails WHERE screen_id = $screen_id");
// Make a query to get the show time IDs for the selected screen
// $result = mysqli_query($con, "SELECT DISTINCT showtime_id FROM show_details WHERE screen_id = $screen_id");

// Generate an array of show time IDs
$showtime_ids = array();
while ($row = mysqli_fetch_array($result)) {
  $showtime_ids[] = $row['showtime_id'];
}

// Make a query to get the available show times for the selected screen
$result=mysqli_query($con,"SELECT * FROM show_time WHERE screen_id = $screen_id AND showtime_id NOT IN (SELECT showtime_id FROM show_details WHERE screen_id = $screen_id)");

// $result = mysqli_query($con, "SELECT * FROM show_time WHERE screen_id = $screen_id AND showtime_id NOT IN (" . implode(',', $showtime_ids) . ")");

// Generate the HTML options for the time selection dropdown
if(mysqli_num_rows($result) > 0) {
  $options = '<option selected disabled>Select Time</option>';
  while ($row = mysqli_fetch_array($result)) {
    $options .= '<option value="' . $row['showtime_id'] . '">' . date('h:i A', strtotime($row['stime'])) . '</option>';
  }
} else {
  $options = '<option selected disabled>No shows available</option>';
}


// Return the HTML options
echo $options;

?>
