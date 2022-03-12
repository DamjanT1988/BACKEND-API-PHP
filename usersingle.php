<?php
$page_title = "Författarens inlägg";
include("includes/header.php");
?>

<?php

//new class
$getpost = new Content();

//get all post
$postlist = $getpost->getPost();

//get id from URL
if(isset($_GET['deleteid'])) {
$getpost->setUsername($_GET['deleteid']);
}

//get name
$name = $getpost->getUsername();

foreach($postlist as $key=>$pl) {
    if($pl['user'] == $name){
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