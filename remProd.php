<?php
    $id = trim($_POST['id_produtos']);
    
    if(!empty($id)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM produtos WHERE id_produtos=? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Banco::desconectar();
    }
    header("location:lstProdutos.php");
?>