function connexion(){
    $.getJSON('asset/json/infoConnexion.json',function(data){
      var login = document.getElementById("login").value;
      var password = document.getElementById("password").value;
      for (i=0;i<data.length;i++){
          if (login==data[i].login) {
              if (password==data[i].password) {
                  if (data[i].role=="admin") {
                    document.getElementById("loginBis").value=login;
                    document.getElementById("passwordBis").value=password;
                    document.getElementById("role").value="admin";
                    document.getElementById('theform').submit();
                    return;
                  }
                  else{
                    document.getElementById("loginBis").value=login;
                    document.getElementById("passwordBis").value=password;
                    document.getElementById("role").value="joueur";
                    document.getElementById('theform').submit();
                    return; 
                  }
              }
              else{
                  var tooltipPassword = document.getElementById("tooltipPassword");
                  tooltipPassword.style.visibility="visible";
                  window.stop(); 
                  return;
              }
          }
      }
      var tooltipLogin = document.getElementById("tooltipLogin");
      tooltipLogin.style.visibility="visible";
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
document.querySelector('#listeQuestion').addEventListener('click', function(){
  
});


  