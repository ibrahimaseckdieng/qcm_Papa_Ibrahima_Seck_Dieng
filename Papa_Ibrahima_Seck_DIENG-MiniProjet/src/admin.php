<?php
    session_start();
    if (isset($_SESSION['login'])) {
		$login=$_SESSION['login'];
    	$infosConn=$_SESSION['infosConn'];
	}
	else{
		header('Location: ../index.php');
	}
	include("fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
</head>
<body>
	<script src="../asset/js/jquery-3.5.0.min.js"></script>
	<div id="container">
		<div id="haut">
			<img id="logoQuizzSA" src="../asset/img/Images/logo-QuizzSA.png">
			<h2 id="plaisir"> Le plaisir de jouer</h2>
		</div>
        <div id="formQuestion">
			<div id="parametrer">
                <p>
                    CREER ET PARAMETRER VOS QUIZZ
                </p>
                <div id="btnDeconnexion"><a href="deconnexion.php">Déconnexion</a></div>
			</div>
			<div id="menu">
				<div id="profil">
					<div id="divPP">
						<img id="avatarAdmin" src="<?php echo "../".trouverAvatar($login, $infosConn);?>">
					</div>
					<div id="filiationAdmin">
						<?php echo trouverPrenom($login, $infosConn)." ";echo trouverNom($login, $infosConn);?> 
					</div>
				</div>
				<div id="vertical-menu">
					<a href="#" id="listeQuestion">Liste Questions<img class="iconeMenu" src="../asset/img/Images/Icones/ic-liste.png"></a>
					<a href="#" class="active" id="creerAdmin">Créer Admin<img class="iconeMenu" src="../asset/img/Images/Icones/ic-ajout.png"></a>
					<a href="listeJoueurs.php" id="listeJoueurs">Liste Joueurs<img class="iconeMenu" src="../asset/img/Images/Icones/ic-liste.png"></a>
					<a href="">Créer Questions<img class="iconeMenu" src="../asset/img/Images/Icones/ic-ajout.png"></a>
				</div>
			</div>
			<div id="zoneInfo">
				<script>document.getElementById("zoneInfo").style.height="80%";</script>
				<?php
					include('listeJoueurs.php');	
				?>
			</div>
		</div>
	</div>
</body>
</html>

