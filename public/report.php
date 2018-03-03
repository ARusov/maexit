<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title >MAEXIT | Fragebogen</title>

        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom -->        
        <link href="css/report.css" rel="stylesheet">
    </head>
    
    <body onload="init()">         
        <div id="wrapper">
            <div class="box-left">
                <div class="box-content">
                    <h1>Wie attraktiv ist Ihr Unternehmen?</h1>
                    Nehmen Sie sich 8 Minuten Zeit, <br/>und finden Sie es kostenlos heraus!
                    <div class="form">
                        <div class="form-group">
                            <input type="email" class="form-control email" placeholder="Geben Sie hier Ihre Email-Adresse ein" style="height: 40px;">
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control industries" style="height: 40px;">
                                <option value="0" disabled selected>Wählen Sie Ihre Branche aus</option>
                            </select>
                        </div>
                        
                        <button type="button" class="btn btn-default btn-report">LOS GEHTS!</button>
                        
                        <div class="error hide">Bitte geben Sie eine gültige Email-Adresse ein und wählen Sie eine Branche aus.</div>
                    </div>                    
                </div>                
            </div>        
        </div> <!-- /#wrapper -->        
        
        <script src="../lib/js/jquery-3.2.1.min.js"></script>
        <script src="../lib/js/bootstrap.min.js"></script>                         
        <script src="js/report.js"></script>
    </body>
</html>