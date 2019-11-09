<?php
    session_start();
    if(!isset($_SESSION['user']))
    header("location: login.html");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css">
       
</head>
<body>
    
    <div class='container' id="divConteudo">
    <h1><Center>LISTAR CLIENTE</center></h1>
    <input type="button" id="button_new" name="button_new" class="btn btn-primary" value="ADICIONAR CLIENTE" onclick="javascript: location.href='cadastro.html'">
    
    
    
    <table class="table table-striped table-hover text-center" id="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CPF</th>
                <th>ENDEREÇO</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>DATA DO CADASTRO</th>
                <th>MOVIMENTAÇÕES</th>
            </tr>
                <tr>
                    <th><input type="text" id="txtColuna1"/></th>
                    <th><input type="text" id="txtColuna2"/></th>
                    <th><input type="text" id="txtColuna3"/></th>
                    <th><input type="text" id="txtColuna4"/></th>
                    <th><input type="text" id="txtColuna5"/></th>
                    <th><input type="text" id="txtColuna6"/></th>
                    <th><input type="text" id="txtColuna7"/></th>
                    <th></th>
                </tr> 
        </thead>
                            <?php

                                include 'banco.php';
                                $pdo = Banco::conectar();
                                $sql = 'select * from cliente order by id_cliente';
                                $lista = $pdo->query($sql);
                                Banco::desconectar();
                                foreach ($lista as $row){
                            ?>
        <tr>
            <td><?php echo $row['id_cliente'] ?></td>
            <td><?php echo $row['nome']?></td>
            <td><?php echo $row['cpf'] ?></td>
            <td><?php echo $row['endereco'] ?></td>
            <td><?php echo $row['cidade'] ?></td>
            <td><?php echo $row['estado'] ?></td>
            <td><?php echo $row['data_nascimento'] ?></td>
            
            
            <td>
                <button type="button" class="btn btn-info" 
                onclick="javascript:location.href='telaeditar.php?id_cliente='+<?= $row['id_cliente']?>">Editar</button>
                <button type="button" class="btn btn-danger" 
                onclick="javascript:location.href='telaremover.php?id_cliente='+<?= $row['id_cliente']?>">Excluir</button>
            </td>
        
        
        </tr>
        <?php } ?>
    </table> 
    <br><br>
        <a href="menu.php" class="btn btn-dark">Voltar</a>
    </div>   
</body>
</html>