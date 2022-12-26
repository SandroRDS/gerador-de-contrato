<?php
  function redirecionarRequisicao()
  {
    http_response_code(404);
    header("Location: /gerador-de-contratos/assets/errors/not-found.html");
  }

  if(isset($_COOKIE["user"]["level"]))
  {
    if($_COOKIE["user"]["level"] < 2)
    {
      redirecionarRequisicao(); 
    }
  }
  else
  {
    redirecionarRequisicao();
  }
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

  <!-- Link FLATICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <!-- Link CSS -->
  <link rel="stylesheet" href="/gerador-de-contratos/assets/styles/admin-dashboard.css">

  <!-- Link FAVICON -->
  <link rel="shortcut icon" href="/gerador-de-contratos/assets/images/favicon.ico" type="image/x-icon">

</head>

<body>

  <div id="container">

    <nav id="nav">

      <div class="nav--logo">
        <img src="/gerador-de-contratos/assets/images/Codigin - noBG.png" alt="">
      </div>
      <div class="nav--itens selectedOn">
        <i class="fi fi-rr-home"></i>
        <p>Home</p>
        <span class="nav--itens--detail"></span>
      </div>
      <a href="/gerador-de-contratos/assets/templates/admin-dashboard-users.php" class="nav--itens">
        <i class="fi fi-rr-portrait"></i>
        <p>Usuários</p>
        <span class="nav--itens--detail"></span>
      </a>
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

      <div id="content"></div>

    </main>

  </div>

  <script src="/gerador-de-contratos/js/interactivity/dashboard--navOnOff.js"></script>
  <script src="/gerador-de-contratos/js/interactivity/dashboard--navHover.js"></script>
</body>

</html>