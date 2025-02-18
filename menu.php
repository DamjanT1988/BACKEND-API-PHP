<!--PROGRAMMER: DAMJAN TOSIC, DATO1700@MIUN.STUDENT.SE-->
<?php
$page_title = "Administrera";
include("includes/header.php");

//check if logged in visitor; else login
if(!isset($_COOKIE['User'])){
    header("location: login.php");
}
?>
<br>
<h2>Administrera menyer nedan!</h2>
<h3>Lägg in en ny menuobjekt:</h3>
<p>Menyid skapas automatiskt. För att söka bland order, tryck ctrl + F & skriv in sökord.</p>


<!--create table-->
<div id="wrapperform">
<form  name="formMenu" id="formMenu">

<p>Välj kategori för måltid:
<br>
<label for="menunamenew">Förrätt: </label>
<input type="radio" name="menunamenew" id="menunamenew" value="starter">
<br>
<label for="menunamenew"> Huvudrätt: </label>
<input type="radio" name="menunamenew" value="main">
<br>
<label for="menunamenew"> Efterrätt: </label>
<input type="radio" name="menunamenew" value="desert">
<br>
<label for="menunamenew"> Dryck: </label>
<input type="radio" name="menunamenew" value="drink">
<br>
<label for="menunamenew"> Övrigt: </label>
<input type="radio" name="menunamenew" value="other">

<br><br>
<label for="itemnamenew">Namn på objekt:</label>
<br>
<input type="text" name="itemnamenew" id="itemnamenew">
<br><br>
<label for="pricenew">Pris per objekt (inkl. moms, i kr):</label>
<br>
<input type="text" name="pricenew" id="pricenew" placeholder="Endast siffror">
<br><br>
<input type="submit" class="button2" value="Lägg in nytt menyobjekt!">
<br>
</form>
<br><br>           
<div>
<h3>Alla menyobjekt visas nedan - ändra eller ta bort:</h3>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://studenter.miun.se/~dato1700/writeable/dt173g/project/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idmenu=menuall'), true);

//ÄNDRA LÄNK INNAN INLÄMNING

foreach($postlist as $key=>$pl) {
    echo "<h3><b>Menyobjektid:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Menykategori:</b> ". $pl['menu_name'] . "</p>";
    echo "<p><b>Objektnamn:</b> " . $pl['item_name'] . "</p>";
    echo "<p><b>Pris (inkl. moms):</b> " . $pl['price'] . " kr</p>";
    echo "<p><b>Skapad:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button3' id='" . $pl['id'] . "'>RADERA</a>";
    echo "<a class='button2' href='menuchange.php?idmenuno=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}
?>
</div></div>
<?php
include("includes/footer.php");
?>
