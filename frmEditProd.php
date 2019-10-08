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
        <title>Edição de Produtos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container">
        <div>
            <h1>Editar Produtos</h1>
            <br>
            <form id="frmEditProd.php" name="frmEditProd" method="POST" action="editProd.php" class="control-label">
                <div class="form-group">
                    <label for="lblIdProd">ID: <?php echo $id_produtos?> 
                    <input type="hidden" name="id_produtos" value="<?php echo $id_produtos ?>"> </label>
                </div>
                <div class="form-group">
                <label for="lblDesc">Descrição</label>
                <input type="text" class="form-control" id="txtDesc" name="txtDesc" value="<?php echo $desc?>">
                </div>
                <div class="form-group">
                <label for="lblQtd">Quantidade</label>
                <input type="text" class="form-control" id="txtQtd" name="txtQtd" value="<?php echo $qtd?>">
                </div>
                <div class="form-group">
                <label for="lblVal">Valor</label>
                <input type="text" class="form-control" id="txtVal" name="txtVal" value="<?php echo $val?>">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-Success" id="btnGravar" name="btnGravar" 
                    value="Gravar">
                    <input type="button" class="btn btn-info" id="btnVol" name="btnVol" value="Voltar"
                    onclick="javascript:location.href='lstProd.php'">            
                </div>
            </form>
        </div>
    </body>
</html>