<?php
session_start();
include_once('../../config.php');
include('header.php');
include('navbar.php');
include('sidebar.php');

// Fetch necessary data from the database
$total_movies = 0;
$total_screens = 0;
$total_showings = 0;
$total_tickets = 0;
$total_users = 0;
$recent_bookings = [];

$query_movies = "SELECT COUNT(*) AS total_movies FROM movie";
$query_screens = "SELECT COUNT(*) AS total_screens FROM screen";
$query_showings = "SELECT COUNT(*) AS total_showings FROM show_details";
$query_tickets = "SELECT COUNT(*) AS total_tickets FROM ticket";
$query_users = "SELECT COUNT(*) AS total_users FROM user";
$query_recent_bookings = "SELECT u.username AS customer_name, m.moviename AS movie_name, t.total_price 
                          FROM ticket t 
                          JOIN user u ON t.user_id = u.user_id 
                          JOIN show_details sd ON t.show_id = sd.show_id
                          JOIN movie m ON sd.movie_id = m.movie_id 
                          ORDER BY t.ticket_id DESC LIMIT 5";

// Execute queries and fetch data
$result_movies = mysqli_query($con, $query_movies);
$result_screens = mysqli_query($con, $query_screens);
$result_showings = mysqli_query($con, $query_showings);
$result_tickets = mysqli_query($con, $query_tickets);
$result_users = mysqli_query($con, $query_users);
$result_recent_bookings = mysqli_query($con, $query_recent_bookings);

if ($result_movies) {
    $row = mysqli_fetch_assoc($result_movies);
    $total_movies = $row['total_movies'];
}

if ($result_screens) {
    $row = mysqli_fetch_assoc($result_screens);
    $total_screens = $row['total_screens'];
}

if ($result_showings) {
    $row = mysqli_fetch_assoc($result_showings);
    $total_showings = $row['total_showings'];
}

if ($result_tickets) {
    $row = mysqli_fetch_assoc($result_tickets);
    $total_tickets = $row['total_tickets'];
}

if ($result_users) {
    $row = mysqli_fetch_assoc($result_users);
    $total_users = $row['total_users'];
}

if ($result_recent_bookings) {
    while ($row = mysqli_fetch_assoc($result_recent_bookings)) {
        $recent_bookings[] = $row;
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Overview -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $total_movies; ?></h3>
                        <p>Total Movies</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-film-marker"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $total_screens; ?></h3>
                        <p>Total Screens</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $total_showings; ?></h3>
                        <p>Total Showings</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-eye"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php echo $total_tickets; ?></h3>
                        <p>Total Tickets Sold</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-trophy"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?php echo $total_users; ?></h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Bookings</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Movie Name</th>
                                    <th>Booking Time</th>
                                    <th>Tickets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($recent_bookings)): ?>
                                    <?php foreach ($recent_bookings as $booking): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($booking['customer_name']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['movie_name']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['booking_time']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['num_tickets']); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No recent bookings</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
