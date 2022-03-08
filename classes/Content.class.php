<?php
//functions in a class file are known as methods

//CREATE CLASS
class Content {
    //properties to use
    private $db;
    private $title;
    private $content;

    //constructor to load at once
    function __construct() {
        //store connection in $db; re-define terms in config
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0) {
                die("fel anslutning: " . $this->db->connect_errno);
            }
    }

    //get customer list
    function getPost() {
        $sqlquery = "SELECT * FROM news ORDER BY id DESC";
        //connect to db then send query, store the result
        $result = $this->db->query($sqlquery);

        //get all with ass. array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //get specific customer from id
    function getPostById($id) {
        $id = intval($id);
        $sqlquery = "SELECT * FROM news WHERE id=$id";

        $result = $this->db->query($sqlquery);
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
/*
     //get specific customer name from id
     function getCustomerNameFromId($id) {
        $id = intval($id);
        $sqlquery = "SELECT * FROM customers WHERE id=$id";
        $result = $this->db->query($sqlquery);
        $row = mysqli_fetch_array($result);

        return $row['name'];
    }
*/
    //add new customer
    function addPost(string $title, string $content) {
        //control content for sql inj & real email
        if(!$this->setTitle($title)) {
            return false;
        }
        if(!$this->setContent($content)) {
            return false;
        }
        $sqlquery = "INSERT INTO news (title, content) VALUES('" . $this->title . "', '" . $this->content . "');";
        //send query to db, save the response
        $result = $this->db->query($sqlquery);
        return true;
    }

    //delete customers
    function deletePostById(int $id) {
        //control if integer
        $id = intval($id);
        $sqlquery = "DELETE FROM news WHERE id=$id";
        $result = $this->db->query($sqlquery);
        return true;
    }
/*
    //update customer data
    function updateCustomer($name, $email, $id) {
        $id = intval($id);
        //control content for sql inj & real email
        if(!$this->setName($name)) {
            return false;
        }
        if(!$this->setEmail($email)) {
            return false;
        }
        $sqlquery = "UPDATE customers SET ='" . $this->name . "', email='" . $this->email . "' WHERE id=$id";
        //send query to db, save the response
        return $result = $this->db->query($sqlquery);



    }
    */

//---SETTERS & GETTERS--//
    //set a name
    function setTitle (string $title) {
        if($title != "") {
            //control for SQL injection..
            $this->title = $title;
            return true;
        } else{
            return false;
        }
    }

    //set an email
    function setContent (string $content) {
        if($content != ""){
            $this->content = $content;
            return true;
        } else {
            return false;
        }
    }



}
?>