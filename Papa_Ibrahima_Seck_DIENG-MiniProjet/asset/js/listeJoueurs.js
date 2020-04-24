$(document).ready(function(){
    $.getJSON('../asset/json/infoConnexion.json',function(data){
        sessionStorage.setItem("joueur", 0);
        let tableListeJoueurs = document.getElementById("tableListeJoueurs");
        for (let i=sessionStorage.getItem("joueur");(i<data.length && i<(sessionStorage.getItem("joueur")+13));i++){
            let trInfos= document.createElement("tr");
            let tdNom= document.createElement("td");
            let tdPrenom= document.createElement("td");
            let tdScore= document.createElement("td");
            tdNom.innerHTML=data[i].nom;
            tdPrenom.innerHTML=data[i].prenom;
            tdScore.innerHTML=data[i].score+" pts";
            trInfos.appendChild(tdNom);
            trInfos.appendChild(tdPrenom);
            trInfos.appendChild(tdScore);
            tableListeJoueurs.appendChild(trInfos);
        }
        let session=parseInt(sessionStorage.getItem("joueur"), 10)+13;
        sessionStorage.setItem("joueur", session);
    });
});
let btnSuivantJoueurs=document.getElementById('btnSuivantJoueurs');
btnSuivantJoueurs.addEventListener("click", function(){
    $.getJSON('../asset/json/infoConnexion.json',function(data){
        if (sessionStorage.getItem("joueur")<data.length) {
            let tableListeJoueurs = document.getElementById("tableListeJoueurs");
            tableListeJoueurs.innerHTML="";
            let tr1= document.createElement("tr");
            let thNom= document.createElement("th");
            let thPrenom= document.createElement("th");
            let thScore= document.createElement("th");
            thNom.innerHTML="Nom";
            thPrenom.innerHTML="Prenom";
            thScore.innerHTML="Score";
            tr1.appendChild(thNom);
            tr1.appendChild(thPrenom);
            tr1.appendChild(thScore);
            tableListeJoueurs.appendChild(tr1);
            for (var i=sessionStorage.getItem("joueur");(i<data.length && i<(sessionStorage.getItem("joueur")+13));i++){
                let trInfos= document.createElement("tr");
                let tdNom= document.createElement("td");
                let tdPrenom= document.createElement("td");
                let tdScore= document.createElement("td");
                tdNom.innerHTML=data[i].nom;
                tdPrenom.innerHTML=data[i].prenom;
                tdScore.innerHTML=data[i].score;
                trInfos.appendChild(tdNom);
                trInfos.appendChild(tdPrenom);
                trInfos.appendChild(tdScore);
                tableListeJoueurs.appendChild(trInfos);
            }
            let session=parseInt(sessionStorage.getItem("joueur"), 10)+13;
            sessionStorage.setItem("joueur", session);
        }
        else{
            alert("La Liste des Joueurs est terminée");
        } 
    });
});