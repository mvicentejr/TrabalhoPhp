<?php
    $venda = trim($_POST['id_vendas']);
    $produto = trim($_POST['selProduto']);
    $qtde = trim($_POST['txtQtde']);
    $total = trim($_POST['txtTotal']);

    if(!empty($venda) && !empty($produto) && !empty($qtde) && !empty($total)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Insert INTO produtos_vendas (venda, produto, quantidade, total) values(? ,?, ?, ?);";
        $qry = $pdo -> prepare($sql);
        $qry -> execute(array($venda, $produto, $qtde, $total));
        Banco::desconectar(); 
    }
    header("location: frmEditProdVendas.php?id_vendas=".$venda)
?>