<?php
include("includes/config.php");

$addUser = new User ();

if(isset($_POST['emailnew'])) {
    $emailnew = $_POST['email'];
    $passwordnew = $_POST['passwordnew'];
    $fnamenew = $_POST['realfnamenew'];
    $lnamenew = $_POST['reallnamenew'];
    $employeeno = $_POST['employeeno'];
    

$addContent = new Content();

if(isset($_POST['title'])) {
$title = $_POST['title'];
$content = $_POST['content'];
$user = $_POST['user'];
    

if($addContent->addPost($title, $content, $user)) {
    $_SESSION['lagring'] = "Inlägg tillagd!";
    header("location: admin.php");
} else {
    $_SESSION['errorlagring'] = "Fyll i titel och innehåll";
    header("location: admin.php");
}


}

