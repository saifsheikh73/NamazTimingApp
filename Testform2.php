<html>
<head>
	<title>View Locations</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<!--<div style="float: right; clear: both;" class="container-login100-form-btn">
//<a href="https://www.google.com/maps/search/masjid+near+me" class="login100-form-btn">masjid near me</a>
</div>-->

<style>
  .button {
    position: absolute;
    top: 10px;
    right: 20px;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }
</style>
<style>
  .button2 {
    position: absolute;
    top: 10px;
    left: 20px;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }
</style>

<a href="https://www.google.com/maps/search/masjid+near+me" class="button">Masjid near me</a>
<a href="https://checktimeinlocality.000webhostapp.com/login.php" class="button2">Masjid login</a>

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
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<input type="text" class="form-control" placeholder="Search by Masjid/Address" id="searchTerm" onKeyUp="doSearch()" />
        </div>
        <div class="form-group">
         <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<input type="text" class="form-control" placeholder="Search by Masjid/Address" id="searchTerm2" onKeyUp="doSearch2()" />
        </div>
        
      </form>
      </div>
<!--this is used for responsive display in mobile and other devices-->
<div class="table-responsive alert alert-info">

    <table class="table table-hover text-center" id="example2">
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
        </tr>
        </thead>

        <?php
        include("conn.php");
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
            
            <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
    </div>
        </div>
<script type="text/javascript">
        function doSearch() {
    		var searchText = document.getElementById('searchTerm').value;
    		var targetTable = document.getElementById('example2');
    		var targetTableColCount;

    		//Loop through table rows
    		for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
    			var rowData = '';

    			//Get column count from header row
    			if (rowIndex == 0) {
    				targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
    				continue; //do not execute further code for header row.
    			}

    			//Process data rows. (rowIndex >= 1)
    			for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
    				var cellText = '';

    				if (navigator.appName == '')
    					cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
    				else
    					cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

    				rowData += cellText;
    			}

    			// Make search case insensitive.
    			rowData = rowData.toLowerCase();
    			searchText = searchText.toLowerCase();

    			//If search term is not found in row data
    			//then hide the row, else show
    			if (rowData.indexOf(searchText) == -1)
    				targetTable.rows.item(rowIndex).style.display = 'none';
    			else
    				targetTable.rows.item(rowIndex).style.display = 'table-row';
    		}
    	}
    </script>
    <script type="text/javascript">
        function doSearch2() {
    		var searchText2 = document.getElementById('searchTerm2').value;
    		var targetTable = document.getElementById('example2');
    		var targetTableColCount;

    		//Loop through table rows
    		for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
    			var rowData = '';

    			//Get column count from header row
    			if (rowIndex == 0) {
    				targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
    				continue; //do not execute further code for header row.
    			}

    			//Process data rows. (rowIndex >= 1)
    			for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
    				var cellText = '';

    				if (navigator.appName == '')
    					cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
    				else
    					cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

    				rowData += cellText;
    			}

    			// Make search case insensitive.
    			rowData = rowData.toLowerCase();
    			searchText = searchText.toLowerCase();

    			//If search term is not found in row data
    			//then hide the row, else show
    			if (rowData.indexOf(searchText) == -1)
    				targetTable.rows.item(rowIndex).style.display = 'none';
    			else
    				targetTable.rows.item(rowIndex).style.display = 'table-row';
    		}
    	}
    </script>
  <!--End-->
  <!--filter js-->
  	   <script type="text/javascript">
        $(document).ready(function(){
          $("#filterButton").click(function(){
            $("#filterpanel").toggle();
          });
        });
      </script> 
  <!--End-->
  <!-- page script -->
<script>
  $(function () {
    //$("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

</body>

</html>
