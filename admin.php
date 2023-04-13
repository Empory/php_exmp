<?php
// Start the session
session_start();

// Check if the user is logged in and is authorized to access the admin panel
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect the user to the login page
    header('Location: login.php');
    exit;
}

// Include the template file
include('template.php');

// Display the admin panel content
echo '<h1>Welcome to the admin panel</h1>';
?>
