<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

?>
<html>
<head>
	<title>Namaz Timings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<script>
  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown();

      $('.ui.buttons .dropdown.button').dropdown({
        action: 'combo'
      });
    })
  ;
  </script>

<!--<div style="float: right; clear: both;" class="container-login100-form-btn">
//<a href="https://www.google.com/maps/search/masjid+near+me" class="login100-form-btn">masjid near me</a>
</div>-->
<div class="container-login100-form-btn">
                        <input type="button" class="login100-form-btn" name="logout" onclick="window.location.href='zuserlogout.php'" value="Logout">
                    </div>

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


<a href="zuserlogin.php" class="button2">User login</a>

<br>
<br>
<br>
<body>




<div class="container-fluid">
<div class="alert alert-success">
    <h1 align="center">Jama'at timing list by Masjid</h1>
    </div>


    <div>
        <br><br>
    </div>

    <style>
/* Styles for the search input */
/* Container for the search input */
.search-input {
    position: relative;
    display: inline-block;
}

/* Search input field */
.search-input input[type="text"] {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 50px 12px 20px;
    border: 1px solid #000; /* Add a 1px solid black border */
    outline: none;
    border-radius: 8px;
    width: 230px;
    background-color: #ffffff;
    color: #333333;
    transition: background-color 0.3s ease;
}

/* Add an outline on focus */
.search-input input[type="text"]:focus {
    background-color: #e6e6e6;
    border: 2px solid #000; /* Increase border to 2px on focus */
}

/* Styles for the dropdown */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    min-width: 230px;
    max-height: 150px;
    overflow: auto;
    border: 1px solid #ddd;
    border-radius: 5px;
    z-index: 1;
}

.dropdown-content a {
    color: #333333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
    background-color: #f6f6f6;
}



/* Styles for the dropdown scrollbar */
.dropdown-content::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

/* Track */
.dropdown-content::-webkit-scrollbar-track {
    background: #f1f1f1; /* Background color of the scrollbar track */
}

/* Handle */
.dropdown-content::-webkit-scrollbar-thumb {
    background: #888; /* Color of the scrollbar handle */
    border-radius: 4px; /* Rounded corners for the scrollbar handle */
}

/* Handle on hover */
.dropdown-content::-webkit-scrollbar-thumb:hover {
    background: #555; /* Color of the scrollbar handle on hover */
}

/* Icon styles */
.scroll-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        border-left: 1px solid #000; /* Add left border to the icon */
        padding-left: 10px; /* Move the border 10 pixels to the left */
    }

.scroll-icon i {
    font-size: 16px;
}


.show {
    display: block;
}

</style>


<div class="search-input">
    <input type="text" placeholder="Search.." id="searchTerm" onKeyUp="handleKeyUp()" onFocus="showDropdown()" value="<?php echo $_SESSION['city']; ?>">
    <span class="scroll-icon" onclick="clearInputAndOpenDropdown()" style="position: relative; left: -40px;">
        <i class="fas fa-chevron-down"></i>
    </span>
    <div id="myDropdown" class="dropdown-content">
        <?php
        // Fetch city names from the database table
        $query = "SELECT DISTINCT city FROM user1";
        $result = mysqli_query($conn, $query);
        $cities = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $city = $row['city'];
                $cities[] = $city;
            }
        }

        // Sort the array alphabetically
        sort($cities);

        // Output the sorted list
        foreach ($cities as $item) {
            echo "<a href='#' onclick='selectCity(\"$item\")'>$item</a>";
        }
        ?>
    </div>
</div>

<script>
    function clearInputAndOpenDropdown() {
        var inputField = document.getElementById("searchTerm");
        var dropdownContent = document.getElementById("myDropdown");

        // Clear the input field
        inputField.value = "";

        // Open the dropdown list
        dropdownContent.classList.add("show");

        // Perform the search after clearing the input field (if needed)
        handleKeyUp();

        // Select the input field
        inputField.focus();
    }
</script>




<script>
    function handleKeyUp() {
        doSearch();
        filterFunction();
    }

    function showDropdown() {
        document.getElementById("myDropdown").classList.add("show");
    }

    function selectCity(city) {
        document.getElementById("searchTerm").value = city;
        document.getElementById("myDropdown").classList.remove("show");
        doSearch(); // Perform the search when a city is selected
    }

    function filterFunction() {
        var input, filter, div, a, i;
        input = document.getElementById("searchTerm");
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

    // Your other scripts here
        // Function to simulate pressing the Enter key
        function simulateEnterKeyPress() {
        var event = new KeyboardEvent('keyup', {
            key: 'Enter',
            bubbles: true,
            cancelable: true,
        });
        document.getElementById('searchTerm').dispatchEvent(event);
    }

    // Wait for 1 second (1000 milliseconds) and then trigger the Enter key press
    setTimeout(simulateEnterKeyPress, 1);
</script>

<div>
    <br>
</div>

<div class="search-input">
    <input type="text" placeholder="Search.." id="searchTerm2" onKeyUp="handleKeyUp2()" onFocus="showDropdown2()" value="<?php echo $_SESSION['zipcode']; ?>">
    <span class="scroll-icon" onclick="clearInputAndOpenDropdownzip()" style="position: relative; left: -40px;">
        <i class="fas fa-chevron-down"></i>
    </span>
    <div id="myDropdown2" class="dropdown-content">
        <?php
        // Fetch city names and zip codes from the database table and store them in an array
        $query = "SELECT DISTINCT zipcode FROM user1";
        $result = mysqli_query($conn, $query);
        $citieszip = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $zipcode = $row['zipcode'];
                $cities2[] = $zipcode;
            }
        }

        // Sort the array alphabetically
        sort($cities2);

        // Output the sorted list
        foreach ($cities2 as $item) {
            echo "<a href='#' onclick='selectZipcode(\"$item\")'>$item</a>";
        }
        ?>
    </div>
