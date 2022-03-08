<?php
$page_title = "Logga in";
include("includes/header.php");
?>

<h2>Logga in nedan för att administrera!</h2>

<!--create table-->
<form action="admin.php" method="POST">
<label for="name">Användarnamn:</label>
<br>
<input type="text" name="name" id="name">
<br>
<label for="password">Lösenord:</label>
<br>
<input type="password" name="password" id="password">
<br>
<input type="submit" class="button1" value="Logga in">
<br>
</form>

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