<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title>MAEXIT | Consultant Profil</title>

        <!-- Open Sans -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">  
        <link href="../../lib/css/animate.css" rel="stylesheet">  
        <!-- Lib -->
        <link href="../../lib/css/trumbowyg.min.css" rel="stylesheet">  
        <link href="../../lib/css/jquery-ui.min.css" rel="stylesheet">  
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
                    <a class="navbar-brand" href="../dashboard/index.php">
                        <img alt="maexit" src="../core/img/logo.png" class="img-responsive brand-logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../dashboard/index.php">Dashboard</a></li>
                        <li class="active"><a href="#">Profil</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>      
        
        <div class="divider">
            <div class="container divider-container">
                <div class="row divider-row">
                    <div class="col-md-5 divider-title">
                        Ihr Profil <br/>
                        <span class="divider-subtitle"></span>
                    </div>
                    <div class="col-md-5 col-md-offset-2 divider-info">

                    </div>
                </div>
            </div>
        </div>
        
        <ul class="nav nav-pills nav-stacked menu">
            <li class="menu-title">Menü</li>
            <li><a href="../dashboard/index.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li class="active"><a href="#"><i class="fa fa-user fa-fw"></i>Profil</a></li>
        </ul>
        
        <div class="main">      
            <div class="container">
                <div class="row card">
                    <div class="tabbable">
                        <ul class="nav nav-pills nav-stacked col-md-3">
                            <li class="active"><a href="#a" data-toggle="tab"><span class="circle">1</span>Stammdaten</a></li>
                            <li><a href="#b" data-toggle="tab"><span class="circle">2</span>Zahlungsinformationen</a></li>
                            <li><a href="#c" data-toggle="tab"><span class="circle">3</span>Konto / Einstellungen</a></li>
                        </ul>
                        
                        <div class="tab-content col-md-9">
                            <div class="tab-pane active" id="a">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3 class="tab-pane-title">Stammdaten</h3>
                                    </div>
                                    <div class="col-md-9">                                        
                                        <button type="button" class="btn btn-success btn-flat btn-save" onclick="save()" disabled>Speichern</button> 
                                        <button type="button" class="btn btn-info btn-flat btn-preview" disabled>Vorschau</button> 
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">                                    
                                    <div class="form-group has-feedback">
                                        <label>Firmenname</label>
                                        <input type="text" class="form-control" id="profile-company-name" maxlength="80">
                                        <span class="form-control-feedback">80</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Branche</label>
                                        <select class="form-control width-50" id="profile-business">
                                            <option value="-1">Bitte auswählen</option>
                                            <option value="0">Finanzen und Versicherungen</option>
                                            <option value="1">Marketing und Vertrieb</option>
                                            <option value="2">Markt Analyse</option>
                                            <option value="3">Unternehmensführung und -betrieb</option>
                                            <option value="4">Organisation und HR</option>
                                            <option value="5">Strategie</option>
                                            <option value="6">Steuerberater und Wirtschaftsprüfer</option>
                                            <option value="7">Anwälte und Notare</option>
                                            <option value="8">M&amp;A Berater</option>
                                            <option value="9">IT</option>
                                            <option value="10">Sonstige</option>
                                        </select>
                                    </div>
                                    
                                    <br/>
                                    <label><u>Ansprechpartner</u></label>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Anrede</label>
                                                <select class="form-control" id="profile-adress">
                                                    <option value="1">Herr</option>
                                                    <option value="2">Frau</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Titel</label>
                                                <input type="text" class="form-control" id="profile-title" maxlength="20">
                                                <span class="form-control-feedback">20</span>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Vorname</label>
                                                <input type="text" class="form-control" id="profile-firstname" maxlength="50">
                                                <span class="form-control-feedback">50</span>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Nachname</label>
                                                <input type="text" class="form-control" id="profile-lastname" maxlength="50">
                                                <span class="form-control-feedback">50</span>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <br/>
                                    <label><u>Anschrift</u></label>
                                    
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group has-feedback">
                                                <label>Straße</label>
                                                <input type="text" class="form-control" id="profile-street" maxlength="60">
                                                <span class="form-control-feedback">60</span>
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label>Hausnummer</label>
                                                <input type="text" class="form-control" id="profile-street-number" maxlength="10">
                                                <span class="form-control-feedback">10</span>
                                            </div>
                                        </div> 
                                    </div>                                                                        
                                    
                                    <div class="form-group has-feedback">
                                        <label>Adresszusatz</label>
                                        <input type="text" class="form-control" id="profile-additional" maxlength="60">
                                        <span class="form-control-feedback">60</span>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <label>PLZ</label>
                                                <input type="text" class="form-control" id="profile-zip" maxlength="10">
                                                <span class="form-control-feedback">10</span>
                                            </div>
                                        </div> 
                                        <div class="col-md-8">
                                            <div class="form-group has-feedback">
                                                <label>Ort</label>
                                                <input type="text" class="form-control" id="profile-city" maxlength="60">
                                                <span class="form-control-feedback">60</span>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-group has-feedback">
                                        <label>Land</label>
                                        <select class="form-control" id="profile-country">
                                            <option value="de">Deutschland</option>
                                            <option value="at">Österreich</option>
                                            <option value="ch">Schweiz</option>
                                        </select>
                                    </div>
                                    
                                    <br/>
                                    <label><u>Profil</u></label>
                                    
                                    <div class="form-group has-feedback">
                                        <label>Webseite</label>
                                        <input type="text" class="form-control" id="profile-website" maxlength="80" placeholder="http://www.maexit.net">
                                        <span class="form-control-feedback">80</span>
                                    </div>
                                    
                                    
                                    <br/>
                                    <div class="form-group">
                                        <label>Beschreibung</label>
                                        <textarea rows="5" class="form-control" id="profile-desc"></textarea>
                                    </div>                                                                        
                                    
                                    <!--<div class="form-group">
                                        <label>Sprache</label>
                                        <select class="form-control width-25" id="training-lang">
                                            <option value="de">Deutsch</option>
                                            <option value="en">Englisch</option>
                                        </select>
                                    </div>-->
                                                                         
                                </div>  <!-- /tab-inner -->  
                                <div class="card-title-line"></div>                                
                                <button type="button" class="btn btn-success btn-flat btn-save" onclick="save()" disabled>Speichern</button>
                                <button type="button" class="btn btn-info btn-flat btn-preview" disabled>Vorschau</button>
                            </div> <!-- /tab-a -->  
                            
                            
                            <div class="tab-pane" id="b">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3 class="tab-pane-title">Zahlungsinformationen</h3>
                                    </div>
                                    <div class="col-md-9">
                                        <!--<button type="button" class="btn btn-info btn-flat btn-preview" disabled>Vorschau</button>-->
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">
                                    <div class="info-line">Maexit ist bis zum Ende der Beta-Phase vollkommen kostenlos für Sie!</div>                                                                    
                                </div>
                                <div class="card-title-line"></div>
                                <!--<button type="button" class="btn btn-info btn-flat btn-preview" disabled>Vorschau</button>-->
                            </div> <!-- /tab-b -->  
                            
                            
                            <div class="tab-pane" id="c">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="tab-pane-title">Konto / Einstellungen</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-info btn-flat btn-settings" disabled>Email-Adresse ändern</button>
                                        <button type="button" class="btn btn-info btn-flat btn-settings" disabled>Passwort ändern</button>
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">
                                    <div class="info-line">Hier finden Sie Ihre Accountinformationen und Einstellungen.</div>                                                                    
                                    
                                    <div class="form-group">
                                        <label>Ihre Email-Adresse:</label>
                                        <span>consultant@maexit.net</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Mitglied seit:</label>
                                        <span>01.01.2018</span>
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                <button type="button" class="btn btn-info btn-flat btn-settings" disabled>Email-Adresse ändern</button>
                                        <button type="button" class="btn btn-info btn-flat btn-settings" disabled>Passwort ändern</button>
                            </div> <!-- /tab-c --> 
                            
                        </div>
                    </div>
                    <!-- /tabs --> 
                </div>            
            </div>                       
        </div><!-- /MAIN -->
        
    <!-- jQuery -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>                        
    <script src="../../lib/js/jquery-ui.min.js"></script>                        
    <script src="../../lib/js/jquery.form.min.js"></script>                      
    <!-- Bootstrap -->
    <script src="../../lib/js/bootstrap.min.js"></script> 
    <script src="../../lib/js/bootstrap-notify.min.js"></script> 
    <!-- Lib -->
    <script src="../../lib/js/trumbowyg.min.js"></script>
    <!-- Custom -->        
    <script src="../core/util.js"></script>               
    <script src="app.js"></script>                
    </body>
</html>