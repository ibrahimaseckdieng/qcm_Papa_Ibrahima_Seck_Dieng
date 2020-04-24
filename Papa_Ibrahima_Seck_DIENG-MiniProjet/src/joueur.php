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
	<title>Page Joueur</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
</head>
<body>
	<div id="container">
		<div id="haut">
			<img id="logoQuizzSA" src="../asset/img/Images/logo-QuizzSA.png">
			<h2 id="plaisir"> Le plaisir de jouer</h2>
		</div>
        <div id="formQuestion">
			<div id="bienvenue">
                <div id="divAvatar">
                    <img id="avatarJoueur" src="<?php echo "../".trouverAvatar($login, $infosConn);?>">
                    <figcaption id="figcaptionJoueur"><?php echo trouverPrenom($login, $infosConn)." ";echo trouverNom($login, $infosConn);?> </figcaption>
                </div>
                <p>
                    BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br>
                    JOUEUR ET TESTER VOTRE NIVEAU DE CULTURE GENERALE
                </p>
                <div id="btnDeconnexion"><a href="deconnexion.php">Déconnexion</a></div>
            </div>
			
		</div>
    </div>
    <script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/script.js"></script>
</body>
</html>