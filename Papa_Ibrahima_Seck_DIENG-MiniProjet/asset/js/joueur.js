function myFunction() {
    if (confirm("Etes-vous sûr de vouloir vous déconnecter ?")){
        window.location.href = "deconnexion.php";
    } 
}
if (questionCourante==nbreQuestionJeu){
    recapitulatifQuizz(questionsDuJeu, questionCourante);
}
else{
    let btnQuitterJeu=document.getElementById("btnQuitterJeu");
    btnQuitterJeu.addEventListener("click", function (e) {
        if (confirm("Etes-vous sûr de vouloir quitter ce quizz ?")){
            recapitulatifQuizz(questionsDuJeu, questionCourante);
        }
        e.preventDefault();
    });
    var total_seconds = 15 * 1;
    var c_minutes = parseInt(total_seconds / 60);
    var c_seconds = parseInt(total_seconds % 60);
    var timer;
    timer = setTimeout(CheckTime, 1000);
}
let tableMeilleursScores = document.getElementById("tableMeilleursScores");
tableMeilleursScores.innerHTML="";
let div=document.createElement('div');
div.innerHTML=sessionStorage.getItem("score")+" pts";
div.style.width="100%";
div.style.height="100px";
div.style.fontSize="70px";
div.style.fontWeight="bold";
div.style.marginTop="30px";
tableMeilleursScores.appendChild(div);
let topScores=document.getElementById('topScores');
topScores.style.backgroundColor="rgb(81,191,208)";

topScores.addEventListener("click", function(){
        let monMeilleurScore=document.getElementById('monMeilleurScore');
        monMeilleurScore.style.backgroundColor="rgb(81,191,208)";
        topScores.style.backgroundColor="white";
        let data= infosConn;
        data=trierTableauJoueurs(data);
        let tableMeilleursScores = document.getElementById("tableMeilleursScores");
        tableMeilleursScores.innerHTML="";
        for (let i=0;i<5;i++){
            let trInfos= document.createElement("tr");
            let tdNom= document.createElement("td");
            let tdScore= document.createElement("td");
            tdNom.style.width="70%";
            tdScore.style.width="25%";
            tdNom.innerHTML=data[i].prenom+" "+data[i].nom;
            tdScore.innerHTML=data[i].score+" pts";
            if(i==0){
                tdScore.style.borderBottom="2px solid green";
            }
            if(i==1){
                tdScore.style.borderBottom="2px solid blue";
            }
            if(i==2){
                tdScore.style.borderBottom="2px solid yellow";
            }
            if(i==3){
                tdScore.style.borderBottom="2px solid orange";
            }
            if(i==4){
                tdScore.style.borderBottom="2px solid red";
            }
            trInfos.appendChild(tdNom);
            trInfos.appendChild(tdScore);
            tableMeilleursScores.appendChild(trInfos);
        }    
});
let monMeilleurScore=document.getElementById('monMeilleurScore');
monMeilleurScore.addEventListener("click", function(){
    let topScores=document.getElementById('topScores');
    topScores.style.backgroundColor="rgb(81,191,208)";
    monMeilleurScore.style.backgroundColor="white";
    let tableMeilleursScores = document.getElementById("tableMeilleursScores");
    tableMeilleursScores.innerHTML="";
    let div=document.createElement('div');
    div.innerHTML=scoreJoueur+" pts";
    div.style.width="100%";
    div.style.height="100px";
    div.style.fontSize="70px";
    div.style.fontWeight="bold";
    div.style.marginTop="30px";
    tableMeilleursScores.appendChild(div);
});
function trierTableauJoueurs(data){
    let echangeur;
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
function verificationReponsesEntrees(reponsesEntrees, reponsesCorrectes){
    if (reponsesCorrectes.length!=reponsesEntrees.length) {
		return false;
	}
	for (let i=0; i < reponsesCorrectes.length; i++) { 
		if (reponsesEntrees.indexOf(reponsesCorrectes[i])==-1) {
			return false;
		}
	}
	return true;
}
function CheckTime() {
    document.getElementById("quiz-time-left").innerHTML = c_seconds + ' secondes ';
    if (total_seconds <= 0) {
        let btnSuivantJeu=document.getElementById("btnSuivantJeu");
        btnSuivantJeu.click();
    } 
    else {
        total_seconds = total_seconds - 1;
        c_minutes = parseInt(total_seconds / 60);
        c_seconds = parseInt(total_seconds % 60);
        timer = setTimeout(CheckTime, 1000);
    }
}
function recapitulatifQuizz(questionsDuJeu, questionCourante) {
    let data= questionsDuJeu;
    let zoneJeu = document.getElementById("zoneJeu");
    zoneJeu.innerHTML="";
    let correction=document.createElement("p");
    correction.innerHTML="Vous avez realise un Score de "+nombrePointsJoueur+" pts.";
    correction.style.textAlign="center";
    correction.style.border="2px solid rgb(81,191,208)";
    correction.style.width="90%";
    correction.style.height="50px";
    correction.style.paddingTop="10px";
    correction.style.marginLeft="5%";
    correction.style.fontSize="30px";
    correction.style.fontWeight="bold";
    correction.style.background="rgb(239, 239, 239)";
    zoneJeu.appendChild(correction);
    let btnRejouer=document.createElement("a");
    btnRejouer.innerHTML="Rejouer";
    btnRejouer.href="joueur.php";
    btnRejouer.style.textDecoration="none"
    btnRejouer.style.textAlign="center";
    btnRejouer.style.border="2px solid rgb(81,191,208)";
    btnRejouer.style.width="30%";
    btnRejouer.style.height="35px";
    btnRejouer.style.marginLeft="40%";
    btnRejouer.style.fontSize="25px";
    btnRejouer.style.color="white";
    btnRejouer.style.borderRadius="2px";
    btnRejouer.style.background="rgb(81,191,208)";
    btnRejouer.id="btnRejouer";
    btnRejouer.name="btnRejouer";
    zoneJeu.appendChild(btnRejouer);
    for (let i=0;i<questionCourante;i++){
        let divQuestion= document.createElement("div");
        let question= document.createElement("span");
        let image= document.createElement("img");
        image.style.marginTop="20px";
        question.innerHTML=parseInt(i, 10)+1+". "+data[i].question+"("+data[i].nbrePoints+" points)";
        if(verificationReponsesEntrees(tableauReponsesEntrees[i], data[i].reponseCorrecte)){
            image.src="../asset/img/Icones/cochevrai.png";
        }
        else{
            image.src="../asset/img/Icones/cochefaux.png";
        }
        divQuestion.appendChild(question);
        divQuestion.appendChild(image);
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
        zoneJeu.appendChild(divQuestion);
    }
}