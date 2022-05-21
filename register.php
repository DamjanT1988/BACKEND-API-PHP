<?php
$page_title = "Registrera";
include("includes/header.php");
?>


<h2>Registrera nedan!</h2>

<?php
if(!$_COOKIE['Bert'] == 'Admin') {
    header("location: start.php");
}
?>

<!--create table-->
<form  name="myform" id="myform">

<label for="namenew">Skriv in användarnamn:</label>
<br>
<input type="text" name="namenew" id="nameneww" placeholder="namn">
<br>
<label for="passwordnew">Välj ett starkt lösenord:</label>
<br>
<input type="password" name="passwordnew" id="passwordnew" placeholder="lösenord">
<br>
<label for="employeeno">Skriv in anställdes anställningsnummer:</label>
<br>
<input type="text" name="employeeno" id="employeeno" placeholder="endast siffror">

<br><br>
<input type="submit" class="button2" value="Registrera användarkonto">
<br>
</form>

<?php
//error if wrong login info.
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>

<h3>Alla användare registrerade nedan: </h3>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?iduser=all'), true);

//ÄNDRA LÄNK INNAN INLÄMNING

foreach($postlist as $key=>$pl) {
    echo "<h3><b>Användar-ID:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Användarnamn:</b> ". $pl['username'] . "</p>";
    echo "<p><b>Anställningsnummer:</b> " . $pl['employeeno'] . "</p>";
    echo "<p><b>Skapad:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button1'id='" . $pl['id'] . "'>RADERA</a>";
    echo "<br><br><hr>";
}
?>

<?php
include("includes/footer.php");
?>