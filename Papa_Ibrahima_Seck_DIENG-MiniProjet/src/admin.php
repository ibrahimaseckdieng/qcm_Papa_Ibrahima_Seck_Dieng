<?php
session_start();
if (isset($_SESSION['login'])) {
   $login = $_SESSION['login'];
   $infosConn = $_SESSION['infosConn'];
} else {
   header('Location: ../index.php');
}
include("fonction.php");
$json = file_get_contents("../asset/json/questions.json");
$question = json_decode($json);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Page Admin</title>
  <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
</head>
<body>
<script>
   var infosConn = <?php echo json_encode($infosConn, JSON_HEX_TAG); ?>;
   var question = <?php echo json_encode($question, JSON_HEX_TAG); ?>;
</script>
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
      <button id="btnDeconnexion" onclick="myFunction()">Déconnexion</button>
    </div>
    <div id="menu">
      <div id="profil">
        <div id="divPP">
          <img id="avatarAdmin" src="<?php echo "../" . trouverAvatar($login, $infosConn); ?>">
        </div>
        <div id="filiationAdmin">
           <?php echo trouverPrenom($login, $infosConn) . " ";
           echo trouverNom($login, $infosConn); ?>
        </div>
      </div>
      <div id="vertical-menu">
        <a href="?page=listeQuestions" id="listeQuestions">Liste Questions<img id="iconeListeQuestions"
                                                                               class="iconeMenu"
                                                                               src="../asset/img/Images/Icones/ic-liste.png"></a>
        <a href="?page=creerAdmin" id="creerAdmin">Créer Admin<img id="iconeCreerAdmin" class="iconeMenu"
                                                                   src="../asset/img/Images/Icones/ic-ajout.png"></a>
        <a href="?page=listeJoueurs" id="listeJoueurs">Liste Joueurs<img id="iconeListeJoueurs" class="iconeMenu"
                                                                         src="../asset/img/Images/Icones/ic-liste.png"></a>
        <a href="?page=creerQuestion" id="creerQuestion">Créer Question<img id="iconeCreerQuestion" class="iconeMenu"
                                                                            src="../asset/img/Images/Icones/ic-ajout.png"></a>
        <a href="?page=dashBoard" id="dashBoard">DashBoard<img class="iconeMenu"
                                                               src="../asset/img/Images/Icones/dashboard.png"></a>
      </div>
    </div>
     <?php
     if (isset($_GET['page'])) {
        include($_GET['page'] . '.php');
     } else {
        include('listeQuestions.php');
     }
     ?>
  </div>
</div>
<script src="../asset/js/admin.js"></script>
</body>
</html>
<?php
if (isset($_POST['nbreQuestionsParJeu']) && $_POST['nbreQuestionsParJeu'] > 5) {
   $file = '../asset/json/nbreQuestionsParJeu.json';
   $data = file_get_contents($file);
   $nbreQuestions = json_decode($data);
   $nbreQuestions[0] = $_POST['nbreQuestionsParJeu'];
   file_put_contents('../asset/json/nbreQuestionsParJeu.json', json_encode($nbreQuestions, true));
}
if (isset($_POST['btnEnregistrerQuestion'])) {
   if (verifierQuestion($_POST['questionAjoute']) && verifierNbrePoints($_POST['nbrePointsQAjoute'])
      && $_POST['typeReponse'] == "Choix texte" && isset($_POST['reponse'])) {
      enregistrerQuestionTexte();
   }
   if (verifierQuestion($_POST['questionAjoute']) && verifierNbrePoints($_POST['nbrePointsQAjoute'])
      && $_POST['typeReponse'] == "Choix simple" && isset($_POST['reponse']) && verifierReponses()) {
      enregistrerQuestionSimple();
   }
   if (verifierQuestion($_POST['questionAjoute']) && verifierNbrePoints($_POST['nbrePointsQAjoute'])
      && $_POST['typeReponse'] == "Choix multiple" && verifierReponses()) {
      enregistrerQuestionMultiple();
   }
}
if (isset($_POST['prenomIns'])) {
   enregistrerUtilisateur("admin");
}
?>

