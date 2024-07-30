<?php
include('config.php');

if(isset($_POST['submit'])){

     $name = $_POST['name'];
     $email = $_POST['email'];
     $pass =$_POST['password'];
     $cpass =$_POST['cpassword'];
  
     $select = mysqli_query($conn,"SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');
  
     if($pass == $cpass){
     if(mysqli_num_rows($select) > 0){
        $message[] = 'user already exist!';
     }else{
        mysqli_query($conn,"INSERT INTO `user`(username, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
        $message[] = 'registered successfully!';
        header('location:login.php');
     }
     }
     else{
          echo "<script>alert('Both Password Must Be Same.')</script>"; 
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

    <title>Register</title>
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
                                 <input type="text" placeholder="Username" name="name" required>  
                            </div>
                            <div class="input__box">  
                                <input type="email" placeholder="Email" name="email" required>  
                           </div>   
                            <div class="input__box">  
                                 <input type="password" placeholder="Password" name="password" required>  
                            </div>  
                            <div class="input__box">  
                                <input type="password" placeholder="Confirm Password" name="cpassword" required>  
                           </div> 
                            <div class="input__box">  
                                 <input type="submit" value="Signup" name="submit" >  
                            </div>    
                            <p class="forget"> Have an account? <a href="login.php">Login</a></p>  
                       </form>  
                  </div>  
             </div>  
        </div>  
   </section>  
</body>
</html>