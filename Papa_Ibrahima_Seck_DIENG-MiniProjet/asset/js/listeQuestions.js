try{
    let activeCourant=sessionStorage.getItem("activeCourant");
    activeCourant.classList.remove("active");
    let listeQuestions=document.getElementById("listeQuestions");
    listeQuestions.classList.add("active");
    sessionStorage.setItem("activeCourant", listeQuestions);
} catch(ex){
    let listeQuestions=document.getElementById("listeQuestions");
    listeQuestions.classList.add("active");
    sessionStorage.setItem("activeCourant", listeQuestions);
}
let iconeListeQuestions=document.getElementById("iconeListeQuestions");
desactiverCouleurIcone();
iconeListeQuestions.src="../asset/img/Images/Icones/ic-liste-active.png";
    let data= question;
    sessionStorage.setItem("question", 0);
    let listeQuestionsJeu = document.getElementById("listeQuestionsJeu");
    for (let i=sessionStorage.getItem("question");i<data.length && i<sessionStorage.getItem("question")+4;i++){
        let divQuestion= document.createElement("div");
        let question= document.createElement("span");
        question.innerHTML=parseInt(i, 10)+1+". "+data[i].question;
        question.style.display="block";
        divQuestion.appendChild(question);
        if (data[i].typeReponse=="Choix multiple") {
            for (let index = 0; index < data[i].reponses.length; index++) {
                let divReponse=document.createElement("div");
                let input=document.createElement("input");
                let label=document.createElement("label");
                divReponse.style.marginLeft="24px";
                divReponse.style.fontWeight="bold";
                input.id="reponse";
                input.type="checkbox";
                input.readOnly=true;
                if (data[i].reponseCorrecte.indexOf(data[i].reponses[index])!=-1) {
                    input.checked="on";
                }
                label.for="reponse";
                label.innerHTML=data[i].reponses[index];
                divReponse.appendChild(input);
                divReponse.appendChild(label);
                divQuestion.appendChild(divReponse);
            }
        }
        if (data[i].typeReponse=="Choix simple") {
            for (let index = 0; index < data[i].reponses.length; index++) {
                let divReponse=document.createElement("div");
                let input=document.createElement("input");
                let label=document.createElement("label");
                divReponse.style.marginLeft="25px";
                divReponse.style.fontWeight="bold";
                input.id="reponse";
                input.type="radio";
                input.readOnly=true;
                if (data[i].reponseCorrecte.indexOf(data[i].reponses[index])!=-1) {
                    input.checked="on";
                }
                label.for="reponse";
                label.innerHTML=data[i].reponses[index];
                divReponse.appendChild(input);
                divReponse.appendChild(label);
                divQuestion.appendChild(divReponse);
            }
        }
        if (data[i].typeReponse=="Choix texte") {
            for (let index = 0; index < data[i].reponses.length; index++) {
                let divReponse=document.createElement("div");
                let input=document.createElement("input");
                divReponse.style.marginLeft="25px";
                divReponse.style.fontWeight="bold";
                input.style.fontWeight="bold";
                input.id="reponse";
                input.type="text";
                input.value=data[i].reponses[index];
                input.readOnly=true;
                divReponse.appendChild(input);
                divQuestion.appendChild(divReponse);
            }
        }
        listeQuestionsJeu.appendChild(divQuestion);
    }
    let session=parseInt(sessionStorage.getItem("question"), 10)+4;
    sessionStorage.setItem("question", session);
let btnSuivantQuestionsParJeu=document.getElementById('btnSuivantQuestionsParJeu');
btnSuivantQuestionsParJeu.addEventListener("click", function(){
        let data= question;
        if (sessionStorage.getItem("question")<data.length) {
            let listeQuestionsJeu = document.getElementById("listeQuestionsJeu");
            listeQuestionsJeu.innerHTML="";
            let limite=parseInt(sessionStorage.getItem("question"), 10)+4;
            for (let i=sessionStorage.getItem("question");i<data.length && i<limite;i++){
                let divQuestion= document.createElement("div");
                let question= document.createElement("span");
                question.innerHTML=parseInt(i, 10)+1+". "+data[i].question;
                question.style.display="block";
                divQuestion.appendChild(question);
                if (data[i].typeReponse=="Choix multiple") {
                    for (let index = 0; index < data[i].reponses.length; index++) {
                        let divReponse=document.createElement("div");
                        let input=document.createElement("input");
                        let label=document.createElement("label");
                        divReponse.style.marginLeft="24px";
                        divReponse.style.fontWeight="bold";
                        input.id="reponse";
                        input.type="checkbox";
                        input.readOnly=true;
                        if (data[i].reponseCorrecte.indexOf(data[i].reponses[index])!=-1) {
                            input.checked="on";
                        }
                        label.for="reponse";
                        label.innerHTML=data[i].reponses[index];
                        divReponse.appendChild(input);
                        divReponse.appendChild(label);
                        divQuestion.appendChild(divReponse);
                    }
                }
                if (data[i].typeReponse=="Choix simple") {
                    for (let index = 0; index < data[i].reponses.length; index++) {
                        let divReponse=document.createElement("div");
                        let input=document.createElement("input");
                        let label=document.createElement("label");
                        divReponse.style.marginLeft="25px";
                        divReponse.style.fontWeight="bold";
                        input.id="reponse";
                        input.type="radio";
                        input.readOnly=true;
                        if (data[i].reponseCorrecte.indexOf(data[i].reponses[index])!=-1) {
                            input.checked="on";
                        }
                        label.for="reponse";
                        label.innerHTML=data[i].reponses[index];
                        divReponse.appendChild(input);
                        divReponse.appendChild(label);
                        divQuestion.appendChild(divReponse);
                    }
                }
                if (data[i].typeReponse=="Choix texte") {
                    for (let index = 0; index < data[i].reponses.length; index++) {
                        let divReponse=document.createElement("div");
                        let input=document.createElement("input");
                        divReponse.style.marginLeft="25px";
                        divReponse.style.fontWeight="bold";
                        input.style.fontWeight="bold";
                        input.id="reponse";
                        input.type="text";
                        input.value=data[i].reponses[index];
                        input.readOnly=true;
                        divReponse.appendChild(input);
                        divQuestion.appendChild(divReponse);
                    }
                }
                listeQuestionsJeu.appendChild(divQuestion);
            }
            let session=parseInt(sessionStorage.getItem("question"), 10)+4;
            sessionStorage.setItem("question", session);
        }
        else{
            alert("La Liste des questions est terminée");
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
