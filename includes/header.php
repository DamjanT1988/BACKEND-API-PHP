<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="pictures/logotyp-favicon.png" />
</head>
<body>
    <div id="wrapper1">
    <div id="container">
    <a href="index.php"><img src="pictures/logotyp.svg" alt="logotyp"></a>
    <h1>ADMINSIDA!</h1>
    <div><a class='button1' href='logout.php' id='logout'>Logga ut</a></div>
    <div class="nav">
    <!--menu-->
    <a class="menynamn" href="start.php">ÖVERSIKT</a>
    <a class="menynamn" href="admin.php">ORDER</a>
    <a class="menynamn" href="menus.php">MENYER</a>
    <a class="menynamn" href="register.php">ANVÄNDARE</a>


</div>