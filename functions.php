<?php
function get_users() {
	require_once 'database.php';

	$sql = "SELECT * FROM users";

	$result = mysqli_query($link, $sql);

	$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $user;
}

function create_users() {
	require 'database.php';
	session_start();
	if (isset($_SESSION['User'])) {
		# code...
	if (isset($_GET['add'])) {

		$name = $_GET["name"];
		$email = $_GET["email"];
		$age = $_GET["age"];

		$query = "INSERT INTO `users`(`name`, `email`, `active`, `age`, `password`)  VALUES ('$name','$email',0,$age,555)";

		$sql = mysqli_query($link, $query);

		if ($sql) {
			header('Location: http://blog.loc/users/');
			exit;
		} else {
			echo '<p> Error ' . mysqli_error($link) . '</p>';
		}

	}
	}

	else{
		header("location:http://blog.loc/login_registration/login.php");
	}

}

function get_posts() {
	require_once 'database.php';

	$sql = "SELECT posts.*, users.name AS user_name FROM posts LEFT JOIN users ON users.id = posts.user_id ORDER BY posts.id DESC";

	$result = mysqli_query($link, $sql);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

function create_posts() {
	require 'database.php';
	session_start();

if (isset($_SESSION['User'])) {
	if (isset($_POST['add'])) {

		$user_id = $_POST["user_id"];
		$title = $_POST["title"];
		$description = $_POST["description"];

		$query = "INSERT INTO `posts`(`user_id`, `title`, `description`)  VALUES ($user_id,'$title','$description')";

		$sql = mysqli_query($link, $query);

		if ($sql) {
			header('Location: http://blog.loc/post/');
			exit;
		} else {
			echo '<p> Error ' . mysqli_error($link) . '</p>';
		}

	}

}
else{
		header("location:http://blog.loc/login_registration/login.php");
	}

}

function registration()
{
	require 'database.php';
	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_confirmation = $_POST['password_confirmation'];
		if ($password!=$password_confirmation) {
			echo "paroly nuyny chi";
		}
		if (!empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation) &&($password == $password_confirmation))   {
			$query = "SELECT * FROM `users` WHERE email ='$email'";
			$data = mysqli_query($link,$query);
			
			$password = md5($password_confirmation);
			if (mysqli_num_rows($data) == 0) {
				$query = "INSERT INTO `users`(`name`, `email`, `password`, `active`, `age`) VALUES('$name','$email','$password' ,0,50)";
				mysqli_query($link,$query);
				echo "Registration successful";
				echo '<a href="http://blog.loc/login_registration/login.php">To Login</a>';
				mysqli_close($link);
				exit();

			}

			else{
				echo "Login est";
			}

		}

	}
}

function login()
{
	require 'database.php';

	session_start();
	if (isset($_SESSION['User'])) {
		header("location:welcom.php");
	}
	else{
	if (isset($_POST['login'])) {
		$user_name = $_POST['email'];
		$password = md5($_POST['password']);

		if (empty($_POST['email']) || empty($_POST['password'])) {
			echo "havqi ara";
		}
		else{
			$query = "SELECT `id`,`email`,`name` FROM `users` WHERE email = '$user_name' AND password = '$password'";
			$data = mysqli_query($link,$query);

			
			

			if (mysqli_fetch_assoc($data)) {
				foreach ($data as $name) {
				echo $name['name'];
			}
				$_SESSION['User'] = $name['name'];
				header("location:index.php");
			}
			else{
				echo "Invalid";
			}
		}
	}
}
}
?>
