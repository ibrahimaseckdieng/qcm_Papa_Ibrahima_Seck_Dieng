<?php
session_start();
include("src/fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Page de Connexion </title>
  <link rel="stylesheet" type="text/css" href="asset/css/styleQCM.css">
</head>
<body>
<div id="container">
  <div id="haut">
    <img id="logoQuizzSA" src="asset/img/Images/logo-QuizzSA.png">
    <h2 id="plaisir"> Le plaisir de jouer</h2>
  </div>
  <div id="formConnexion">
    <div id="log_form"><p> Login Form </p></div>
    <form method="POST" action="index.php" id="formulaireConnexion">
      <input id="login" type="texte" name="login" placeholder="Login" class="inputLogin" value="">
      <img class="iconeInput" src="asset/img/Images/Icones/ic-login.png">
      <div class="tooltip" id="tooltipLogin">Le login entré est Incorrect</div>
      <input id="password" type="password" name="password" placeholder="Password" class="inputPassword">
      <img class="iconeInput" src="asset/img/Images/Icones/ic-password.png">
      <div class="tooltip" id="tooltipPassword">Le password entré est Incorrect</div>
      <div>
        <input id="btnConnexion" name="btnConnexion" type="Submit" value="Connexion" onclick="connexion()">
        <h6 id="inscrire"><a href="src/inscriptionJoueur.php" id="inscriptionJoueur"> S'inscrire pour jouer ? </a></h6>
      </div>
    </form>
    <form method="POST" action="index.php" style="display: none;" id="theform">
      <input id="loginBis" name="loginBis"></input>
      <input id="passwordBis" name="passwordBis"></input>
      <input id="role" name="role"></input>
      <input id="btnVerification" name="btnVerification" type="Submit" value="Verification">
    </form>
  </div>
</div>
<script src="asset/js/script.js"></script>
</body>
</html>
<?php
if (isset($_POST['role'])) {
   $file = 'asset/json/infoConnexion.json';
   $data = file_get_contents($file);
   $infosConn = json_decode($data);
   $_SESSION['login'] = $_POST['loginBis'];
   $_SESSION['password'] = $_POST['passwordBis'];
   $_SESSION['infosConn'] = $infosConn;
   if ($_POST['role'] == "joueur") {
      echo "<script type='application/javascript'>document.location.replace('src/joueur.php')</script>";
   } else {
      echo "<script type='application/javascript'>document.location.replace('src/admin.php')</script>";
   }
}
?>
