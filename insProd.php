<?php
    $desc = trim($_POST['txtDesc']);
    $qtde = trim($_POST['txtQtde']);
    $val = trim($_POST['txtVal']);

    if(!empty($desc) && !empty($qtde) && !empty($val)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Insert INTO produtos (descricao, quantidade, valor) values(? ,?, ?);";
        $qry = $pdo -> prepare($sql);
        $qry -> execute(array($desc, $qtde, $val));
        Banco::desconectar(); 
    }
    header("location: lstProdutos.php")
?>