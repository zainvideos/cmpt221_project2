<?php
$servername = "localhost";
$username = "root";
$password = "yoursql";

//	Create	connection
$conn	=	mysqli_connect($servername,	$username,	$password);
//	Check	connection
if	(!$conn)	{
    die("Connection	failed:	"	.	mysqli_connect_error());
}
//	Create	database
$sql = "CREATE	DATABASE cmpt221proj2";

$sql	=	"CREATE	TABLE	Students	(
cwid varchar(9) 	PRIMARY	KEY,
firstname	VARCHAR(30)	NOT	NULL,
las tname	VARCHAR(30)	NOT	NULL,
email	VARCHAR(50),
reg_date	TIMESTAMP
)";

if	(mysqli_query($conn, $sql))	{
    echo	"Database	created	successfully";
}	else	{
    echo	"Error	creating	database:	"	.	mysqli_error($conn);
}




mysqli_close($conn);

?>