<?php
session_start();
include('Database.php');

if(isset($_POST['submit'])){

   $uname = $_POST['name'];
   $pass = $_POST['password'];

   echo "<script>alert('incorrect password or username!');</script>";
   $select=mysqli_query($conn,"SELECT * FROM `user` WHERE username = '$uname' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_array($select);
      $_SESSION['uname'] = $row['username'];
      header('location:index.php');
   }else{
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=style.css />
          </script>
    <title>Login</title>
</head>
<body>



    <section>  
        <div class="colour"></div>  
        <div class="colour"></div>  
        <div class="colour"></div>  
        <div class="box">  
             <div class="square" style="--i:0;"></div>  
             <div class="square" style="--i:1;"></div>  
             <div class="square" style="--i:2;"></div>  
             <div class="square" style="--i:3;"></div>  
             <div class="square" style="--i:4;"></div>  
             <div class="container">  
                  <div class="form">  
                       <h2>Login Form</h2>  
                       <form action="" method="post" >  
                            <div class="input__box">  
                                 <input type="text" placeholder="Username" name="name" >  
                            </div>  
                            <div class="input__box">  
                                 <input type="password" placeholder="Password" name="password" >  
                            </div>  
                            <div class="input__box">  
                                 <input type="submit" value="Login" name="submit" >  
                            </div>    
                            <p class="forget">Don't have an account? <a href="signup.php">Sign Up</a></p>  
                       </form>  
                  </div>  
             </div>  
        </div>  
   </section>  
</body>
</html>