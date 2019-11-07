<?php
    $id_vendas = trim($_GET['id_vendas']);    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Inserção de Produtos Vendas
        </title>
    </head>
    <body class="container jumbotron">
        <h1><center>Inserir Novo Produto</center></h1>
        <form id="frmInsProdVenda" name="frmInsProdVenda" method="POST" action="insProdVenda.php">
            <div class="form-group">
                <label for="lblIdVenda">Venda: <?php echo $id_vendas?> 
                <input type="hidden" name="id_vendas" value="<?php echo $id_vendas ?>"> </label>
             </div>
            <div class="form-group">
                <label for="lblProduto">Produto:</label>
                <select type="text" class="form-control" id="selProduto" name="selProduto">
                    <?php  
                    include 'banco.php';
                    $pdo = Banco::conectar();
                    $sql = 'select * FROM produtos order by id_produtos';
                    $lista = $pdo -> query($sql);
                    foreach ($lista as $row){
                    ?>
                     <option value="<?php echo $row['id_produtos']?> "><?php echo ($row['descricao'])?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lblQtde">Quantidade:</label>
                <input type="number" class="form-control" id="txtQtde" name="txtQtde">
            </div>
            <br><br>
            <div class=form-group>
                <input type="submit" id="btnGrv" name="btnGrv" class="btn btn-success" value="Gravar">
                <input type="reset" id="btnLimpar" name="btnLimpar" class="btn btn-warning" value="Limpar">
                <input type="button" class="btn btn-dark" id="btVol" name="btVol" value="Voltar"
                    onclick="javascript:location.href='frmEditProdVendas.php?id_vendas='+ <?php echo $id_vendas ?>">
            </div>
        </form>
    </body>
</html>