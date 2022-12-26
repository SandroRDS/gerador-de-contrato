const confirmChangeAlert = document.getElementById('confirm--change--alert');
const confirmChangeAlertCancel = document.getElementById('confirm--change--alert--cancel');
const confirmChangeAlertAllow  = document.getElementById('confirm--change--alert--allow');
let funcao, dados;

const executarConfirmModal = (_funcao, ..._dados) => {
  confirmChangeAlert.style.visibility = 'visible';
  funcao = _funcao;
  dados = _dados;
}

const fecharModal = () => {
  confirmChangeAlert.style.visibility = 'hidden';
}

confirmChangeAlertCancel.onclick = () => fecharModal();
confirmChangeAlertAllow.onclick  = () => {
  fecharModal();
  funcao(dados);
}
