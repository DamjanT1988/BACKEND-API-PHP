<?php
include("includes/config.php");

$addContent = new Content();

if(isset($_POST['title'])) {
$title = $_POST['title'];
$content = $_POST['content'];



if($addContent->addPost($title, $content)) {
    $_SESSION['lagring'] = "Inlägg tillagd!";
    header("location: admin.php");
} else {
    $_SESSION['errorlagring'] = "Fyll i titel och innehåll";
    header("location: admin.php");
}


}