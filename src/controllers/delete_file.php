<?php
$file = $_REQUEST['name'];

$p_file = "uploads/" . $file;

unlink($p_file);

$conn = mysqli_connect("localhost","root","","workhub");

mysqli_query($conn, "DELETE FROM `files` WHERE `Name`='$file'");

mysqli_close($conn);

?>