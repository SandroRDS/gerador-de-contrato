function searchCEP(){
  var cepInput = document.querySelector('#cep').value;
  console.log(cepInput)
  var url = `https://viacep.com.br/ws/${cepInput}/json/`;

  fetch(url).then(function(response){
    response.json().then(function(data){
      preencherCampos(data)
    });
  });

  function preencherCampos(dados){
    var rua = document.getElementById('rua');
    var bairroRua = document.getElementById('bairroRua')
    var UF = document.getElementById('UF');

    rua.value = dados.logradouro
    bairroRua.value = dados.bairro
    UF.value = dados.uf
  }
}

const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  allowTouchMove: false,
  autoHeight: true,
  centeredSlidesBounds: true,
  spaceBetween: 15,
});

const btnStep1Next = document.querySelector('#step1next');
const btnStep2Back = document.querySelector('#step2back');
const btnStep2Next = document.querySelector('#step2Next');
const btnStep3Back = document.querySelector('#step3back');

btnStep1Next.onclick = () => swiper.slideNext();
btnStep2Back.onclick = () => swiper.slidePrev();
btnStep2Next.onclick = () => swiper.slideNext();
btnStep3Back.onclick = () => swiper.slidePrev();

new FormMask(document.querySelector("#cep"), "_____-___", "_", ["-"])
new FormMask(document.querySelector("#celular"), "(__)_____-____", "_", ["(", ")", "-"])
new FormMask(document.querySelector("#cpf"), "___.___.___-__", "_", [".", "-"])
new FormMask(document.querySelector("#cnpj"), "__.___.___/____-__", "_", ["-", ".", "/"])

const step1 = document.getElementById('step1')
const separationStep1 = document.getElementById('separation--step1')
const step2 = document.getElementById('step2')
const separationStep2 = document.getElementById('separation--step2')

btnStep1Next.addEventListener("click", function () { 
  step1.style.borderColor = 'blueviolet'
  separationStep1.classList.add('ativo')
});

btnStep2Back.addEventListener("click", function () {
  step1.style.borderColor = '#1d1d1d'
  separationStep1.classList.remove('ativo')
});

btnStep2Next.addEventListener("click", function () {
  step2.style.borderColor = 'blueviolet'
  separationStep2.classList.add('ativo')
});

btnStep3Back.addEventListener("click", function () {
  step2.style.borderColor = '#1d1d1d'
  separationStep2.classList.remove('ativo')
});
