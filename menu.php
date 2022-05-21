<?php
$page_title = "Administrera";
include("includes/header.php");

?>

<?php

//new instance of user
$user = new User();

//check POST & save in variables
if(isset($_POST['name'], $_POST['password'])) {
    $name = $_POST['name'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $name = strip_tags($name);
    $password = $_POST['password'];
    $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
    $password = strip_tags($password);

    if(!($name == "" || $password == "")) {
    //cookie for identifying user
    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (600));
    $_COOKIE['Bert'] = $_POST['name'];

    //check if user exists & the password
    if($user->checkUser($name, $password)) {
        //print hello message if exits
        //echo "<p>Välkommen " . $name . "!</p>";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
        //destroy cookie
        setcookie("Bert", "", time() - 3600);
        //header("location: logout.php");

    } 
    } else {
    $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
} 
}

//check if not logged in
if(!isset($_SESSION['inlogg'])) {
    header("location: login.php");
} else


?>
<br>
<h2>Administrera menyer nedan!</h2>
<h3>Lägg in en ny menuobjekt:</h3>
<p>Menyid skapas automatiskt.</p>


<!--create table-->
<form  name="formMenu" id="formMenu">

<label for="type">Boka bord</label>

<input type="radio" name="typenew" id="typenew" value="Table">
<br>

<label for="type"> Boka takeaway</label>

<input type="radio" name="typenew" value="Takeaway">
<br><br>

<label for="date">Vilket datum:</label>
<br>
<input type="date" name="datenew" id="datenew" placeholder="ÅÅÅÅ-MM-DD">
<br><br>
<label for="time">Vilken tid:</label>
<br>
<input type="time" name="timenew" id="timenew">
<br><br>
<label type="content">Orderinformation:</label>
<br>
<textarea form="formOrder" name="contentnew" id="contentnew" rows="10" cols="45"></textarea>
<br><br>
<label for="pickuparrival">Äter på restaurang:</label>

<input type="radio" name="pickuparrivalnew" id="pickuparrivalnew" value="Restaurangvistelse">
<br>
<label for="pickuparrival"> Hämtar på restaurang:</label>

<input type="radio" name="pickuparrivalnew" value="Hämtar">

<br><br>
<label type="cost">Totala orderkostnad (kr):</label>
<br>
<input type="number" name="costnew" id="costnew" pattern="[0-9]">
<br><br>
<label type="customername">Kundnamn:</label>
<br>
<input type="text" name="customernamenew" id="customernamenew">
<br><br>
<label type="customerphone">Kundtelefonnummer:</label>
<br>
<input type="number" name="customerphonenew" id="customerphonenew" placeholder="Endast siffror" pattern="[0-9]">
<br><br>
<label type="message">Meddelande från/om kunden:</label>
<br>
<input type="text" name="messagenew" id="messagenew">
<br><br>
<input type="submit" class="button2" value="Lägg in ny order!">
<br>
</form>
<br><br>           

<h3>Alla order visas nedan - ändra eller ta bort:</h3>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idmenu=menuall'), true);

//ÄNDRA LÄNK INNAN INLÄMNING

foreach($postlist as $key=>$pl) {
    echo "<h3><b>Menyobjektid:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Menykategori:</b> ". $pl['menu_name'] . "</p>";
    echo "<p><b>Objektnamn:</b> " . $pl['item_name'] . "</p>";
    echo "<p><b>Pris (inkl. moms):</b> " . $pl['price'] . " kr</p>";
    echo "<p><b>Skapad:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button3'id='" . $pl['id'] . "'>RADERA</a>";
    echo "<a class='button2' href='menuchange.php?idorderno=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}
?>

<?php
include("includes/footer.php");
?>
