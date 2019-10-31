<?php
    /*session_start();
    if(!isset($_SESSION['user']))
    header("location: index.html");*/
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Lista Vendas</title>
    </head>
    <body>
        <div class="container jumbotron">
        <h1><center>Lista de Vendas</h1>
        <br/>
        <input type="button" id="btnNovo" name="btnNovo" class="btn btn-success" value="Nova Venda" onclick="javascript: location.href='frmInsVenda.html'">
        <br><br>
        <table class="table table-striped">
            <tr class="table">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Editar</th>
                    <th>Mostrar</th>
                    <th>Remover</th>
                </thead>
            </tr>
            <?php
                include 'banco.php';
                $pdo = Banco::conectar();
                $sql = 'select id_vendas, cliente.nome, data_venda from vendas INNER JOIN cliente ON (cliente=cliente.id_cliente) order by id_vendas';
                $lista = $pdo -> query($sql);
                foreach ($lista as $row){
            ?>
                <tr> 
                    <td><?php echo $row['id_vendas'] ?></td>
                    <td><?php echo $row['nome'] ?></td>
                    <td><?php echo $row['data_venda'] ?></td>
                    <td>
                        <button type="button" class="btn btn-info" 
                        onclick="javascript:location.href='frmEditVenda.php?id_vendas='+<?php echo$row['id_vendas']?>"> 
                            Editar
                        </button>
                    </td> 
                    <td>
                        <button type="button" class="btn btn-warning" 
                        onclick="javascript:location.href='lstProdVendas.php?id_vendas='+<?php echo$row['id_vendas']?>"> 
                            Mostrar
                        </button>
                    </td> 
                    <td>
                        <button type="button" class="btn btn-danger"
                        onclick="javascript:location.href='frmRemVendas.php?id_vendas='+<?php echo $row['id_vendas']?>">
                            Remover
                        </button>
                    </td>
                </tr>
            <?php }?>

        </table> 
        <br><br>
        <a href="menu.html" class="btn btn-dark">Voltar</a>
        </div>       
    </body>
</html>