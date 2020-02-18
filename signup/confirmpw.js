//grabs information from the page about the inputs
var password = document.getElementById("password")
  , cfpassword = document.getElementById("cfpassword");

//tells user the passwords dont match if they do not match
function validatePassword(){
  if(password.value != cfpassword.value) {
    cfpassword.setCustomValidity("Passwords Don't Match");
  } else {
    cfpassword.setCustomValidity('');
  }
}

//attempts to validate again if the cfpassword field is updated
password.onchange = validatePassword;
cfpassword.onkeyup = validatePassword;