</div>


<script>
    function clearInputAndOpenDropdownzip() {
        var inputField = document.getElementById("searchTerm2");
        var dropdownContent = document.getElementById("myDropdown2");

        // Clear the input field
        inputField.value = "";

        // Open the dropdown list
        dropdownContent.classList.add("show");

        // Perform the search after clearing the input field (if needed)
        handleKeyUp2();

        // Select the input field
        inputField.focus();
    }
</script>

<script>
    function handleKeyUp2() {
        doSearchtwo();
        filterFunction2();
    }

    function showDropdown2() {
        document.getElementById("myDropdown2").classList.add("show");
    }

    function selectZipcode(zipcode) {
        document.getElementById("searchTerm2").value = zipcode;
        document.getElementById("myDropdown2").classList.remove("show");
        doSearchtwo(); // Perform the search when a zipcode is selected
    }

    function filterFunction2() {
        var input, filter, div, a, i;
        input = document.getElementById("searchTerm2");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown2");
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

    // Your other scripts here
    // Function to simulate pressing the Enter key
    function simulateEnterKeyPress() {
        var event = new KeyboardEvent('keyup', {
            key: 'Enter',
            bubbles: true,
            cancelable: true,
        });
        document.getElementById('searchTerm2').dispatchEvent(event);
    }

    // Wait for 1 second (1000 milliseconds) and then trigger the Enter key press
    setTimeout(simulateEnterKeyPress, 1);
</script>

<div>
    <br>
</div>

<div class="search-input">
    <input type="text" placeholder="Search.." id="searchTerm3" onKeyUp="handleKeyUp3()" onFocus="showDropdown3()">
    <span class="scroll-icon" onclick="clearInputAndOpenDropdownmasjid()" style="position: relative; left: -40px;">
        <i class="fas fa-chevron-down"></i>
    </span>
    <div id="myDropdown3" class="dropdown-content">
        <?php
        // Fetch city names and zip codes from the database table and store them in an array
        $query = "SELECT masjidname FROM user1";
        $result = mysqli_query($conn, $query);
        $masjidarr = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $masjid_name = $row['masjidname'];
                $masjidarray[] = $masjid_name;
            }
        }

        // Sort the array alphabetically
        sort($masjidarray);

        // Output the sorted list
        foreach ($masjidarray as $item) {
            echo "<a href='#' onclick='selectMasjid(\"$item\")'>$item</a>";
        }
        ?>
    </div>
</div>


<script>
    function clearInputAndOpenDropdownmasjid() {
        var inputField = document.getElementById("searchTerm3");
        var dropdownContent = document.getElementById("myDropdown3");

        // Clear the input field
        inputField.value = "";

        // Open the dropdown list
        dropdownContent.classList.add("show");

        // Perform the search after clearing the input field (if needed)
        handleKeyUp3();

        // Select the input field
        inputField.focus();
    }
</script>

<script>
    function handleKeyUp3() {
        filterFunction3();
    }

    function showDropdown3() {
        document.getElementById("myDropdown3").classList.add("show");
        filterFunction3(); // Call the filtering function when the dropdown is shown
    }

    function selectMasjid(masjid_name) {
        document.getElementById("searchTerm3").value = masjid_name;
        document.getElementById("myDropdown3").classList.remove("show");
        doSearchthree(); // Perform the search when a zipcode is selected
    }

    function filterFunction3() {
        var input, filter, div, a, i;
        input = document.getElementById("searchTerm3");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown3");
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

    // Your other scripts here
    // Function to simulate pressing the Enter key
    function simulateEnterKeyPress() {
        var event = new KeyboardEvent('keyup', {
            key: 'Enter',
            bubbles: true,
            cancelable: true,
        });
        document.getElementById('searchTerm3').dispatchEvent(event);
    }

    // Wait for 1 second (1000 milliseconds) and then trigger the Enter key press
    setTimeout(simulateEnterKeyPress, 1);
</script>



<!--<form class="navbar-form navbar-center">
        <div class="form-group">
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;
        <input type="text" class="form-control" placeholder="Search by Masjid name/address" id="searchTerm" onKeyUp="doSearch()" value="<?php echo $_SESSION['city']; ?>">
        </div>
        <div class="form-group">
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<input type="text" class="form-control" placeholder="Search by Masjid name/address" id="searchTerm2" onKeyUp="doSearchtwo()" />
        </div>
        
      </form>
      </div>-->
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
  