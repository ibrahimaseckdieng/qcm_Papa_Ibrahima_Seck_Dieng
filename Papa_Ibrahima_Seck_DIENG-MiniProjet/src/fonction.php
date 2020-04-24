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
?>