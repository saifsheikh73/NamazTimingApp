<?php
session_start();

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['id']);
}

// Function to log out the user
function logout() {
    session_unset();
    session_destroy();
}

// Function to check if the "Remember Me" cookie is set
function checkRememberMe() {
    if (isset($_COOKIE['remember_token'])) {
        $token = $_COOKIE['remember_token'];
        
        // Validate the token and retrieve the associated user from the database
        $user = validateRememberToken($token);
        
        if ($user) {
            // User is valid, set the session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
        } else {
            // Invalid token, clear the "Remember Me" cookie
            setcookie('remember_token', '', time() - 3600);
        }
    }
}

// Function to validate the token and retrieve the associated user from the database
function validateRememberToken($token) {
    // Perform necessary validations and checks
    
    // Retrieve the user associated with the token from the database or persistent storage
    // Replace this with your actual database logic
    
    // Example code to retrieve the user from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "id20710658_db";
    
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $query = "SELECT * FROM user1 WHERE remember_token = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Token is valid, retrieve the user
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Token is invalid or not found
        return false;
    }
    
    $stmt->close();
    $conn->close();
}

// Check the "Remember Me" cookie on every page load
checkRememberMe();
?>
