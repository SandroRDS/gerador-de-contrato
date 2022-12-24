<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codigin - Gerador de Contratos</title>

  <!-- Link CSS -->
  <link rel="stylesheet" href="/gerador-de-contratos/assets/styles/login.css">

  <!-- Link Google Icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- Link Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="/gerador-de-contratos/assets/images/favicon.ico" type="image/x-icon">
</head>

<body>

  <div id="container">

    <form method="POST" action="/gerador-de-contratos/php/validation/login-validation.php" id="login__container" autocomplete="off">
      <div class="form--input--control">
        <input type="text" name="usuario-identificador" required="" id="cliente-nome" class="form--input">
        <span class="material-symbols-sharp form--icon">person</span>
        <label class="form--label">Email ou CPF</label>
      </div>
      <div class="form--input--control">
        <input type="password" name="usuario-senha" required="" id="cliente-senha" class="form--input">
        <span class="material-symbols-sharp form--icon">key</span>
        <label class="form--label">Senha</label>
      </div>
      <div id="remember__container">
        <label for="remember"><input type="checkbox" name="remember" value="Y" id="remember">Lembrar de Mim</label>
      </div>

      <button type="submit" name="entrar" value="">Entrar<span class="material-symbols-sharp">trending_flat</span></button>
    </form>
  </div>
  
</body>

</html>