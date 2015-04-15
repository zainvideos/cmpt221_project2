<?php
    require('mysql_connect.php');
    require('globals.php');
    if(isset($_REQUEST['Continue']))
    {
        $SQL = INSERT INTO `cmpt221proj2`.`students` (`cwid`, `firstname`, `lastname`, `gender`, `accomodations`, `dinepref`, `dormname`, `reg_date`) VALUES ('$Firstname', '', '', '', '', '', '', CURRENT_TIMESTAMP);;

        $result = mysql_query($SQL);
    }
?>

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