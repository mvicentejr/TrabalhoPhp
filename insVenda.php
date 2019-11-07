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
        $sql = "Select id_vendas from vendas where cliente=? and data_venda=?;";
        $qry = $pdo -> prepare($sql);
        $qry -> execute(array($cliente, $date));
        $data = $qry->fetch(PDO::FETCH_ASSOC);
        $id_vendas = $data['id_vendas'];
        Banco::desconectar();
    }
    header("location: frmEditProdVendas.php?id_vendas=".$id_vendas)
?>