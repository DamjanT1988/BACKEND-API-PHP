<?php
$page_title = "Administrera";
include("includes/header.php");

//new content
$post = new Content();

//get id from URL
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //delete post by id
    if($post->deletePostById($id)) {
        header("location: admin.php");
    }
}

?>

<?php

//new instance of user
$user = new User();

//check POST & save in variables
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $name = strip_tags($name);
    $password = $_POST['password'];

    //cookie for identifying user
    $cookieName = "Bert";
    $cookieValue = $name;
    setcookie($cookieName, $cookieValue, time() + (6000));
    $_COOKIE['Bert'] = $_POST['name'];

    //check if user exists & the password
    if($user->checkUser($name, $password)) {
        //print hello message if exits
        echo "<h3>Välkommen " . $name . "!</h3>";
        $_SESSION['inlogg'] = ""; 
    } else {
       $_SESSION['errorinlogg'] = "Fel inloggningsuppgifter";
     // header("location: login.php");
    } 
} else {
    //header("location: login.php");
}

//check if not logged in
if(!isset($_SESSION['inlogg'])) {
    header("location: login.php");
}


?>
<br>
<div><a class='button1' href='logout.php' id='logout'>Logga ut</a></div>
<h2>Administrera hemsidan nedan!</h2>
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


<form action="store.php" method="POST" id="content">
<label for="title">Ange titel för inlägg:</label>
<br>
<input type="text" name="title" id="title">
<br>
<label for="content2">Ange innehåll för inlägg:</label>
<br>
<textarea form="content" name="content" id="content2" rows="10" cols="45"></textarea>
<br>
<input type="hidden" name="user" id="user" value="<?= $_COOKIE['Bert']; ?>">
<br>
<input type="submit" class="button1" value="Lägg in inlägg">
</form>
<br><br>

<?php
/*                   if (isset($_FILES['file'])) {
    
                    //Kontrollerar att uppladdad bild är av rätt typ (JPEG) och att storleken
                    //inte överstiger en viss storlek - i det här fallet väldigt stor...
                    if ((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] ==
                            "image/pjpeg")) && ($_FILES["file"]["size"] < 200000)) {
                            if ($_FILES["file"]["error"] > 0) {
                                echo "Felmeddelande: " . $_FILES["file"]["error"] . "<br />";
                            } else {
    
                                //Kontrollerar att en bild med samma namn inte redan finns i 
                                //katalogen dit bilden skall flyttas
                                if (file_exists("picturesupload/" . $_FILES["file"]["name"])) {
                                    echo $_FILES["file"]["name"] . " finns redan. Välj ett annat filnamn.";
                                                        
                                } else {
                                
                                //Flyttar filen till rätt katalog      
                                move_uploaded_file($_FILES["file"]["tmp_name"], "picturesupload/" . $_FILES["file"]["name"]);
    
                                //Spar namn på originalbild och miniatyr i variabler
                                $storedfile = $_FILES["file"]["name"];
                                $thumbnail = "thumb_" . $_FILES["file"]["name"];
    
                                $img = new Content();

                                $img->saveImg($storedfile);

                                //Maximal storlek i höjd och bredd för miniatyr
                                $width_thumbnail = 350;
                                $height_thumbnail = 100;
                                                
    
                                //Läser in originalstorleken på den uppladdade bilden, och spar 
                                //den i variablerna width_orig, height_orig
                                list($width_thumbnail_orig, $height_thumbnail_orig) = getimagesize('picturesupload/' . $storedfile);
                                
                                //Räknar ut förhållandet mellan höjd och bredd (sk "ratio")
                                //Detta för att kunna få samma höjd- breddförhållande på miniatyren
                                $ratio_orig = $width_thumbnail_orig / $height_thumbnail_orig;				                       
                                
                                //Räknar ut storlek på miniatyr
                                if ($width_thumbnail / $height_thumbnail > $ratio_orig) {
                                    $width_thumbnail = $height_thumbnail * $ratio_orig;
                                    $height_thumbnail = $width_thumbnail / $ratio_orig;
                                } else {
                                    $height_thumbnail = $width_thumbnail / $ratio_orig;
                                    $width_thumbnail = $height_thumbnail * $ratio_orig;
                                }
    
                                //Skapar en ny bild miniatyrbild med rätt storlek
//                                $image_p = imagecreatetruecolor($width_thumbnail, $height_thumbnail);
//                                $image = imagecreatefromjpeg('picturesupload/' . $storedfile);
//                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_thumbnail, $height_thumbnail, $width_thumbnail_orig, $height_thumbnail_orig);
    
                                //Sparar miniatyr
//                                imagejpeg($image_p, 'bilder/' . $thumbnail);
    
                                echo "<h3>Bild uppladdad</h3>\n";
                                echo "<a href='picturesupload/$storedfile' title='Öppna originalbild'></a>\n";
                                echo "<img src='picturesupload/$storedfile'>"; 
                            }
                            }
                        } 
                        else {
                            // Här hamnar man om det inte är JPEG/bildfil för stor
                            echo "Ej JPEG/Bildfilen större än 200kb.";
                        }
                } // Slut på isset(FILE)
              */  ?>
    <!--
                <div id="uploadform">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="200000" /> 
                        <label for="file"><strong>Filnamn:</strong></label>
                        <input type="file" name="file" id="file" />
                        <input type="submit" value="Ladda upp" />	
                    </form>
                </div>
    -->
            

<h2>Dina egna befintliga blogginlägg</h2>
<?php

//new content
$getpost = new Content();

//get post & save
$postlist = $getpost->getPost();

//loop through array & print
foreach($postlist as $key=>$pl) {
    if($pl['user'] == $_COOKIE['Bert']){
    echo "<h3>" . $pl['title'] . "</h3>";
    echo $pl['postdate'] . "<br><br>";
    echo $pl['content'] . "<br><br>";
    echo "Skrivet av: " . $pl['user'] . "<br>";
    echo "<br><a class='button1' href='admin.php?deleteid=" . $pl['id'] . "'>RADERA</a>" . " ";
    echo "<a class='button1' href='change.php?changeid=" . $pl['id'] . "'>ÄNDRA</a>" . "<br><br><hr>";
}}

?>

<?php
include("includes/footer.php");
?>