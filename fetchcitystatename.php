<?php

// Prepare and execute the query to fetch city and name based on the selected pincode
$stmt5 = $conn->prepare("SELECT city, state FROM allcities WHERE pincode = ?");
$stmt5->bind_param("s", $selectedPincode);
$stmt5->execute();
$result5 = $stmt5->get_result();

// Fetch the city and name values
$response = array();
if ($result5->num_rows > 0) {
    $row = $result5->fetch_assoc();
    $response['city'] = $row['city'];
    $response['state'] = $row['state'];
}

// Close the database connection
$stmt5->close();

// Return the response as JSON
echo json_encode($response);
?>
