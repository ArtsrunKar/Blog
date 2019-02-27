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
    if (isset($_SESSION['User'])) {

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
    } else {
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
    if (isset($_SESSION['User'])) {
        if (isset($_POST['add'])) {

            $user_id = $_SESSION['user_info']['id'];
            $title = $_POST["title"];
            $description = $_POST["description"];
            if (empty($_POST['title'])) {
                $title_err = "You cannot use a blank title";
            }
            if (empty($_POST['description'])) {


                $description_err = "You cannot use a blank  description";

            }
            if (!empty($title) && !empty($description)) {

                $query = "INSERT INTO `posts`(`user_id`, `title`, `description`)  VALUES ($user_id,'$title','$description')";
                $sql = mysqli_query($link, $query);
                if ($sql) {
                    header('Location: /post');
                    exit;
                } else {
                    echo '<p> Error ' . mysqli_error($link) . '</p>';
                }
            }
        }
    } else {
        $_SESSION['prev_url'] = "/post/create";
        header("location:/login");
    }

    return $err = [

        "title_err" => $title_err,
        "description_err" => $description_err


    ];
}

function delete_post()
{

}

function edit_post()
{
    # code...
}


function registration()
{
    session_start();
    require 'database.php';

    if (isset($_POST['submit'])) {
        $query = "SELECT email FROM `users`";
        $data = mysqli_query($link, $query);
        $user = mysqli_fetch_array($data);


        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        if ($password != $password_confirmation) {
            $error_pass = "You must enter the same password twice in order to confirm it.";
        }
        if (empty($_POST['password'])) {
            $empty_pass_err = "You cannot use a blank password";
        }
        if (empty($_POST['email'])) {


            $email_err = "You cannot use a blank  email";

        }
        if (empty($_POST['name'])) {

            $name_err = "You cannot use a blank  name";
        }

        if (!empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation) && ($password == $password_confirmation)) {
            $query = "SELECT * FROM `users` WHERE email ='$email'";
            $data = mysqli_query($link, $query);

            $password = md5($password_confirmation);
            if (mysqli_num_rows($data) == 0) {
                $query = "INSERT INTO `users`(`name`, `email`, `password`, `active`, `age`) VALUES('$name','$email','$password' ,0,50)";
                mysqli_query($link, $query);
                $data = mysqli_query($link, $query);


                $query = "SELECT `id`,`email`,`name` FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1";
                $data = mysqli_query($link, $query);
                $user = mysqli_fetch_array($data);
                if ($user) {
                    $_SESSION['user_info'] = $user;
                    $_SESSION['User'] = $user['name'];
                    header("location:/");
                }


            } else {
                $email_exist_err = "such email exist";
            }
        }

    }
    return $err = [
        "new_pass" => $error_pass,
        "pass_empty" => $empty_pass_err,
        "email_empty" => $email_err,
        "name_empty" => $name_err,
        "email_exist_err" => $email_exist_err
    ];

}


function login()
{
    require 'database.php';

    session_start();
    if (isset($_SESSION['User'])) {
        header("location:/update_data");
    } else {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (empty($_POST['email'])) {

                $email_err = "You cannot use a blank  email";
            }
            if (empty($_POST['password'])) {
                $empty_pass_err = "You cannot use a blank password";

            }

            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $query = "SELECT `id`,`email`,`name`, `password` FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1";
                $data = mysqli_query($link, $query);
                $user = mysqli_fetch_array($data);
                if ($user) {

                    $_SESSION['user_info'] = $user;
                    $_SESSION['User'] = $user['name'];
                    $url = "/";
                    if (isset($_SESSION['prev_url'])) {
                        $url = $_SESSION['prev_url'];
                    }
                    header("location:{$url}");
                } else {

                    $login_err = "Enter the correct email and password";
                }
            }

        }
    }
    return $err = [
        "email_err" => $email_err,
        "pass_empty" => $empty_pass_err,
        "login_err" => $login_err
    ];
}


function user_data()
{
    require 'database.php';

    /*
    session_start();
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
    if (isset($_SESSION['new_data'])) {
        $save = "Your data saved";

    }


    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user_id = $_SESSION['user_info']['id'];
        $query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";
        $data = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($data);
        if (empty($_POST['email'])) {

            $email_err = "You cannot use a blank  email";

        }
        if (empty($_POST['name'])) {
            $name_err = "You cannot use a blank  name";
        }
        //$_SESSION['user_info']=$user;var_dump($_SESSION['user_info']['password']); exit;
        if (!empty($name) && !empty($email)) {

            if (is_null($user) || $user['id'] == $user_id) {
                $query = "UPDATE `users` SET name = '$name', email = '$email' WHERE id=$user_id";
                $data = mysqli_query($link, $query);
                $_SESSION['user_info']['name'] = $_POST['name'];
                $_SESSION['user_info']['email'] = $_POST['email'];
                $_SESSION['new_data'] = "true";
                header("location:/update_data");
            } else {
                $email_exist_err = "such email exist";
            }
        }


    }
    return $err = [
        "email_err" => $email_err,
        "name_err" => $name_err,
        "email_exist_err" => $email_exist_err,
        "save" => $save
    ];
}

function change_password()
{
    require 'database.php';
    session_start();
    //var_dump($_SESSION['user_info']['password']);exit;
    //$err = '';
    //$error = '';


    if (isset($_SESSION['pass_saves'])) {
        $save = "Your password saved";
    }

    if (isset($_POST['save'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $retype_new_password = $_POST['retype_new_password'];
        $current_passwords = md5($current_password);
        //var_dump($current_passwords);var_dump($_SESSION['user_info']['password']);
        if ($current_passwords != $_SESSION['user_info']['password']) {
            $err = "Your current password was incorrect";

            //var_dump($current_passwords);
            //var_dump($_SESSION['user_info']['password']);exit;
        } elseif ($new_password != $retype_new_password) {
            $error = "You must enter the same password twice in order to confirm it.";
        } else {
            if ($current_passwords == $_SESSION['user_info']['password'] && ($new_password = $retype_new_password)) {
                $new_password = md5($retype_new_password);
                $query = "UPDATE `users` SET password='$new_password' WHERE password='$current_passwords'";
                $data = mysqli_query($link, $query);
                $_SESSION['pass_saves'] = "true";
                header("location:/change_password");


            }

        }

    }


    //return $error;
    //return $err;
    return $errors = [
        "current_pass_err" => $err,
        "new_pass_err" => $error,
        "save" => $save
    ];
}

?>