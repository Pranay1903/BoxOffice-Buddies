<!-- ..it's and old backup of buyticket -->

<?php
  session_start();
  require('Database.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Cart | PreBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @import url('https://fonts.googleapis.com/css?family=Lato|Yantramanav:400,700');
@import url('https://use.fontawesome.com/releases/v5.5.0/css/all.css');

.clearfix::after {
   content: " ";
   display: block;
   height: 0;
   clear: both;
}

/* Colours are rgb(102, 102, 102), and rgb(254, 229, 14) */

body {
  margin: 0;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  color: #282828;
  background: #f7f7f7;
  overflow-y: scroll;
  overflow-x: hidden;
}

nav {
  width: 100vw;
  background: #282828;
  height: 100px;
}

.logo {
  margin: 0;
  padding: 25px 10px;
  float: left;
  background: rgb(254, 229, 14);
  height: 50px;
  width: 200px;
}

.logo h1 {
  bottom: 5px;
  font-family: 'Yantramanav', sans-serif;
  font-size: 20px;
}

.logo span {
  margin-left: 15px;
  font-family: 'Yantramanav', sans-serif;
  font-size: 12px;
}

.logo img {
  height: 50px;
  float: left;
  margin-right: 15px;
  margin-left: 30px;
}

nav ul {
  background: #282828;
  text-align: right;
  float: right;
  color: #fff;
  list-style-type: none;
  font-family: 'Yantramanav', sans-serif;
  font-size: 15px;
  font-weight: 800;
  text-transform: uppercase;
  padding: 25px 50px;
}

nav ul li {
  display: inline-block;
  margin-left: 1.5rem;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  transition: all 0.4s;
}

nav ul li a:hover {
  color: rgb(254, 229, 14);
}

nav ul .special {
  background: rgb(254, 229, 14);
  padding: 1rem 0.5rem;
  margin-top: -1rem;
  transition: all 0.4s;
}

nav ul .special a {
  color: #000;
}

nav ul .special:hover {
  background: #f7f7f7;
  color: #000;
}

nav ul .special a:hover {
  color: #000;
}

main {
  margin: 100px auto;
  max-width: 900px;
  padding: 1.875rem 3.125rem 3.125rem;
  background: #282828;
}

main .bar {
  text-align: center;
  font-family: 'Yantramanav', sans-serif;
  text-transform: uppercase;
  margin: 0 -4.375rem;
  padding: 0.4rem 4rem;
  background: rgb(254, 229, 14);
}

.bar h2, span {
  margin: 0;
  padding: 0;
}

.bar .aside {
  text-align: right;
}

section {
  box-sizing: border-box;
  margin: 1rem -4rem;
  padding: 0 1rem 1rem 0;
  background: #f7f7f7;
  color: #282828;
  border: 2px solid #000;
}

section p {
  padding: 0 2rem;
  color: #282828;
}

.movie {
  display: flex;
}

.movie img {
  max-height: 250px;
}

.movie h3, h4 {
  font-weight: 400;
}

.movie-left {
  box-sizing: border-box;
  margin-right: 1rem;
}

p {
  padding: 2rem;
  color: #fff;
  font-size: 1rem;
}

form {
  padding: 2rem;
}

form span {
  color: #fff;
  font-size: 1rem;
}

input, button, select, option, textarea {
  border: none 0;
  font-size: 0.875rem;
  text-transform: uppercase;
  font-weight: 800;
  height: 2.625rem;
  box-sizing: border-box;
  margin: 0.3rem 0;
  transition: all 0.4s;
}

textarea {
  width: 100%;
  height: 6rem;
}

option, select {
  float: left;
  font-weight: 400;
  width: 70%;
  box-sizing: border-box;
  border: 1px solid #282828;
}

.movie-button {
  cursor: pointer;
  padding: 0 1.875rem;
  width: 30%;
  min-width: 150px;
  float: left;
  font-size: 0.75rem;
  background: #f71111;
  color: #fff;
  font-style: italic;
}

.two-button-one {
  cursor: pointer;
  padding: 0 1.875rem;
  width: 70%;
  min-width: 150px;
  float: left;
  font-size: 0.75rem;
  background: #f71111;
  color: #fff;
  font-style: italic;
}

.two-button-two {
  cursor: pointer;
  padding: 0 1.875rem;
  width: 28%;
  min-width: 150px;
  float: right;
  font-size: 0.75rem;
  background: #f7f7f7;
  border: 1px solid #282828;
  color: #282828;
  font-style: italic;
}

.form-input {
  padding: 0 1.25rem;
  width: 100%;
  background: #fff;
  color: #282828;
  font-family: 'Yantramanav', sans-serif;
  letter-spacing: 0.01rem;
}

.form-button {
  cursor: pointer;
  padding: 0 1.875rem;
  width: 100%;
  font-size: 0.75rem;
  background: #f71111;
  color: #fff;
  font-style: italic;
}

.form-button:hover, .two-button-one:hover {
  background: #282828;
  border: 1px solid #fff;
}

.aside-button {
  width: 100%;
  float: right;
  background: #f7f7f7;
  color: #282828;
}

.aside-button:hover {
  background: #f7f7f7;
  border: 1px solid #fff;
}

.full-icon {
  width: 100%;
  padding: 20px 0 0 0;
  text-align: center;
  font-size: 50px;
  color: #fff;
}

.ticketing-row {
  font-size: 15px;
  display: flex;
  margin: 0 auto;
  width: 100%;
  max-width: 500px;
}

.ticketing-col {
  border: 1px solid #000;
  flex-grow: 1;
  background: #a7ef8a;
  flex-basis: 0;
}

.ticketing-col input {
  display: inline-block;
}

.reserved {
  background: #f71111;
  color: #fff;
}

.screen {
  text-align: center;
  padding: 0.5rem 0;
  background: #fff;
}

.half-button-left {
  width:50%; box-sizing: border-box; border: 1px solid #000; cursor: pointer;
}

.view-comment {
  float:none;
  border: 1px solid #000;
  box-sizing: border-box;
  cursor: pointer;
}

@media all and (max-width: 800px) {
  nav ul li {
    margin-top: 1rem;
  }
  #FilmId {
    width: 60% !important;
    float:right;
  }
  .two-button-one {
    width: 100%;
  }
  .two-button-two {
    width: 100%;
  }
  nav ul {
    border-bottom: 12px solid #fff;
    width: 100%;
  }
}

      </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="shortcut icon" type="image/png" href="img/logo.png"> -->
  </head>
  <body>

    <?php
      if (isset($_SESSION['uname'])) {
    ?>
    <!-- <nav>
      <div class="logo">
        <img src="img/logo.png"> <h1> PreBook</h1><span><i>Cheap, Reliable, Instant</i></span>
      </div>
      <ul>
        <li class="special"><a href="buywelcome.php">Buy a Ticket</a></li>
        <li><a href="comment.php">Movie Review</a></li>
        <li><a href="history.php">Purchase History</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav> -->

    <main>
      <div class="bar">
        <h2>Your Cart</h2>
        <span class="aside"><i>...almost there, just one click away.</i></span>
      </div>
      <section>
        <?php

          $query = "SELECT * FROM show_details WHERE show_id = " . $_POST['show_id'];
          $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
          $broadcastInfo = mysqli_fetch_array($record);
          mysqli_free_result($record);
        ?>
        <p><b>Cinema</b>: Broadway</p>
        <!-- <p><b>House</b>: House <?php print chr(65 + $broadcastInfo['HouseId'] - 1) ?></p> -->
        <?php
          $query = "SELECT * FROM movie WHERE movie_id = " . $broadcastInfo['movie_id'];
          $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
          $filmInfo = mysqli_fetch_array($record);
          mysqli_free_result($record);
        ?>
        <p><b>Film</b>: <?php print $filmInfo['moviename'] ?></p>
        <p><b>Category</b>: <?php print $filmInfo['category'] ?></p>
        <!-- <p><b>Show Time</b>: <?php print $broadcastInfo['Dates'] . " " . $broadcastInfo['Time'] . " (" . $broadcastInfo['day'] . ")" ?></p> -->
      </section>

      <section class="clearfix">
        <form method="post" action="confirm.php">
          <?php
            for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
              list($row,$col) = explode('|', $_POST['seat'][$i]);
              $rowName = chr(65 + $row - 1);
              echo "<h3 style='padding: 0 1rem 0.3rem 0.5rem; float:left; width:10%; box-sizing: border-box;'>" . $rowName . $col . ": </h3>";
          ?>
            <select name="type[]" style="width:90%;">
              <option value="75">
                Adult ($75)
              </option>
              <option value="50">
                Student/Senior ($50)
              </option>
            </select>

            <input type="hidden" name="seat[]" value="<?php echo $_POST['seat'][$i] ?>">
            <div class="clearfix"></div>
          <?php
            }
          ?>
          <div class="clearfix"></div>
          <button type="submit" name="submit" id="submit" class="two-button-one">Confirm Order</button>
          <a href="buywelcome.php">
            <button type="button" name="cancel" class="two-button-two">Cancel</button>
          </a>
          <input type="hidden" name="show_id" value="<?php echo $_POST['show_id'] ?>">
        </form>
      </section>
    </main>

    <?php
      }
      else {
    ?>
    <nav>
      <div class="logo">
        <img src="img/logo.png"> <h1> PreBook</h1><span><i>Cheap, Reliable, Instant</i></span>
      </div>
    </nav>
    <main>
      <div class="bar">
        <h2>Oops...</h2>
        <span class="aside"><i>you don't seem to be logged in, redirecting you to login page.</i></span>
      </div>
      <i class="fas fa-exclamation-triangle full-icon"></i>
    </main>
    <?php
        header( "refresh:3;url=index.php" );
      }
      mysqli_close($conn);
    ?>
  </body>
</html>
