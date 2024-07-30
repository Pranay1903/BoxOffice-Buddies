<?php
include('../../config.php');

if(isset($_GET['screen_id'])){
    $screen_id = $_GET['screen_id'];
    
    $query = "DELETE FROM screen WHERE screen_id = '$screen_id'";
    
    if(mysqli_query($con, $query)){
        header("Location: view_screen.php?message=Screen deleted successfully");
        exit();
    } else{
        echo "Error: " . mysqli_error($con);
    }
}
?>
