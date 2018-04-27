<?php
session_start();
if( isset($_SESSION['user'])!="" ){
  header("Location: http://localhost/src/views/user_homepage.php");
 }
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$conn = $conn = mysqli_connect("localhost","root","","myworld");

$sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username' AND Password='$password' LIMIT 1");

if(mysqli_num_rows($sql) == 1)
{
	$row = mysqli_fetch_array($sql);
	$_SESSION['user'] = $row['UserId'];
	header("Location: http://localhost/src/views/user_homepage.php");
}
else
{
	echo "Invalid Login";
}

?>