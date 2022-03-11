<?php

class User {

    private $db;
    private $username;
    private $password;
    private $Fname;
    private $Lname;
    private $employeeno;


function __construct(){
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    if($this->db->connect_errno > 0) {
        die("Fel vid anslutning");
    }
}

function addUser(string $emailnew, string $passwordnew, string $fnamenew, string $lnamenew, string $employeeno) {
    if(!$this->setEmail($emailnew)) {
        return false;
    }
    if(!$this->setPassword($passwordnew)) {
        return false;
    }
    if(!$this->setFName($fnamenew)) {
        return false;
    }
    if(!$this->setLName($lnamenew)) {
        return false;
    }
    if(!$this->setEmployeeNo($employeeno)) {
        return false;
    }

    $sqlquery = "INSERT INTO user (username, password, fname, lname, employeeno) VALUES('" . $this->username . "', '" . $this->password . "', '" . $this->Fname . "', '" . $this->Lname . "', '" . $this->employeeno . "');";
    //send query to db, save the response
    $result = $this->db->query($sqlquery);
    return true;
}


function getUser() {
    $sqlquery = "SELECT * FROM user ORDER BY id DESC";
    //connect to db then send query, store the result
    $result = $this->db->query($sqlquery);

    //get all with ass. array
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function checkUser(string $name, string $password) : bool {
    
    $sqlquery1 = "SELECT * FROM user WHERE fname='$name';";
    $result = $this->db->query($sqlquery1);
 
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        
        if(password_verify($password, $stored_password)) {
            return true;
        } else {
            return false;
        }
}
}

/*
    $sqlquery = "SELECT * FROM user WHERE fname='$name' AND password='$password';";
    $result = $this->db->query($sqlquery);

    if(!mysqli_fetch_all($result, MYSQLI_ASSOC) == "") {
        return true;
    } else {
        return false;
    }
} else {
    return false;
}*/


//---SETTERS & GETTERS--//
    //set a name
    function setEmail (string $emailnew) {
        if($emailnew != "") {
            //control for SQL injection..
            $this->username = $emailnew;
            return true;
        } else{
            return false;
        }
    }

    //set a password
    function setPassword (string $passwordnew) {
        if($passwordnew != ""){
            $hashpassword = password_hash($passwordnew, PASSWORD_DEFAULT);
            $this->password = $hashpassword;
            return true;
        } else {
            return false;
        }
    }
    //set a first name
    function setFName (string $fnamenew) {
        if($fnamenew != ""){
            $this->Fname = $fnamenew;
            return true;
        } else {
            return false;
        }
    }
    //set a last name
    function setLName (string $lnamenew) {
        if($lnamenew != ""){
            $this->Lname = $lnamenew;
            return true;
        } else {
            return false;
        }
    }
        //set a employee number
        function setEmployeeNo (string $employeeno) {
            if($employeeno != ""){
                $this->employeeno = $employeeno;
                return true;
            } else {
                return false;
            }
        }


}
?>