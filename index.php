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
foreach(array_slice($postlist, 0, 5) as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . "<br>";
    echo "<br><a class='button1' href='index.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr class='current'>";
}
?>
</div>
</article>
<h2>Här är alla skribenter på bloggen:</h2>
<ul>
 <?php

$users = new User();

$userlist = $users->getUser();

//loop trough array
foreach($userlist as $key=>$pl) {
    echo "<p>" . $pl['fname'] . " " . $pl['lname'] . "</p>";
    echo "<a class='button1' href='usersingle.php?deleteid=" . $pl['fname'] . "'>ALLA DENNES INLÄGG >></a>" . "<br><br><hr>";
}

 ?>
 </ul>
<?php
include("includes/footer.php");
?>