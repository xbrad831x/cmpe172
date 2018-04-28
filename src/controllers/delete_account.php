<?php

$email = $_REQUEST['email'];

$conn = mysqli_connect("localhost","root","","workhub");

$res = mysqli_query($conn, "DELETE FROM `users` WHERE `Email`='$email'");

echo "<SCRIPT type='text/javascript'>
        alert('Account Deleted.');
        window.location.replace(\"http://localhost\");
    </SCRIPT>";

?>