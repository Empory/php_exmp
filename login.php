<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect the user to the admin panel
    header('Location: admin.php');
    exit;
}

// Check if the login form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct
    if ($username === 'admin' && $password === 'password') {
        // Set the session variables and redirect the user to the admin panel
        $_SESSION['user_id'] = 1;
        $_SESSION['role'] = 'admin';
        header('Location: admin.php');
        exit;
    } else {
        // Display an error message
        $error_message = 'Invalid username or password';
    }
}

// Include the template file
include('template.php');

// Display the login form
echo '<h1>Login</h1>';
if (isset($error_message)) {
    echo '<p>' . $error_message . '</p>';
}
echo '<form method="post">';
echo '<label>Username:</label><input type="text" name="username"><br>';
echo '<label>Password:</label><input type="password" name="password"><br>';
echo '<input type="submit" value="Login">';
echo '</form>';
?>
