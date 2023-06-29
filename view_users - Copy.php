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
    <div class="filter-section">
        <label for="city-filter">Filter by City:</label>
        <select id="city-filter">
            <option value="">All Cities</option>
            <?php
            // Fetch city names from the database table
            $query = "SELECT DISTINCT city FROM user1";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $city = $row['city'];
                    echo "<option value='$city'>$city</option>";
                }
            }
            ?>
        </select>
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
    $date = date('d/m/Y', strtotime($timestamp));

    echo "<tr data-city='$city'>";
    echo "<td>$masjid_name</td>";
    echo "<td>$address, $city, $zipcode, $state</td>";
    echo "<td><a href='$addresslink'>Get directions</a></td>";
    echo "<td>$forladies</td>";
    echo "<td>$fajr_time</td>";
    echo "<td>$zohar_time</td>";
    echo "<td>$asr_time</td>";
    echo "<td>$maghrib_time</td>";
    echo "<td>$isha_time</td>";
    echo "<td>$juma_time</td>";
    echo "<td>$date</td>";
    echo "</tr>";
}
?>

        

    </table>
    </div>
        </div>
  <script type="text/javascript" src=search.js>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Handle city filter change event
    $('#city-filter').change(function() {
        var selectedCity = $(this).val();
        if (selectedCity) {
            // Show only rows with matching city
            $('#getsearch tbody tr').hide();
            $('#getsearch tbody tr[data-city="' + selectedCity + '"]').show();
        } else {
            // Show all rows when no city is selected
            $('#getsearch tbody tr').show();
        }
    });
});
</script>

</body>
</html>

</body>

</html>
  