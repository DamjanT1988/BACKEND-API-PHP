<?php
$page_title = "Redigera";
include("includes/header.php");

//get id from URL
if(isset($_GET['idorderno'])) {
    $id = $_GET['idorderno'];
$details = json_decode(file_get_contents("http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idorderno=$id"), true);

} 
else {
    header('location: admin.php');
}

?>

<br>

<h2>Ändra i order #<?= $details['id']; ?></h2>
<!--create table-->
<form  name="formUpdate" id="formUpdate">

<label for="type">Typ av order:</label>
<br>
<input type="text" name="typenew" id="typenew" value="<?= $details['type']; ?>">
<br>
<label for="date">Vilket datum:</label>
<br>
<input type="date" name="datenew" id="datenew" placeholder="ÅÅÅÅ-MM-DD" value="<?= $details['date_order']; ?>">
<br><br>
<label for="time">Vilken tid:</label>
<br>
<input type="time" name="timenew" id="timenew" value="<?= $details['time_order']; ?>">
<br><br>
<label type="content">Orderinformation:</label>
<br>
<textarea form="formUpdate" name="contentnew" id="contentnew" rows="10" cols="45" ><?= $details['content']; ?></textarea>
<br>
<label type="type2">Typ av vistelse:</label>
<input type="text" name="pickuparrivalnew" id="pickuparrivalnew" value="<?= $details['pickup_arrival']; ?>">


<br><br>
<label type="cost">Totala orderkostnad (kr):</label>
<br>
<input type="number" name="costnew" id="costnew" pattern="[0-9]" value="<?= $details['cost']; ?>">
<br><br>
<label type="customername">Kundnamn:</label>
<br>
<input type="text" name="customernamenew" id="customernamenew" value="<?= $details['customer_name']; ?>">
<br><br>
<label type="customerphone">Kundtelefonnummer:</label>
<br>
<input type="number" name="customerphonenew" id="customerphonenew" placeholder="Endast siffror" pattern="[0-9]" value="<?= $details['customer_phone']; ?>">
<br><br>
<label type="message">Meddelande från/om kunden:</label>
<br>
<input type="text" name="messagenew" id="messagenew" value="<?= $details['message']; ?>">
<br><br>
<label type="status">Status:</label>
<br>
<input type="text" name="statusnew" id="statusnew" value="<?= $details['status']; ?>">
<input type="hidden" name="idnew" id="idnew" value="<?= $details['id']; ?>">
<br><br>
<input type="submit" class="button2" value="Uppdatera order!">
</form>
<br><a href="admin.php" class='button1'id='<?= $details['id']; ?>'>RADERA ORDER</a>
<div id="message"></div>
<?php
include("includes/footer.php");
?>