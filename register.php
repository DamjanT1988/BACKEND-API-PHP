<?php
$page_title = "Registrera";
include("includes/header.php");
?>


<h2>Registrera nedan!</h2>

<!--create table-->
<form  name="myform" id="myform">

<label for="namenew">Skriv in användarnamn:</label>
<br>
<input type="text" name="namenew" id="namenew" placeholder="namn">
<br>
<label for="passwordnew">Välj ett starkt lösenord:</label>
<br>
<input type="password" name="passwordnew" id="passwordnew">
<br>
<label for="employeeno">Skriv in anställdes anställningsnummer:</label>
<br>
<input type="text" name="employeeno" id="employeeno">

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

<h2>Alla användare registrerade!</h2>

<?php
include("includes/footer.php");
?>