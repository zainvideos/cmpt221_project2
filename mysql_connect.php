<?php
$servername = "localhost";
$username = "root";
$password = "yoursql";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
else
    echo "connected successfully";

/*
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql))

    CREATE TABLE Students (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
*/


//look at the slide for creating a table inside a db.

//$sql = "CREATE TABLE Students (id int(6) unsigned auto_increment)"





?>