<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';


$view_users_query = "SELECT * FROM user1"; // Select query for viewing users.
$run = mysqli_query($conn, $view_users_query); // Execute the query.

while ($row = mysqli_fetch_array($run)) {
    $masjid_name = $row['masjidname'];
    $address = $row['address'];
    $city = $row['city'];
    $zipcode = $row['zipcode'];
    $state = $row['state'];
    $addresslink = $row['addresslink'];
    $forladies = $row['forladies'];
    $fajr_time = $row['fajr'];
    $zohar_time = $row['zohar'];
    $asr_time = $row['asr'];
    $maghrib_time = $row['maghrib'];
    $isha_time = $row['isha'];
    $juma_time = $row['juma'];
    $timestamp = $row['timestamp'];
    $aelaan = $row['aelaan'];
    //$date = date('d/m/Y', strtotime($timestamp));
    $dateString = $timestamp;
    $formattedDate= "";
    if ($dateString !== null) {
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        $formattedDate = $date->format('d-m-Y');
    }
    


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Order Details Table with Search Filter</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	/*.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }*/
	.table-wrapper .btn {
		float: right;
		color: #333;
    	background-color: #fff;
		border-radius: 3px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-wrapper .btn:hover {
        color: #333;
		background: #f2f2f2;
	}
	.table-wrapper .btn.btn-primary {
		color: #fff;
		background: #03A9F4;
	}
	.table-wrapper .btn.btn-primary:hover {
		background: #03a3e7;
	}
	.table-title .btn {		
		font-size: 13px;
		border: none;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
	.table-title {
		color: #fff;
		background: #4b5366;		
		padding: 16px 25px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.show-entries select.form-control {        
        width: 60px;
		margin: 0 5px;
	}
	.table-filter .filter-group {
        float: right;
		margin-left: 15px;
    }
	.table-filter input, .table-filter select {
		height: 34px;
		border-radius: 3px;
		border-color: #ddd;
        box-shadow: none;
	}
	.table-filter {
		padding: 5px 0 15px;
		border-bottom: 1px solid #e9e9e9;
		margin-bottom: 5px;
	}
	.table-filter .btn {
		height: 34px;
	}
	.table-filter label {
		font-weight: normal;
		margin-left: 10px;
	}
	.table-filter select, .table-filter input {
		display: inline-block;
		margin-left: px;
	}
	.table-filter input {
		width: 200px;
		display: inline-block;
	}
	.filter-group select.form-control {
		width: 110px;
	}
	.filter-icon {
		float: right;
		margin-top: 7px;
	}
	.filter-icon i {
		font-size: 18px;
		opacity: 0.7;
	}	
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 80px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
	table.table td b {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td b:hover {
		color: #2196F3;
	}
	table.table td b.view {        
		width: 30px;
		height: 30px;
		color: #2196F3;
		border: 2px solid;
		border-radius: 30px;
		text-align: center;
    }
    table.table td b.view i {
        font-size: 22px;
		margin: 2px 0 0 1px;
    }   
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 15px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <div class="table-wrapper">
    <div>
    <div class="container-fluid">
    <div class="alert">
                <div class="row">
                    <div class="col-sm-4">
						<h2>Order <b>Details</b></h2>
					</div>
					<div class="col-sm-8">						
						<a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
						<a href="#" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>
					</div>
                </div>
            </div>
			<div class="table-filter">
				<div class="row">
                    <div class="col-sm-3">
                    <div class="show-entries">
    <span>Show</span>
    <select class="form-control">
        <?php
        $view_users_query = "SELECT DISTINCT city FROM user1"; // Select query for viewing users.
        $run = mysqli_query($conn, $view_users_query); // Execute the query.

        while ($row = mysqli_fetch_array($run)) {
            $city = $row['city'];
            echo "<option value='$city'>$city</option>";
        }
        ?>
    </select>
    <span>entries</span>
</div>



					</div>
                    <div class="col-sm-9">
						<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
						<div class="filter-group">
							<label>Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="filter-group">
							<label>Location</label>
							<select class="form-control">
                            <?php
        $view_users_query = "SELECT DISTINCT city FROM user1"; // Select query for viewing users.
        $run = mysqli_query($conn, $view_users_query); // Execute the query.

        while ($row = mysqli_fetch_array($run)) {
            $city = $row['city'];
            echo "<option value='$city'>$city</option>";
        }
        ?>
        </select>
						</div>
						<div class="filter-group">
							<label>Status</label>
							<select class="form-control">
								<option>Any</option>
								<option>Delivered</option>
								<option>Shipped</option>
								<option>Pending</option>
								<option>Cancelled</option>
							</select>
						</div>
						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
			</div>
            <!--this is used for responsive display in mobile and other devices-->
<div class="table-responsive alert">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Masjid</th>
            <th>Address</th>
            <th>Location on Map</th>
            <th>Space for Masturaat</th>
            <th>Fajr</th>
            <th>Zohar</th>
            <th>Asr</th>
            <th>Maghrib</th>
            <th>Isha</th>
            <th>Juma</th>
            <th>Last updated on</th>
            <th>Aelaan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$view_users_query = "SELECT * FROM user1"; // Select query for viewing users.
$run = mysqli_query($conn, $view_users_query); // Execute the query.
$serialNumber = 1;
while ($row = mysqli_fetch_array($run)) {
    $masjid_name = $row['masjidname'];
    $address = $row['address'];
    $city = $row['city'];
    $zipcode = $row['zipcode'];
    $state = $row['state'];
    $addresslink = $row['addresslink'];
    $forladies = $row['forladies'];
    $fajr_time = $row['fajr'];
    $zohar_time = $row['zohar'];
    $asr_time = $row['asr'];
    $maghrib_time = $row['maghrib'];
    $isha_time = $row['isha'];
    $juma_time = $row['juma'];
    $timestamp = $row['timestamp'];
    $aelaan = $row['aelaan'];
    //$date = date('d/m/Y', strtotime($timestamp));
    $dateString = $timestamp;
    $formattedDate= "";
    if ($dateString !== null) {
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        $formattedDate = $date->format('d-m-Y');
    }
    


    echo "<tr data-city='$city'>";
    echo "<td>$serialNumber</td>";
    $serialNumber++;
    echo "<td><b>$masjid_name</b></td>";
    echo "<td>$address, $city, $zipcode, $state</td>";
    if (!empty($addresslink) && filter_var($addresslink, FILTER_VALIDATE_URL)) {
        echo "<td><a href='$addresslink'>Get directions</a></td>";
    } else {
        echo "<td></td>";
    }
    echo "<td>$forladies</td>";
    echo "<td>$fajr_time</td>";
    echo "<td>$zohar_time</td>";
    echo "<td>$asr_time</td>";
    echo "<td>$maghrib_time</td>";
    echo "<td>$isha_time</td>";
    echo "<td>$juma_time</td>";
    echo "<td>$formattedDate</td>";
    echo "<td>$aelaan</td>";
    echo "</tr>";
}
?>     
            </tbody>
            </table>
			<!--<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">6</a></li>
					<li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>-->
    </div>   
    </div>  
</div>
</body>
</html>                                		