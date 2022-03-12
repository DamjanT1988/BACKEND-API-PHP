<?php
$page_title = "Redigera";
include("includes/header.php");

//new class
$post = new Content();

//get id from URL
if(isset($_GET['changeid'])) {
    $id = $_GET['changeid'];
    $details = $post->getPostById($id);
} 
else {
    header('location: admin.php');
}

//delete post by id in URL
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    if($post->deletePostById($id)) {
    header("location: admin.php");
}}

?>

<br>
<div><a class='button1' href='logout.php' id='logout'>Logga ut</a></div>
<h2>Ändra inlägg <?= $details['title'] ?? "";?> nedan!</h2>

<?php

//new class/user
$user = new User();

?>

<?php
//message if success or fail store
if(isset($_SESSION['lagring'])) {
    echo $_SESSION['lagring'];
    unset($_SESSION['lagring']);
} 
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>

<!--make form with variables & cookie data-->
<form action="store.php?id=<?= $id; ?>" method="POST" id="content">
<label for="title">Ange titel för inlägg:</label>
<br>
<input type="text" name="title" id="title" value="<?= $details['title']; ?>">
<br>
<label for="content2">Ange innehåll för inlägg:</label>
<br>
<textarea form="content" name="content" id="content2" rows="10" cols="70" ><?= $details['content']; ?></textarea>
<br>
<input type="hidden" name="user" id="user" value="<?= $_COOKIE['Bert']; ?>">
<br>
<input type="submit" class="button1" value="Uppdatera inlägg">
</form>
<br><br>

<?php
include("includes/footer.php");
?>