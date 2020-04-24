var formIns=document.getElementById('formIns');
formIns.addEventListener('submit',function(e){			
    $.getJSON('../asset/json/infoConnexion.json',function(data){
        let login = document.getElementById("loginIns").value;
        let prenomIns = document.getElementById("prenomIns").value;
        let nomIns = document.getElementById("nomIns").value;
        let passwordIns = document.getElementById("passwordIns").value;
        let passwordInsConf = document.getElementById("passwordInsConf").value;
        let verifLogin=verifierLogin(login), verifPrenom=verifierPrenom(prenomIns), verifNom=verifierNom(nomIns), verifPassword= verifierPassword(passwordIns);
        let verifIdentiquePasswords=verifierIdentiquePasswords(passwordIns, passwordInsConf), verifExistanceLogin=verifierExistanceLogin(login, data);
        if (verifExistanceLogin==true) {
            window.stop();
        }
        else{
            if (verifPrenom==true && verifNom==true && verifLogin==true && verifPassword==true && verifIdentiquePasswords==true) {
                alert("Admin créé avec succès !");
            }
            else{
                window.stop();
            }
            
        }
    });
});
function verifierExistanceLogin(login, data){
    for (i=0;i<data.length;i++){
        if (login==data[i].login) {
            var tooltipLoginIns = document.getElementById("tooltipLoginIns");
            tooltipLoginIns.innerHTML="Le Login choisi existe déjà";
            tooltipLoginIns.style.display="inline";
            return true;
        }
    }
    return false;
}
function verifierIdentiquePasswords(passwordIns, passwordInsConf){
    if (passwordIns==passwordInsConf) {
        return true;
    }
    else{
        var tooltipPasswordConfIns = document.getElementById("tooltipPasswordConfIns");
        var passwordInsConf=document.getElementById("passwordInsConf");
        passwordInsConf.value="";
        tooltipPasswordConfIns.innerText="Ce champ doit-etre identique au champ password";
        tooltipPasswordConfIns.style.display="inline"; 
        return false;
    }
}
function verifierPrenom(prenomIns){
    if(prenomIns!=""){
        return true;
    }
    else{
        var tooltipPrenomIns = document.getElementById("tooltipPrenomIns");
        tooltipPrenomIns.innerHTML="Le Prenom ne doit pas être vide";
        tooltipPrenomIns.style.display="inline";
        return false;
    }
}
function verifierNom(nomIns){
    if(nomIns!=""){
        return true;
    }
    else{
        var tooltipNomIns = document.getElementById("tooltipNomIns");
        tooltipNomIns.innerHTML="Le Nom ne doit pas être vide";
        tooltipNomIns.style.display="inline";
        return false;
    }
}
function verifierLogin(loginIns){
    if(loginIns!=""){
        return true;
    }
    else{
        var tooltipLoginIns = document.getElementById("tooltipLoginIns");
        tooltipLoginIns.innerHTML="Le Login ne doit pas être vide";
        tooltipLoginIns.style.display="inline";
        return false;
    }
}
function verifierPassword(passwordIns){
    if(passwordIns!=""){
        return true;
    }
    else{
        var tooltipPasswordIns = document.getElementById("tooltipPasswordIns");
        tooltipPasswordIns.innerHTML="Le Password ne doit pas être vide";
        tooltipPasswordIns.style.display="inline";
        return false;
    }
}
function deactivateTooltips() {
    let tooltips = document.querySelectorAll('.tooltipIns'),
        tooltipsLength = tooltips.length;
    for (let i = 0; i < tooltipsLength; i++) {
        tooltips[i].style.display = 'none';
    }
  
}
deactivateTooltips();