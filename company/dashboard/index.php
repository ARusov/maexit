<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>MAEXIT | Company-Dashboard</title>

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
        <link href="kvd.css" rel="stylesheet">
    </head>

    <?php
    require_once('../../includes/config.php');
    if (!$user->is_logged_in()) {
        header('Location: /' );
        exit();
    }
    ?>

    <body>
        <div class="wrapper">


            <?php include("../core/sidebar.php") ?>
            <!-- Page Content Holder -->
            <div id="content">
                <?php include("../core/navbar.php") ?>
                <div class="main">       
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="app-title">Company-Dashboard</h2>
                                
                            
                                <div class="alert alert-success" style="font-size: 120%;">
                                    <i class="fa fa-file-text" aria-hidden="true"></i> <strong>Ihr Marktfähigkeits-Report steht zum Download bereit:</strong> <button class="btn btn-info">Download</button>
                                </div>                                                                
                                
                            </div>
                        </div>
                        
                        
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Ihre aktuelle Maexit-Bewertung</div>
                                    <div class="panel-body kvd">
                                        <div class="circle-wrapper" id="0">
                                            <div class="c100 small green1 kvd-0">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Structures and Processes
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div>                          

                                        <div class="circle-wrapper" id="1">
                                            <div class="c100 small blue1 kvd-1">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Cashflow Efficiency
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div>

                                        <div class="circle-wrapper" id="2">
                                            <div class="c100 small blue2 kvd-2">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Revenue Reliability
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 

                                        <div class="circle-wrapper" id="3">
                                            <div class="c100 small yellow1 kvd-3">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Independency
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 

                                        <div class="circle-wrapper" id="4">
                                            <div class="c100 small red1 kvd-4">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Potential for Growth
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 

                                        <div class="circle-wrapper" id="5">
                                            <div class="c100 small red2 kvd-5">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Tech-Innovation
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 

                                        <div class="circle-wrapper" id="6">
                                            <div class="c100 small yellow2 kvd-6">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Exchangeability
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 

                                        <div class="circle-wrapper" id="7">
                                            <div class="c100 small green2 kvd-7">
                                                <span></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                            <div class="circle-box small">
                                                <div class="circle-box-title">
                                                    Desirability
                                                </div>   
                                                <div class="circle-box-text">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                                </div> 
                                            </div>  
                                        </div> 
                                    </div>
                                </div>                                
                            </div>
                            
                            <div class="col-md-6 influencer-wrapper hide">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Einflussfaktoren für: <span class="influencer-name"></span></div>
                                    <div class="panel-body influencer">
                                                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                </div>                
            </div>
        </div>

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
