<?php include 'database.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Black Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>


    <link rel="stylesheet" type="text/css" href="/css/canvas.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

<div class="page">
  <span class="menu_toggle">
    <i class="menu_open fa fa-bars fa-lg"></i>
    <i class="menu_close fa fa-times fa-lg"></i>
  </span>
 
    <ul class="menu_items">
        <li><a href="/"><i class="icon fa fa-home fa-2x"></i> Home</a></li>
        <li><a href="/post"><i class="icon fa fa-sticky-note-o fa-2x" aria-hidden="true"></i> My Post</a></li>
        <li><a href="/login"><?php session_start();
                if (isset($_SESSION['User'])) {
                    echo '<i class="icon fa fa-heart fa-2x"></i> ' . 'Hi ' . $_SESSION['user_info']['name'];

                } else {
                    echo '<i class="icon fa fa-heart fa-2x"></i> ' . "Login";

                } ?></a></li>
        <li>
            <a href="logout.php?logout"><?php session_start();
                if (isset($_SESSION['User'])) {
                    echo '<i class="icon fa fa-sign-out fa-2x" aria-hidden="true"></i>' . "Logout";
                } ?><?php

                session_start();
                if (isset($_GET['logout'])) {
                    session_destroy();
                    header("location:/login");

                }

                ?></a>

        </li>
    </ul>
    <main class="content">
        <div class="content_inner">
            <h1 style="color: black;">𝐵𝓁𝒶𝒸𝓀 𝐵𝓁𝑜𝑔</h1>
            <br><br>

