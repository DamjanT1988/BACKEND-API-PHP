<?php
$page_title = "Registrera";
include("includes/header.php");
?>

<h2>Registrera nedan!</h2>

<!--create table-->
<form action="store.php" method="POST">
<label for="emailnew">Skriv in ditt arbetsmejl:</label>
<br>
<input type="emailnew" name="emailnew" id="emailnew">
<br>
<label for="passwordnew">Välj ett starkt lösenord:</label>
<br>
<input type="passwordnew" name="passwordnew" id="passwordnew">
<br>
<label for="realnamener">Skriv in ditt namn:</label>
<br>
<input type="realfnamenew" name="realfnamenew" id="realfnamenew" value="förnamn">
<input type="reallnamenew" name="reallnamenew" id="reallnamenew" value="efternamn">
<br>
<label for="employeeno">Skriv in ditt anställningsnummer:</label>
<br>
<input type="employeeno" name="employeeno" id="employeeno">

<br>
<input type="submit" class="button1" value="Registrera användarkonto">
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