<!DOCTYPE html>
<html>
<head>
	<title>Page Ajout Question</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
    <style>
        /* CSS de la page creerQuestion.php*/
        #zoneAjoutQuestion{
            display: inline-block;
            width: 57%;
            height: 85%;
            margin-left: 10px;
            border-radius: 5px;
            background-color: white; 
        }
        h2{
            color: rgb(81,191,208);
            font-family: serif;
            font-weight:bold;
            margin-left:30px;
        }
        #formAjoutQuestion{
            height:85%;
            width:95%;
            border:2px solid rgb(81,191,208);
            border-radius:10px;
            margin-left:10px;
            font-family: serif;
            font-size:20px;
            color:rgb(131,131,131);
            overflow-x: auto;
            overflow-y: auto
        }
        #formAjoutQuestion label{
            font-weight:bold;
        }
        #formAjoutQuestion input, select{
            border-radius:2px;
            border-right:1px solid rgb(81,191,208);
            border-bottom:1px solid rgb(81,191,208);
            border-top:1px solid white;
            border-left:1px solid white;
        }
        #questionAjoute{
            height:70px;
            width:270px;
            margin-left:65px;
            background-color: rgb(240,238,241);
        }
        #nbrePointsQAjoute{
            height:20px;
            width:50px;
            margin-left:17px;
            background-color: rgb(240,238,241);
        }
        #typeReponse{
            display:inline-block;
            height:35px;
            width:200px;
            margin-left:5px;
            background-color: rgb(240,238,241);
        }
        #imgAjout{
            float:right;
            margin-right:40px;
        }
        #btnEnregistrerQuestion{
            float:right;
            margin-right:35px;
            height:40px;
            width:80px;
            background-color:rgb(81,191,208);
            color:white;
            margin-top:10px;
        }
        label{
            margin-left:10px;
        }
        #divNbrePoints, #divSelect{
            margin-top: 10px;
        }
        .inputReponse{
            margin-left: 60px;
            margin-top:5px;
            height:25px;
            width:230px;
            background-color: rgb(240,238,241);
        }
        #tooltipAjoutQuestion {
            display: inline-block;
            margin-left: 158px;
            border: 1px solid #555;
            background-color: rgb(81,191,208);
            border-radius: 4px;
            font-size: 10px;
            color: red;
        }
        #tooltipNbrePointsQAjoute {
            display: inline-block;
            margin-left: 15px;
            border: 1px solid #555;
            background-color: rgb(81,191,208);
            border-radius: 4px;
            font-size: 10px;
            color: red;
        }
        #tooltipReponsesGenerees, #tooltipReponsesCoche {
            display: inline-block;
            height:auto;
            width:160px;
            margin-left: 160px;
            border: 1px solid #555;
            background-color: rgb(81,191,208);
            border-radius: 4px;
            font-size: 10px;
            color: red;
        }
        .tooltipReponses {
            height:auto;
            width:125px;
            margin-left: 160px;
            margin-top: 5px;
            border: 1px solid #555;
            background-color: rgb(81,191,208);
            border-radius: 4px;
            font-size: 10px;
            color: red;
        }
        #divReponses{
            margin-top:5px;
        }
    </style>
</head>
<body>
<div id="zoneAjoutQuestion">
                <h2>PARAMETRER VOTRE QUESTION</h2>
                <form action="admin.php" method="POST" id="formAjoutQuestion">
                    <div id="divQuestion">
                        <label>Question</label>
                        <input name="questionAjoute" id="questionAjoute"></input>
                        <div id="tooltipAjoutQuestion" class="tooltipCreerQuestion">Ce champ ne peut pas être vide</div>
                    </div>
                    <div id="divNbrePoints">
                        <label>Nbre de Points</label>
                        <input type="number" name="nbrePointsQAjoute" min="10" max="50" step="10" id="nbrePointsQAjoute"/>
                        <div id="tooltipNbrePointsQAjoute" class="tooltipCreerQuestion">Ce champ ne peut pas être vide</div>
                    </div>
                    <div id="divSelect">
                        <label>Type de réponse</label>
                        <select id="typeReponse" name="typeReponse" onchange="mySelection()">
                            <option>Choix multiple
                            <option>Choix simple
                            <option>Choix texte  
                        </select>
                        <a href="#" id="ajouterReponse"><img src="../asset/img/Icones/ic-ajout-reponse.png" id="imgAjout"></a>
                    </div>
                    <div id="tooltipReponsesGenerees" class="tooltipCreerQuestion"></div>
                    <div id="divReponses">
                    </div> 
                    <div id="tooltipReponsesCoche" class="tooltipCreerQuestion"></div>
                    <div id="divSubmit">
                        <input type="submit" name="btnEnregistrerQuestion" value="Enregistrer" id="btnEnregistrerQuestion"/>
                    </div>
                </form>
			</div>
	<script src="../asset/js/creerQuestion.js"></script>
</body>
</html>