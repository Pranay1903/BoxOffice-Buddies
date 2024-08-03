<?php
session_start();
include_once 'Database.php';
date_default_timezone_set('Asia/Kolkata');

// Debugging
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// Convert the comma-separated string to an array
$seatArray = isset($_POST["seat"]) ? explode(',', $_POST["seat"]) : [];
$seatCount = count($seatArray);

if (isset($_SESSION['uname'])) {
    include("header.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Movie Ticket Checkout">
    <meta name="keywords" content="Movie, Checkout, Tickets">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <center><h2>Checkout</h2></center>
        <table class="table table-hover table-bordered text-center">
            <?php
            if (!empty($seatArray)) {
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
                <td>Movie Name</td>
                <td><?php echo htmlspecialchars($filmInfo['moviename']); ?></td>
            </tr>
            <tr>
                <td>Screen Name</td>
                <td>
                    <?php
                    $s = mysqli_query($conn, "SELECT DISTINCT screen_id FROM show_details WHERE movie_id='" . $broadcastInfo['movie_id'] . "'");
                    $shw = mysqli_fetch_array($s);
                    $t = mysqli_query($conn, "SELECT * FROM screen WHERE screen_id='" . $shw['screen_id'] . "'");
                    $screen = mysqli_fetch_array($t);
                    echo htmlspecialchars($screen['screen_name']);
                    ?>
                </td>
            </tr>
            <tr>
                <td>Show Time</td>
                <td>
                    <?php
                    $ttm = mysqli_query($conn, "SELECT * FROM show_time WHERE showtime_id='" . $broadcastInfo['showtime_id'] . "'");
                    $ttme = mysqli_fetch_array($ttm);
                    echo date('h:i A', strtotime($ttme['stime'])) . " Show";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Selected Seats</td>
                <td>
                    <?php
                    $names = array(); // Initialize an empty array to store the names

                    for ($i = 0; $i < sizeof($seatArray); $i++) {
                        list($row, $col) = explode('|', $seatArray[$i]);
                        $rowName = chr(65 + $row - 1);
                        $names[] = $rowName . $col; // Add the name to the array
                    }
                    sort($names); // Sort the names array in alphabetical order
                    echo htmlspecialchars(implode(", ", $names)); // Join the names with comma separator and display
                    ?>
                </td>
            </tr>
            <tr>
                <td>Number of Seats</td>
                <td>
                    <form action="pay.php" method="post">
                        <input type="hidden" name="screen" value="<?php echo htmlspecialchars($screen['screen_id']); ?>" />
                        <label><?php echo htmlspecialchars($seatCount); ?></label>
                </td>
            </tr>
            <tr>
                <td>Amount</td>
                <td id="amount-display" style="font-weight: bold; font-size: 18px">
                    Rs <?php echo htmlspecialchars($screen['price'] * $seatCount); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-info" style="width: 100%">Pay Now</button>
                </td>
            </tr>
        </table>
        </form>
        <?php
            } else {
                echo '<p>No seats selected. Please go back and select seats.</p>';
            }
        ?>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
