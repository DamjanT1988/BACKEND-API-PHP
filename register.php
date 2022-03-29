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
<input type="password" name="passwordnew" id="passwordnew">
<br>
<label for="realnamener">Skriv in ditt namn:</label>
<br>
<input type="realfnamenew" name="realfnamenew" id="realfnamenew" placeholder="förnamn">
<input type="reallnamenew" name="reallnamenew" id="reallnamenew" placeholder="efternamn">
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
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>
<?php
include("includes/footer.php");
?>