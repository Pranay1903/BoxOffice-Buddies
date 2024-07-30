<?php
session_start();
include('../config.php');
include_once('msgbox.php');
// if(isset($_POST['submit'])){
// $email = $_GET["email"];
// $pass = $_GET["password"];
// $qry=mysqli_query($con,"select * from Admin where username='$email' and password='$pass'");
// if(mysqli_num_rows($qry))
// {
//     $usr=mysqli_fetch_array($qry);

//         $_SESSION['theatre']=$usr['user_id'];
//         echo "<script>alert('hi')</script>";        
// 		header('location:pages/index.php');
// }
// else
// {
// 	echo "<script>alert('id password is wrong');</script>";
// 	// echo "header(location:../index.php)";

// 	// $_SESSION['error']="Login Failed!";
// 	// header("location:../index.php");
// }
// }
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>BoxOffice Buddies</title>
</head>

<body>
  <!-- <h1>Hello, world!</h1> -->

  <section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">


                  <form action="pages/process_login.php" method="post">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                      <span class="h1 fw-bold mb-0">Admin</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in to start your session</h5>


                    <div class="form-outline mb-4">
                      <label class="form-label">ID</label>
                      <input type="text" name="Email" class="form-control form-control-lg" placeholder="Email" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control form-control-lg"
                        placeholder="password" />
                    </div>
                    <div class="pt-1 mb-4">
                      <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                    </div>

                    <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                    <br><br><br>
                    <a href="#!" class="small text-muted">Terms of use.</a>&nbsp;&nbsp;
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>