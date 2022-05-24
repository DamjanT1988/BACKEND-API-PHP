<!--PROGRAMMER: DAMJAN TOSIC, DATO1700@MIUN.STUDENT.SE-->
<?php
$page_title = "Översikt";
include("includes/header.php");

//check if logged in visitor; else login
if(!isset($_COOKIE['User'])){
    header("location: login.php");
}

?>

<br>
<h2>Information om adminsidan!</h2>

<p>Denna sida är ämnad för anställda i företaget "BEST Food 4 You AB". Om du inte har rätt så logga ut omedelbart!</p>
<p>Vill du administrera order eller menyer klicka på "ORDER" respektive "MENYER". Alla ändringar tillämpas omedelbart</p>
<p>Behöver du teknisk support kontakter du Damjan på telefonnumret 070-2459369 eller e-mejl dato1700@miun.student.se.</p>
<p>Endast administratöranvändaren kan nå "ANVÄNDARE"-sidan. 
<?php
include("includes/footer.php");
?>