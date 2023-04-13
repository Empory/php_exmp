<?php

// Database configuration
$databaseHost = 'localhost';
$databaseName = 'mywebsit';
$databaseUsername = 'root';
$databasePassword = '';

// Connect to the database
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
