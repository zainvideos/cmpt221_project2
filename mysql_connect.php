<?php
$servername = "localhost";
$username = "root";
$password = "yoursql";
$dbname = "cmpt221proj2";

//	Create	connection
$conn	=	mysqli_connect($servername,	$username,	$password, $dbname);
//	Check	connection
if	(!$conn)	{
    die("Connection	failed:	"	.	mysqli_connect_error());
}


//	test student	database
/*
 *
 */

/*

$sql= "INSERT INTO students (cwid, firstname, lastname, gender, accomodations, dinepref, dormname, reg_date) VALUES (222222222, 'jo', 'smoe', 'male', 'no', 'yes', 'Leo', CURRENT_TIMESTAMP);";

$sql2= "UPDATE dorms SET spotsleft = spotsleft + 1 WHERE dormname = 'Midrise' and spotsleft >= 0;"; //set dormname to $dropdown





if	(mysqli_query($conn, $sql))	{
    echo	"query returned successfully";
}	else	{
    echo	"Error	with	database:	"	.	mysqli_error($conn);
}

if	(mysqli_query($conn, $sql2))	{
    echo	"query returned successfully";
}	else	{
    echo	"Error	with	database:	"	.	mysqli_error($conn);
}



mysqli_close($conn);

*/


?>