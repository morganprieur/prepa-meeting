<?php // afficher les erreurs /!\ #devOnly /!\  ***
error_reporting(E_ALL);
ini_set("display_errors", 1);
// end #devOnly
?>

<!doctype html>
<html>
<head>
    <title>Tableau GUP</title>
    <meta Content-Type="text/html"; charset="utf-8">
    <style type="text/css">
        body {
            background-color: #333;
        }
        h1, h2, h3, h4 {
            text-align:center; 
            font-weight: normal;
        }
        a {
            text-decoration: none;
            color: black;
            background-color: #ff8300;
            display: block;
            padding: .1em;
            width: 95%;
            border: 1px solid white;
            line-height: 1.1em;
            margin: 0;
        }
        a:hover {
            /* text-decoration: underline; */
            color: #111;
            background-color: orange;
            /* display: block;
            padding: .1em;
            width: 95%;
            border: 1px solid white;
            line-height: 1.1em;
            margin: 0; */
        }
        .strike {
            text-decoration: line-through;
        }
        .text-center {
            text-align: center;
        }
        .color-white {
            color: white;
        }
        .color-silver {
            color: silver;
        }
        .color-orange {
            color: orange;
        }
        .padtop40 {
            padding-top: 40px;
        }
        .container {
            width: 95%;
            margin: 0 auto;
            margin-bottom: 20px;
            min-height: 700px;
        }
        .main {
            
        }
        .one {
            width: 40%;
            margin: 0 auto;
        }
        table {
            margin: 50px auto;
            background-color: silver;
            width: 95%;
        }
        tr:first-child > th {
            background-color: silver;
        }
        .table, th, td {
            border: 1px solid black; 
            border-collapse: collapse;
        }
        tr {
            min-height: 70px;
        }
        th, td {
            padding: 1em .5em;
            background-color: white;
        }
        .actions {
            width: 10em;
            margin: 7em auto 0;
        }
        footer {
            height: 50px;
            margin-bottom: 20px;
            text-align: center;
            color: silver;
        }
        
    </style>
</head>
<body>
    <div class="container">

<h1 class="text-center color-white">Conseil Citoyen st-gilles : tableau GUP</h1>

<h3 style="font-size: 1.5em; margin-top: 30px" class="color-silver">Document de travail</h3>

<h4 style="font-weight: normal; margin-top: 50px; letter-spacing: 1px" id="travaux" class="text-center color-orange">Page en construction... Merci de patienter :)</h4>

    <h3 class="padtop40 color-white"><?= esc($title) ?></h3>
    