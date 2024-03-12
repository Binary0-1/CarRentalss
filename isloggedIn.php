<?php
session_start();

// Check if the user is logged in (assuming isLoggedIn is a session variable)
$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

// Output JSON response with login status
header('Content-Type: application/json');
echo json_encode(array('isLoggedIn' => $isLoggedIn));
?>
