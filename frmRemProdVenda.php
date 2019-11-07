<?php
    session_start();
    if(!isset($_SESSION['user']))
    header("location: login.html");

    include 'banco.php';
    $venda = trim($_GET['venda']);  
    $produto = trim($_GET['produto']);  
    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Select produtos.descricao, produtos_vendas.quantidade, total from produtos_vendas INNER JOIN produtos ON (produto=produtos.id_produtos) WHERE venda=? AND produto=?";
    $q = $pdo -> prepare($sql);
    $q -> execute(array($venda,$produto)); 
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $desc = $data['descricao'];
    $qtde = $data['quantidade'];
    $total = $data['total'];
    Banco::desconectar();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Remover Produtos da Venda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container jumbotron">
        <h1><center>Remover Produtos da Venda</h1>
        <form id="frmRemProdVenda" name="frmRemProdVenda" method="POST" action="remProdVenda.php">
        <div class="form-group">
            <label for="lblVenda"> 
                <span class="font-weight-bold">Venda: </span>
                <span class="font-weight-normal"> <?php echo $venda ?> </span>
            </label>
            <input type="hidden" name="venda" value="<?php echo $venda ?>">
        </div>
        <div class="form-group">
            <label for="lblProduto"> 
                <span class="font-weight-bold">Produto: </span>
                <span class="font-weight-normal"> <?php echo $produto ?> </span>
            </label>
            <input type="hidden" name="produto" value="<?php echo $produto ?>">
        </div>
        <div class="form-group">
            <label for="lblDesc">
                <span class="font-weight-bold">Descrição: </span>
                <span class="font-weight-normal"> <?php echo $desc ?> </span>
            </label>
        </div>
        <div class="form-group">
            <label for="lblQtde">
                <span class="font-weight-bold">Quantidade: </span>
                <span class="font-weight-normal"> <?php echo $qtde ?> </span>
            </label>
            <input type="hidden" name="qtde" value="<?php echo $qtde ?>">
        </div>
        <div class="form-group">
            <label for="lblTotal">
                <span class="font-weight-bold">Total: </span>
                <span class="font-weight-normal"> <?php echo $total ?> </span>
            </label>
        </div>
        <div class="form-group">
                    <input type="submit" class="btn btn-Danger" id="btnRem" name="btnRem" value="Remover">
                    <input type="button" class="btn btn-dark" id="btVol" name="btVol" value="Voltar"
                    onclick="javascript:location.href='frmEditProdVendas.php?id_vendas='+ <?php echo $venda ?>">            
        </div>
    </body>
</html>