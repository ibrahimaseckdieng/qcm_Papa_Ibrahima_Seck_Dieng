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
?>