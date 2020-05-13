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
    if ((isset($_POST['btnSuivantJeu'])==false && isset($_POST['btnPrecedentJeu'])==false) || isset($_POST['btnRejouer'])) {
        if(isset($_SESSION['questionCourante']) && $_SESSION['questionCourante']<5){
            $nombrePointsJoueur=$_SESSION['nombrePointsJoueur'];
            enregistrerScore($nombrePointsJoueur,$login);
        }
        $_SESSION['questionsDuJeu']=generationQuestions();
        $questionsDuJeu=$_SESSION['questionsDuJeu'];
        $_SESSION['nombrePointsJoueur']=0;
        $nombrePointsJoueur=$_SESSION['nombrePointsJoueur'];
        $_SESSION['questionCourante']=0;
        $questionCourante=$_SESSION['questionCourante'];
        $_SESSION['tableauReponsesEntrees']=array();
        $tableauReponsesEntrees=$_SESSION['tableauReponsesEntrees'];
	}
    else{
        if(isset($_POST['btnSuivantJeu'])){
            $questionsDuJeu=$_SESSION['questionsDuJeu'];
            $questionCourante=$_SESSION['questionCourante'];
            $nombrePointsJoueur=$_SESSION['nombrePointsJoueur'];
            $reponsesEntrees=getReponsesEntrees();
            $tableauReponsesEntrees=$_SESSION['tableauReponsesEntrees'];
            $tableauReponsesEntrees[$questionCourante]= $reponsesEntrees;
            if (verificationReponsesEntrees($reponsesEntrees, $questionsDuJeu[$questionCourante]->reponseCorrecte)==1) {
                $nombrePointsJoueur+= $questionsDuJeu[$questionCourante]->nbrePoints;
            }
            $_SESSION['questionCourante']+=1;
            $questionCourante=$_SESSION['questionCourante'];
            $_SESSION['nombrePointsJoueur']=$nombrePointsJoueur;
            $_SESSION['tableauReponsesEntrees']=$tableauReponsesEntrees;
        }
        else{
            $_SESSION['questionCourante']=$_SESSION['questionCourante']-1;
            $questionCourante=$_SESSION['questionCourante'];
            $questionsDuJeu=$_SESSION['questionsDuJeu'];
            $nombrePointsJoueur=$_SESSION['nombrePointsJoueur'];
            $tableauReponsesEntrees=$_SESSION['tableauReponsesEntrees'];
            $reponsesEntrees=$tableauReponsesEntrees[$questionCourante];
            if (verificationReponsesEntrees($reponsesEntrees, $questionsDuJeu[$questionCourante]->reponseCorrecte)==1) {
                $nombrePointsJoueur-= $questionsDuJeu[$questionCourante]->nbrePoints;
            }
            $_SESSION['nombrePointsJoueur']=$nombrePointsJoueur;
            $_SESSION['tableauReponsesEntrees']=$tableauReponsesEntrees;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    
	<title>Page Joueur</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
    <style>
        #zoneJoueur{
            width:97%;
            height:83%;
            background-color:white;
            border-radius:5px;
            margin:auto;
            margin-top:10px;
        }
        #zoneJeu{
            width:66%;
            height:96%;
            float: left;
            clear: none; 
            margin-left:10px;
            margin-top:10px;
            border-radius:5px;
            border:2px solid rgb(81,191,208);
            overflow-x: auto;
            overflow-y: auto;
        }
        #zoneScoreJoueurs{
            float: left;
            clear: none;
            width:30%;
            height:40%;
            margin-top:40px;
            margin-left:10px;
            border-radius:5px;
            border:2px solid rgb(81,191,208);
        }
        #topScores{
            float: left;
            clear: none;
            border:1px solid rgb(81,191,208);
            width:40%;
            height:30px;
            font-size:16px;
            font-weight:bold;
            color:black;
            font-family:serif;
            background-color:white;
        }
        #monMeilleurScore{
            float: left;
            clear: none;
            border:1px solid rgb(81,191,208);
            width:60%;
            height:30px;
            font-size:16px;
            font-weight:bold;
            color:black;
            font-family:serif;
            background-color:white;
        }
        #affichageScore{
            width:100%;
            height:200px;
        }
        tr{
            font-size:18px;
            font-weight:bold;
        }
        td{
            padding-left:5px;
        }
        #questionPosee{
            width:96%;
            height:25%;
            background-color:rgb(239, 239, 239);
            margin-left:2%;
            margin-top:2%;
            border:1px solid rgb(81,191,208);
            text-align:center;
            font-size:30px;
        }
        #questionPosee p{
            margin-top:10px;
        }
        #questionPosee span{
            font-weight:bold;
            text-decoration: underline;
        }
        #pointQuestion{
            width:14%;
            height:9%;
            background-color:rgb(239, 239, 239);
            border:1px solid rgb(81,191,208);
            margin-top:2%;
            margin-left:84%;
            text-align:center;
            font-size:25px;
        }
        #pointQuestion p{
            margin-top:5px;
        }
        #formQuestionPosee{
            width:96%;
            height:50%;
        }
        #reponsesQuestionsPosee{
            width:70%;
            height:65%;
            margin-top:3%;
            margin-left:15%;
            font-size:30px;
            font-weight:bold;
        }
        #btnPrecedentJeu{
            width:18%;
            height:15%;
            background-color: rgb(131,131,131);
            border:1px solid rgb(131,131,131);
            margin-top:13%;
            margin-left:2%;
            color:white;
            border-radius:2px;
            font-size:18px;
        }
        #btnSuivantJeu{
            float:right;
            width:18%;
            height:15%;
            background-color: rgb(81,191,208);
            border:1px solid rgb(81,191,208);
            margin-top:13%;
            margin-right:-10px;
            color:white;
            border-radius:2px;
            font-size:18px;
        }
        #quiz-time{
            width:160px;
            height:160px;
            border:2px solid rgb(81,191,208);
            border-radius:50%;
            margin-top:20px;
            margin-left:40px;
        }
        #quiz-time-left{
            text-align:center;
            font-size:20px;
            font-family:fantasy;
            color: rgb(243,114,120);
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }
        #temps{
            text-align:center;
            margin-top:40px;
            font-size:20px;
            font-family:fantasy;
            color: rgb(81,191,208);
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        #btnQuitterJeu{
            width:150px;
            height:35px;
            background-color: rgb(244,115,121);
            border:1px solid rgb(244,115,121);
            color:white;
            border-radius:50%;
            font-size:18px;
            margin-left: 45px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <script>
        let questionCourante = <?php echo json_encode($questionCourante, JSON_HEX_TAG); ?>;
        let nbreQuestionJeu = <?php echo json_encode(count($questionsDuJeu), JSON_HEX_TAG); ?>;
        let questionsDuJeu = <?php echo json_encode($questionsDuJeu, JSON_HEX_TAG); ?>;
        let nombrePointsJoueur = <?php echo json_encode($nombrePointsJoueur, JSON_HEX_TAG); ?>;
        let tableauReponsesEntrees = <?php echo json_encode($tableauReponsesEntrees, JSON_HEX_TAG); ?>;
        let infosConn = <?php echo json_encode($infosConn, JSON_HEX_TAG); ?>;
        let scoreJoueur = <?php echo json_encode(getScore($login, $infosConn), JSON_HEX_TAG); ?>;
    </script>
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
                    BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br><br>
                    JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE
                </p>
                <button id="btnDeconnexion" onclick="myFunction()">Déconnexion</button>
            </div>
            <div id="zoneJoueur">
                <div id="zoneJeu">
                    <?php
                    if ($questionCourante<count($questionsDuJeu)) {?>
                        <div id="questionPosee">
                            <p><span> Question <?php echo ($questionCourante+1)."/".count($questionsDuJeu).":";?></span><br>
                                <?php echo $questionsDuJeu[$questionCourante]->question;?>
                            </p>
                        </div>
                        <div id="pointQuestion">
                            <p><?php echo $questionsDuJeu[$questionCourante]->nbrePoints." pts";?></p>
                        </div>
                        <form action="joueur.php" id="formQuestionPosee" method="POST">
                            <div id="reponsesQuestionsPosee">
                                <?php getReponses($questionsDuJeu, $questionCourante, $tableauReponsesEntrees); ?>
                            </div>
                            <input type="Submit" id="btnPrecedentJeu" name="btnPrecedentJeu" value="Precedent" <?php if($questionCourante==0){echo "disabled";}?>></input>
                            <input type="Submit" id="btnSuivantJeu" name="btnSuivantJeu" value="<?php if($questionCourante==count($questionsDuJeu)-1){echo "Terminer";}else{echo "Suivant";}?>"></input>
                        </form>

                    <?php
                    }
                    else{
                        enregistrerScore($nombrePointsJoueur, $login);
                    }
                    ?>
                </div>
                <div id="zoneScoreJoueurs">
                    <div id="divScore">
                        <button id="topScores">Top scores</button>
                        <button id="monMeilleurScore">Mon meilleur score</button>
                    </div>
                    <div id="affichageScore">
                        <table id="tableMeilleursScores">

                        </table>
                    </div>
                    <div id="quiz-time">
                       <p id="temps">Temps Restant:</p>
                        <p id="quiz-time-left"></p>
                    </div>
                    <form action="joueur.php" id="formQuitter" method="POST">
                        <input type="Submit" id="btnQuitterJeu" name="btnQuitterJeu" value="Quitter Quizz"></input>
                    </form>
                </div>
            </div>
			
		</div>
    </div>
	<script src="../asset/js/joueur.js"></script>
</body>
</html>