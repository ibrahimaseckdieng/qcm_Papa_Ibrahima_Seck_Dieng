<?php
function verifierInfosConn($login, $password, $infosConn){
	for ($i=0; $i < count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			if ($infosConn[$i]->password==$password) {
				return true;
			}
			else{
				return false;
			}
		}
	}
	return false;
}

function trouverRole($login, $infosConn){
	for ($i=0; $i < count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			return $infosConn[$i]->role;
		}
	}
	return $infosConn[$i]->role;
}
function trouverAvatar($login, $infosConn){
	for ($i=0; $i < count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			return $infosConn[$i]->avatar;
		}
	}
	return $infosConn[$i]->avatar;
}
function trouverNom($login, $infosConn){
	for ($i=0; $i < count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			return $infosConn[$i]->nom;
		}
	}
	return $infosConn[$i]->nom;
}
function trouverPrenom($login, $infosConn){
	for ($i=0; $i < count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			return $infosConn[$i]->prenom;
		}
	}
	return $infosConn[$i]->prenom;
}
function enregistrerUtilisateur($role){
	$json = file_get_contents("../asset/json/infoConnexion.json");
	$infosConn = json_decode($json);
	if (validationDonnees($_POST['loginIns'], $_POST['passwordIns'], $_POST['passwordInsConf'], $_POST['prenomIns'], $_POST['nomIns'], $infosConn)) {
		$uploaddir = '../asset/img/Avatar/';
		$uploadfile = $uploaddir.basename($_FILES['avatarIns']['name']);
		move_uploaded_file($_FILES['avatarIns']['tmp_name'], $uploadfile);
		array_push($infosConn, array('login' => $_POST['loginIns'],'password' => $_POST['passwordIns'], 'prenom' => $_POST['prenomIns'], 
		'nom' => $_POST['nomIns'], 'role' => $role, 'avatar' => 'asset/img/Avatar/'.$_FILES['avatarIns']['name'], 'score' => 0));
		file_put_contents('../asset/json/infoConnexion.json', json_encode($infosConn, true));
	}
}
function enregistrerQuestionTexte(){
	$json = file_get_contents("../asset/json/questions.json");
	$question = json_decode($json);
	$reponseCorrecte=array();
	array_push($reponseCorrecte, $_POST['reponse']);
	$reponses=array();
	array_push($reponses, $_POST['reponse']);
	array_push($question, array('question' => $_POST['questionAjoute'],'nbrePoints' => $_POST['nbrePointsQAjoute'], 
	'typeReponse' => $_POST['typeReponse'], 'reponseCorrecte' => $reponseCorrecte, 'reponses' => $reponses));
	file_put_contents('../asset/json/questions.json', json_encode($question, true));
}
function enregistrerQuestionSimple(){
	$json = file_get_contents("../asset/json/questions.json");
	$question = json_decode($json);
	array_push($question, array('question' => $_POST['questionAjoute'],'nbrePoints' => $_POST['nbrePointsQAjoute'], 
	'typeReponse' => $_POST['typeReponse'], 'reponseCorrecte' => getReponsesCorrectesS(), 'reponses' => getReponsesS()));
	file_put_contents('../asset/json/questions.json', json_encode($question, true));
}
function enregistrerQuestionMultiple(){
	$json = file_get_contents("../asset/json/questions.json");
	$question = json_decode($json);
	array_push($question, array('question' => $_POST['questionAjoute'],'nbrePoints' => $_POST['nbrePointsQAjoute'], 
	'typeReponse' => $_POST['typeReponse'], 'reponseCorrecte' => getReponsesCorrectesM(), 'reponses' => getReponsesM()));
	file_put_contents('../asset/json/questions.json', json_encode($question, true));
}
function validationDonnees($loginIns, $passwordIns, $passwordInsConf, $prenomIns, $nomIns, $infosConn){
	return(verifierExistanceLogin($loginIns, $infosConn)&&verifierIdentiquePasswords($passwordIns, $passwordInsConf)
			&&verifierPrenom($prenomIns)&&verifierNom($nomIns)&&verifierLogin($loginIns)&&verifierPassword($passwordIns));
}
function verifierExistanceLogin($loginIns, $infosConn){
    for ($i=0;$i<count($infosConn);$i++){
        if ($infosConn[$i]->login==$loginIns) {
            return false;
        }
    }
    return true;
}
function verifierIdentiquePasswords($passwordIns, $passwordInsConf){
    if ($passwordIns==$passwordInsConf) {
        return true;
    }
    else{
        return false;
    }
}
function verifierPrenom($prenomIns){
    if($prenomIns!=""){
        return true;
    }
    else{
        return false;
    }
}
function verifierNom($nomIns){
    if($nomIns!=""){
        return true;
    }
    else{
        return false;
    }
}
function verifierLogin($loginIns){
    if($loginIns!=""){
        return true;
    }
    else{
        return false;
    }
}
function verifierPassword($passwordIns){
    if($passwordIns!=""){
        return true;
    }
    else{
        return false;
    }
}

