const usuarioNome = document.getElementById('usuario-nome');
const usuarioSobrenome = document.getElementById('usuario-sobrenome');
const usuarioEmail = document.getElementById('usuario-email');
const usuarioSenha = document.getElementById('usuario-senha');
const usuarioSenhaRepeat = document.getElementById('usuario-senha-repeat');
const stepOneNext = document.getElementById('step1next');
const stepTwoBack = document.getElementById('step2back');
var nameStatus = false;
var sobreStatus = false;
var emailStatus = false;
var passwordStatus = false;
var passwordRepeatStatus = false;

function updateSize(){
  swiper.on('update');
  swiper.update()
}

function validateName(){
  var nameValue = usuarioNome.value;
  const nameAlert = document.getElementById('name--alert');
  const namePattern = /^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/;

  if (nameValue.match(namePattern) &&nameValue.length >= 3) {
    usuarioNome.style.borderBottom = '1px solid blueviolet'
    nameAlert.style.display = 'none';
    nameStatus = true;
    updateSize()
  } else {
    nameStatus = false;
    usuarioNome.style.borderBottom = '1px solid red'
    nameAlert.style.display = 'flex';
    updateSize()
  }
}

function validateSobreName() {
  var sobreValue = usuarioSobrenome.value;
  const nameAlert = document.getElementById('name--alert');
  const namePattern = /^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/;

  if (sobreValue.match(namePattern) && sobreValue.length >= 3) {
    usuarioSobrenome.style.borderBottom = '1px solid blueviolet'
    nameAlert.style.display = 'none';
    sobreStatus = true;
    updateSize()
  } else {
    sobreStatus = false;
    usuarioSobrenome.style.borderBottom = '1px solid red'
    nameAlert.style.display = 'flex';
    updateSize()
  }
}

function validateEmail(){
  var emailValue = usuarioEmail.value;
  const emailAlert = document.getElementById('email--alert');
  var emailPattern =/^.+@\w+(\.\w+)+$/;

  if (emailValue.match(emailPattern)){
    usuarioEmail.style.borderBottom = '1px solid blueviolet'
    emailAlert.style.display = 'none';
    emailStatus = true;
    updateSize()
  } else{
    emailStatus = false;
    usuarioEmail.style.borderBottom = '1px solid red'
    emailAlert.style.display = 'flex';
    updateSize()
  }
}

function validatePassword() {
  var passwordValue = usuarioSenha.value;
  const passwordAlert = document.getElementById('password--alert')
  var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#-.])[0-9a-zA-Z$*&@#-.]{8,24}$/;

  if (passwordValue.match(passwordPattern)) {
    usuarioSenha.style.borderBottom = '1px solid blueviolet';
    passwordAlert.style.display = 'none';
    passwordStatus = true;
    updateSize()
  } else {
    passwordStatus = false;
    usuarioSenha.style.borderBottom = '1px solid red';
    passwordAlert.style.display = 'flex';
    updateSize()
  }
}

function validateRepeatPassword(){
  var passwordValue = usuarioSenha.value;
  const passwordRepeatAlert = document.getElementById('passwordRepeat--alert')
  var passwordRepeatValue = usuarioSenhaRepeat.value;

  if(passwordRepeatValue == passwordValue){
    usuarioSenhaRepeat.style.borderBottom = '1px solid blueviolet';
    passwordRepeatAlert.style.display = 'none'
    passwordRepeatStatus = true;
    updateSize()
  } else{
    passwordRepeatStatus = false;
    console.log(passwordRepeatStatus)
    usuarioSenhaRepeat.style.borderBottom = '1px solid red';
    passwordRepeatAlert.style.display = 'flex'
    updateSize()
  }
}

function nextStep1(){
  validateName()
  validateSobreName()
  validateEmail()
  validatePassword()
  validateRepeatPassword()
  if (emailStatus == true && passwordStatus == true && passwordRepeatStatus == true && nameStatus == true && sobreStatus == true){
    stepOneNext.onclick = () => swiper.slideNext();
    stepOneNext.click();
    step1.style.borderColor = 'blueviolet';
    separationStep1.classList.add('ativo');
  } else{
  }
}

function backStep1(){
  stepTwoBack.onclick = () => swiper.slidePrev();
  stepTwoBack.click()
}







