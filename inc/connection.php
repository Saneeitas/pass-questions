<?php

$host = "localhost";
$database = "pass_questionsDB";
$username = "root";
$password = "123456";
$port = 3306;

//connecting to the database
$connection = mysqli_connect($host,$username,$password,$database,$port)
or die("Database cannot connect");

 