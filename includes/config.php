<?php
$site_title = "Nordic Supplements";
$divider = " | ";

//activae error reprting
error_reporting(-1);
ini_set("display_errors", 1);

//autoinclude class
spl_autoload_register(function ($class_name) {
    include "classes/" . $class_name . ".class.php";
});

session_start();

//DB settings for MySQLi storage of terms (use in construct)

define("DBHOST", "localhost");
define("DBUSER", "admin");
define("DBPASS", "password");
define("DBDATABASE", "foretagetab2")


//MIUN-SERVER
/*
define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "dato1700");
define("DBPASS", "TVr2@2jJSc");
define("DBDATABASE", "dato1700")
*/

?>