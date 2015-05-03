<?php
require_once "mysql_connect.php"; //change the name

/*
$servername = "localhost";
$username = "root";
$password = "yoursql";
$dbname = "cmpt221proj2";
*/

// Establishing Connection with Server
$connection = mysqli_connect($servername, $mysql_user, $mysql_password, $mysql_database);

// Selecting Database
$db = mysqli_select_db($connection, $mysql_database);

session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select FirstName, LastName from login where username='$user_check'");

$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['FirstName']." ".$row['LastName'];

//if(!isset($login_session)){
//  mysqli_close($connection); // Closing Connection
//  header('Location: index.php'); // Redirecting To Home Page
//}

?>