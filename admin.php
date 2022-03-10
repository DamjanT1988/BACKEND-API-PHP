<?php
$page_title = "Administrera";
include("includes/header.php");



$post = new Content();

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    echo $id;
    if($post->deletePostById($id)) {
        header("location: admin.php");
    }
}

?>

<?php

$user = new User();

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (6000));


    if($user->checkUser($name, $password)) {
        echo "<h3>Välkommen " . $name . "!</h3>";
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
<br>
<div><a class='button1' href='logout.php' id='logout'>Logga ut</a></div>
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
<input type="hidden" name="user" id="user" value="<?= $name; ?>">
<br>
<input type="submit" class="button1" value="Lägg in artikel">
</form>
<br><br>

<h2>Dina egna befintliga blogginlägg</h2>
<?php

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
    echo "<br><a class='button1' href='admin.php?deleteid=" . $pl['id'] . "'>RADERA</a>" . "<br><br><hr>";
}}

?>

<?php
include("includes/footer.php");
?>