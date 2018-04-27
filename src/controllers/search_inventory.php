<?php

$conn = mysqli_connect("localhost","root","","sakila");

$sql = "SELECT film.title, c.num_of_items FROM ((SELECT film_id, COUNT(film_id) AS num_of_items FROM `inventory` GROUP BY `film_id`) AS c) INNER JOIN film ON film.film_id=c.film_id";

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

mysqli_close($conn)

?>