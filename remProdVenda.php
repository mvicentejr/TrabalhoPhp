<?php
    $venda = trim($_POST['venda']);
    $produto = trim($_POST['produto']);
    
    if(!empty($venda) && !empty($produto)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM produtos_vendas WHERE venda=? and produto=? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($venda,$produto));
        Banco::desconectar();
    }
    header("location: frmEditProdVendas.php?id_vendas=".$venda)
?>