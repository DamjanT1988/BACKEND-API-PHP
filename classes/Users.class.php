<?php

class Users {

    private $db;
    private $username;
    private $password;


function __construct(){
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    if($this->db->connect_errno > 0) {
        die("Fel vid anslutning");
    }
}

function checkUser(string $name, string $password) : bool {
    $sqlquery = "SELECT * FROM user WHERE username='$name' AND password='$password';";
    $result = $this->db->query($sqlquery);

    if(!mysqli_fetch_all($result, MYSQLI_ASSOC) == "") {
        return true;
    } else {
        return false;
    }
}





}
?>