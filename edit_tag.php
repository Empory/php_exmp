<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tags WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Tag</title>
</head>
<body>
	<h1>Edit Tag</h1>
	<form method="post" action="update_tag.php">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"><br>
		<label for="description">Description:</label>
		<textarea name="description" id="description"><?php echo $row['description']; ?></textarea><br>
		<button type="submit">Update Tag</button>
	</form>
</body>
</html>

