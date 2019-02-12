<?php 
session_start();
if (isset($_SESSION['User'])) {
echo "Wellcome ".$_SESSION['User'].'<br/>';

echo '<a href="logout.php?logout">Logout</a>';
}

else{

	header("location:login.php");
}

 ?>
 <?php include '../index.php'; ?>