<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title >MAEXIT | Fragebogen</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom -->
        <link href="rating/jquery.raty.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>
    
    <body>     
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="public/assets/logo.png" class="img-responsive brand-logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-center">
                        <li class="active"><a href="#">Start <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Wer wir sind</a></li>
                        <li><a href="#">Was wir tun</a></li>
                        <li><a href="#">Für Unternehmen</a></li>
                        <li><a href="#">Kontakt</a></li>
                        <li style="border: 2px solid #ff4c4c; margin-left: 20px;"><a href="#" style="padding-top: 7.5px; padding-bottom: 10px">Jetzt Strategie-Gespräch buchen</a></li>
                        <li class="pull-right">
                            <a href="#">
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
        
        <div id="wrapper">
            <div class="container">
                <div class="row header">
                    <img src="logo.png" class="img-responsive logo">
                    <label class="subline">Fragebogen</label>
                </div>
                
                <div class="row box">
                    <h4>Wie schätzen Sie Ihr Unternehmen bei den folgenden Fragen ein?</h4>
                    <div class="count"></div>                    
                    <div class="question"></div>  
                    <div class="row range-container">
                        <div class="col-md-3">
                            <div class="min"></div>
                        </div>
                        <div class="col-md-6 range-bar">
                            <label class="rating-value">0%</label>
                            <div id="star-rating" class="rating"></div>                            
                            <!--<input type="range" min="0" max="100" step="10" value="50" class="">-->
                            <small><a href="#" onclick="setScore(0)">nicht vorhanden</a></small>
                        </div>
                        <div class="col-md-3">
                            <div class="max"></div>
                        </div>
                    </div>   
                    <div class="button-container">
                        <button type="button" class="btn btn-default btn-lg btn-maexit back hidden" onclick="back()">Zurück</button>
                        <button type="button" class="btn btn-default btn-lg next btn-maexit" onclick="next()">Weiter</button>
                        <button type="button" class="btn btn-default btn-lg finish btn-maexit hidden" onclick="finish()">Fertig!</button>
                    </div>                    
                </div>
            </div>
            
        </div> <!-- /#wrapper -->        
        
        <script src="../lib/js/jquery-3.2.1.min.js"></script>
        <script src="../lib/js/bootstrap.min.js"></script>              
        <script src="rating/jquery.raty.js"></script>              
        <script src="app.js"></script>
    </body>
</html>