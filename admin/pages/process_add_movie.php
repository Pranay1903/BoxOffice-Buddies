<?php
session_start();
include('../../config.php');
// extract($_POST);

if(isset($_POST['submit'])){


//  echo "<script>alert('Both Password Must Be Same.')</script>";
$mname = $_POST['moviename'];
$director = $_POST['director'];
$rdate= $_POST['rdate'];
$rdate = date('Y-m-d', strtotime($_POST['rdate']));
$Category = $_POST['Category'];
$Description = $_POST['desc'];
$trailer = $_POST['trailer'];

// $target_dir = "image/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);

// $flname = "images/" . basename($_FILES["image"]["name"]);

$flname = $_FILES["poster"]["name"];

$tempname = $_FILES["poster"]["tmp_name"];

$folder = "../image/" . $flname;//where file will save after thee query runs

$check_query = mysqli_query($con, "SELECT * FROM movie WHERE moviename='$mname' AND realsedate='$rdate'");
if(mysqli_num_rows($check_query) > 0) {
    // movie already exists, return error
    $error_msg = "Movie already exists.";
    header("Location: add_movie.php?error_msg=$error_msg");
    exit();
} else {
    
    if(mysqli_query($con, "INSERT INTO movie (moviename,director,realsedate,category,description,trailer,photo) VALUES ('$mname','$director','$rdate','$Category','$Description','$trailer','$flname')")) {
        // movie inserted successfully, display success message and redirect to add movie page
        $success_msg = "Movie added successfully.";
        header("Location: add_movie.php?success_msg=$success_msg");
        exit();
    } else {
        // movie insertion failed, handle error
        echo "Error: " . mysqli_error($con);
    }
}



// mysqli_query($con, "insert into movie (moviename,director,realsedate,category,description,trailer,photo) VALUES ('$mname','$director','$rdate','$Category','$Description','$trailer','$flname')")or die('query failed');
// mysqli_query($con, "insert into 'movie' (moviename,director,category,description,trailer,photo,action) VALUES ('$mname','$director','$Category','$Description','$trailer','$flname','running')")or die('query failed');
move_uploaded_file($tempname, $folder);
// move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

header('location:add_movie.php');

}
?>