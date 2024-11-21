function verifierFormulaire() {
  const nameInput = document.getElementById('name');
  const prenomInput = document.getElementById('prenom');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const errorPassword = document.querySelector('.form-group small');
  const messageInput = document.getElementById('message');
  const formCheckInput = document.getElementById('formCheck-1');
  const formCheckLabel = document.querySelector('.form-check-label');

  if (emailInput.value == '' || !emailInput.value.includes('@')) {
    emailInput.style.borderColor = "red";
  } else {
    emailInput.style.borderColor = "green";
  }
  
  if (passwordInput.value == '') {
    passwordInput.style.borderColor = "red";

  } else if (passwordInput.value.length = 8) {
    passwordInput.style.borderColor = "red";
    errorPassword.classList.remove('invisible');
  } else {
    passwordInput.style.borderColor = "green";
    errorPassword.classList.add('invisible');
  }
  

  if (formCheckInput.checked) {
    formCheckLabel.style.color = "green";
  } else {
    formCheckLabel.style.color = "red";
  }

  if (nameInput.value == '') {
      nameInput.style.borderColor = "red";
  } else {
      nameInput.style.borderColor = "green";
  }

  if (prenomInput.value == '') {
      prenomInput.style.borderColor = "red";
  } else {
      prenomInput.style.borderColor = "green";
  }

  if (messageInput.value == '') {
    messageInput.style.borderColor = "red";
} else {
    messageInput.style.borderColor = "green";
  }
}