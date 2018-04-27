<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("DROP DATABASE IF EXISTS 'workhub'");

// Create database
$sql = "CREATE DATABASE workhub";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$db = "workhub";
$conn2 = new mysqli($servername, $username, $password, $db);

$conn2->query("DROP TABLE IF EXISTS 'users'");

// sql to create table
$sql2 = "CREATE TABLE users (
UserId VARCHAR(200), 
Username VARCHAR(30),
Password VARCHAR(200),
Email VARCHAR(50)),
Admin TINYINT(1) NOT NULL";

if ($conn2->query($sql2) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn2->error;
}

$conn->close();
$conn2->close();

?>