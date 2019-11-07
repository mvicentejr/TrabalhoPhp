<?php
    
$id_cliente = trim($_POST['id_cliente']);
$nome = trim($_POST['nome']);
$cpf = trim($_POST['cpf']);
$endereco = trim($_POST['endereco']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);
$data_nascimento = trim($_POST['data']);


    if(!empty($nome) && !empty($endereco) && !empty($cidade) && !empty($estado) && !empty($data_nascimento))
    {

        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE cliente SET nome=?, cpf=?, endereco=?, cidade=?, estado=?, data_nascimento=? WHERE id_cliente=? ";
        $qry = $pdo->prepare($sql);
        $qry->execute(array($nome, $cpf, $endereco, $cidade, $estado, $data_nascimento, $id_cliente));
        Banco::desconectar(); 
    } 
    else 
    {
        throw new Exception("CAMPOS VAZIOS", 1);        
    }

header("location: listarcliente.php");