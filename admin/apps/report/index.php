<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>MAEXIT | Report-Designer</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../../../lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../lib/css/trumbowyg.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="../../assets/logo.png" class="img-responsive">
                </div>

                <ul class="list-unstyled components">
                    <!--<li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="../../index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#">Report-Designer</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>                                
                            </button>
                            <h1 class="app-title">Report-Designer</h1>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!--<ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>-->
                        </div>
                    </div>
               </nav>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="report">Report-Content:</label>
                            <textarea id="report" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Variablen:</label> <br/>
                            {value_structures_and_processes} <br/>                            
                            {value_cashflow_efficiency} <br/>                            
                            {value_revenue_reliability} <br/>                            
                            {value_independency} <br/>                            
                            {value_potential_for_growth} <br/>                            
                            {value_tech_innovation} <br/>                            
                            {value_exchangeability} <br/>                            
                            {value_desirability} <br/>                            
                        </div>
                    </div>
                    
                     <div class="row" style="margin-top: 25px;">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Speichern</button>                        
                            <button type="button" class="btn btn-info" onclick="preview()"><i class="fa fa-eye" aria-hidden="true"></i> Vorschau</button>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery CDN -->
        <script src="../../../lib/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="../../../lib/js/bootstrap.min.js"></script>
        <script src="../../../lib/js/trumbowyg.min.js"></script>
        <script src="../../../lib/js/jspdf.min.js"></script>
        <script src="app.js"></script>
    </body>
</html>
