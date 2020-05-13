<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
    <style>
        #zoneListeQuestions{
            background-color: white;
            display: inline-block;
            width: 55%;
            height: 82%;
            margin-top: 10px;
            margin-left: 10px;
            border-radius: 5px;
        }
        #formNbreQuestionsParjeu{
            margin-left:150px;
            margin-top:20px;
        }
        #nbreQuestionsParJeu{
            width:35px;
            height:20px;
            border: 1px solid rgb(199, 147, 118);
            color:rgb(199, 147, 118);
            text-indent:10px;
            font-weight:bold;
            font-size:20px;
        }
        #formNbreQuestionsParjeu label{
            color: rgb(199, 147, 118);
            font-size:20px;
        }
        #btnNbreQuestions{
            width:35px;
            height:26px;
            background-color:rgb(81, 143, 221);
            color:white;
            border: 1px solid white;
            margin-left:10px;
        }
        #listeQuestionsJeu{
            width: 90%;
            height: 80%;
            border:2px solid rgb(199, 147, 118);
            margin: auto;
            margin-top: 10px;
            border-radius: 10px;
            overflow-x: auto;
            overflow-y: auto
        }
        #listeQuestionsJeu span{
            color:rgb(199, 147, 118);
            font-size:20px;
            margin-left:5px;
        }
        #btnSuivantQuestionsParJeu{
            height: 25px;
            width: 70px;
            background-color: rgb(60,221,225);
            float: right;
            display: inline-block;
            margin-right: 25px;
            margin-top: 5px;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            color: white;
            border:1px solid white;
        }
    </style>
</head>
<body>
    <?php
        $file = '../asset/json/nbreQuestionsParJeu.json';
		$data = file_get_contents($file); 
		$nbreQuestions = json_decode($data);
    ?>
	<div id="zoneListeQuestions">
		<form action="admin.php" method="POST" id="formNbreQuestionsParjeu">
            <label>Nbre de questions/Jeu</label>
            <input type="num" name="nbreQuestionsParJeu" id="nbreQuestionsParJeu" min="5" max="15" value="<?php echo $nbreQuestions[0];?>">
            <input type="Submit" name="btnNbreQuestions" id="btnNbreQuestions" value="OK">
        </form>
        <div id="listeQuestionsJeu">

        </div>
        <button id="btnSuivantQuestionsParJeu">Suivant</button>
    </div>
	<script src="../asset/js/listeQuestions.js"></script>
</body>
</html>