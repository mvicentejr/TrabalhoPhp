<?php
    session_start();
    if(!isset($_SESSION['user']))
    header("location: login.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Loja Funshom</title>
</head>
<body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

<nav class="text-center">
  <div class="toggle"><i class="fas fa-bars menu"></i></div>
  <ul >
    <li><a href="listarcliente.php">Clientes</a></li>
    <li><a href="lstProdutos.php">Produtos</a></li>
    <li><a href="lstVendas.php">Vendas</a></li>
    <li><a href="cadastrouser.html">Usuários</a></li>
    <li><a href="logout.php">Sair</a></li>
  </ul>
</nav>  
    
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script>
    $(document).ready(function() {
      $(".menu").click(function() {
        $("ul").slideToggle().toggleClass('active');    
      });
    });
</script>
<br>
<div class="container">
  <img src="imagem.jpg" alt="Loja Funshom" width=800 height=600>
</div>
</body>
</html>


