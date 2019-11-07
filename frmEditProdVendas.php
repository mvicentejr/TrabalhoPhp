<?php
    include 'banco.php';
    $id_vendas = trim($_GET['id_vendas']);    
    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'select cliente.nome, data_venda from vendas INNER JOIN cliente ON (cliente=cliente.id_cliente) WHERE id_vendas=?';
    $q = $pdo -> prepare($sql);
    $q -> execute(array($id_vendas)); 
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $cliente = $data['nome'];
    $data_venda = $data['data_venda'];
    Banco::desconectar();
    $tgeral = 0;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Itens Vendidos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container jumbotron"">
        <h1><center>Detalhes da Venda</h1>
        <br>
        <div class="border border-dark">
            <p><b>&emsp;Venda: </b><?php echo $id_vendas ?></p>
            <p><b>&emsp;Cliente: </b><?php echo $cliente ?></p>
            <p><b>&emsp;Data da Venda: </b><?php echo $data_venda ?></p>
        </div>
        <br><br>
        <div>
            <h2><center> Produtos Vendidos</h2>
            <br><br>
            <button type="button" class="btn btn-success" 
                onclick="javascript:location.href='frmInsProdVenda.php?id_vendas='+<?php echo $id_vendas?>"> 
                Adicionar Produto
            </button>
            <br><br>
            <table class="table table-striped">
            <tr class="table">
                <thead class="thead-dark">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Unitário</th>
                    <th>Total</th>
                    <th>Remover</th>
                </thead>
            </tr>
            <?php
                $pdo = Banco::conectar();
                $venda = trim($_GET['id_vendas']);
                $sql = 'select produtos_vendas.produto, produtos.descricao, produtos_vendas.quantidade, produtos.valor, total FROM produtos_vendas INNER JOIN produtos ON (produto=produtos.id_produtos) WHERE venda=?';
                $q = $pdo -> prepare($sql);
                $q -> execute(array($venda)); 
                while ($row = $q->fetch(PDO::FETCH_ASSOC)){ 
                    $produto = $row['produto'];
                
            ?>
            <tr> 
                <td><?php echo $row['descricao'] ?></td>
                <td><?php echo $row['quantidade'] ?></td>
                <td><?php echo $row['valor'] ?></td>
                <td><?php echo $row['total'] ?></td>
                <?php $total = $row['total']; 
                $tgeral = $tgeral + $total; 
                ?>
                <td>
                    <button type="button" class="btn btn-danger"
                    onclick="javascript:location.href='frmRemProdVenda.php?venda='+<?php echo $venda?>+'&produto='+<?php echo $produto ?>">
                        Remover
                    </button>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
        <div class="form-group">
            <br>
            <p><b>Total Geral: </b>R$ <?php echo $tgeral ?></p>
            <br>
            <input type="button" class="btn btn-dark" id="btnVol" name="btnVol" value="Voltar"
            onclick="javascript:location.href='lstVendas.php'">            
        </div>
    </body>
</html>