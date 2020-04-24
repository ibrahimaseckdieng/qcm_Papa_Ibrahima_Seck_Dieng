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
					<a href="creerUtilisateur.php" class="active" id="creerAdmin">Créer Admin<img class="iconeMenu" src="../asset/img/Images/Icones/ic-ajout.png"></a>
					<a href="listeJoueurs.php" id="listeJoueurs">Liste Joueurs<img class="iconeMenu" src="../asset/img/Images/Icones/ic-liste.png"></a>
					<a href="">Créer Questions<img class="iconeMenu" src="../asset/img/Images/Icones/ic-ajout.png"></a>
				</div>
			</div>
			<div id="zoneInfo">
                <div id="zoneInscription">
                    <form enctype="multipart/form-data" method="POST" action="creerUtilisateur.php" id="formIns">
                        <p id="paraInscrire">S'INSCRIRE<br><span id="mesInscrire">Pour proposer des quizz</span></p>
                        <hr>
                        <label class="labelIns">Prénom</label>
                        <input type="text" id="prenomIns" name="prenomIns" class="inputIns"></input>
                        <div class="tooltipIns" id="tooltipPrenomIns"></div>
                        <label class="labelIns">Nom</label>
                        <input type="text" id="nomIns" name="nomIns" class="inputIns"></input>
                        <div class="tooltipIns" id="tooltipNomIns"></div>
                        <label class="labelIns">Login</label>
                        <input type="text" id="loginIns" name="loginIns" class="inputIns"></input>
                        <div class="tooltipIns" id="tooltipLoginIns"></div>
                        <label class="labelIns">Password</label>
                        <input type="password" id="passwordIns" name="passwordIns" class="inputIns"></input>
                        <div class="tooltipIns" id="tooltipPasswordIns"></div>
                        <label class="labelIns">Confirmer Password</label>
                        <input type="password" id="passwordInsConf" name="passwordInsConf" class="inputIns"></input>
                        <div class="tooltipIns" id="tooltipPasswordConfIns"></div>
                        <label id="labelAvatar">Avatar</label>
                        <label id="labelAvatarIns" for="avatarIns">Choisir un fichier</label>
                        <input type="file" name="avatarIns" id="avatarIns" onchange = "loadFile (event)"></input>
                        <input type="Submit" name="btnIns" value="Créer compte" id="btnIns" ></input>
                    </form>
                    <div id="divAvatarIns">
                        <img id="ApercuAvatarIns"/>
                        <figcaption id="figcaptionAvatarIns">Avatar Admin</figcaption>
                    </div>
                </div>
			</div>
		</div>
    </div>
    <script>
        var ApercuAvatarIns = document.getElementById('ApercuAvatarIns');
            ApercuAvatarIns.src ="../asset/img/Icones/profil2.png";
            ApercuAvatarIns.onload = function() {
            URL.revokeObjectURL(ApercuAvatarIns.src)
            }
            document.getElementById('figcaptionAvatarIns').style.display="inline";
        var loadFile = function(event) {
            var ApercuAvatarIns = document.getElementById('ApercuAvatarIns');
            ApercuAvatarIns.src = URL.createObjectURL(event.target.files[0]);
            ApercuAvatarIns.onload = function() {
            URL.revokeObjectURL(ApercuAvatarIns.src)
            }
            document.getElementById('figcaptionAvatarIns').style.display="inline";
        };
    </script>
	<script src="creerUtilisateur.js"></script>
</body>
</html>
<?php
    if (isset($_POST['prenomIns'])) {

        enregistrerUtilisateur("admin");
    }
?>