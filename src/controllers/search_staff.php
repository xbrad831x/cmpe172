<?php

$query = $_REQUEST['q'];

$conn = mysqli_connect("localhost","root","","workhub");

$sql = "SELECT Username, Firstname, Lastname, Email FROM users WHERE Email LIKE '%$query%'";

$result = mysqli_query($conn, $sql);
$arr = array();

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$arr[] = $row;
	}
}

echo json_encode(array_filter($arr));

mysqli_close($conn);

?>