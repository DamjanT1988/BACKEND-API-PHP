<?php
include("includes/config.php");

//new class
$addNewUser = new User ();

//check if POST & save variables
if(isset($_POST['emailnew'])) {
    $emailnew = $_POST['emailnew'];
    $passwordnew = $_POST['passwordnew'];
    $fnamenew = $_POST['realfnamenew'];
    $lnamenew = $_POST['reallnamenew'];
    $employeeno = $_POST['employeeno'];

    //protect input from bad code in HTML
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

//add user &  print success or fail
if($addNewUser->addUser($emailnew, $passwordnew, $fnamenew, $lnamenew, $employeeno)) {
        $_SESSION['lagring'] = "Konto skapat!";
       
        $_SESSION['Namn'] = $fnamenew;
    } else {
        $_SESSION['errorlagring'] = "Fyll i alla fält";
       
    }
}

//new class
$addContent = new Content();

//get id from URL & save in variables
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];

//update post with variables
    if($addContent->updatePost($id, $title, $content, $user)) {
        $_SESSION['lagring'] = "Ändringar sparade!";
        header("location: admin.php");
    } else {
        $_SESSION['errorlagring'] = "FÄndringar sparades inte!";
        header("location: change.php");
    }
  } else {

//or take in post & save in variables
    if(isset($_POST['title'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];

//save in post
if($addContent->addPost($title, $content, $user)) {
    $_SESSION['lagring'] = "Inlägg tillagd!";
    header("location: admin.php");
        } else {
    $_SESSION['errorlagring'] = "Fyll i titel och innehåll";
    header("location: admin.php");
    }

    }

}