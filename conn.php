<?php
session_start();
$servername = "localhost"; 
$username = "questio2_id20710658_db"; 
$password = "questio2_id20710658_db"; 
$database = "questio2_namaz_db"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $database); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); } 

$mailHost = 'mail.questiondrive.com'; // Specify main and backup SMTP servers
$mailUsername = 'questio2'; // SMTP username
$mailPassword = 'NamazTiming'; // SMTP password
$mailSMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
$mailPort = 587; // TCP port to connect to
?>