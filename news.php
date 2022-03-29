<?php
$page_title = "Inlägg";
include("includes/header.php");
?>

<h2>Alla bloggartiklar!</h2>

<div class="postmain">
<?php

//new instance
$getpost = new Content();

//check id
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //fetch post by id
    if($getpost->getPostById($id)) {
        header("location: single.php?deleteid=$id");
    }
}

//save post array
$postlist = $getpost->getPost();

//loop trough array
foreach($postlist as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . " ID:" . $pl['id'] . "<br>";
    echo "<br><a class='button1' href='news.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr class='current'><br>";
}
?>
</div>


<?php
include("includes/footer.php");
?>