function verifierQuestion($question){
	if($question!=""){
        return true;
    }
    else{
        return false;
    }
}
function verifierNbrePoints($nbrePoints){
	if($nbrePoints!=""){
        return true;
    }
    else{
        return false;
    }
}
function verifierReponses(){
	$nbreReponsesCochees=0;
	foreach ($_POST as $key => $value) {
		if ($value=="") {
			return false;
		}
	}
	foreach ($_POST as $key => $value) {
		if ($value=="on") {
			return true;
		}
	}
	return false;
}
function getReponsesS(){
	$reponses=array();
	foreach ($_POST as $key => $value) {
		if($key!="questionAjoute" && $key!="nbrePointsQAjoute" && $key!="typeReponse" && $key!="btnEnregistrerQuestion" && $key!="reponse"){
			array_push($reponses, $value);
		}
	}
	return $reponses;
}
function getReponsesCorrectesS(){
	$reponsesCorrectes=array();
	$valeur="";
	foreach ($_POST as $key => $value) {
		if($key!="questionAjoute" && $key!="nbrePointsQAjoute" && $key!="typeReponse" && $key!="btnEnregistrerQuestion" && $key=="reponse"){
			array_push($reponsesCorrectes, $valeur);
		}
		$valeur=$value;
	}
	return $reponsesCorrectes;
}
function getReponsesM(){
	$reponses=array();
	foreach ($_POST as $key => $value) {
		if($key!="questionAjoute" && $key!="nbrePointsQAjoute" && $key!="typeReponse" && $key!="btnEnregistrerQuestion" && strstr($key, "checkboxRep")==FALSE){
			array_push($reponses, $value);
		}
	}
	return $reponses;
}
function getReponsesCorrectesM(){
	$reponsesCorrectes=array();
	$valeur="";
	foreach ($_POST as $key => $value) {
		if($key!="questionAjoute" && $key!="nbrePointsQAjoute" && $key!="typeReponse" && $key!="btnEnregistrerQuestion" && strstr($key, "checkboxRep")){
			array_push($reponsesCorrectes, $valeur);
		}
		$valeur=$value;
	}
	return $reponsesCorrectes;
}
function generationQuestions(){
	$nbreQuestionsParJeu=getNbreQuestions();
	$questionnaire = getQuestionnaire();
	$questionsDuJeu=array();
	for ($i=0; $i < $nbreQuestionsParJeu ; $i++) { 
		$nombreGenere=rand(0, count($questionnaire)-1);
		array_push($questionsDuJeu, $questionnaire[$nombreGenere]);
		array_splice($questionnaire, $nombreGenere, 1);
	}
	return $questionsDuJeu;
}
function getNbreQuestions(){
	$fic = '../asset/json/nbreQuestionsParJeu.json';
	$nbre = file_get_contents($fic); 
	$nbreQuestion = json_decode($nbre);
	return $nbreQuestion[0];
}
function getQuestionnaire(){
	$fic = '../asset/json/questions.json';
	$data = file_get_contents($fic); 
	$questionsDuJeu = json_decode($data);
	return $questionsDuJeu;
}
function getReponses($questionsDuJeu, $questionCourante, $tableauReponsesEntrees){
	if ($questionsDuJeu[$questionCourante]->typeReponse=="Choix multiple") {
		for ($i=0; $i < count($questionsDuJeu[$questionCourante]->reponses); $i++) {?> 
			<input type="checkbox" id="reponse<?php echo $i;?>" name="reponse<?php echo $i;?>" 
			value="<?php echo $questionsDuJeu[$questionCourante]->reponses[$i];?>" 
			<?php if(isset($tableauReponsesEntrees[$questionCourante])&&
			in_array($questionsDuJeu[$questionCourante]->reponses[$i], $tableauReponsesEntrees[$questionCourante])){echo "checked";}?>>
			<label for="reponse<?php echo $i;?>"><?php echo $questionsDuJeu[$questionCourante]->reponses[$i];?></label><br>
			<?php
		}
	}
	if ($questionsDuJeu[$questionCourante]->typeReponse=="Choix simple") {
		for ($i=0; $i < count($questionsDuJeu[$questionCourante]->reponses); $i++) {?> 
			<input type="radio" id="reponse" name="reponse" 
			value="<?php echo $questionsDuJeu[$questionCourante]->reponses[$i];?>"
			<?php if(isset($tableauReponsesEntrees[$questionCourante])&&
			in_array($questionsDuJeu[$questionCourante]->reponses[$i], $tableauReponsesEntrees[$questionCourante])){echo "checked";}?>>
			<label for="reponse<?php echo $i;?>"><?php echo $questionsDuJeu[$questionCourante]->reponses[$i];?></label><br>
			<?php
		}
	}
	if ($questionsDuJeu[$questionCourante]->typeReponse=="Choix texte") {
		for ($i=0; $i < count($questionsDuJeu[$questionCourante]->reponses); $i++) {?>
			<label for="reponse<?php echo $i;?>">reponse:</label> 
			<input type="text" id="reponse" name="reponse"
			value="<?php if(isset($tableauReponsesEntrees[$questionCourante])&&
			in_array($questionsDuJeu[$questionCourante]->reponses[$i], $tableauReponsesEntrees[$questionCourante])){
				echo $questionsDuJeu[$questionCourante]->reponses[$i];}?>">
			<?php
		}
	}
}
function getScoreTotal($questionsDuJeu){
	$score=0;
	for ($i=0; $i <count($questionsDuJeu) ; $i++) { 
		$score=$score+$questionsDuJeu[$i]->nbrePoints;
	}
	return $score;
}
function getReponsesEntrees(){
	$reponsesEntrees=array();
	$valeur="";
	foreach ($_POST as $key => $value) {
		$valeur=$value;
		if($key!="btnPrecedentJeu" && $key!="btnSuivantJeu"){
			array_push($reponsesEntrees, $valeur);
		}
	}
	return $reponsesEntrees;
}
function verificationReponsesEntrees($reponsesEntrees, $reponsesCorrectes){
	if (count($reponsesCorrectes)!=count($reponsesEntrees)) {
		return -1;
	}
	for ($i=0; $i < count($reponsesCorrectes); $i++) { 
		if (in_array($reponsesCorrectes[$i], $reponsesEntrees)==FALSE) {
			return -1;
		}
	}
	return 1;
}
function enregistrerScore($nombrePointsJoueur, $login){
	$file = '../asset/json/infoConnexion.json';
	$data = file_get_contents($file); 
	$infosConn = json_decode($data);
	for ($i=0; $i <count($infosConn) ; $i++) { 
		if ($infosConn[$i]->login==$login) {
			if ($infosConn[$i]->score < $nombrePointsJoueur) {
				$infosConn[$i]->score=$nombrePointsJoueur;
			}
		}
	}
	file_put_contents('../asset/json/infoConnexion.json', json_encode($infosConn, true));
}
function getScore($login, $infosConn){
    for ($i=0; $i < count($infosConn) ; $i++) {
        if ($infosConn[$i]->login==$login) {
            return $infosConn[$i]->score;
        }
    }
    return $infosConn[$i]->score;
}
?>