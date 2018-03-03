<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title>MAEXIT | Fragebogen</title>

        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom -->
        <link href="rating/jquery.raty.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet">
        <link href="css/report.css" rel="stylesheet">
    </head>
    
    <body onload="loadQuestions()">                  
        <div id="wrapper_questions">
            <div class="container">
                <div class="row header">
                    <div class="col-md-3">
                        <img src="../public/assets/logo_white.png" class="img-responsive">
                    </div>
                    <div class="col-md-8 col-md-offset-1">
                        <h1 class="headline">Fragebogen</h1>
                    </div>                                        
                </div>
                
                <div class="row box">
                    <h3 class="box-title">Wie schätzen Sie Ihr Unternehmen bei den folgenden Fragen ein?</h3>
                    <div class="count"></div>                    
                    <div class="question"></div>  
                    <div class="row range-container">
                        <div class="col-md-3" style="background-color: #252B38;">
                            <div class="min"></div>
                        </div>
                        <div class="col-md-6 range-bar">
                            <label class="rating-value">0%</label>
                            <div id="star-rating" class="rating"></div>                            
                            <!--<input type="range" min="0" max="100" step="10" value="50" class="">-->
                            <small><a href="#" onclick="setScore(0)">nicht vorhanden</a></small>
                        </div>
                        <div class="col-md-3" style="background-color: #252B38;">
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
        <script src="js/report.js"></script>
    </body>
</html>