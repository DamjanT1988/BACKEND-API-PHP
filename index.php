<?php
$page_title = "Startsida";
include("includes/header.php");
?>

<h2>Nyhetsporteln om datorer!</h2>

<article>

<div class="postmain">
<?php
//new instance
$getpost = new Content();

//check id
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //get post
    if($getpost->getPostById($id)) {
        //send to own page for post
        header("location: single.php?deleteid=$id");
    }
}

//save post info.
$postlist = $getpost->getPost();

//fetch the latest id with post by time
foreach(array_slice($postlist, 0, 1) as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br>";
    echo "<br><a href='index.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr>";
}
?>
</div>
</article>
<div class="postmain">
<?php

//save post info.
$postlist = $getpost->getPost();

//fetch the second latest id with post by time
foreach(array_slice($postlist, 1, 1) as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br>";
    echo "<br><a href='index.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr>";
}
?>
</div>


<?php
include("includes/footer.php");
?>