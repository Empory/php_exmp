

<?php
// Include the template file
include('template.php');

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsit";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Loop through the results and display them in a table
if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Users</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td><td>" . $row["role"] . "</td></tr>";
	}
	echo "</table>";
} else {
	echo "No results found";
}

// Close the database connection
mysqli_close($conn);
?>
