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
<h2>Administrera frågor nedan!</h2>

<div>
<?php

//get post & save - USE TRUE AS SECOND PARAMETER
$postlist = json_decode(file_get_contents('http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idcontact=get'), true);


foreach($postlist as $key=>$pl) {
    echo "<h3><b>Kontaktid:</b> ". $pl['id'] . "</h3>";
    echo "<p><b>Namn:</b> ". $pl['nameguest'] . "</p>";
    echo "<p><b>E-post:</b> " . $pl['emailguest'] . "</p>";
    echo "<p><b>Fråga:</b> " . $pl['contentguest'] . " kr</p>";
    echo "<p><b>Skickad:</b> " . $pl['created'] . "</p>";
    echo "<br><a class='button4' id='" . $pl['id'] . "'>RADERA</a>";
    echo "<br><br><hr>";
}
?>
</div>
<?php
include("includes/footer.php");
?>
