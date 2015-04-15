<?php

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