<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name;
 
    // object properties
    //public $id;
    //public $regrade;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }    

    public function getdoctor(){
        // select all cubrid_query(query)invalid name david!!!!
        $query = "SELECT
                    *
                FROM
                    doctor
                WHERE
                    name='".$this->name."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();//kmly!!

        return $stmt;
    }

    public function loginSubmit($username,$password)
    {
        // select all cubrid_query(query)invalid name david!!!!
        $query = "SELECT username FROM student WHERE username ='".$username."' 
        AND password ='".$password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

     public function adminSubmit($username,$password)
    {
        // select all cubrid_query(query)invalid name david!!!!
        $query = "SELECT username FROM users WHERE username ='".$username."' 
        AND password ='".$password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }


    public function insertDoctor($name,  $degree)
    {
        // select all cubrid_query(query)invalid name david!!!!
        $query = "INSERT INTO doctor (name , regrade) VALUES (' " . $name . "','" . $degree . "')";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    public function getSubjects(){
        $query = "SELECT * FROM subjects WHERE subjects.id NOT IN ( SELECT subjects.id from subjects JOIN result USING(result.subjectid) WHERE result.studentid=1)";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();//kmly!!

        return $stmt;
    }

    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                name= '".$this->name."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }


    // add the next ws



}

/*

el name mesh ray7 david el name ray7 "\"david\"" 3la b3dha 
dah lah? msh 3arfa sara7a 
*/