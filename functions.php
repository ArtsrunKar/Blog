<?php

	function get_users()
	{
		require 'database.php';

		$sql = "SELECT * FROM users";
		$result = mysqli_query($link, $sql);
		$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $user;
	}



	function create_users()
	{
		require 'database.php';

		session_start();
		if (isset($_SESSION['User']))
		{

			if (isset($_GET['add']))
			{
				$name = $_GET["name"];
				$email = $_GET["email"];
				$age = $_GET["age"];
				$query = "INSERT INTO `users`(`name`, `email`, `active`, `age`, `password`)  VALUES ('$name','$email',0,$age,555)";
				$sql = mysqli_query($link, $query);
				if ($sql)
				{
					header('Location: http://blog.loc/users/');
					exit;
				}
				else
				{
					echo '<p> Error ' . mysqli_error($link) . '</p>';
				}
			}
		}
		else
		{
			header("location:http://blog.loc/login_registration/login.php");
		}
	}



	function get_posts()
	{
		require 'database.php';

		$sql = "SELECT posts.*, users.name AS user_name FROM posts LEFT JOIN users ON users.id = posts.user_id ORDER BY posts.id DESC";
		$result = mysqli_query($link, $sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}



	function create_posts()
	{
		require 'database.php';

		session_start();
		if (isset($_SESSION['User']))
		{
			if (isset($_POST['add']))
			{
				$user_id = $_SESSION['User_info']['id'];
				$title = $_POST["title"];
				$description = $_POST["description"];
				$query = "INSERT INTO `posts`(`user_id`, `title`, `description`)  VALUES ($user_id,'$title','$description')";
				$sql = mysqli_query($link, $query);
				if ($sql)
				{
					header('Location: /post');
					exit;
				}
				else
				{
					echo '<p> Error ' . mysqli_error($link) . '</p>';
				}
			}
		}
		else
		{
			header("location:/login");
		}
	}


	function registration()
	{
		session_start();
		require 'database.php';

		if (isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password_confirmation = $_POST['password_confirmation'];
			if ($password != $password_confirmation)
			{
				echo "paroly nuyny chi";
			}

			if (!empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation) && ($password == $password_confirmation))
			{
				$query = "SELECT * FROM `users` WHERE email ='$email'";
				$data = mysqli_query($link, $query);
				$password = md5($password_confirmation);
				if (mysqli_num_rows($data) == 0)
				{
					$query = "INSERT INTO `users`(`name`, `email`, `password`, `active`, `age`) VALUES('$name','$email','$password' ,0,50)";
					mysqli_query($link, $query);

					$query = "SELECT `id`,`email`,`name` FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1";
					$data = mysqli_query($link, $query);
					$user = mysqli_fetch_array($data);
					if ($user) 
					{
						$_SESSION['User_info'] = $user;
						$_SESSION['User'] = $user['name'];
						header("location:/");
					}
					
				}
				else
				{
					echo "Login exists";
				}
			}
		}
	}


	function login()
	{
		require 'database.php';

		session_start();
		if (isset($_SESSION['User']))
		{
			header("location:/update_data");
		}
		else
		{
			if (isset($_POST['login']))
			{
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				if (empty($_POST['email']) || empty($_POST['password']))
				{
					echo "Enter email or password";
				}
				else
				{
					$query = "SELECT `id`,`email`,`name` FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1";
					$data = mysqli_query($link, $query);
					$user = mysqli_fetch_array($data);
					if ($user)
					{
						$_SESSION['User_info'] = $user;
						$_SESSION['User'] = $user['name'];
						header("location:/");
					}
					
					
					else
					{
						echo "Invalid";
					}
				}
			}
		}
	}


	function user_data()
	{
		require 'database.php';

		/*session_start();
		$sql = "SELECT * FROM users";
		$result = mysqli_query($link, $sql);
		$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
		foreach ($user as $users) {
		echo $user['name'];
		echo $user['email'];
		$_SESSION['User'] = $users['name'];
		$_SESSION['Email'] = $users['email'];
		$_SESSION['Password'] = $users['password'];
		}*/
	}


	function update_data()
	{
		require 'database.php';

		session_start();
		if (isset($_POST['save']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$user_id = $_SESSION['User_info']['id'];

			$query = "UPDATE `users` SET name = '$name', email = '$email' WHERE id=$user_id";
			$data=mysqli_query($link,$query);
			
			//$error=mysqli_error();
			//return $error;

		}
	}

	function change_password()
	{
		require 'database.php';
		session_start();
		if (isset($_POST['save'])) {
			$current_password = $_POST['current_password'];
			$new_password = $_POST['new_password'];
			$retype_new_password = $_POST['retype_new_password'];
			$current_passwords = md5($current_password);

		if ($current_passwords!=$_SESSION['User_info']['password'] || ($new_password != $retype_new_password))
			{
				echo "Password incorrect";
			}

			
			if ($current_passwords==$_SESSION['User_info']['password'] || ($new_password = $retype_new_password)) 
			{
				$new_password = md5($retype_new_password);
				$query = "UPDATE `users` SET password='$new_password' WHERE password='$current_passwords'";
				$data = mysqli_query($link,$query);
			}

		}
	}

?>