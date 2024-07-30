<?php
include('../../config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$qry=mysqli_query($con,"select * from admin where username='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	echo "<script>alert('hi');</script>";

	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==1 || $usr['user_type']==0 )
	{
		$_SESSION['theatre']=$usr['user_id'];
// echo "<script>alert('hi');</script>";

		header('location:index.php');
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		// header("location:../index.php");
	}
	
}
else
{
	// echo "<script>alert('hj');</script>";
	// echo "header(location:../index.php)";


	$_SESSION['error']="Login Failed)no user found!";
	header("location:../index.php");
}
?>