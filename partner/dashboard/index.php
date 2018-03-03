<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title>MAEXIT | Partner</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">   
        <link href="../../lib/css/animate.css" rel="stylesheet">  
        <!-- Open Sans -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!-- Custom Style -->
        <link href="../core/core.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="line-blue"></div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img alt="maexit" src="../core/img/logo.png" class="img-responsive brand-logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>     
        
        <div class="main">            
            <div class="divider">
                <div class="container divider-container">
                    <div class="row divider-row">
                        <div class="col-md-12 divider-title">
                            partner-dashboard
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><span>Ihr Partner-link:</span> <small class="link-info">Ihre Partner-ID ist bereits in dem Link enthalten.</small></h4>                
                
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly id="partner-link">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" onclick="copyLink()"><i class="fa fa-clone" aria-hidden="true"></i></button>
                                    </span>
                                </div><!-- /input-group -->                               
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Ihre Unternehmen</div>
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Email</td>
                                            <td>Branche</td>
                                            <td>Report ausgefüllt am</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody class="companies"></tbody>
                                </table>                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div><!-- /MAIN -->
        
        
    <!-- jQuery -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>                        
    <!-- Bootstrap -->
    <script src="../../lib/js/bootstrap.min.js"></script> 
    <script src="../../lib/js/bootstrap-notify.min.js"></script> 
    <!-- Custom -->
    <script src="../core/util.js"></script>   
    <script src="app.js"></script>                
    </body>
</html>