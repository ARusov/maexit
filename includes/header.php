<?php
require('config.php');
?>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MAEXIT | great value - great deals</title>
    <!-- FontAwesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">


    <!-- Bootstrap -->
    <?php
    echo '<link href="../../lib/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="../../public/css/navbar.css" rel="stylesheet">';
    echo  '<link href="../../public/css/style.css" rel="stylesheet">';
    ?>






</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img alt="Brand" src="../../public/assets/logo.png" class="img-responsive brand-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li class="active"><a href="#">Start <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Was wir tun</a></li>
                <li><a href="#">Für Unternehmen</a></li>
                <li><a href="#">Kontakt</a></li>
                <li style="background-color: #ff4c4c; margin-left: 20px;">
                    <!--                    <a href="./public/users/login.php" style="padding-top: 7.5px; padding-bottom: 10px; color: #fff !important;"-->
                    <!--                       data-toggle="modal" data-target="#m-call">-->
                    <!--                        Jetzt zur Strategie-Session anmelden!</a>-->
                    <a href="../../public/users/login.php"
                       style="padding-top: 7.5px; padding-bottom: 10px; color: #fff !important;">
                        Jetzt zur Strategie-Session anmelden!</a>
                </li>
                <li class="pull-right">
                    <a href="https://www.youtube.com/user/chrishaack">
                        <img src="../../public/assets/youtube.png" target="_blank">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="#" target="_blank">
                        <img src="../../public/assets/xing.png">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="https://www.linkedin.com/company/maexitnet/" target="_blank">
                        <img src="../../public/assets/linkedin.png">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="https://www.facebook.com/pg/maexitnet" target="_blank">
                        <img src="../../public/assets/fb.png">
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>