<?php
    include 'banco.php';
    $id_produtos = trim($_GET['id_produtos']);    
    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Select * from produtos WHERE id_produtos=?";
    $q = $pdo -> prepare($sql);
    $q -> execute(array($id_produtos)); 
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $desc = $data['descricao'];
    $qtd = $data['quantidade'];
    $val = $data['valor'];
    Banco::desconectar();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Remover Produtos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container jumbotron">
        <h1><center>Remover de Produtos</h1>
        <form id="frmRemProd" name="frmRemProd" method="POST" action="remProd.php">
        <div class="form-group">
            <label for="lblId"> 
                <span class="font-weight-bold">ID: </span>
                <span class="font-weight-normal"> <?php echo $id_produtos ?> </span>
            </label>
            <input type="hidden" name="id_produtos" value="<?php echo $id_produtos ?>">
        </div>
        <div class="form-group">
            <label for="lblDesc">
                <span class="font-weight-bold">Descrição: </span>
                <span class="font-weight-normal"> <?php echo $desc ?> </span>
            </label>
        </div>
        <div class="form-group">
            <label for="lblQtd">
                <span class="font-weight-bold">Quantidade: </span>
                <span class="font-weight-normal"> <?php echo $qtd ?> </span>
            </label>
        </div>
        <div class="form-group">
            <label for="lblVal">
                <span class="font-weight-bold">Valor: </span>
                <span class="font-weight-normal"> <?php echo $val ?> </span>
            </label>
        </div>
        <div class="form-group">
                    <input type="submit" class="btn btn-Danger" id="btnRem" name="btnRem" value="Remover">
                    <input type="button" class="btn btn-dark" id="btVol" name="btVol" value="Voltar"
                    onclick="javascript:location.href='lstProdutos.php'">            
        </div>
    </body>
</html>