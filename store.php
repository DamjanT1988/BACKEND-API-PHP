<?php
include("includes/config.php");
/*
if(!isset($_POST['name'])){
    header("location: admin.php");
}*/

$addNewUser = new User ();

if(isset($_POST['emailnew'])) {
    $emailnew = $_POST['emailnew'];
    $passwordnew = $_POST['passwordnew'];
    $fnamenew = $_POST['realfnamenew'];
    $lnamenew = $_POST['reallnamenew'];
    $employeeno = $_POST['employeeno'];

    $emailnew = htmlentities($emailnew, ENT_QUOTES, 'UTF-8');
    $emailnew = strip_tags($emailnew);

    $passwordnew = htmlentities($passwordnew, ENT_QUOTES, 'UTF-8');
    $passwordnew = strip_tags($passwordnew);

    $fnamenew = htmlentities($fnamenew, ENT_QUOTES, 'UTF-8');
    $fnamenew = strip_tags($fnamenew);

    $lnamenew = htmlentities($lnamenew, ENT_QUOTES, 'UTF-8');
    $lnamenew = strip_tags($lnamenew);


    $employeeno = htmlentities($employeeno, ENT_QUOTES, 'UTF-8');
    $employeeno = strip_tags($employeeno);

if($addNewUser->addUser($emailnew, $passwordnew, $fnamenew, $lnamenew, $employeeno)) {
        $_SESSION['lagring'] = "Konto skapat!";
        header("location: admin.php");
        $_SESSION['Namn'] = $fnamenew;
    } else {
        $_SESSION['errorlagring'] = "Fyll i alla fält";
        header("location: admin.php");
    }
}
$addContent = new Content();
/*
if(isset($_GET['changeid'])) {
    $id = $_GET['changeid'];
    echo $id;
    if($post->deletePostById($id)) {
        header("location: admin.php");
    }
*/
/*
if(isset($_GET[''])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];
  */  

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];

    
    if($addContent->updatePost($id, $title, $content, $user)) {
        $_SESSION['lagring'] = "Ändringar sparade!";
    
        header("location: change.php?changeid=$id");
    } else {
        $_SESSION['errorlagring'] = "FÄndringar sparades inte!";
        header("location: change.php");
    }

  }

/*
if(isset($_POST['title'])) {
$title = $_POST['title'];
$content = $_POST['content'];
$user = $_POST['user'];


if($addContent->addPost($title, $content, $user)) {
    $_SESSION['lagring'] = "Inlägg tillagd!";

    header("location: admin.php");
} else {
    $_SESSION['errorlagring'] = "Fyll i titel och innehåll";
    header("location: admin.php");
}

if(isset($_POST['title'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];
    
    
    if($addContent->addPost($title, $content, $user)) {
        $_SESSION['lagring'] = "Inlägg tillagd!";
    
        header("location: admin.php");
    } else {
        $_SESSION['errorlagring'] = "Fyll i titel och innehåll";
        header("location: admin.php");
    }
    

*/


