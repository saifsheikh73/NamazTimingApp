<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

?>
<html>
<head>
	<title>View DB</title>
</head>


<!--<div style="float: right; clear: both;" class="container-login100-form-btn">
//<a href="https://www.google.com/maps/search/masjid+near+me" class="login100-form-btn">masjid near me</a>
</div>-->

<a href="login.php" class="button2">Masjid login</a>

<br>
<br>
<br>
<body>



<div class="container-fluid">

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
<div>

    <table class="table table-hover text-center" id="getsearch">
        <thead>

        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Password</th>
            <th class="text-center">Email 2</th>
            <th class="text-center">Mobile no</th>
            <th class="text-center">Mobile no 2</th>
            <th class="text-center">Masjid Name</th>
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
            <th class="text-center">Reset token</th>
            <th class="text-center">Reset Expiry</th>
            <!--<th class="text-center">RememberMe cookie</th>-->
        </tr>
        </thead>

        <?php
        $view_users_query="select * from user1";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);//here run the sql query.
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $id=$row['id'];
            $username=$row['username'];
            $email=$row['email'];
            $password=$row['password'];
            $email2=$row['email2'];
            $mobileno=$row['mobileno'];
            $mobileno2=$row['mobileno2'];
            $masjidname=$row['masjidname'];
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
            $reset_token=$row['reset_token'];
            $reset_expiry=$row['reset_expiry'];
            //$remembercookie=$row['remembercookie'];
            $date = date('d/m/Y', strtotime($timestamp));
            ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $id;  ?></td>
            <td><?php echo $username;  ?></td>
            <td><?php echo $email;  ?></td>
            <td><?php echo $password;  ?></td>
            <td><?php echo $email2;  ?></td>
            <td><?php echo $mobileno;  ?></td>
            <td><?php echo $mobileno2;  ?></td>
            <td><?php echo $masjidname;  ?></td>
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
            <td><?php echo $reset_token;  ?></td>
            <td><?php echo $reset_expiry;  ?></td>
            <!--<td><?php echo $remembercookie;  ?></td>-->
            
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
  