<?php
$con= mysqli_connect("localhost","root","","pranay");

if(!$con){
    header('errors/errordb.php');
    die();
}
else
{
    // echo "<h1>Database Connected.</h1>";
}
?>