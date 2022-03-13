<?php

//new class
class Content {
    //properties to use
    private $db;
    private $title;
    private $content;
    private $user;
    private $name;
    private $storedfile;

    //constructor to load at once
    function __construct() {
        //store connection in $db; re-define terms in config
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0) {
                die("fel anslutning: " . $this->db->connect_errno);
            }
    }

    
    //save image nanme
    function saveImg (string $storedfile) {
            $this->storedfile = $storedfile;
            return true;
    }

    //get post list
    function getPost() {
        $sqlquery = "SELECT * FROM news ORDER BY id DESC";
        //connect to db then send query, store the result
        $result = $this->db->query($sqlquery);

        //get all with ass. array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //get specific post from id
    function getPostById($id) {
        //make integer
        $id = intval($id);
        //SQL query
        $sqlquery = "SELECT * FROM news WHERE id=$id";
        //send it to DB & save it
        $result = mysqli_query($this->db, $sqlquery);
        //return array
        return $result->fetch_assoc();

//        $result = $this->db->query($sqlquery);
//        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }

    //get specific post from id
    function getPostByIdSingle($id) {
        //make integer
        $id = intval($id);
        //SQL query
        $sqlquery = "SELECT * FROM news WHERE id=$id";
        //send it to DB & save it
        $result = $this->db->query($sqlquery);
        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }

    //update post with all arguments
    function updatePost(int $id, string $title, string $content, string $user) : bool {
        //protect the input data from SQL injects
        $title = $this->db->real_escape_string($title);
        $content = $this->db->real_escape_string($content);
        $user = $this->db->real_escape_string($user);

    //set every argument as private variable
    if(!$this->setTitle($title)) {
        return false;
    }
    if(!$this->setContent($content)) {
        return false;
    }
    if(!$this->setUser($user)) {
        return false;
    }

        //SQL query
        $sqlquery = "UPDATE news SET title='" . $this->title . "', content='" . $this->content . "', user='" . $this->user . "' WHERE id=$id;"; 
        //return query
        return mysqli_query($this->db, $sqlquery);
    }
    
    //add new post
    function addPost(string $title, string $content, string $user) {
            //control SQL-injections
            $title = $this->db->real_escape_string($title);
            $content = $this->db->real_escape_string($content);
            $user = $this->db->real_escape_string($user);
     //       $storedfile = $this->storedfile;
     //       $storedfile = $this->db->real_escape_string($$storedfile);
    
            
        //set every argument as private variable
        if(!$this->setTitle($title)) {
            return false;
        }
        if(!$this->setContent($content)) {
            return false;
        }
        if(!$this->setUser($user)) {
            return false;
        }

        //query
        $sqlquery = "INSERT INTO news (title, content, user, storedfile) VALUES('" . $this->title . "', '" . $this->content . "', '" . $this->user . "', '" . $this->storedfile . "');";
        //send query to db, save the response
        $result = $this->db->query($sqlquery);
        return true;
    }

    //delete post
    function deletePostById(int $id) {
        //make integer
        $id = intval($id);
        //query
        $sqlquery = "DELETE FROM news WHERE id=$id";
        //database response saved
        $result = $this->db->query($sqlquery);
        return true;
    }

//---SETTERS & GETTERS--//
    //set a name
    function setTitle (string $title) {
        //check if empty
        if($title != "") {
            $this->title = $title;
            return true;
        } else{
            return false;
        }
    }

    //set content
    function setContent (string $content) {
        if($content != ""){
            $this->content = $content;
            return true;
        } else {
            return false;
        }
    }
    //set user
    function setUser (string $user) {
        if($user != ""){
            $this->user = $user;
            return true;
        } else {
            return false;
        }
    }
    //set username
    function setUsername (string $user) {
        $this->user = $user;
        return true;
    } 

    //get usernamee
    function getUsername () {
        return $this->user;
    }

}
?>