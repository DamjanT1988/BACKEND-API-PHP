<?php
include("includes/config.php");

//log out, destroy session
session_destroy();
header("location: login.php");

//destroy cookie
setcookie("User", "", time() - 3600);