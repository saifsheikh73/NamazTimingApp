<?php
// get_zipcodes.php
include 'conn.php';
// Assuming you have a database connection ($conn) already established

if (isset($_GET['city'])) {
    $city = $_GET['city'];

    // Fetch zip codes for the selected city from the database
    $queryz = "SELECT DISTINCT zipcode FROM user1 WHERE city = ?";
    $stmtz = mysqli_prepare($conn, $queryz);
    mysqli_stmt_bind_param($stmtz, "s", $city);
    mysqli_stmt_execute($stmtz);
    $resultz = mysqli_stmt_get_result($stmtz);

    // Generate HTML options for the zip code dropdown
    $optionsz = '';
    while ($rowz = mysqli_fetch_assoc($resultz)) {
        $zipcode = $rowz['zipcode'];
        $optionsz .= "<a href='#' onclick='selectZipcode(\"$zipcode\")'>$zipcode</a>";
    }

    echo $optionsz;
}

if (isset($_GET['zipcode'])) {
    $zipcode = $_GET['zipcode'];

    // Fetch zip codes for the selected zipcode from the database
    $querym = "SELECT DISTINCT masjidname FROM user1 WHERE zipcode = ?";
    $stmtm = mysqli_prepare($conn, $querym);
    mysqli_stmt_bind_param($stmtm, "s", $zipcode);
    mysqli_stmt_execute($stmtm);
    $resultm = mysqli_stmt_get_result($stmtm);

    // Generate HTML options for the zip code dropdown
    $optionsm = '';
    while ($rowm = mysqli_fetch_assoc($resultm)) {
        $masjidname = $rowm['masjidname'];
        $optionsm .= "<a href='#' onclick='selectMasjidname(\"$masjidname\")'>$masjidname</a>";
    }

    echo $optionsm;
}
?>
