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
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="../../public/assets/logo.png" class="img-responsive brand-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li class="active"><a href="#">Start <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="#" data-toggle="modal" data-target="#m-login-temp">Login</a></li>
                <!--<li><a href="#">Was wir tun</a></li>
                <li><a href="#">Für Unternehmen</a></li>
                <li><a href="#">Kontakt</a></li>-->
                <li style="background-color: #ff4c4c; margin-left: 20px;">
                    <a href="#" style="padding-top: 7.5px; padding-bottom: 10px; color: #fff !important;"
                       data-toggle="modal" data-target="#m-call">
                        Jetzt zur Strategie-Session anmelden!</a>
                </li>
                <li class="pull-right">
                    <a href="https://www.youtube.com/user/chrishaack">
                        <img src="public/assets/youtube.png" target="_blank">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="#" target="_blank">
                        <img src="public/assets/xing.png">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="https://www.linkedin.com/company/maexitnet/" target="_blank">
                        <img src="public/assets/linkedin.png">
                    </a>
                </li>
                <li class="pull-right">
                    <a href="https://www.facebook.com/pg/maexitnet" target="_blank">
                        <img src="public/assets/fb.png">
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Modal -->
<div id="m-login-temp" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" style="text-align: center">
                        <a href="/public/users/login.php?type=1" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">ICH BIN UNTERNEHMER</button></a>
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <a href="/public/users/login.php?type=2" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">ICH BIN CONSULTANT</button></a>
                        <!--                        <a href="consultant/dashboard/index.php" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">ICH BIN CONSULTANT</button></a>-->
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <a href="/public/users/login.php?type=3" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">ICH BIN PARTNER</button></a>
                        <!--                        <a href="partner/dashboard/index.php" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">ICH BIN PARTNER</button></a>-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4" style="text-align: center">
                    <a href="/public/users/register.php" target="_blank"><button type="button" class="btn btn-lg btn-info" style="width: 100%">New Account</button></a>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>

<script src="../../lib/js/jquery-3.2.1.min.js"></script>
<script src="../../lib/js/bootstrap.min.js"></script>