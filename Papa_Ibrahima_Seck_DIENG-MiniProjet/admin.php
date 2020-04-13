<?php
    session_start();
    $login=$_SESSION['login'];
    $infosConn=$_SESSION['infosConn'];
	include("src/fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
	<div id="container">
		<div id="haut">
			<img id="logoQuizzSA" src="asset/img/Images/logo-QuizzSA.png">
			<h2 id="plaisir"> Le plaisir de jouer</h2>
		</div>
        <div id="formQuestion">
			<div id="parametrer">
                <p>
                    CREER ET PARAMETRER VOS QUIZZ
                </p>
                <div id="btnDeconnexion"><a href="src/deconnexion.php">Déconnexion</a></div>
            </div>
			
		</div>
	</div>
</body>
</html>
<?php
	
?>
