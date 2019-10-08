<?php
    /*session_start();
    if(!isset($_SESSION['user']))
    header("location: index.html");*/
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Lista Produtos</title>
    </head>
    <body>
        <div class="container jumbotron">
        <h2><center>Lista de Produtos</h2>
        <br/>
        <input type="button" id="btnNovo" name="btnNovo" class="btn btn-success" value="Novo Produto" onclick="javascript: location.href='frmInsProd.html'">
        <br><br>
        <table class="table table-striped">
            <tr class="table">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </thead>
            </tr>
            <?php
                include 'banco.php';
                $pdo = Banco::conectar();
                $sql = 'select * from produtos order by id_produtos';
                $lista = $pdo -> query($sql);
                foreach ($lista as $row){
            ?>
                <tr> 
                    <td><?php echo $row['id_produtos'] ?></td>
                    <td><?php echo $row['descricao'] ?></td>
                    <td><?php echo $row['quantidade'] ?></td>
                    <td><?php echo $row['valor'] ?></td>
                    <td>
                        <button type="button" class="btn btn-info" 
                        onclick="javascript:location.href='frmEditProd.php?id_produtos='+<?php echo$row['id_produtos']?>"> 
                            Editar
                        </button>
                    </td> 
                    <td>
                        <button type="button" class="btn btn-danger"
                        onclick="javascript:location.href='frmRmProd.php?id=' + <?php echo $row['id_produtos']?>">
                            Remover
                        </button>
                    </td>
                </tr>
            <?php }?>

        </table> 
        <br><br>
        <a href="menu.php" class="btn btn-primary">Voltar</a>
        </div>       
    </body>
</html>