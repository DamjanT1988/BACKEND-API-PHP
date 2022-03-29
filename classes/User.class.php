<?php

//new class
class User {
    //properties
    private $db;
    private $username;
    private $password;
    private $Fname;
    private $Lname;
    private $employeeno;

//get database connection - constructor
function __construct(){
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    if($this->db->connect_errno > 0) {
        die("Fel vid anslutning");
    }
}

//add user with all arguments
function addUser(string $emailnew, string $passwordnew, string $fnamenew, string $lnamenew, string $employeeno) {

//query
$sqlquery1 = "SELECT * FROM user WHERE fname='$fnamenew';";
//send query, save response
$result = $this->db->query($sqlquery1);

if ($result->num_rows > 0) {
    $row1 = $result->fetch_assoc();
    $stored_no1 = $row1['employeeno'];
    if ($employeeno == $stored_no1) {
    return false;
}
}

    //check respective variable is exist
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
      //protect the input data from SQL injects
      $emailnew = $this->db->real_escape_string($emailnew);
      $passwordnew = $this->db->real_escape_string($passwordnew);
      $fnamenew = $this->db->real_escape_string($fnamenew);
      $lnamenew = $this->db->real_escape_string($lnamenew);
      $employeeno = $this->db->real_escape_string($employeeno);
    //query
    $sqlquery = "INSERT INTO user (username, password, fname, lname, employeeno) VALUES('" . $this->username . "', '" . $this->password . "', '" . $this->Fname . "', '" . $this->Lname . "', '" . $this->employeeno . "');";
    //send query to db, save the response
    $result = $this->db->query($sqlquery);
    
    return true;
}

//get user information
function getUser() {
    //query
    $sqlquery = "SELECT * FROM user ORDER BY id DESC";
    //connect to db then send query, store the result
    $result = $this->db->query($sqlquery);
    //get all with ass. array
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//verify user exist
function checkUser(string $name, string $password) : bool {
    //query
    $sqlquery1 = "SELECT * FROM user WHERE fname='$name';";
    //send query, save response
    $result = $this->db->query($sqlquery1);
 
    if ($result->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        $stored_name = $row1['fname'];
        if ($name == $stored_name) {
        return true;
    } else {
        return false;
    }
    

    //verify hashed password
    if($result->num_rows > 0) {
        $row2 = $result->fetch_assoc();
        $stored_password = $row2['password'];
        
        if(password_verify($password, $stored_password)) {
            return true;
        } else {
            return false;
        }
    }
} else {
    return false;
}
}


//---SETTERS & GETTERS--//
    //set a name
    function setEmail (string $emailnew) {
        //control if empty
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
            //hash the password
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