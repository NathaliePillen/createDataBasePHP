<?php

class Dbh {

    private $dbHost = "localhost";
    private $dbUser = "nathalie";
    private $dbPass = "test1234";
    private $dbName = "becode";
    private $dbcharset = "utf8mb4";

    public function connect(){
        //try {
            $dsn = "mysql:host=".$this->dbHost."; dbname=".$this->dbName."; charset=".$this->dbcharset;   
            $pdo = new PDO($dsn, $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //echo 'Hello dataBase';
            return $pdo;
        //}catch(PDOException $e){
           // echo "Connection failed: " . $e->getMessage();
            //}
    }   
}




/*function openConnection() {
    // Try to figure out what these should be for you
    $dbhost    = "DB_HOST";
    $dbuser    = "DB_USER";
    $dbpass    = "DB_USER_PASSWORD";
    $db        = "DB_NAME";
    
    // Try to understand what happens here 
   $pdo = new PDO('mysql:host='. $dbhost .';dbname='. $db, $dbuser, $dbpass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Why we do this here
    return $pdo;
   }*/