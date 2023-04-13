<?php
include_once('config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
mysqli_query($conn, "UPDATE tags SET name='$name', description='$description' WHERE id=$id");
header("Location: tags.php");
?>
