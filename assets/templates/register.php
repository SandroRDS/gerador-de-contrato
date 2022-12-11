<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codigin - Gerador de Contratos</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

  <!-- Link Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Link Google Icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <!-- Link CSS -->
  <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
  <div id="container">

    <div id="register--container" class="swiper">

      <div id="steps">
        <div id="step1" class="step">1</div>
        <span id="separation--step1"></span>
        <span id="separationb--step1"></span>
        <div id="step2" class="step">2</div>
        <span id="separation--step2"></span>
        <span id="separationb--step2"></span>
        <div class="step">3</div>
      </div>
      
      <form class="swiper-wrapper" action="../../php/validation/register-validation.php" method="POST" autocomplete="off">
        <div id="login--step1" class="swiper-slide">

          <span id="name--alert" class="alert"><p>* Nome apenas com letras e mais de 3 digitos.</p></span>
          <span id="sobrenome--alert" class="alert"><p>* Sobrenome apenas com letras e mais de 3 digitos.</p></span>
          <span id="email--alert" class="alert"><p>* Formatação de E-mail incorreta.</p></span>
          <span id="password--alert" class="alert"><p>* A senha deve conter no min. 8 caracteres, sendo eles pelo menos uma letra maiúscula, letra minúscula e um caractere especial.</p></span>
          <span id="passwordRepeat--alert" class="alert"><p>* As senhas devem ser idênticas.</p></span>
          <div class="form--input--control">
            <input type="text" required="" name="usuario-nome" id="usuario-nome" class="form--input" minlength="3" maxlength="20"> 
            <span class="material-symbols-sharp form--icon">person</span>
            <label class="form--label">Nome</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="usuario-sobrenome" id="usuario-sobrenome" class="form--input" minlength="3" maxlength="40">
            <span class="material-symbols-sharp form--icon">person</span>
            <label class="form--label">Sobrenome</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="usuario-email" id="usuario-email" class="form--input" maxlength="100">
            <span class="material-symbols-sharp form--icon">mail</span>
            <label class="form--label">Email</label>
          </div>
          <div class="form--input--control">
            <input type="password" required="" name="usuario-senha" id="usuario-senha" class="form--input" maxlength="24">
            <span class="material-symbols-sharp form--icon">vpn_key</span>
            <label class="form--label">Senha</label>
          </div>
          <div class="form--input--control">
            <input type="password" required="" name="usuario-senha-repeat" id="usuario-senha-repeat" class="form--input" maxlength="24">
            <span class="material-symbols-sharp form--icon">vpn_key</span>
            <label class="form--label">Repita a Senha</label>
          </div>
          <input type="button" value="Próximo" id="step1next">
        </div>

        <div id="login--step2" class="swiper-slide">
          
          <span id="cep--alert" class="alert"><p>* CEP incompleto.</p></span>
          <span id="rua--alert" class="alert"><p>* Nome da rua aceita apenas letras e números com no mín. 6 dígitos.</p></span>
          <span id="numero--alert" class="alert"><p>* Número da rua aceita apenas números de até 6 dígitos.</p></span>
          <span id="uf--alert" class="alert"><p>* UF aceita apenas siglas de 2 dígitos.</p></span>
          <span id="bairro--alert" class="alert"><p>* Nome do bairro aceita apenas letras e números com no mín. 5 dígitos.</p></span>
          <span id="referencia--alert" class="alert"><p>* A referência aceita apenas letras e números.</p></span>

          <div class="form--input--control">
            <input type="text" required="" name="endereco-cep" id="endereco-cep" class="form--input">
            <span class="material-symbols-sharp form--icon">location_on</span>
            <label class="form--label">CEP</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="endereco-rua" id="endereco-rua" class="form--input" maxlength="100">
            <span class="material-symbols-sharp form--icon">add_road</span>
            <label class="form--label">Rua</label>
          </div>
          <div class="form--input--control">
            <input type="number" required="" name="endereco-numero" id="endereco-numero" class="form--input" min="1" max="999999">
            <span class="material-symbols-sharp form--icon">tag</span>
            <label class="form--label">Número da Rua</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="endereco-UF" id="endereco-UF" class="form--input" maxlength="2">
            <span class="material-symbols-sharp form--icon">tag</span>
            <label class="form--label">UF</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="endereco-bairro" id="endereco-bairro" class="form--input" maxlength="100">
            <span class="material-symbols-sharp form--icon">villa</span>
            <label class="form--label">Bairro</label>
          </div>
          <div class="form--input--control">
            <input type="text" name="endereco-referencia" id="endereco-referencia" class="form--input" maxlength="30">
            <span class="material-symbols-sharp form--icon">multiple_stop</span>
            <label class="form--label">Referência (Opcional)</label>
          </div>
          <div class="step--buttons">
            <input type="button" value="Voltar" id="step2back">
            <input type="button" value="Próximo" id="step2next">
          </div>
        </div>

        <div id="login--step3" class="swiper-slide">
          
          <span id="celular--alert" class="alert"><p>* Número de celular incompleto.</p></span>
          <span id="cpf--alert" class="alert"><p>* CPF incompleto.</p></span>
          <span id="cnpj--alert" class="alert"><p>* CNPJ incompleto.</p></span>

          <div class="form--input--control">
            <input type="text" required="" name="usuario-celular" id="usuario-celular" class="form--input">
            <span class="material-symbols-sharp form--icon">call</span>
            <label class="form--label">Celular</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="usuario-cpf" id="usuario-cpf" class="form--input">
            <span class="material-symbols-sharp form--icon">contact_page</span>
            <label class="form--label">CPF</label>
          </div>
          <div class="form--input--control">
            <input type="text" required="" name="usuario-cnpj" id="usuario-cnpj" class="form--input">
            <span class="material-symbols-sharp form--icon">contact_page</span>
            <label class="form--label">CNPJ</label>
          </div>
          <div class="step--buttons">
            <input type="button" value="Voltar" id="step3back">
            <input type="submit" value="Concluir" name="enviar" id="step3next">
          </div>
        </div>
        
      </form>

    </div>

    <?php
      $erro = $_GET["error"];
      echo "<div class='register-error'>$erro</div>";
    ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  
  <script src="../../js/classRegisterInputValidation/RegisterInputValidation.js"></script>
  
  <script src="../../js/classFormMask/classFormMask.js"></script>
  <script src="../../js/validation/register--defineMasks.js"></script>

  <script src="../../js/interactivity/register--swiper.js"></script>
  <script src="../../js/interactivity/register--changeColorSteps.js"></script>
  <script src="../../js/interactivity/register--cepSearch.js"></script>
</body>

</html>