<?php
include("includes/config.php");

$addNewUser = new User ();

if(isset($_POST['emailnew'])) {
    $emailnew = $_POST['emailnew'];
    $passwordnew = $_POST['passwordnew'];
    $fnamenew = $_POST['realfnamenew'];
    $lnamenew = $_POST['reallnamenew'];
    $employeeno = $_POST['employeeno'];

if($addNewUser->addUser($emailnew, $passwordnew, $fnamenew, $lnamenew, $employeeno)) {
        $_SESSION['lagring'] = "Konto skapat!";
        header("location: admin.php");
        $_SESSION['Namn'] = $fnamenew;
    } else {
        $_SESSION['errorlagring'] = "Fyll i alla fält";
        header("location: admin.php");
    }
}
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

