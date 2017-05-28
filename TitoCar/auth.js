
function logIn() {
  let email = document.getElementById("email").value;
  let pass = document.getElementById("password").value;
  let params = "email="+ email + "&pass=" + pass;

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "login.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if(this.responseText == 1){
        window.location.assign("index.php");
      }else{
        console.log("no correcto");
        document.getElementById('error').style.display='block';
      }
    }
  }
  xmlhttp.send(params);
}


function logOut() {

  document.getElementById('singUp').style.display='block';
  document.getElementById('singIn').style.display='block';
  document.getElementById('emailS').innerHTML = "";
  document.getElementById('emailDisplay').style.display='none';

}

function formValidation(email,pass) {

var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
if (!expresion.test(email)){
    return 0;
}


if(pass.length < 8 ){
    return 1;
}
  return 2;
}


function singUp() {
  document.getElementById('errorSingUp').style.display='none';
  document.getElementById('success').style.display='none';
  document.getElementById('errorE').style.display='none';
  document.getElementById('errorP').style.display='none';

  let email = document.getElementById("emailR").value;
  let pass = document.getElementById("passR").value;
  let val = formValidation(email,pass);
console.log(val);
  if (val == 2){
    let params = "email="+ email + "&pass=" + pass;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "singUp.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == 1){

          document.getElementById('success').style.display='block';
        }else{
          console.log(this.responseText );

          document.getElementById('errorSingUp').style.display='block';
        }
      }
    }
    xmlhttp.send(params);
  }else{

    if (val == 0) {
        document.getElementById('errorE').style.display='block';
    } else {
        document.getElementById('errorP').style.display='block';
    }

  }

}
