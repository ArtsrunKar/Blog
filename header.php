<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Users</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 15px;">
      <a class="navbar-brand" href="index.php">BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <a class="nav-link" href="/users">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/post">Posts</a>
          </li>
         
        </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/login_registration/login.php">Login <?php session_start();
if (isset($_SESSION['User'])) {
echo $_SESSION['User'];} ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout">Logout</a>
            </li>
        </ul>
      </div>
    </nav>
    <div class="container">