<?php
session_start();
include('../../config.php');

if(isset($_POST['submit'])){

    $mname = $_POST['moviename'];
    $director = $_POST['director'];
    $rdate = date('Y-m-d', strtotime($_POST['rdate']));
    $Category = $_POST['Category'];
    $Description = $_POST['desc'];
    $trailer = $_POST['trailer'];

    $flname = $_FILES["poster"]["name"];
    $tempname = $_FILES["poster"]["tmp_name"];
    $folder = "../../user/image/" . $flname; // updated path to save in the user/image folder

    $check_query = mysqli_query($con, "SELECT * FROM movie WHERE moviename='$mname' AND realsedate='$rdate'");
    if(mysqli_num_rows($check_query) > 0) {
        $error_msg = "Movie already exists.";
        header("Location: add_movie.php?error_msg=$error_msg");
        exit();
    } else {
        if(mysqli_query($con, "INSERT INTO movie (moviename,director,realsedate,category,description,trailer,photo) VALUES ('$mname','$director','$rdate','$Category','$Description','$trailer','$flname')")) {
            $success_msg = "Movie added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
            exit();
        }
    }

    // Check if the target directory exists
    if (!is_dir('../../user/image/')) {
        echo "Directory does not exist.";
        exit();
    }

    // Check if the directory is writable
    if (!is_writable('../../user/image/')) {
        echo "Directory is not writable.";
        exit();
    }

    // Attempt to move the uploaded file
    if (move_uploaded_file($tempname, $folder)) {
        echo "File uploaded successfully.";
    } else {
        echo "Failed to move uploaded file.";
        exit();
    }

    header('Location: add_movie.php?success_msg=' . $success_msg);
}
?>
