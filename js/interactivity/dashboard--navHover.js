const navItens = document.querySelectorAll('.nav--itens');
navItens.forEach((navItensValue) => {
  navItensValue.onmouseover = function () {
    navItensValue.classList.add('selected');
  };
  navItensValue.onmouseout = function () {
    navItensValue.classList.remove('selected');
  };
});