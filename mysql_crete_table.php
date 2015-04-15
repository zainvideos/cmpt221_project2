<?php
$sql = "CREATE DATABASE ";
if (mysqli_query($conn, $sql))

CREATE TABLE Students (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP

CREATE TABLE students (
    cwid VARCHAR(9) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
gender
reg_date TIMESTAMP
)

    CREATE TABLE students (
    cwid VARCHAR(9) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
gender ENUM('M','F','O'),
accomidations ENUM('Y', 'N'),
reg_date TIMESTAMP
)