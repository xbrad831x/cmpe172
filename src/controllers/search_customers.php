<?php

$query = $_REQUEST['q'];

$conn = mysqli_connect("localhost","root","","sakila");

$sql = "SELECT first_name, last_name, email FROM customer WHERE email LIKE '%$query%'";

$result = mysqli_query($conn, $sql);
$arr = array();

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		$arr[] = $row;
	}
}

echo json_encode(array_filter($arr));

mysqli_close($conn);

?>