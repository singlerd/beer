<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Naš cilj je da ljudima približimo craft piva domacih pivara i da im omogucimo lakšu kupovinu. Svako pivo na našem sajtu je zagarantovano povoljno, kvalitetno i odlicno za uživanje. Naš moto glasi 'Nije sve tako crno, pivo je žuto'!">
    <meta name="keywords" content="online pivopije, pivo, craft pivo, tamno pivo, svetlo pivo, kupovina piva, prodaja piva, srbija, zanimljivosti">
    <meta name="author" content="Daniel Singler, Marko Milenkovic">
    <meta name="content-type" content="text/html">
    <meta name="content-language" content="sr">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--FB-->
    <meta property="og:title" content="Online Pivopije">
    <meta property="og:site_name" content="Online Pivopije">
    <meta property="og:url" content="https://onlinepivopije.000webhostapp.com/">
    <meta property="og:description" content="Naš cilj je da ljudima približimo craft piva domacih pivara i da im omogucimo lakšu kupovinu. Svako pivo na našem sajtu je zagarantovano povoljno, kvalitetno i odlicno za uživanje. ">
    <meta property="og:type" content="product">
    <meta property="og:image" content="https://www.ekapija.com/thumbs/crno_pivo_281015_tw630.jpg">


    <title>Online Pivopije</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="vendor/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="vendor/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="vendor/css/custom.css">

    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700&amp;subset=latin-ext" rel="stylesheet">

<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->

    <!-- Animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>


<!-- Javascript for Here Maps -->
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>


<body>


