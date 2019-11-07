<?php
    include 'banco.php';
    $id = trim($_GET['id_cliente']);

    $pdo = Banco::conectar();   
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Select * from cliente WHERE id_cliente=?";
    $qry = $pdo->prepare($sql);
    $qry->execute(array($id)); 
    $data = $qry->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $cpf = $data['cpf'];
    $endereco = $data['endereco'];
    $cidade = $data['cidade'];
    $estado = $data['estado'];
    $data_nascimento = $data['data_nascimento'];
    Banco::desconectar();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar dados do cliente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container">
        <div>
            <h1>EDITAR DADOS DO CLIENTE</h1>
            <form id="editar" name="editar" method="POST" action="editarcliente.php">
                
                <div class="form-group">
                    <label for="labelid_cliente">ID: <?php echo $id?> 
                    <input type="hidden" name="id_cliente" value="<?php echo $id ?>"> </label>
                </div>
                
                <div class="form-group">
                    <label for="labelnome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome?>">
                </div>
                
                <div class="form-group">
                    <label for="labelcpf">Cpf</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf?>">
                </div>

                <div class="form-group">
                    <label for="labelendereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco?>">
                </div>

                <div class="form-group">
                    <label for="labelcidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade?>">
                </div>
                
                <div class="form-group">
                    <label for="labelestado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado?>">
                </div>

                <div class="form-group">
                    <label for="labeldata">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data" name="data" value="<?php echo $data_nascimento?>">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-Success" id="btnGravar" name="btnGravar" value="Gravar">
                    <input type="button" class="btn btn-info" id="btVol" name="btVol" value="Voltar" onclick="javascript:location.href='listarcliente.php'">            
                </div>
            </form>
        </div>
    </body>
</html>