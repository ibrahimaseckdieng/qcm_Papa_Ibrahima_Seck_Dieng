<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
    <style>
        tr{
            font-size:18px;
        }
        .thListeJoueurs{
            font-weight: bold;
        }
        td{
            width:33%;
            padding-left:30px;
        }
        #tableListeJoueurs{
            width:100%;
        }
        #btnSuivantJoueurs{
            height: 25px;
            width: 70px;
            background-color: rgb(60,221,225);
            float: right;
            display: inline-block;
            margin-right: 30px;
            margin-top: 3px;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            color: white;
        }
        #btnSuivantJoueurs a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
	<div id="zoneListeJoueurs">
        <div id="titreListeJoueurs">LISTE DES JOUEURS PAR SCORE</div>
        <div id="listeJoueursParScore">
            <table id="tableListeJoueurs">
                <tr>
                    <td class="thListeJoueurs">Nom</td>
                    <td class="thListeJoueurs">Prenom</td>
                    <td class="thListeJoueurs">Score</td>
                </tr>
            </table>
        </div>
        <button id="btnSuivantJoueurs">Suivant</button>
    </div>
	<script src="../asset/js/listeJoueurs.js"></script>
</body>
</html>
