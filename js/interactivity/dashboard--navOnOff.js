const navBtn = document.getElementById('close--open-nav');
const nav = document.getElementById('nav');
const menuI = document.getElementById('menu--icon');

navBtn.addEventListener('click', function(){
  nav.classList.toggle('active');
  menuI.classList.toggle('active');
});






