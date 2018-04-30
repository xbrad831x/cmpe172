<?php

$conn = mysqli_connect("localhost","root","","workhub");

$sql = "SELECT Name FROM files";

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