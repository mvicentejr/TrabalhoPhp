<html>
    <head>
        <meta charset="UTF-8">
        <title>Itens Vendidos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container jumbotron"">
        <div>
            <h1><center> Produtos Vendidos</h1>
            <br>
            <table class="table table-striped">
            <tr class="table">
                <thead class="thead-dark">
                    <th>ID Venda</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </thead>
            </tr>
            <?php
                include 'banco.php';
                $pdo = Banco::conectar();
                $id_vendas = trim($_GET['id_vendas']);
                $sql = 'select * from produtos_vendas WHERE id_vendas=?';
                $q = $pdo -> prepare($sql);
                $q -> execute(array($id_vendas)); 
                while ($row = $q->fetch(PDO::FETCH_ASSOC)){ 
                
            ?>
            <tr> 
                <td><?php echo $row['id_vendas'] ?></td>
                <td><?php echo $row['id_produtos'] ?></td>
                <td><?php echo $row['quantidade'] ?></td>
                <td><?php echo $row['valor'] ?></td>
            </tr>
            <?php } ?>
            </table>
        </div>
        <div class="form-group">
            <input type="button" class="btn btn-dark" id="btnVol" name="btnVol" value="Voltar"
            onclick="javascript:location.href='lstVendas.php'">            
        </div>
    </body>
</html>