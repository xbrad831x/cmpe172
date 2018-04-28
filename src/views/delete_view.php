<?php
session_start();

?>

<html>

<head>

<title>Sign Up</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<div class="container">

<body>

<h1 class="text-center">Delete an Account</h1>

<form class="col-md-4 col-md-offset-4" method="post" action="../controllers/delete_account.php">
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="email" name="email" id="email" placeholder="Email">
	</div>
	<button class="btn btn-danger" type="submit" name="create_account_btn" id="create_account_btn">Delete Account</button>
</form>

</div>

</body>

</html>