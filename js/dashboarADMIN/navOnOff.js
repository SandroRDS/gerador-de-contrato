const navBtn = document.getElementById('close--open-nav');
const nav = document.getElementById('nav');
const menuI = document.getElementById('menu--icon');
const textItens = document.querySelector('.menu--itens-text');
const navItens = document.querySelectorAll('.nav--itens');

navBtn.addEventListener('click', function(){
  nav.classList.toggle('active');
  menuI.classList.toggle('active');
});

navItens.forEach((navItensValue) => {
  navItensValue.onmouseover = function () {
    navItensValue.classList.add('selected');
  };
  navItensValue.onmouseout = function () {
    navItensValue.classList.remove('selected');
  };
});






