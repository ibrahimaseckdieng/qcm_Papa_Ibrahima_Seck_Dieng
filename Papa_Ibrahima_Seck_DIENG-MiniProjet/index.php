<?php
	session_start();
	include("src/fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page de Connexion </title>
	<link rel="stylesheet" type="text/css" href="asset/css/styles.css">
</head>
<body>
	<div id="container">
		<div id="haut">
			<img id="logoQuizzSA" src="asset/img/Images/logo-QuizzSA.png">
			<h2 id="plaisir"> Le plaisir de jouer</h2>
		</div>
		<div id="formConnexion">
			<div id="log_form"><p> Login Form </p></div>
			<form method="POST" action="index.php">
				<input type="texte" name="login" placeholder="Login" class="inputConnexion" 
				value="<?php if (isset($_POST['login'])) {echo $_POST['login'];}?>" required>
				<img class="iconeInput" src="asset/img/Images/Icones/ic-login.png">
				<input type="password" name="password" placeholder="Password" class="inputConnexion" required>
				<img class="iconeInput" src="asset/img/Images/Icones/ic-password.png">
				<div>
					<input id="btnConnexion" name="btnConnexion" type="Submit" value="Connexion">
					<h6 id="inscrire"><a href="#"> S'inscrire pour jouer? </a></h6>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['login']) && isset($_POST['password'])) {
		$login=$_POST['login'];
		$password=$_POST['password'];
		// chemin d'accès de notre fichier JSON contenant les infos de connexion
		$file = 'asset\json\infosConn.json'; 
		// On met le contenu du fichier dans une variable pour pouvoir le manipuler
		$data = file_get_contents($file); 
		// décoder le flux JSON
		$infosConn = json_decode($data); 
		if (verifierInfosConn($login, $password, $infosConn)) {
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			$_SESSION['infosConn']=$infosConn;
			if (trouverRole($login, $infosConn)=="admin") {
				header('Location: admin.php');
			}
			else {
				header('Location: joueur.php');
			}
		}
		else{
			echo "Login et Mot de Passe incorrects";
		}
	}
?>
