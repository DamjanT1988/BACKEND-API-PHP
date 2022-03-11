<?php
$site_title = "Nordic Supplements";
$divider = " | ";


//Aktivera felrapportering
error_reporting(-1);
ini_set("display_errors", 1);

//2 SKAPA AUTOINCLUDE FÖR KLASSER

//Autoinkludering av klasser
spl_autoload_register(function ($class_name) {
    include "classes/" . $class_name . ".class.php";
});

//7.5 AKTIVERA SESSIONVARIABEL
session_start();

//DB settings for MySQLi storage of terms (use in construct)
/*
define("DBHOST", "localhost");
define("DBUSER", "admin");
define("DBPASS", "password");
define("DBDATABASE", "foretagetab2")
*/

//MIUN-SERVER

define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "dato1700");
define("DBPASS", "TVr2@2jJSc");
define("DBDATABASE", "dato1700")


?>