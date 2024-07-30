<?php
include('../../config.php');

if(isset($_GET['movie_id'])){
    $movie_id = $_GET['movie_id'];
    
    $query = "DELETE FROM movie WHERE movie_id = '$movie_id'";
    
    if(mysqli_query($con, $query)){
        header("Location: view_movie.php?message=movie deleted successfully");
        exit();
    } else{
        echo "Error: " . mysqli_error($con);
    }
}
?>
