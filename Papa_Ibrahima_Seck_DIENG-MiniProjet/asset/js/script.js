// alert('dddddddddd');

function connexion() {
   readTextFile("asset/json/infoConnexion.json", function (text) {
      var data = JSON.parse(text);
      var login = document.getElementById("login").value;
      var password = document.getElementById("password").value;
      for (let i = 0; i < data.length; i++) {
         if (login == data[i].login) {
            if (password == data[i].password) {
               if (data[i].role == "admin") {
                  document.getElementById("loginBis").value = login;
                  document.getElementById("passwordBis").value = password;
                  document.getElementById("role").value = "admin";
                  document.getElementById('theform').submit();
                  return;
               } else {
                  sessionStorage.setItem("score", data[i].score);
                  document.getElementById("loginBis").value = login;
                  document.getElementById("passwordBis").value = password;
                  document.getElementById("role").value = "joueur";
                  document.getElementById('theform').submit();
                  return;
               }
            } else {
               var tooltipPassword = document.getElementById("tooltipPassword");
               tooltipPassword.style.visibility = "visible";
               window.stop();
               return;
            }
         }
      }
      var tooltipLogin = document.getElementById("tooltipLogin");
      tooltipLogin.style.visibility = "visible";
      window.stop();

   });
}

function deactivateTooltips() {
   var tooltips = document.querySelectorAll('.tooltip'),
      tooltipsLength = tooltips.length;
   for (var i = 0; i < tooltipsLength; i++) {
      tooltips[i].style.visibility = 'hidden';
   }

}

deactivateTooltips();

function readTextFile(file, callback) {
   var rawFile = new XMLHttpRequest();
   rawFile.overrideMimeType("application/json");
   rawFile.open("GET", file, true);
   rawFile.onreadystatechange = function () {
      if (rawFile.readyState === 4 && rawFile.status == "200") {
         callback(rawFile.responseText);
      }
   }
   rawFile.send(null);
}

