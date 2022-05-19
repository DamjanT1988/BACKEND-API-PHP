
<?php
$page_title = "Logga in";
include("includes/config.php");

//include("includes/header.php");

//check if logged in, go to admin directly
if(!isset($_COOKIE['Bert'])) {
//do nothing
} else {
    header("location: admin.php");
}
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

</div>


<h2>Logga in nedan!</h2>

<!--create table-->
<form action="admin.php" method="POST">
<label for="name">Ditt förnamn:</label>
<br>
<input type="text" name="name" id="name">
<br>
<label for="password">Ditt lösenord:</label>
<br>
<input type="password" name="password" id="password">
<br><br>
<input type="submit" class="button1" value="Logga in!">
<br>
</form>
<br><br>
<?php

//error if wrong login info.
if(isset($_SESSION['errorinlogg'])) {
    echo $_SESSION['errorinlogg'];
    unset($_SESSION['errorinlogg']);
}
?>
<?php
include("includes/footer.php");
?>