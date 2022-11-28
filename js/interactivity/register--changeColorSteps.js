const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');

const separationStep1 = document.getElementById('separation--step1');
const separationStep2 = document.getElementById('separation--step2');

btnStep1Next.addEventListener("click", () => { 
  step1.style.borderColor = 'blueviolet';
  separationStep1.classList.add('ativo');
});

btnStep2Back.addEventListener("click", () => {
  step1.style.borderColor = '#1d1d1d';
  separationStep1.classList.remove('ativo');
});

btnStep2Next.addEventListener("click", () => {
  step2.style.borderColor = 'blueviolet';
  separationStep2.classList.add('ativo');
});

btnStep3Back.addEventListener("click", () => {
  step2.style.borderColor = '#1d1d1d';
  separationStep2.classList.remove('ativo');
});