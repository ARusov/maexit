<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="../../favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title >maexit | Videokurse</title>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="../core/core.css" rel="stylesheet">
    </head>
    
    <body>
        <?php            
            include("../core/searchbar.php");
        ?>
        
        <div id="wrapper">
        <?php            
            include("../core/menu.php");
        ?>
            
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container-fluid main">                
                
                <div class="feature-box">
                    <img class="feature-img" src="images/top.jpg" alt="" />                    
                    <img class="feature-img" src="images/top2.jpg" alt="" />
                    <img class="feature-img" src="images/top3.jpg" alt="" />
                </div>
                
                <h4>Neue Kurse in "Structures and Processes"</h4>
                <hr class="titel-divider">
                
                <div class="card card-popover" data-toggle="popover" title="Professionelle Video-Produktion mit Smartphone und Kamera">
                    <div class="card-image">
                        <img class="img-responsive" src="images/1.jpg">   
                    </div><!-- card image -->

                    <div class="card-content">
                        <h4 class="card-title">Professionelle Video-Produktion mit Smartphone und Kamera</h4>
                        <h4 class="card-author">Oleg Warkentin</h4>
                        <div class="row">    
                            <div class="col-md-12">
                                <p class="card-function">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i> 
                                    4.5 (144)
                                </p>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-7">
                                <i class="fa fa-play-circle"></i> 28 Lektionen
                            </div>
                            <div class="col-md-5">
                                <i class="fa fa-clock-o"></i> 9 Std.
                            </div>
                        </div>
                    </div><!-- card content -->                    
                </div>
                
                <div class="card card-popover" data-toggle="popover" title="Professionelle Video-Produktion mit Smartphone und Kamera">
                    <div class="card-image">
                        <img class="img-responsive" src="images/2.jpg">   
                    </div><!-- card image -->

                    <div class="card-content" data-rel="2">
                        <h4 class="card-title">Professionelle Video-Produktion mit Smartphone und Kamera</h4>
                        <h4 class="card-author">Oleg Warkentin</h4>
                        <div class="row">    
                            <div class="col-md-12">
                                <p class="card-function">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i> 
                                    4.5 (144)
                                </p>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-7">
                                <i class="fa fa-play-circle"></i> 28 Lektionen
                            </div>
                            <div class="col-md-5">
                                <i class="fa fa-clock-o"></i> 9 Std.
                            </div>
                        </div>
                    </div><!-- card content -->
                
                </div>
                
                <div id="popover_content_wrapper" style="display: none">
                    <div>
                        Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
                    </div>
                    <hr>
                    <button class="btn btn-default">
                        <i class="fa fa-play-circle"></i> Jetzt ansehen
                    </button>
                    <button class="btn ma-blue-bg">
                        <i class="fa fa-heart ma-white"></i>
                    </button>
                </div><!-- /popover_content_wrapper -->
            </div>
        </div> <!-- /#page-content-wrapper -->
        </div> <!-- /#wrapper -->

        
        <script src="../../lib/js/jquery-3.2.1.min.js"></script>
        <script src="../../lib/js/bootstrap.min.js"></script>
        
        <script src="../core/core.js"></script>
    </body>
</html>