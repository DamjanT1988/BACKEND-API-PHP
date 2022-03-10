<?php
$page_title = "Administrera";
include("includes/header.php");
?>

<?php

$user = new User();

if(isset($_GET['deleteid'])) {
    $name = $_GET['deleteid'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $name = strip_tags($name);

    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (6000));
}

$getpost = new Content();

$postlist = $getpost->getPost();

if(isset($_POST['name'])) {
$getpost->setName($_POST['name']);
$_COOKIE['Name'] = $_POST['name'];
}

$name = $getpost->getName();


/*
foreach($postlist as $key=>$pl) {
    if($pl['user'] == $name && $name != "") {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . "<br>";
    echo "<br><a class='button1' href='admin.php?deleteid=" . $pl['id'] . "'>RADERA</a>" . "<br><br><hr>";
}}*/

foreach($postlist as $key=>$pl) {
    if($pl['user'] == $_COOKIE['Bert']){
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . "<br>";
    echo "<br><a class='button1' href='index.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr class='current'>";
}}

?>

<?php
include("includes/footer.php");
?>