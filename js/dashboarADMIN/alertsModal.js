const changeAccStatus = document.getElementById('changeAccStatus');
const confirmChangeAlert = document.getElementById('confirm--change--alert');
const confirmChangeAlertCancel = document.getElementById('confirm--change--alert--cancel');

changeAccStatus.addEventListener('click', () => {
  confirmChangeAlert.style.visibility = 'visible';
});

confirmChangeAlertCancel.addEventListener('click', () =>{
  confirmChangeAlert.style.visibility = 'hidden'
})