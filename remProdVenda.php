<?php
    $venda = trim($_POST['venda']);
    $produto = trim($_POST['produto']);
    $qtde = trim($_POST['qtde']);
    include 'banco.php';
    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from produtos where id_produtos=?";
    $qry = $pdo -> prepare($sql);
    $qry -> execute(array($produto));
    $data = $qry->fetch(PDO::FETCH_ASSOC);
    $qtdprod = $data['quantidade'];
    $qtdnova = ($qtdprod+$qtde);
        
    if(!empty($venda) && !empty($produto)){
        $sql = "DELETE FROM produtos_vendas WHERE venda=? and produto=? ";
        $qry = $pdo->prepare($sql);
        $qry->execute(array($venda,$produto));
        $sql = "UPDATE produtos SET quantidade=? WHERE id_produtos=?; ";
        $qry = $pdo -> prepare($sql);
        $qry -> execute(array($qtdnova, $produto));
        Banco::desconectar();
    }
    header("location: frmEditProdVendas.php?id_vendas=".$venda)
?>