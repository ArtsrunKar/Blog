<?php
$link = mysqli_connect('localhost', 'root', 'root', 'blogDB');

if (mysqli_connect_errno()) {
	echo "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error();
	exit();
}
?>
