<?php
$page_title = "Logga in";
include("includes/header.php");
?>

<h2>Logga in nedan!</h2>

<!--create table-->
<form action="admin.php" method="POST">
<label for="name">Ditt förnamn:</label>
<br>
<input type="text" name="name" id="name">
<br>
<label for="password">Ditt lösenord:</label>
<br>
<input type="password" name="password" id="password">
<br><br>
<input type="submit" class="button1" value="Logga in!">
<br>
</form>
<br>
<br>
<div><a class='button1' href='register.php' id='logout'>Registrera ny användare >></a></div>
<br><br>
<?php

//error if wrong login info.
if(isset($_SESSION['errorinlogg'])) {
    echo $_SESSION['errorinlogg'];
    unset($_SESSION['errorinlogg']);
}
?>
<?php
include("includes/footer.php");
?>