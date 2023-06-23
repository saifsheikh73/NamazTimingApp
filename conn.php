<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "id20710658_db"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $database); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); } 

$mailHost = 'mail.questiondrive.com'; // Specify main and backup SMTP servers
$mailUsername = 'questio2'; // SMTP username
$mailPassword = 'NamazTiming'; // SMTP password
$mailSMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
$mailPort = 465; // TCP port to connect to
?>