<?php
// Start the session
session_start();

// Check if the user is logged in and is authorized to access the admin panel
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Include the database configuration file
include_once 'config.php';

// Initialize the variables for storing user input
$username = '';
$email = '';
$password = '';
$role = '';
$id = 0;

// Handle the form submit action
if (isset($_POST['save'])) {
    // Get the user input and sanitize it
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Insert the new user record into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    mysqli_query($conn, $sql);

    // Redirect the user to the users page
    header('Location: users.php');
    exit();
}

// Handle the update action
if (isset($_POST['update'])) {
    // Get the user input and sanitize it
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Update the user record in the database
    $sql = "UPDATE users SET username='$username', email='$email', password='$password', role='$role' WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect the user to the users page
    header('Location: users.php');
    exit();
}
// Fetch all the user records from the database



// Handle the delete action
if (isset($_GET['delete'])) {
    // Get the ID of the user to be deleted and sanitize it
    $id = mysqli_real_escape_string($conn, $_GET['delete']);

    // Delete the user record from the database
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect the user to the users page
    header('Location: users.php');
    exit();
}
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users - Admin Panel</title>
</head>
<body>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <a href="users.php?edit=<?php echo $user['id']; ?>">Edit</a> |
                    <a href="users.php?delete=<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Add User</h2>
    <form method="post" action="users.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
        <br>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <br>
        <label>Role</label>
        <select name="role">
            <option value="user" <?php if ($role == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
        </select>
        <br>
        <?php if ($id > 0): ?>
            <button type="submit" name="update">Update User</button>
        <?php else: ?>
            <button type="submit" name="save">Add User</button>
        <?php endif; ?>
    </form>
    <h2>Update User</h2>
    <form method="post" action="users.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
        <br>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <br>
        <label>Role</label>
        <select name="role">
            <option value="user" <?php if ($role == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
        </select>
        <br>
        <?php if ($id >= 0): ?>
            <button type="submit" name="update">Update User</button>
        <?php else: ?>
            <button type="submit" name="save">Add User</button>
        <?php endif; ?>
    </form>
</body>
</html>