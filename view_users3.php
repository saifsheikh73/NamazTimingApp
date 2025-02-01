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
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>

<!--<div style="float: right; clear: both;" class="container-login100-form-btn">
//<a href="https://www.google.com/maps/search/masjid+near+me" class="login100-form-btn">masjid near me</a>
</div>-->


<!-- Button to trigger the popup -->
<a href="#" class="button" onclick="showInstructions();">Find Masjids Near Me</a>

<!-- Popup modal -->
<div id="instructionModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="hideInstructions();">&times;</span>
    <p>To find Masjids near you, please enable GPS on your mobile device, wait for 5 seconds and then click the button below:</p>
    <div class="button-container">
      <a href="https://www.google.com/maps/search/masjids+near+me" class="custom-button" target="_blank">Continue</a>
    </div>
  </div>
</div>

<!-- CSS styles for the modal -->




<!-- JavaScript functions to show/hide the modal -->
<script>
function showInstructions() {
  var modal = document.getElementById("instructionModal");
  modal.style.display = "block";
}

function hideInstructions() {
  var modal = document.getElementById("instructionModal");
  modal.style.display = "none";
}
</script>


<a href="login.php" class="button2">Masjid login</a>

<br>
<br>
<br>
<body>
<div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
    <div id="myDropdown" class="dropdown-content">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        <?php
        // Fetch city names from the database table
        $query = "SELECT DISTINCT city FROM user1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $city = $row['city'];
                echo "<a href='#'>$city</a>";
            }
        }
        ?>
    </div>
</div>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, div, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>




<div class="container-fluid">
<div class="alert alert-success">
    <h1 align="center">Jama'at timing list by Masjid</h1>
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
    <input type="text" id="city-search" placeholder="Search by City">
</div>

<script>
    // Function to handle the city filter
    function filterByCity() {
        var filterValue = document.getElementById("city-filter").value.toLowerCase();
        var tableRows = document.querySelectorAll("#getsearch tr[data-city]");

        tableRows.forEach(function(row) {
            var city = row.getAttribute("data-city").toLowerCase();
            if (filterValue === "" || city === filterValue) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }

    // Event listener for city filter select
    document.getElementById("city-filter").addEventListener("change", filterByCity);

    // Event listener for city search input
    document.getElementById("city-search").addEventListener("input", function() {
        var searchValue = this.value.toLowerCase();
        var tableRows = document.querySelectorAll("#getsearch tr[data-city]");

        tableRows.forEach(function(row) {
            var city = row.getAttribute("data-city").toLowerCase();
            var matchIndex = city.indexOf(searchValue);
            if (matchIndex !== -1) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>

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
            <th class="text-center">Aelaan</th>
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
    $aelaan = $row['aelaan'];
    //$date = date('d/m/Y', strtotime($timestamp));
    $dateString = $timestamp;
    $formattedDate= "";
    if ($dateString !== null) {
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        $formattedDate = $date->format('d-m-Y');
    }
    


    echo "<tr data-city='$city'>";
    echo "<td>$masjid_name</td>";
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
  