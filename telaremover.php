<?php

include 'banco.php';
$id = trim($_GET['id_cliente']);
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select * from cliente WHERE id_cliente=?";
$qry = $pdo->prepare($sql);
$qry->execute(array($id));
$data = $qry->fetch(PDO::FETCH_ASSOC);
$name = $data['nome'];
Banco::desconectar();
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Exclusão de Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card p-0">
                    <div class="card-header text-center px-0">
                        <h2><b>DESEJA REMOVER CLIENTE?</b></h2>
                    </div>
                    <div class="card-body p-0">
                        <div class="form-group bg-secondary p-4 text-white mb-0">
                            <form id="remover" name="remover" method="POST" action="removercliente.php">

                                <div class="form-group">
                                    <label for="labellId">
                                        <span class="font-weight-bold">ID: </span>
                                        <span class="font-weight-normal"> <?php echo $id ?> </span>
                                    </label>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                </div>

                                <div class="form-group">
                                    <label for="labelNome">
                                        <span class="font-weight-bold">NOME: </span>
                                        <span class="font-weight-normal"> <?php echo $name ?> </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-Danger" id="btnRemover" name="btnRemover" value="Remover">
                                    <input type="button" class="btn btn-info" id="btVol" name="btVol" value="Voltar" onclick="javascript:location.href='listarcliente.php'">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>