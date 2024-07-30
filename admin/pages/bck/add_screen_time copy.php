<?php
session_start();

include('../../config.php');

$screenname = $_GET['screenname'];

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
<!-- Screen and Show Time Form -->
<form id="screen_time_form" method="post" action="">
  <label for="screen_name">Screen Name:</label>
  <input type="text" id="screen_name" name="screen_name"><br><br>
  <div id="add_time_section" style="display:none;">
    <label for="time">Time:</label>
    <input type="time" id="time" name="time"><br><br>
  </div>
  <input type="submit" name="add_screen_time" value="Add Screen and Show Time">
</form>

<!-- Add more time modal -->
<div id="add_more_time_modal" style="display:none;">
  <h2>Screen and Show Time added successfully!</h2>
  <p>Do you want to add more time for the same screen, or add a new screen?</p>
  <button onclick="addMoreTime()">Add more time</button>
  <button onclick="addNewScreen()">Add new screen</button>
</div>

<!-- Add new screen modal -->
<div id="add_new_screen_modal" style="display:none;">
  <h2>Screen and Show Time added successfully!</h2>
  <p>Do you want to add time for the new screen, or add a new screen?</p>
  <button onclick="addTimeForNewScreen()">Add time for new screen</button>
  <button onclick="addNewScreen()">Add new screen</button>
</div>

<script>
  // Function to show the "add more time" modal
  function addMoreTime() {
    document.getElementById('add_more_time_modal').style.display = 'block';
  }
  
  // Function to show the "add new screen" modal
  function addNewScreen() {
    document.getElementById('add_new_screen_modal').style.display = 'block';
  }
  
  // Function to add time for the new screen
  function addTimeForNewScreen() {
    // Set the value of the "screen_name" input field to the new screen name
    document.getElementById('screen_name').value = '';
    // Show the "add time" section of the form
    document.getElementById('add_time_section').style.display = 'block';
    // Hide the modals
    document.getElementById('add_more_time_modal').style.display = 'none';
    document.getElementById('add_new_screen_modal').style.display = 'none';
  }
</script>

<?php
// Check if the form was submitted
if(isset($_POST['add_screen_time'])) {
  // Get the screen name and time from the form
  $screenName = $_POST['screen_name'];
  $time = $_POST['time'];



  // Check if the screen name and time already exist in the database
  $query = "SELECT COUNT(*) FROM show_time WHERE screen_id = (SELECT screen_id FROM screen WHERE screen_name = '$screenName') AND time = '$time'";
  $result = mysqli_query($con, $query);
  $count = mysqli_fetch_array($result)[0];

  if($count > 0) {
    // If the screen name and time already exist, show an error message
    echo 'Error: The screen and show time already exist.';
  } else {
    // If the screen name and time don't exist, insert them into the database
    // First, check if the screen name already exists in the "screen" table
    $query = "SELECT COUNT(*) FROM screen WHERE screen_name = '$screenName'";
    $result = mysqli_query($con, $query);
    $count = mysqli_fetch_array($result)[0];

    if($count > 0) {
      // If the screen name already exists, insert the show time into the "show_time" table
      $query = "INSERT INTO show_time (screen_id, time) VALUES ((SELECT screen_id FROM screen WHERE screen_name = '$screenName'), '$time')";
      mysqli_query($con, $query);

      // Show the "add more time" modal
      echo '<script>document.getElementById("add_more_time_modal").style.display = "block";</script>';
    } else {
      // If the screen name doesn't exist, insert it into the "screen" table and then insert the show time into the "show_time" table
      $query = "INSERT INTO screen (screen_name) VALUES ('$screenName')";
      mysqli_query($con, $query);

      // Get the ID of the newly inserted screen
      $screenId = mysqli_insert_id($con);

      // Insert the show time into the "show_time" table
      $query = "INSERT INTO show_time (screen_id, time) VALUES ($screenId, '$time')";
      mysqli_query($con, $query);

      // Show the "add new screen" modal
      echo '<script>document.getElementById("add_new_screen_modal").style.display = "block";</script>';
    }
  }

  // Close the database conection
  mysqli_close($con);
}
?>
