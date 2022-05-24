<!--PROGRAMMER: DAMJAN TOSIC, DATO1700@MIUN.STUDENT.SE-->
<?php
$page_title = "Registrera";
include("includes/header.php");
?>


<h2>Registrera nedan!</h2>

<?php
//control if admin logged in
if($_COOKIE['User'] == 'Admin') {

} else {
    header("location: start.php");
}

?>

<!--create table-->
<form name="formRegister" id="formRegister">

<label for="namenew">Skriv in användarnamn:</label>
<br>
<input type="text" name="namenew" id="namenew" placeholder="Namn">
<br><br>
<label for="passwordnew">Välj ett starkt lösenord:</label>
<br>
<input type="password" name="passwordnew" id="passwordnew" placeholder="Lösenord">
<br><br>
<label for="employeeno">Skriv in anställdes anställningsnummer:</label>
<br>
<input type="text" name="employeeno" id="employeeno" placeholder="Endast siffror">

<br><br>
<input type="submit" class="button2" value="Registrera användarkonto">
<br><br><br>
</form>


<h3>Alla användare registrerade nedan: </h3>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://studenter.miun.se/~dato1700/writeable/dt173g/project/projekt_webservice_vt22-DamjanT1988/webservice-API.php?iduser=all'), true);

//ÄNDRA LÄNK INNAN INLÄMNING

foreach($postlist as $key=>$pl) {
    echo "<h3><b>Användar-ID:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Användarnamn:</b> ". $pl['username'] . "</p>";
    echo "<p><b>Anställningsnummer:</b> " . $pl['employeeno'] . "</p>";
    echo "<p><b>Skapad:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button1' id='" . $pl['id'] . "'>RADERA</a>";
    echo "<br><br><hr>";
}
?>

<?php
include("includes/footer.php");
?>