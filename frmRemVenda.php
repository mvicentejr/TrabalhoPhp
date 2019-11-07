<?php
    session_start();
    if(!isset($_SESSION['user']))
    header("location: login.html");

    include 'banco.php';
    $id_vendas = trim($_GET['id_vendas']);  
    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Select cliente.nome, data_venda from vendas INNER JOIN cliente ON (cliente=cliente.id_cliente) WHERE id_vendas=?";
    $q = $pdo -> prepare($sql);
    $q -> execute(array($id_vendas)); 
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $data_venda = $data['data_venda'];
    Banco::desconectar();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Remover Venda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container jumbotron">
        <h1><center>Remover Venda</h1>
        <form id="frmRemVenda" name="frmRemVenda" method="POST" action="remVenda.php">
        <div class="form-group">
            <label for="lblId"> 
                <span class="font-weight-bold">Venda: </span>
                <span class="font-weight-normal"> <?php echo $id_vendas ?> </span>
            </label>
            <input type="hidden" name="id_vendas" value="<?php echo $id_vendas ?>">
        </div>
        <div class="form-group">
            <label for="lblNome">
                <span class="font-weight-bold">Cliente: </span>
                <span class="font-weight-normal"> <?php echo $nome ?> </span>
            </label>
        </div>
        <div class="form-group">
            <label for="lblDataVenda">
                <span class="font-weight-bold">Data da Venda: </span>
                <span class="font-weight-normal"> <?php echo $data_venda ?> </span>
            </label>
        </div>
        <div class="form-group">
                    <input type="submit" class="btn btn-Danger" id="btnRem" name="btnRem" value="Remover">
                    <input type="button" class="btn btn-dark" id="btVol" name="btVol" value="Voltar"
                    onclick="javascript:location.href='lstVendas.php'">            
        </div>
    </body>
</html>