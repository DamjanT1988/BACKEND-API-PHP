<?php
$page_title = "Administrera";
include("includes/header.php");

//new content
$post = new Content();

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
<h2>Administrera order nedan!</h2>
<h3>Lägg in en ny order:</h3>
<?php

//message if success or fail in adding post
if(isset($_SESSION['lagring'])) {
    echo $_SESSION['lagring'];
    unset($_SESSION['lagring']);
} 
if(isset($_SESSION['errorlagring'])) {
    echo $_SESSION['errorlagring'];
    unset($_SESSION['errorlagring']);
}
?>
<!--create form with POST to add post--> 

<!--
<form action="store.php" method="POST" id="content">
<label for="title">Ange titel för order:</label>
<br>
<input type="text" name="title" id="title">
<br>
<label for="content2">Ange innehåll för inlägg:</label>
<br>
<textarea form="content" name="content" id="content2" rows="10" cols="45"></textarea>
<br>
<input type="hidden" name="user" id="user" value="<?= $_COOKIE['Bert']; ?>">
<br>
<input type="submit" class="button2" value="Lägg in inlägg">
</form>
<br><br>
-->

<!--create table-->
<form  name="myform" id="myform">

<label for="type">Boka bord</label>

<input type="radio" name="radiotype" id="tablenew" value="Table">

<label for="type"> Boka takeaway</label>

<input type="radio" name="radiotype" id="takeawaynew" value="Takeaway">
<br><br>

<label for="datenew">Vilket datum:</label>
<br>
<input type="date" name="datenew" id="datenew" placeholder="ÅÅÅÅ-MM-DD">
<br><br>
<label for="timenew">Vilken tid:</label>
<br>
<input type="time" name="timenew" id="timenew">
<br><br>
<label type="content">Orderinformation:</label>
<br>
<input type="text" name="contentnew" id="contentnew">
<br><br>
<label for="arrival">Äter på restaurang:</label>

<input type="radio" name="radiotype" id="arrival" value="Restaurangvistelse">

<label for="pickup"> Hämtar på restaurang:</label>

<input type="radio" name="radiotype" id="pickup" value="Hämtar">
<br><br>
<label type="cost">Totala orderkostnad (kr):</label>
<br>
<input type="number" name="cost" id="cost" pattern="[0-9]">
<br><br>
<label type="customername">Kundnamn:</label>
<br>
<input type="text" name="customername" id="customername">
<br><br>
<label type="customerphone">Kundtelefonnummer:</label>
<br>
<input type="text" name="customerphone" id="customerphone">
<br><br>
<label type="message">Meddelande från/om kunden:</label>
<br>
<input type="text" name="message" id="message">
<br><br>
<input type="submit" class="button2" value="Lägg in ny order!">
<br>
</form>
<br><br>           

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
    echo "<p><b>Ankomsttyp:</b> " . $pl['pickup_arrival'] . "</p>";
    echo "<p><b>Status:</b> " . $pl['status'] . "</p>";
    echo "<p><b>Order lagd:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button1'id='" . $pl['id'] . "'>RADERA</a>";
    echo "<a class='button2' href='change.php?changeid=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}
?>

<?php
include("includes/footer.php");
?>
