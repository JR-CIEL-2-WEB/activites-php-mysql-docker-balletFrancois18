function verifierFormulaire() {
  const nameInput = document.getElementById('name');
  const prenomInput = document.getElementById('prenom');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const errorPassword = document.querySelector('.form-group small');
  const messageInput = document.getElementById('message');
  const formCheckInput = document.getElementById('formCheck-1');
  const formCheckLabel = document.querySelector('.form-check-label');

  let isValid = true;

  if (baliseNom.value == '') {
      baliseNom.style.borderColor = "red";
      isValid = false;
  } else {
      baliseNom.style.borderColor = "";
  }

  if (balisePrénom.value == '') {
      balisePrénom.style.borderColor = "red";
      isValid = false;
  } else {
      balisePrénom.style.borderColor = "";
  }

  if (baliseEmail.value == '' || !baliseEmail.value.includes('@')) {
      baliseEmail.style.borderColor = "red";
      isValid = false;
  } else {
      baliseEmail.style.borderColor = "";
  }

  if (balisePassword.value == '') {
      balisePassword.style.borderColor = "red";
      isValid = false;
  } else if (balisePassword.value.length < 8){
      BaliseErrorpassword.classList.remove('invisible');
      balisePassword.style.borderColor = "red";
      isValid = false;
  } else {
      balisePassword.style.borderColor = "";
      BaliseErrorpassword.classList.add('invisible');
  }

  if (baliseMessage.value == '') {
      baliseMessage.style.borderColor = "red";
      isValid = false;
  } else {
      baliseMessage.style.borderColor = "";
  }

  if (baliseCheckbox.checked) {
      baliseLabel.style.color = "";
  } else {
      baliseLabel.style.color = "red";
      isValid = false;
  }
 
  return isValid;
}