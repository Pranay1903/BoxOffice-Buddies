<?php
session_start();
include_once 'Database.php';
if (!isset($_SESSION['uname'])) {
  header('location:login.php');
}
if (isset($_GET['show_id'])) {
  $_SESSION['show_id'] = $_GET['show_id'];
}
if (isset($_GET['movie_id'])) {
  $_SESSION['movie_id'] = $_GET['movie_id'];
}
if (isset($_GET['screen_id'])) {
  $_SESSION['screen_id'] = $_GET['screen_id'];
}
?>

<?php
if (isset($_SESSION['uname'])) {
  include("header.php");
  ?>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    button {
      margin-top: 20px;
      text-align: center;
    }

    h1,
    h2,
    label {
      text-align: center;
    }

    label {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    label span {
      margin-left: 10px;
    }

    .ticketing-row {
      display: flex;
      margin-bottom: 10px;
    }

    .ticketing-col {
      display: flex;
      align-items: center;
      justify-content: center;
      flex: 1;
      height: 30px;
      background-color: #fff;
      border: 1px solid #ccc;
      cursor: pointer;
    }

    .ticketing-col.reserved {
      background-color: #ddd;
      color: #777;
      cursor: default;
    }

    .ticketing-col.screen {
      background-color: #333;
      color: #fff;
      font-weight: bold;
      cursor: default;
    }

    button.two-button-one,
    button.two-button-two {
      margin: 0 auto;
    }

    button {
      margin-top: 20px;
      padding: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    td {
      border: 1px solid black;
      padding: 10px;
    }

    td:first-child {
      width: 50%;
    }

    .contr {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }

    .movie-details {
      display: flex;
      flex-direction: column;
    }

    .movie-details h2 {
      margin: 0;
      font-size: 24px;
    }

    .movie-details p {
      margin: 0;
      font-size: 16px;
    }

    .ticket-details {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
    }

    .ticket-details h2 {
      margin: 0;
      font-size: 24px;
    }

    .ticket-details p {
      margin: 0;
      font-size: 16px;
    }
  </style>
  <div class="container">
    <?php
    $movie_id = $_GET['movie_id'];
    $show_id = $_GET['show_id'];
    $query = "SELECT * FROM movie WHERE movie_id = '$movie_id'";

    $result = mysqli_query($conn, $query);
    $movie = mysqli_fetch_assoc($result);
    // $show = mysqli_fetch_assoc(mysqli_query($conn, "SELECT show_time FROM show_details WHERE show_id = '$show_id'"));
    ?>
    <div class="movie-details">
      <h2>Movie Name: <span>
          <?php echo $movie['moviename']; ?>
        </span></h2>
      <img src="<?php echo $movie['photo']; ?>" alt="Movie Poster">
      <!-- <p>Show Time: <?php echo $show['show_time']; ?></p> -->
    </div>
    <div class="ticket-details">
      <!-- HTML code for selected seat display -->
      <p>Selected Seat: <span id="selectedSeat"></span></p>
      <p>Total Price: $<span id="totalPrice">0</span></p>



    </div>
  </div>

  <table>

    <div class="col-lg-12">
      <section class="clearfix">
        <form method="post" action="buyticket.php" onsubmit="return check();">
          <h2>Select Your Seat's</h2>
          <?php
          // Your PHP code to fetch screen information and seat availability here
          $query = "SELECT * FROM screen WHERE screen_id =  '" . $_SESSION['screen_id'] . "' ";
          $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
          $houseInfo = mysqli_fetch_array($record);
          mysqli_free_result($record);

          $query = "SELECT * FROM ticket WHERE show_id = '" . $_SESSION['show_id'] . "'";
          $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
          $seatsOccupied;
          $numberOfSeatsOccupied = 0;
          while ($row = mysqli_fetch_array($record)) {
            $seatsOccupied[$numberOfSeatsOccupied][0] = $row['row'];
            $seatsOccupied[$numberOfSeatsOccupied][1] = $row['col'];
            $numberOfSeatsOccupied++;
          }
          mysqli_free_result($record);
          ?>
          <?php
          while ($houseInfo['row']) {
            $rowName = chr(65 + $houseInfo['row'] - 1);
            ?>
            
            <div class="ticketing-row">
              <?php
              for ($i = 1; $i <= $houseInfo['col']; $i++) {
                $isReserved = 0;

                for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                  if ($seatsOccupied[$it][0] == $houseInfo['row'] && $seatsOccupied[$it][1] == $i)
                    $isReserved = 1;
                }

                if ($isReserved) {
                  echo "<div class='ticketing-col reserved'>";
                  print "Sold " . $rowName . $i;
                } else {
                  echo "<div class='ticketing-col'>";
                  print "<input type='checkbox' class='checkbox' name='seat[]' value='" . $houseInfo['row'] . "|" . $i . "'>";
                  print $rowName . $i;
                }
                echo "</div>";
              }
              ?>
            </div>

            <?php
            $houseInfo['row']--;
          }
          ?>
          <div class="ticketing-row">
            <div class="ticketing-col screen">
              Screen
            </div>
          </div>
          <div style="margin-top: 20px;">
            <button type="submit" name="submit" id="submit" class="two-button-one" style="display: inline-block;">Select
              Seat(s)</button>
            <a href="index.php"><button type="button" name="cancel" class="two-button-two"
                style="display: inline-block;">Cancel</button></a>
            <input type="hidden" name="show_id" value="<?php echo $_SESSION['show_id'] ?>">
            <input type="hidden" name="movie_id" value="<?php echo $_SESSION['movie_id'] ?>">

          </div>
        </form>
      </section>
    </div>
  </table>
  </div>

  <?php
  include("footer.php");
  ?>

  <?php
}
mysqli_close($conn);
?>

<script type="text/javascript">
  function check() {
    var flag = -1;
    var listOfCheckboxes = document.getElementsByClassName('checkbox');
    for (var i = 0; i < listOfCheckboxes.length; i++) {
      if (listOfCheckboxes[i].checked)
        flag = 1;
    }
    if (flag == -1) {
      alert("Please choose at least one seat.");
      return false;
    }
  }
  var seatPrice = <?php echo $houseInfo['price']; ?>; // replace with the actual price of a seat
  var selectedSeats = [];

  // function to update the selected seats and total price
  function updateSelectedSeats() {
  var numSelectedSeats = 0;
  var selectedSeatText = "";
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      numSelectedSeats++;
      selectedSeatText += checkboxes[i].value + ", ";
    }
  }
  if (selectedSeatText !== "") {
    selectedSeatText = selectedSeatText.slice(0, -2); // remove last comma and space
  }
  var totalPrice = numSelectedSeats * seatPrice;
  document.getElementById("selectedSeat").innerHTML = numSelectedSeats;
  document.getElementById("totalPrice").innerHTML = totalPrice.toFixed(2);
}


  // add event listener to all checkboxes with class "checkbox"
  var checkboxes = document.getElementsByClassName("checkbox");
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", function() {
      var seat = this.value;
      if (this.checked) {
        selectedSeats.push(seat);
      } else {
        var index = selectedSeats.indexOf(seat);
        if (index !== -1) {
          selectedSeats.splice(index, 1);
        }
      }
      updateSelectedSeats();
    });
  }
</script>

