<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seat Selection - Boxoffice Buddies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: "Nunito Sans", sans-serif;
            color: #3d3d3d;
        }

        .header {
            background: #ffffff;
        }

        .header__top {
            background: #111111;
            padding: 10px 0;
        }

        .header__top__links a {
            color: #ffffff;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-right: 28px;
            display: inline-block;
            margin-left: 20px;
        }

        .header__logo {
            padding: 10px 0;
            text-align: center;
        }

        .header__menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .header__menu ul li {
            display: inline-block;
            margin-right: 40px;
        }

        .header__menu ul li a {
            font-size: 18px;
            color: #111111;
            display: block;
            font-weight: 600;
        }

        .seat-selection {
            margin: 50px 0;
            text-align: center;
        }

        .seat-row {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            background-color: #d3d3d3;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .seat.selected {
            background-color: #6c757d;
        }

        .seat.occupied {
            background-color: #343a40;
            cursor: not-allowed;
        }

        .screen {
            background-color: #333;
            height: 60px;
            margin: 20px auto;
            width: 80%;
            border-radius: 15px;
            color: #fff;
            line-height: 60px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <!-- Optional content for left side of the header -->
                    </div>
                    <?php
                    include_once "Database.php";
                    session_start();
                    if (isset($_SESSION['uname'])) {
                        $uname = $_SESSION['uname'];
                        $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='".$uname."'");
                    ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php 
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <!-- <img src="admin/image/<?php echo $row["image"]; ?>" alt="Avatar" class="avatar"> -->
                                <?php
                                    }
                                }
                                ?>
                                <span>Hii <?php echo $_SESSION['uname'];?></span>
                                <a href="logout.php" class="btn btn-default btn-flat"
                                    onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="login.php">Sign in</a>
                                <a href="signup.php">Register</a>
                            </div>
                        </div>
                    </div>
                    <?php  
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo1.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 text-end">
                    <nav class="header__menu">
                        <ul class="d-flex justify-content-end mb-0">
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="./feedback.php">Feedback</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Seat Selection Section Begin -->
    <div class="container seat-selection">
        <form method="post" action="buyticket.php" onsubmit="return check();">
            <h2>Select Your Seats</h2>
            <?php
            $query = "SELECT * FROM screen WHERE screen_id = '" . $_SESSION['screen_id'] . "'";
            $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
            $houseInfo = mysqli_fetch_array($record);
            mysqli_free_result($record);

            $query = "SELECT * FROM ticket WHERE show_id = '" . $_SESSION['show_id'] . "'";
            $record = mysqli_query($conn, $query) or die("Query Error!" . mysqli_error($conn));
            $seatsOccupied = [];
            $numberOfSeatsOccupied = 0;
            while ($row = mysqli_fetch_array($record)) {
                $seatsOccupied[$numberOfSeatsOccupied][0] = $row['row'];
                $seatsOccupied[$numberOfSeatsOccupied][1] = $row['col'];
                $numberOfSeatsOccupied++;
            }
            mysqli_free_result($record);

            for ($r = 1; $r <= $houseInfo['row']; $r++) {
                $rowName = chr(65 + $r - 1);
                echo '<div class="seat-row">';
                for ($c = 1; $c <= $houseInfo['col']; $c++) {
                    $isReserved = false;
                    for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                        if ($seatsOccupied[$it][0] == $r && $seatsOccupied[$it][1] == $c) {
                            $isReserved = true;
                            break;
                        }
                    }
                    if ($isReserved) {
                        echo "<div class='seat occupied'>{$rowName}{$c}</div>";
                    } else {
                        echo "<div class='seat'><input type='checkbox' class='checkbox' name='seat[]' value='{$r}|{$c}'>{$rowName}{$c}</div>";
                    }
                }
                echo '</div>';
            }
            ?>
            <div class="screen">Screen</div>
            <div style="margin-top: 20px;">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Select Seat(s)</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
                <input type="hidden" name="show_id" value="<?php echo $_SESSION['show_id'] ?>">
                <input type="hidden" name="movie_id" value="<?php echo $_SESSION['movie_id'] ?>">
            </div>
        </form>
    </div>
    <!-- Seat Selection Section End -->

    <script>
        function check() {
            const checkboxes = document.querySelectorAll('.checkbox:checked');
            if (checkboxes.length === 0) {
                alert('Please select at least one seat.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
