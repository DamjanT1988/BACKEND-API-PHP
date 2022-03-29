<?php
$page_title = "Startsida";
include("includes/header.php");
?>

<h2>Bloggen om allt kosttillskott och hälsa!</h2>
<p>Nordic Supplements är ett varumärke med stora ambitioner i kosttillskott i Norden. Den här bloggen används av anställda och ambassadörer av varumärket runtom i Norden!

<article>

<div class="postmain">
<?php
//new instance
$getpost = new Content();

//check id
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //get post
    if($getpost->getPostById($id)) {
        //send to own page for post
        header("location: single.php?deleteid=$id");
    }
}

//save post info.
$postlist = $getpost->getPost();

//fetch the latest id with post by time
foreach(array_slice($postlist, 0, 5) as $key=>$pl) {
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . " ID:" . $pl['id'] . "<br>";
    echo "<br><a class='button1' href='index.php?deleteid=" . $pl['id'] . "'>LÄS MER</a>" . "<br><br><hr class='current'>";
    echo "";
}
?>
</div>
</article>
<h2>Alla skribenter på bloggen:</h2>

 <?php

//new class
$users = new User();

//get user
$userlist = $users->getUser();

//loop trough array
foreach($userlist as $key=>$pl) {
    echo "<p>" . $pl['fname'] . " " . $pl['lname'] . " ID:" . $pl['id'] . "</p><br>";
    echo "<a class='button1' href='usersingle.php?deleteid=" . $pl['fname'] . "'>SE ALLA DENNES INLÄGG</a>" . "<br><br><hr>";
}

 ?>

 <!--advertise section -->
<h2>Rekommenderad produkt:</h2> 
<h3>Astaxin 120 kaps</h3>
<a href="pictures/astaxin-f.jpg" data-lightbox="bild-1" data-title="Framsida">
                        <picture><img src="pictures/astaxin-f.jpg" class="bildprodukt-prodsida" alt="bild av astaxin">
                        </picture>
                    </a>
                    <a href="pictures/ataxin-baksida.jpg" data-lightbox="bild-1" data-title="Baksida"></a>

                    <br>
                    <a class='button1' href='http://studenter.miun.se/~dato1700/dt163g/projekt/astaxin.html'>LÄS OM PRODUKTEN</a>
<!--script for picture slides-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


<?php
include("includes/footer.php");
?>