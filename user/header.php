<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boxoffice Buddies</title>
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

        h1 {
            /* font-size: 70px; */
        }

        h2 {
            font-size: 36px;
        }

        h3 {
            font-size: 30px;
        }

        h4 {
            font-size: 24px;
        }

        h5 {
            font-size: 18px;
        }

        h6 {
            font-size: 16px;
        }

        p {
            font-size: 15px;
            font-family: "Nunito Sans", sans-serif;
            color: #3d3d3d;
            font-weight: 400;
            line-height: 25px;
            margin: 0 0 15px 0;
        }

        img {
            max-width: 100%;
        }

        input:focus,
        select:focus,
        button:focus,
        textarea:focus {
            outline: none;
        }

        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
            color: #ffffff;
        }

        ul,
        ol {
            padding: 0;
            margin: 0;
        }

        .header {
            background: #ffffff;
        }

        .header__top {
            background: #111111;
            padding: 10px 0;
        }

        .header__top__left p {
            color: #ffffff;
            margin-bottom: 0;
        }

        .header__top__right {
            text-align: right;
        }

        .header__top__links {
            display: inline-block;
            margin-right: 25px;
        }

        .header__top__links span {
            color: #ffffff;
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

        .avatar {
            vertical-align: middle;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .header__top__links a:last-child {
            margin-right: 0;
        }

        .header__top__hover {
            display: inline-block;
            position: relative;
        }

        .header__top__hover:hover ul {
            top: 24px;
            opacity: 1;
            visibility: visible;
        }

        .header__top__hover span {
            color: #ffffff;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            cursor: pointer;
        }

        .header__top__hover span i {
            font-size: 20px;
            position: relative;
            top: 3px;
            right: 2px;
        }

        .header__top__hover ul {
            background: #ffffff;
            display: inline-block;
            padding: 2px 0;
            position: absolute;
            left: 0;
            top: 44px;
            opacity: 0;
            visibility: hidden;
            z-index: 3;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .header__top__hover ul li {
            list-style: none;
            font-size: 13px;
            color: #111111;
            padding: 2px 15px;
            cursor: pointer;
        }

        .header__logo {
            padding: 10px 0;
            text-align: center;
        }

        .header__menu {
            text-align: center;
            padding: 26px 0 25px;
        }

        .header__menu ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .header__menu ul li {
            display: inline-block;
            margin-right: 40px;
            position: relative;
        }

        .header__menu ul li:last-child {
            margin-right: 0;
        }

        .header__menu ul li .dropdown {
            position: absolute;
            left: 0;
            top: 56px;
            width: 150px;
            background: #111111;
            text-align: left;
            padding: 5px 0;
            z-index: 9;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .header__menu ul li .dropdown li {
            display: block;
            margin-right: 0;
        }

        .header__menu ul li .dropdown li a {
            font-size: 14px;
            color: #ffffff;
            font-weight: 400;
            padding: 5px 20px;
            text-transform: capitalize;
        }

        .header__menu ul li .dropdown li a:after {
            display: none;
        }

        .header__menu ul li a {
            font-size: 18px;
            color: #111111;
            display: block;
            font-weight: 600;
            position: relative;
            padding: 3px 0;
        }

        .header__menu ul li:hover a:after,
        .header__menu ul li.active a:after {
            transform: scale(1);
        }

        .header__nav__option {
            text-align: right;
            padding: 30px 0;
        }

        .header__nav__option a {
            display: inline-block;
            margin-right: 26px;
            position: relative;
        }

        .header__nav__option a span {
            color: #0d0d0d;
            font-size: 11px;
            position: absolute;
            left: 5px;
            top: 8px;
        }

        .header__nav__option a:last-child {
            margin-right: 0;
        }

        .offcanvas-menu-wrapper {
            display: none;
        }

        .canvas__open {
            display: none;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <!-- <div class="container-custom"> -->
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <!-- Optional content for left side of the header -->
                    </div>
                    <?php
                    include_once "Database.php";
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
        <div class="container-custom">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo1_prev.png" alt="Logo"></a>
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
</body>

</html>
