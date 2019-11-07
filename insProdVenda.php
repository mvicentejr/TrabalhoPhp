<?php
    $venda = trim($_POST['id_vendas']);
    $produto = trim($_POST['selProduto']);
    $qtde = trim($_POST['txtQtde']);
    include 'banco.php';
    $pdo = Banco::conectar();
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from produtos where id_produtos=?";
    $qry = $pdo -> prepare($sql);
    $qry -> execute(array($produto));
    $data = $qry->fetch(PDO::FETCH_ASSOC);
    $qtdprod = $data['quantidade'];
    $valor = $data['valor'];
    $total = $qtde * $valor;
    $qtdenova = $data['quantidade'] - $qtde;
    Banco::desconectar();
    
    if ($qtdprod >= $qtde){
        if(!empty($venda) && !empty($produto) && !empty($qtde)){
            $pdo = Banco::conectar();
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Insert INTO produtos_vendas (venda, produto, quantidade, total) values(? ,?, ?, ?);";
            $qry = $pdo -> prepare($sql);
            $qry -> execute(array($venda, $produto, $qtde, $total));
            $sql = "UPDATE produtos SET quantidade=? WHERE id_produtos=?; ";
            $qry = $pdo -> prepare($sql);
            $qry -> execute(array($qtdenova, $produto));
            Banco::desconectar(); 
        }
        
    }
    header("location: frmEditProdVendas.php?id_vendas=".$venda)
?>