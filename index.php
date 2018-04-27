<?php
session_start();
if( isset($_SESSION['user'])!="" ){
  if(isset($_SESSION['admin']) == true)
  {
  	header("Location: http://localhost/src/views/admin_dashboard.php");
  }
  else
  {
  	header("Location: http://localhost/src/views/user_homepage.php");
  }
 }

?>

<html>

<head>

<title>Workhub</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

<h1 class="text-center" id="landing_title">Welcome to Workhub!<h1>
<h2 class="text-center" id="landgin_description">A Simple Way to help browse enterprise data.</h2>

<form class="col-md-4 col-md-offset-4"method="post" action="./src/controllers/sign_in_controller.php">
	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" type="text" name="username" id="username" placeholder="Username">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="password" name="password" id="password" placeholder="Password">
	</div>
	<button class="btn btn-default" type="submit" name="log_in_btn" id="log_in_btn">Log In</button>
</form>

</div>

</body>

</html>