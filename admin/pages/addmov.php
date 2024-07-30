<?php
session_start();
    // include('header.php');
    // include('navbar.php');
    // include('sidebar.php');
include('../../config.php');

?>

<form method="POST">
  <!-- <label for="movie">Select Movie:</label> -->
  <?php $query = "SELECT * FROM movie";
  $result = mysqli_query($con, $query);
  if ($result) {
    ?>
      <!-- <select name="movie" id="movie" onchange="getScreens()">
        <option value="">Select a movie</option>
        <option value="1">Chaal Jeevi Laiye</option>
        <option value="2">Movie 2</option>
        <option value="3">Movie 3</option>
      </select> -->
    <?php
    echo "<label for='Movie'>Select movie:</label>";
    echo "<select name='movie' id='movie' onchange='getScreens()'>";
    echo "<option value=''>Select Movie</option>";
        while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='{$row['movie_id']}'>{$row['moviename']}</option>";
    }
    echo "</select>";
  } else {
    echo "Error fetching Movie.";
  }
  ?>

  <div id="screens-div"></div>

  <input type="submit" name="submit" value="Submit">
</form>

<script>
function getScreens() {
  var movieId = document.getElementById('movie').value;
  if (movieId !== '') {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('screens-div').innerHTML = this.responseText;
        // alert(movieId);
      }
    };
    xhttp.open('GET', 'get_screens.php?movie_id=' + movieId, true);
    xhttp.send();
  } else {
    document.getElementById('screens-div').innerHTML = '';
  }
}
</script>
