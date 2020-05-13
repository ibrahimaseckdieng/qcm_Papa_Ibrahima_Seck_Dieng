let listeJoueurs=document.getElementById("listeJoueurs");
listeJoueurs.classList.add("active");
let iconeListeJoueurs=document.getElementById("iconeListeJoueurs");
desactiverCouleurIcone();
iconeListeJoueurs.src="../asset/img/Images/Icones/ic-liste-active.png";
    let data= infosConn;
    data=trierTableauJoueurs(data);
    sessionStorage.setItem("joueur", 0);
    let tableListeJoueurs = document.getElementById("tableListeJoueurs");
    for (let i=sessionStorage.getItem("joueur");(i<data.length && i<(sessionStorage.getItem("joueur")+15));i++){
        if (data[i].role=="joueur") {
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
    }
    let session=parseInt(sessionStorage.getItem("joueur"), 10)+15;
    sessionStorage.setItem("joueur", session);
let btnSuivantJoueurs=document.getElementById('btnSuivantJoueurs');
btnSuivantJoueurs.addEventListener("click", function(){
        let data= infosConn;
        data=trierTableauJoueurs(data);
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
            let limite=parseInt(sessionStorage.getItem("question"), 10)+15;
            for (let i=sessionStorage.getItem("joueur");i<data.length && i<limite;i++){
                if (data[i].role=="joueur") {
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
            }
            let session=parseInt(sessionStorage.getItem("joueur"), 10)+15;
            sessionStorage.setItem("joueur", session);
        }
        else{
            alert("La Liste des Joueurs est terminée");
        } 
});
function readTextFile(file, callback) {
    let rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}
function trierTableauJoueurs(data){
    let echangeur;
    for (let index = 0; index < data.length; index++) {
        if (data[index].role=="admin") {
            data.splice(index, 1); 
        }   
    }
    for (let index = 0; index < data.length; index++) {
        for (let k = 0; k < data.length; k++) {
            if (data[index].score>data[k].score) {
                echangeur=data[k];
                data[k]=data[index];
                data[index]=echangeur;
            }    
        } 
    }
    return data;
}
function desactiverCouleurIcone(){
    let icone = document.querySelectorAll('.iconeMenu'),
        iconeLength = icone.length;
    for (let i = 0; i < iconeLength; i++) {
        if(icone[i].src=="../asset/img/Images/Icones/ic-liste-active.png"){
            icone[i].src=="../asset/img/Images/Icones/ic-liste.png"
        }
        if(icone[i].src=="../asset/img/Images/Icones/ic-ajout-active.png"){
            icone[i].src=="../asset/img/Images/Icones/ic-ajout.png"
        }
    }
}