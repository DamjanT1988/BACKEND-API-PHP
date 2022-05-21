<?php
$page_title = "Redigera";
include("includes/header.php");

//get id from URL
if(isset($_GET['idmenuno'])) {
    $id = $_GET['idmenuno'];
$details = json_decode(file_get_contents("http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idmenuno=$id"), true);

} 
else {
    header('location: admin.php');
}

?>

<br>

<h2>Ändra i menyobjekt #<?= $details['id']; ?></h2>
<!--create table-->
<form  name="formMenuUpdate" id="formMenuUpdate">

<label for="type">Kategori:</label>
<br>
<input type="text" name="menunamenew" id="menunamenew" value="<?= $details['menu_name']; ?>">
<br>
<label for="type">Objektnamn:</label>
<br>
<input type="text" name="itemnamenew" id="itemnamenew" value="<?= $details['item_name']; ?>">
<br>

<label type="price">Pris per objekt (inkl. moms, i kr):</label>
<br>
<input type="number" name="pricenew" id="pricenew" pattern="[0-9]" value="<?= $details['price']; ?>">
<br><br>
<input type="hidden" name="idnew" id="idnew" value="<?= $details['id']; ?>">
<br><br>
<input type="submit" class="button2" value="Uppdatera menyobjekt!">

</form>
<br><a href="menu.php" class='button1'id='<?= $details['id']; ?>'>UPPDATERA MENUOBJEKT</a>
<br><br> 

<?php
include("includes/footer.php");
?>