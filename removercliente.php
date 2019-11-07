<?php
    $id = trim($_POST['id']);
    
    if(!empty($id)){
        include 'banco.php';
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete FROM cliente WHERE id_cliente=? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Banco::desconectar();
    }
    header("location:listarcliente.php");
?>