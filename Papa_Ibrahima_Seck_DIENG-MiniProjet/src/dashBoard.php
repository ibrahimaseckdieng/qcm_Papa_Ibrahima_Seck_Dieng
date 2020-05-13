<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/styleQCM.css">
    <style>
        #dashboard{
            background-color: white;
            display: inline-block;
            width: 55%;
            height: 82%;
            margin-top: 10px;
            margin-left: 10px;
            border-radius: 5px;
        }
        #dashboard_div{
            margin-top:10px;
        }
        #dashboard_div p{
            margin-left:50px;
            font-size:20px;
            color:rgb(81,191,208);
        }
        #filter_div{
            margin-left:40px;
        }
    </style>
</head>
<body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<div id="dashboard">
        <div id="dashboard_div">
            <p>Répartition des Questions par Type de réponse</p>
            <div id="filter_div"></div>
            <div id="chart_div"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="../asset/js/dashBoard.js"></script>
</body>
</html>