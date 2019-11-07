<?php


$user = trim($_POST['user']);
$password = md5(trim($_POST['password']));

if(!empty($user) && !empty($password))
{

    include 'banco.php';
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Insert INTO user (login, password) values(?, ?);";
    $qry = $pdo->prepare($sql);
    $qry->execute(array($user, $password));
    Banco::desconectar(); 
} 
else 
{
    throw new Exception("CAMPOS VAZIOS", 1);        
}

header("location: menu.php");

?>

