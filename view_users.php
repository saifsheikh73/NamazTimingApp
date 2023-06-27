<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

?>
<html>
<head>
	<title>Namaz Timings</title>
</head>


<!--<div style="float: right; clear: both;" class="container-login100-form-btn">
//<a href="https://www.google.com/maps/search/masjid+near+me" class="login100-form-btn">masjid near me</a>
</div>-->



<a href="https://www.google.com/maps/search/masjid+near+me" class="button">Masjid near me</a>
<a href="login.php" class="button2">Masjid login</a>

<br>
<br>
<br>
<body>



<div class="container-fluid">
<div class="alert alert-success">
    <h1 align="center">Jamaat timing list by Masjid</h1>
    </div>
    <div>
<form class="navbar-form navbar-center">
        <div class="form-group">
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<input type="text" class="form-control" placeholder="Search by Masjid name/address" id="searchTerm" onKeyUp="doSearch()" />
        </div>
        <div class="form-group">
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<input type="text" class="form-control" placeholder="Search by Masjid name/address" id="searchTerm2" onKeyUp="doSearchtwo()" />
        </div>
        
      </form>
      </div>
<!--this is used for responsive display in mobile and other devices-->
<div class="table-responsive alert alert-info">

    <table class="table table-hover text-center" id="getsearch">
        <thead>

        <tr>

            <th class="text-center">Masjid</th>
            <th class="text-center">Address</th>
            <th class="text-center">Location on Map</th>
            <th class="text-center">Space for Masturaat</th>
            <th class="text-center">Fajr</th>
            <th class="text-center">Zohar</th>
            <th class="text-center">Asr</th>
            <th class="text-center">Maghrib</th>
            <th class="text-center">Isha</th>
            <th class="text-center">Juma</th>
            <th class="text-center">Last updated on</th>
        </tr>
        </thead>

        <?php
        $view_users_query="select * from user1";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);//here run the sql query.
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $masjid_name=$row['masjidname'];
            $address=$row['address'];
            $city=$row['city'];
            $zipcode=$row['zipcode'];
            $state=$row['state'];
            $addresslink=$row['addresslink'];
            $forladies=$row['forladies'];
            $fajr_time=$row['fajr'];
            $zohar_time=$row['zohar'];
            $asr_time=$row['asr'];
            $maghrib_time=$row['maghrib'];
            $isha_time=$row['isha'];
            $juma_time=$row['juma'];
            $timestamp=$row['timestamp'];
            $date = date('d/m/Y', strtotime($timestamp));
            ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $masjid_name;  ?></td>
            <td><?php echo $address . ', ' . $city . ', ' . $zipcode . ', ' . $state; ?></td>
            <td><?php echo '<a href="' . $addresslink . '">Get directions</a>';  ?></td>
            <td><?php echo $forladies;  ?></td>
            <td><?php echo $fajr_time;  ?></td>
            <td><?php echo $zohar_time;  ?></td>
            <td><?php echo $asr_time;  ?></td>
            <td><?php echo $maghrib_time;  ?></td>
            <td><?php echo $isha_time;  ?></td>
            <td><?php echo $juma_time;  ?></td>
            <td><?php echo $date;  ?></td>
            
            <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
    </div>
        </div>
  <script type="text/javascript" src=search.js>

</body>
</html>

</body>

</html>
  