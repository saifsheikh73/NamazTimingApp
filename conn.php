<?php 
session_start();
$servername = "localhost"; 
$username = "id20710658_user"; 
$password = "Saif@12345678"; 
$database = "id20710658_db"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $database); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); } 
?>