<?php
  include '../../php/classBDConection/BDConection.php';

  $conexao = new BDConection();
  $mysqli  = $conexao->criarConexao();

  $dados = "idUsuario, nome, sobrenome, cpf, email, contato, ativo";
  $select = "SELECT $dados FROM Usuario WHERE nivel='1'";
  $busca_usuarios = $mysqli->query($select);
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
  <link rel="stylesheet" href="/gerador-de-contratos/assets/styles/admin-dashboard-contracts.css">

  <!-- Link FAVICON -->
  <link rel="shortcut icon" href="/gerador-de-contratos/assets/images/favicon.ico" type="image/x-icon">

</head>

<body>

  <div id="container">

    <nav id="nav">

      <div class="nav--logo">
        <img src="/gerador-de-contratos/assets/images/Codigin - noBG.png" alt="">
      </div>
      <a href="/gerador-de-contratos/assets/templates/admin-dashboard.html" class="nav--itens">
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

        <table style="white-space: nowrap">
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
            <?php
              while($usuario = $busca_usuarios->fetch_array(MYSQLI_ASSOC))
              {
                $id        = $usuario["idUsuario"];
                $nome      = $usuario["nome"];
                $sobrenome = $usuario["sobrenome"];
                $cpf       = $usuario["cpf"];
                $email     = $usuario["email"];
                $contato   = $usuario["contato"];
                $ativo     = $usuario["ativo"];
                
                if($ativo)
                {
                  $status = "check";
                }
                else
                {
                  $status = "ban";
                }

                $linha  = "<tr>";
                $linha .= "<td>$id</td>";
                $linha .= "<td>$nome</td>";
                $linha .= "<td>$sobrenome</td>";
                $linha .= "<td>$cpf</td>";
                $linha .= "<td>$email</td>";
                $linha .= "<td>$contato</td>";
                $linha .= "<td><i class='fi fi-rr-$status'></i></td>";
                $linha .= "<td><button class='botao' id='changeAccStatus' data-query='edit' data-id='$id' data-value='$ativo'><i class='fi fi-rr-power'></i></button></td>";
                $linha .= "<td><button class='botao'data-query='delete' data-id='$id'><i class='fi fi-rr-trash'></i></button></td>";
                $linha .= "</tr>";
                
                echo $linha;
              }
            ?>
          </tbody>
        </table>

      </div>

      <div id="confirm--change--alert">
        <i class="fi fi-rr-exclamation"></i>
        <h1>Tem certeza?</h1>
        <p>Você irá modicar o estado da conta do cliente.</p>
        <div id="change--alert--buttons">
          <button id='confirm--change--alert--cancel'>Cancelar</button>
          <button>Confirmar</button>
        </div>
      </div>

    </main>

  </div>

  <script src="/gerador-de-contratos/js/interactivity/dashboard--navOnOff.js"></script>
  <script src="/gerador-de-contratos/js/interactivity/dashboard--navHover.js"></script>
  <script src="/gerador-de-contratos/js/interactivity/dashboard--confirmModal.js"></script>
  <!-- <script src="/gerador-de-contratos/js/validation/admin-dashboard-users--confirmChange.js"></script> -->

</body>
