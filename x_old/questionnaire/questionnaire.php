<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title >maexit | Fragebogen</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom -->
        <link href="rating/jquery.raty.css" rel="stylesheet">
        <link href="../public/css/navbar.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>
    
    <body>                  
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