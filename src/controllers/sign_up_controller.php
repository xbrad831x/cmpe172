<?php

$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$email = $_REQUEST['email'];
$userid = md5($username);

$conn = mysqli_connect("localhost","root","","workhub");

$sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");

if(mysqli_num_rows($sql) >= 1)
{
	echo "Account Exists";
}
else
{
	mysqli_query($conn, "INSERT INTO users (UserId, Username, Password, Firstname, Lastname, Email) 
		VALUES ('$userid', '$username', '$password', '$firstname', '$lastname', '$email')");
	mysqli_close($conn);
	header("location: http://localhost/src/views/admin_dashboard.php");
}

?>