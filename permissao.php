<?php

$user = trim($_POST['user']);
$password = trim($_POST['password']);


include 'banco.php';
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'select * from user where login=?';
$qry = $pdo->prepare($sql);
$qry->execute(array($user));
$results = $qry->fetch(PDO::FETCH_ASSOC);
Banco::desconectar();

$data = $results;

if(($data['password']) === md5($password)){
    session_start();
    $_SESSION['user'] = $user;
    header("location: menu.php");
    } else { 
        header("location: login.html");
        
    } 




?>