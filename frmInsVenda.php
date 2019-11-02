<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Inserir Nova Venda
        </title>
    </head>
    <body class="container jumbotron">
        <h1><center>Inserir Nova Venda</center></h1>
        <form id="frmInsVenda" name="frmInsVenda" method="POST" action="insVenda.php">
            <div class="form-group">
                <label for="lblCliente">Cliente:</label>
                <select type="text" class="form-control" id="selCliente" name="selCliente">
                    <?php  
                    include 'banco.php';
                    $pdo = Banco::conectar();
                    $sql = 'select * FROM cliente order by id_cliente';
                    $lista = $pdo -> query($sql);
                    foreach ($lista as $row){
                     ?>
                     <option value="<?php echo $row['id_cliente']?> "><?php echo $row['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lblData">Data da Venda:</label>
                <input type="date" class="form-control" id="txtDate" name="txtDate">
            </div>
            <div class=form-group>
                <input type="submit" id="btnGrv" name="btnGrv" class="btn btn-success" value="Gravar">
                <input type="reset" id="btnLimpar" name="btnLimpar" class="btn btn-warning" value="Limpar">
                <input type="button" class="btn btn-dark" id="btnVol" name="btnVol" value="Voltar"
                    onclick="javascript:location.href='lstVendas.php'">
            </div>
        </form>
    </body>
</html>