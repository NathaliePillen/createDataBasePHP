<?php

session_start();

$dbHost = "localhost";
$dbUser = "nathalie";
$dbPass = "test1234";
$dbName = "becode";
$dbcharset = "utf8mb4";

$dsn = "mysql:host=$dbHost; dbname=$dbName; charset=$dbcharset";

$conn = new PDO($dsn, 'nathalie', 'test1234');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $conn -> prepare("SELECT (`id`) FROM `login` WHERE `email`= '$email' AND `password` = '$password'");
    $sql->execute();

    $count = $sql -> fetchColumn();

    if($count=="1"){
        $_SESSION['email'] = $email;

        header('location: login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
<h4>Please Login</h4>
    <form method="POST" name="login">
        <input type="text" name="email">
        <input type="text" name="password">
        <input type="submit" name="login" value="login">        
    </form>
</body>
</html>