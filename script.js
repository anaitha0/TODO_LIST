function validateSignUp() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var nameError = document.getElementById("name-error");
    var emailError = document.getElementById("email-error");
    var passwordError = document.getElementById("password-error");
    var isValid = true;
    nameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    if (name == "") {
      nameError.innerHTML = "Please enter your name";
      isValid = false;
    }
    if (email == "") {
      emailError.innerHTML = "Please enter an email";
      isValid = false;
    }
    if (password == "") {
      passwordError.innerHTML = "Please enter a password";
      isValid = false;
    }
    return isValid;
  }

  function validateLogin() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var emailError = document.getElementById("email-error");
    var passwordError = document.getElementById("password-error");
    var isValid = true;
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    if (email == "") {
      emailError.innerHTML = "Please enter an email";
      isValid = false;
    }
    if (password == "") {
      passwordError.innerHTML = "Please enter a password";
      isValid = false;
    }
    return isValid;
  }
  
  