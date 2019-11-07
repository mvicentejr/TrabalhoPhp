<?php
    
    $id_produtos = trim($_POST['id_produtos']);
    $desc = trim($_POST['txtDesc']);
    $qtd = trim($_POST['txtQtd']);
    $val = trim($_POST['txtVal']);

    if(!empty($desc) && !empty($qtd) && !empty($val)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE produtos SET descricao=?, quantidade=?, valor=? WHERE id_produtos=? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($desc, $qtd, $val, $id_produtos));
        Banco::desconectar();
    }
    header("location:lstProdutos.php");
?>