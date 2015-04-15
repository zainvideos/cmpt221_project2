<?php
   require('mysql_connect.php');
    require('globals.php');

$servername = "localhost";
$username = "root";
$password = "yoursql";
$dbname = "cmpt221proj2";


//	Create	connection
$conn	=	mysqli_connect($servername,	$username,	$password, $dbname);
//	Check	connection
if	(!$conn) {
    die("Connection	failed:	" . mysqli_connect_error());
}

$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
//Forst the first letter uppercase on first and last names.
$formFirst = ucfirst($Firstname);
$formLast = ucfirst($Lastname);

$Fullname = $formFirst.' '.$formLast;

$cwid = $_POST['cwid'];
$gender = $_POST['gender'];
$dining = $_POST['dining'];
$year = $_POST['year'];
$dropdown = $_POST['dorm_hidden'];
$needs = $_POST['needs'];

    if(isset($_REQUEST['Continue']))
    {
        $SQL = "INSERT INTO students (cwid, firstname, lastname, gender, accomodations, dinepref, dormname, reg_date) VALUES (111111111, 'joe', 'smoe', 'male', 'no', 'yes', 'Leo', CURRENT_TIMESTAMP)";

        $result = mysql_query($SQL);
    }

$result = mysqli_query($conn, $SQL)
    or die('Error querying the DB');

mysqli_close($conn);


//$SQL = "INSERT INTO students (cwid, firstname, lastname, gender, accomodations, dinepref, dormname, reg_date) VALUES ('$cwid', '$formFirst', '$formLast', '$gender', '$needs', '$dining', '$dropdown', CURRENT_TIMESTAMP)";

?>


