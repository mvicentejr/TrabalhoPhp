<?php
    $cliente = trim($_POST['selCliente']);
    $date = trim($_POST['txtDate']);

    if(!empty($cliente) && !empty($date)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Insert INTO vendas (cliente, data_venda) values(? ,?);";
        $qry = $pdo -> prepare($sql);
        $qry -> execute(array($cliente, $date));
        Banco::desconectar();
    }
    header("location: lstVendas.php")
?>