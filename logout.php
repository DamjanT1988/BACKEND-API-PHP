<!--PROGRAMMER: DAMJAN TOSIC, DATO1700@MIUN.STUDENT.SE-->
<?php
include("includes/config.php");

//log out, destroy session
session_destroy();
header("location: login.php");

//destroy cookie
setcookie("User", "", time() - 3600);