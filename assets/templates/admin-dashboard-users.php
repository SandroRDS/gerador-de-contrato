<?php
  include '../../php/classBDConection/BDConection.php';

  $conexao = new BDConection();
  $mysqli  = $conexao->criarConexao();

  var_dump($mysqli);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codigin - Página de Administração</title>

  <!-- Link Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Link CSS -->
  <link rel="stylesheet" href="../styles/admin-dashboard.css">

  <link rel="stylesheet" href="../styles/admin-dashboard-contracts.css">

  <!-- Link FLATICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'><link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- Link FAVICON -->
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

</head>

<body>

  <div id="container">

    <nav id="nav">

      <div class="nav--logo">
        <img src="../images/Codigin - noBG.png" alt="">
      </div>
      <a href="../templates/admin-dashboard.html" class="nav--itens">
        <i class="fi fi-rr-home"></i>
        <p>Home</p>
        <span class="nav--itens--detail"></span>
      </a>
      <div class="nav--itens selectedOn">
        <i class="fi fi-rr-portrait"></i>
        <p>Usuários</p>
        <span class="nav--itens--detail"></span>
      </div>
      <div class="nav--itens">
        <i class="fi fi-rr-document-signed"></i>
        <p>Contratos</p>
        <span class="nav--itens--detail"></span>
      </div>
    </nav>

    <main>

      <header>
        <div id="icons--left">
          <button id="close--open-nav" class="header--itens">
            <i id="menu--icon" class="fi fi-rr-angle-right"></i>
          </button>
        </div>
      </header>

      <div id="content">
        
        <table style= "white-space: nowrap">
          <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Contato</th>
            <th>Status da Conta</th>
          </thead>  
          <tbody>

          </tbody>
        </table>

      </div>

    </main>

  </div>

  <script src="../../js/interactivity/dashboard--navOnOff.js"></script>
  <script src="../../js/interactivity/dashboard--navHover.js"></script>
</body>

</html>