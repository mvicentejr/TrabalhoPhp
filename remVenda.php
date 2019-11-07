<?php
    $id_vendas = trim($_POST['id_vendas']);
        
    if(!empty($id_vendas)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM produtos_vendas WHERE venda=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_vendas));
        $sql = "DELETE FROM vendas WHERE id_vendas=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_vendas));
        Banco::desconectar();
    }
    header("location: lstVendas.php")
?>