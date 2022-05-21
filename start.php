<?php
$page_title = "Översikt";
include("includes/header.php");
?>

<?php

//new instance of user
$user = new User();

//check POST & save in variables
if(isset($_POST['name'], $_POST['password'])) {
    $name = $_POST['name'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $name = strip_tags($name);
    $password = $_POST['password'];
    $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
    $password = strip_tags($password);

    if(!($name == "" || $password == "")) {
    //cookie for identifying user
    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (600));
    $_COOKIE['Bert'] = $_POST['name'];

    //check if user exists & the password
    if($user->checkUser($name, $password)) {
        //print hello message if exits
        echo "<h3>Välkommen " . $name . "!</h3>";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
        //destroy cookie
        setcookie("Bert", "", time() - 3600);
        //header("location: logout.php");

    } 
    } else {
    $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
} 
}

//check if not logged in
if(!isset($_SESSION['inlogg'])) {
    header("location: login.php");
} else
?>

<br>
<h2>Information om adminsidan!</h2>

<p>Denna sida är ämnad för anställda i företaget "BEST Food 4 You AB". Om du inte har rätt så logga ut omedelbart!</p>
<p>Vill du administrera order eller menyer klicka på "ORDER" respektive "MENYER". Alla ändringar tillämpas omedelbart</p>
<p>Behöver du teknisk support kontakter du Damjan på telefonnumret 070-2459369 eller e-mejl dato1700@miun.student.se.</p>
<p>Endast administratöranvändaren kan nå "ANVÄNDARE"-sidan. Om du 
<?php
include("includes/footer.php");
?>