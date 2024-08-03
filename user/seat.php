<?php
session_start();
include_once 'Database.php';
if (!isset($_SESSION['uname'])) {
    header('location:login.php');
    exit;
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

if (isset($_SESSION['uname'])) {
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat Selection</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            font-family: 'Nunito Sans', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .heading {
            padding-top: 20px;
        }
        .container-custom {
            padding-left: 18px;
            padding-right: 18px;
        }
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .movie-details {
            flex: 1;
            text-align: center;
            margin-right: 20px;
        }
        .movie-details img {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .seat-selection {
            flex: 2;
            text-align: center;
        }
        .seats {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            justify-items: center;
            margin: 20px auto;
        }
        .seat {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 4px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .seat:hover:not(.occupied) {
            background-color: #e0e0e0;
            transform: scale(1.1);
        }
        .seat.selected {
            background-color: #6feaf6;
        }
        .seat.occupied {
            background-color: #ff7272;
            cursor: not-allowed;
        }
        .screen {
            margin: 20px auto;
            background-color: #444;
            height: 50px;
            width: 80%;
            text-align: center;
            line-height: 50px;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .summary {
            text-align: left;
            margin-top: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        button#cancel-btn {
            background-color: #6c757d;
        }
        button#cancel-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="movie-details">
            <?php
            $movie_id = $_SESSION['movie_id'];
            $show_id = $_SESSION['show_id'];
            $query = "SELECT * FROM movie WHERE movie_id = '$movie_id'";
            $result = mysqli_query($conn, $query);
            $movie = mysqli_fetch_assoc($result);
            ?>
            <h2>Movie Name: <?php echo htmlspecialchars($movie['moviename']); ?></h2>
            <img src="image/<?php echo htmlspecialchars($movie['photo']); ?>" alt="Movie Poster">
        </div>
        <div class="seat-selection">
            <h3>Select Your Seats</h3>
            <div class="seats">
                <?php
                $query = "SELECT * FROM screen WHERE screen_id = '" . $_SESSION['screen_id'] . "'";
                $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
                $houseInfo = mysqli_fetch_array($record);
                mysqli_free_result($record);

                $query = "SELECT * FROM ticket WHERE show_id = '" . $_SESSION['show_id'] . "'";
                $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
                $seatsOccupied = [];
                while ($row = mysqli_fetch_array($record)) {
                    $seatsOccupied[] = [$row['row'], $row['col']];
                }
                mysqli_free_result($record);

                $rows = $houseInfo['row'];
                $cols = $houseInfo['col'];
                $seatNumbers = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                for ($i = 1; $i <= $rows; $i++) {
                    for ($j = 1; $j <= $cols; $j++) {
                        $isReserved = in_array([$i, $j], $seatsOccupied);
                        $seatClass = $isReserved ? 'seat occupied' : 'seat';
                        echo "<div class='$seatClass' data-row='$i' data-col='$j'>" . $seatNumbers[$i - 1] . $j . "</div>";
                    }
                }
                ?>
            </div>
            <div class="screen">Screen</div>
            <div class="summary">
                <p>Selected Seat: <span id="selected-seat">None</span></p>
                <p>Total Price: $<span id="total-price">0</span></p>
            </div>
            <form id="seat-form" method="post" action="buyticket.php">
                <input type="hidden" name="show_id" value="<?php echo htmlspecialchars($_SESSION['show_id']); ?>">
                <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($_SESSION['movie_id']); ?>">
                <input type="hidden" name="screen_id" value="<?php echo htmlspecialchars($_SESSION['screen_id']); ?>">
                <input type="hidden" id="selected-seats" name="seat" value="">
                <button type="submit" id="select-seat-btn">Select Seat(s)</button>
                <button type="button" id="cancel-btn">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        const seats = document.querySelectorAll('.seat:not(.occupied)');
        const selectedSeatEl = document.getElementById('selected-seat');
        const totalPriceEl = document.getElementById('total-price');
        const selectSeatBtn = document.getElementById('select-seat-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const selectedSeatsInput = document.getElementById('selected-seats');

        let selectedSeats = [];

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                if (!seat.classList.contains('occupied')) {
                    seat.classList.toggle('selected');
                    updateSelectedSeats();
                }
            });
        });

        function updateSelectedSeats() {
            selectedSeats = [...document.querySelectorAll('.seat.selected')].map(seat => {
                return `${seat.dataset.row}|${seat.dataset.col}`;
            });
            selectedSeatEl.innerText = selectedSeats.map(seat => {
                const [row, col] = seat.split('|');
                return String.fromCharCode(65 + parseInt(row) - 1) + col;
            }).join(', ') || 'None';
            totalPriceEl.innerText = selectedSeats.length * 10; // Assuming each seat costs $10
            selectedSeatsInput.value = selectedSeats.join(','); // Update hidden input
        }

        selectSeatBtn.addEventListener('click', (event) => {
            if (selectedSeats.length === 0) {
                alert('Please select at least one seat.');
                event.preventDefault(); // Prevent form submission if no seats selected
            } else {
                alert(`Selected Seats: ${selectedSeats.map(seat => {
                    const [row, col] = seat.split('|');
                    return String.fromCharCode(65 + parseInt(row) - 1) + col;
                }).join(', ')}\nTotal Price: $${selectedSeats.length * 10}`);
            }
        });

        cancelBtn.addEventListener('click', () => {
            selectedSeats = [];
            document.querySelectorAll('.seat.selected').forEach(seat => seat.classList.remove('selected'));
            updateSelectedSeats();
        });
    </script>
</body>
</html>
<?php
    include("footer.php");
}
?>
