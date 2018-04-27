<?php
session_start();
if( !isset($_SESSION['user']) ) {
  header("Location: http://localhost");
 }

$conn = mysqli_connect("localhost","root","","workhub");
$userid = $_SESSION['user'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE UserId='$userid'");
$row = mysqli_fetch_array($sql);

?>

<html>

<head>

<title>Welcome - <?php echo $row['Username']; ?></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand"><a href="./user_homepage.php">Hello <?php echo $row['Username']; ?></a></div>
    </div>
    <ul class="nav navbar-nav">
    	<li><a href="./information.php">Information</a></li>
    	<li><a href="./payroll.php">Payroll</a></li>
    	<li class="active">Documents</li>
    	<li><a href="../controllers/logout_controller.php">Log Out</a></li>
    </ul>
  </div>
</nav>


</body>

</div>

</html>