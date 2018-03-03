<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title >maexit | Report-Light</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom -->
        <link href="style.css" rel="stylesheet">
    </head>
    
    <body>                  
        <div id="wrapper">
            <div class="container">
                <div class="row header">
                    <img src="logo.png" class="img-responsive logo">
                    <label class="subline">Report light</label>
                </div>
                
                <div class="row box">
                    <div style="width: 95%; margin: 0 auto">
                        <canvas id="chart" width="400" height="200"></canvas>
                    </div>        
                </div>
            </div>
            
        </div> <!-- /#wrapper -->        
        
        <script src="../lib/js/jquery-3.2.1.min.js"></script>
        <script src="../lib/js/bootstrap.min.js"></script>                        
        <script src="Chart.bundle.min.js"></script>
        <script src="report.js"></script>
    </body>
</html>