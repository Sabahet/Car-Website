<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "Project";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);


// This is if the connection doesnt work the program will stop and display an error message with the error type.

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
