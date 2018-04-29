<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: http://localhost");
}
else if(isset($_SESSION['user']))
{
	header("Location: http://localhost/src/views/user_homepage.php");
}

unset($_SESSION['user']);

if(isset($_SESSION['admin']))
{
	unset($_SESSION['admin']);
}

session_unset();
session_destroy();
header("Location: http://localhost");

?>