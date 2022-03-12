<?php
$page_title = "Administrera";
include("includes/header.php");

//new content
$post = new Content();

//get id from URL
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //delete post by id
    if($post->deletePostById($id)) {
        header("location: admin.php");
    }
}

?>

<?php

//new instance of user
$user = new User();

//check POST & save in variables
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $name = strip_tags($name);
    $password = $_POST['password'];

    //cookie for identifying user
    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (6000));
    $_COOKIE['Bert'] = $_POST['name'];

    //check if user exists & the password
    if($user->checkUser($name, $password)) {
        //print hello message if exits
        echo "<h3>Välkommen " . $name . "!</h3>";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
     // header("location: login.php");
    } 
} else {
    //header("location: login.php");
}

//check if not logged in
if(!isset($_SESSION['inlogg'])) {
    header("location: login.php");
}


?>
<br>
<div><a class='button1' href='logout.php' id='logout'>Logga ut</a></div>
<h2>Administrera hemsidan nedan!</h2>
<?php

//message if success or fail in adding post
if(isset($_SESSION['lagring'])) {
    echo $_SESSION['lagring'];
    unset($_SESSION['lagring']);
} 
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>
<!--create form with POST to add post--> 
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
<input type="submit" class="button1" value="Lägg in inlägg">
</form>
<br><br>

<h2>Dina egna befintliga blogginlägg</h2>
<?php

//new content
$getpost = new Content();

//get post & save
$postlist = $getpost->getPost();

//loop through array & print
foreach($postlist as $key=>$pl) {
    if($pl['user'] == $_COOKIE['Bert']){
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . "<br>";
    echo "<br><a class='button1' href='admin.php?deleteid=" . $pl['id'] . "'>RADERA</a>" . " ";
    echo "<a class='button1' href='change.php?changeid=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}}

?>

<?php
include("includes/footer.php");
?>