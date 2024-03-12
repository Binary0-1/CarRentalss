<?php
session_start();
// Check if the username session variable is set
$logged_in = isset($_SESSION['username']);
// Return JSON response indicating login status
echo json_encode(['logged_in' => $logged_in]);
?>
