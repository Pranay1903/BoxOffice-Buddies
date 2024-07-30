<?php
$con= mysqli_connect("localhost","root","","pranay");
// mysql_select_db('db_movie');

if(!$con){
    header('errors/errordb.php');
    die();
}
else
{
    // echo "<h1>Database Connected.</h1>";
}
?>