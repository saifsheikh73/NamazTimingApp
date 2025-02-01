<?php


 
header('Content-Type: application/json');
error_reporting(0);
//ini_set('display_errors',1);
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "id20710658_db";
$q = $_GET['q'];
if(isset($q) || !empty($q)) {
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT * FROM allcities WHERE pincode LIKE '$q%'";
    $result = mysqli_query($con, $query);
    $res = array();
    while($resultSet = mysqli_fetch_assoc($result)) {
		$res[$resultSet['id']]['id'] =  $resultSet['city']."-".$resultSet['state'];
     $res[$resultSet['id']]['value'] =  $resultSet['pincode'];
    $res[$resultSet['id']]['label'] =  $resultSet['pincode'];
 
    }
    if(!$res) {
        $res[0] = 'Not found!';
    }
    echo json_encode($res);
}
 
?>