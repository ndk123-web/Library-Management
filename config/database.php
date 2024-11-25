<?php

// check connect

// Check connection
$conn = new mysqli(SERVER_NAME, USERNAME, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    // Log the error message or display a user-friendly message
    die("Connection failed: " . $conn->connect_error);
}

?>


