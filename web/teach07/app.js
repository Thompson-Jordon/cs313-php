function submitCheck(pass1, pass2) {
  let regex = "/^(?=.*d).{7,}$/";
  //return true; /*note to self, remove this :)*/
  
    let position = pass1.search(regex);

    if (position >= 0) {
        //it's good
        clearError();
        return true;
    }
    else {
        //it's bad
        indicateError();
        return false;
    }
  
}

function passwordsMatch(pass1, pass2) {
  if (!pass1.match(pass2)) {
    indicateError();
    return false;
  } else {
    clearError();
    return true;
  }
}

function indicateError() {
  document.getElementById("password").style.borderColor = "red";
  document.getElementById("verifypassword").style.borderColor = "red";
}

function clearError() {
    document.getElementById("password").style.borderColor = "transparent";
    document.getElementById("verifypassword").style.borderColor = "transparent";
}