<?php

$dbHost ="localhost";
$dbUser = "nathalie";
$dbPass ="test1234";
$dbName = "becode";
$charset = "utf8mb4";

$dsn = "mysql:host=$dbHost; dbname=$dbName; charset=$charset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);   
    echo "Hello DataBase !";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
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