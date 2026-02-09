let usernameField = document.getElementById("username");
let passwordField = document.getElementById("password");
let repeatPasswordField = document.getElementById("repeatPassword");


async function checkForm() {
  let submit = true;

  let usernameIsValid = await checkUsername();
  if(!usernameIsValid) {
    submit = false;
  }
  
  if(!checkPassword()) {
    submit = false;
  }

  if (!checkRepeatPassword()) {
    submit = false;
  }

 /* if(submit) {
    document.getElementById("register-form").submit();
  } else {
    event.preventDefault();
  }*/

  return submit;

}

async function checkUsername() {
  usernameField.classList.remove("error");
  usernameField.classList.remove("valid");

  if(usernameField.value.length === 0) {
    usernameField.classList.add("error");
    return false;
  }

  const url = `ajax_check_user.php?user=${encodeURIComponent(usernameField.value)}`;
  const response = await fetch(url);
  if ((usernameField.value.length < 3) || response.status !== 404) {
    usernameField.classList.add("error");
    return false;
  }
  usernameField.classList.add("valid");
  return true;
}

function checkPassword() {
  passwordField.classList.remove("error");
  passwordField.classList.remove("valid");
  if (passwordField.value.length < 8) {
    passwordField.classList.add("error");
    checkRepeatPassword();
    return false;
  }
  passwordField.classList.add("valid");
  checkRepeatPassword();
  return true;
}

function checkRepeatPassword() {
  repeatPasswordField.classList.remove("error");
  repeatPasswordField.classList.remove("valid");
  if ((repeatPasswordField.value.length === 0) || (repeatPasswordField.value !== passwordField.value)) {
    repeatPasswordField.classList.add("error");
    return false;
  } 
  repeatPasswordField.classList.add("valid");
  return true;
}
