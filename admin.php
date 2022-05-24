<!--PROGRAMMER: DAMJAN TOSIC, DATO1700@MIUN.STUDENT.SE-->
<?php
$page_title = "Administrera";
include("includes/header.php");

?>

<?php


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
    $cookieName = "User";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (600));
    $_COOKIE['User'] = $_POST['name'];
    
    

    //check if user exists & the password
    if(file_get_contents("http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idusername=$name&idpassword=$password")) {
        //print hello message if exits
        echo "<strong>Välkommen " . $name . "!</strong>";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
        //destroy cookie
       setcookie("User", "", time() - 3600);
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
<h2>Administrera order nedan!</h2>
<h3>Lägg in en ny order:</h3>
<p>Orderid skapas automatiskt. Alla nyskapade order får aktivstatus "active". För att söka bland order, tryck ctrl + F & skriv in sökord.</p>


<div id="wrapperform">
<!--create table-->
<form  name="formOrder" id="formOrder">

<label for="typenew">Boka bord</label>

<input type="radio" name="typenew" id="typenew" value="Table">
<br>

<label for="typenew"> Boka takeaway</label>

<input type="radio" name="typenew" value="Takeaway">
<br><br>

<label for="datenew">Vilket datum:</label>
<br>
<input type="date" name="datenew" id="datenew">
<br><br>
<label for="timenew">Vilken tid:</label>
<br>
<input type="time" name="timenew" id="timenew">
<br><br>
<label for="contentnew">Orderinformation:</label>
<br>
<textarea form="formOrder" name="contentnew" id="contentnew" rows="10" cols="45"></textarea>
<br><br>
<label for="pickuparrivalnew">Äter på restaurang:</label>

<input type="radio" name="pickuparrivalnew" id="pickuparrivalnew" value="Restaurangvistelse">
<br>
<label for="pickuparrivalnew"> Hämtar på restaurang:</label>

<input type="radio" name="pickuparrivalnew" value="Hämtar">

<br><br>
<label for="costnew">Totala orderkostnad (kr):</label>
<br>
<input type="text" name="costnew" id="costnew" placeholder="Endast siffror">
<br><br>
<label for="customernamenew">Kundnamn:</label>
<br>
<input type="text" name="customernamenew" id="customernamenew">
<br><br>
<label for="customerphonenew">Kundtelefonnummer:</label>
<br>
<input type="tel" name="customerphonenew" id="customerphonenew" placeholder="Endast siffror">
<br><br>
<label for="messagenew">Meddelande från/om kunden:</label>
<br>
<input type="text" name="messagenew" id="messagenew">
<br><br>
<input type="submit" class="button2" value="Lägg in ny order!">
<br>
</form>
<br><br>           
<div>
<h3>Alla order visas nedan - ändra eller ta bort:</h3>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idorder=orderall'), true);

//ÄNDRA LÄNK INNAN INLÄMNING

foreach($postlist as $key=>$pl) {
    echo "<h3><b>Orderid:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Ordertyp:</b> ". $pl['type'] . "</p>";
    echo "<p><b>Ankomst:</b> " . $pl['date_order'] . " - kl:" . $pl['time_order'] . "</p>";
    echo "<p><b>Orderinnehåll:</b> " . $pl['content'] . "</p>";
    echo "<p><b>Namn/tel.nr. från beställaren:</b> " .  $pl['customer_name'] . " - " . $pl['customer_phone'] . "</p>";
    echo "<p><b>Orderbelopp:</b> " . $pl['cost'] . "</p>";
    echo "<p><b>Meddelande: </b> " . $pl['message'] . "</p>";
    echo "<p><b>Ankomsttyp: </b> " . $pl['pickup_arrival'] . "</p>";
    echo "<p><b>Status:</b> " . $pl['status'] . "</p>";
    echo "<p><b>Order lagd:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button1' id='" . $pl['id'] . "'>RADERA</a>";
    echo "<a class='button2' href='change.php?idorderno=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}
?>
</div>
</div>
<?php
include("includes/footer.php");
?>
