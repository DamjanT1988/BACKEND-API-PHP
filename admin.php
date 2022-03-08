<?php
$page_title = "Administrera";
include("includes/header.php");


$post = new Content();

echo "<div><a href='logout.php' id='logout'>Logga ut</a></div>";

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    echo $id;
    if($post->deletePostById($id)) {
        header("location: admin.php");
    }
}

?>

<?php

$user = new Users();

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if($user->checkUser($name, $password)) {
        echo "Välkommen!";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
     // header("location: login.php");
    } 
} else {
    //header("location: login.php");
}

if(!isset($_SESSION['inlogg'])) {
    header("location: login.php");
}


?>

<h2>Administrera hemsidan nedan!</h2>
<?php
if(isset($_SESSION['lagring'])) {
    echo $_SESSION['lagring'];
    unset($_SESSION['lagring']);
} 
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>
<form action="store.php" method="POST" id="content">
<label for="title">Ange titel för inlägg:</label>
<br>
<input type="text" name="title" id="title">
<br>
<label for="content2">Ange innehåll för inlägg:</label>
<br>
<textarea form="content" name="content" id="content2" rows="10" cols="70"></textarea>
<br>
<input type="submit" class="button1" value="Lägg in artikel">
</form>

<h2>Befintliga nyheter</h2>
<?php

$getpost = new Content();

$postlist = $getpost->getPost();

foreach($postlist as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br>";
    echo "<br><a href='admin.php?deleteid=" . $pl['id'] . "'>RADERA</a>" . "<br><br><hr>";
}
?>

<?php
include("includes/footer.php");
?>