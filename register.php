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

<script>
//let formData = JSON.stringify($("#myform").serializeArray());

let form = document.getElementById('myform');
form.onsubmit = function(event){
        let xhr = new XMLHttpRequest();
        let formData = new FormData(form);
        //open the request
        xhr.open('POST','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idregister=1')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                form.reset(); //reset form after AJAX success or do something else
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }
</script>