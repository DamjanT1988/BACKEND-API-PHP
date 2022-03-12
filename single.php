<?php
$page_title = "Enskilt inläggg";
include("includes/header.php");
?>

<article>

<div>
<?php

//new instance
$getpost = new Content();

//save post
$postlist = $getpost->getPost();

//check id
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    //get post by id
    $idpost = $getpost->getPostById($id);
    //loop post
    foreach($idpost as $pl) {
        echo "<h2>" . $pl['title'] . "</h2>";
        echo $pl['postdate'] . "<br><br>";
        echo $pl['content'] . "<br><br>";
        echo "Skrivet av: " . $pl['user'] . "<br>";
        }
}

?>
</div>
</article>

<?php
include("includes/footer.php");
?>