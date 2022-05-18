<?php
$site_title = "Admin BEST foods";
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
define("DBUSER", "adminWU3");
define("DBPASS", "pass");
define("DBDATABASE", "dato1700");


//MIUN-SERVER
/*
define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "dato1700");
define("DBPASS", "TVr2@2jJSc");
define("DBDATABASE", "dato1700");
*/

?>