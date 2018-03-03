<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!--<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon.png">    -->

        <title>MAEXIT | Consultant-Dashboard</title>

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
                        <li><a href="../profile/index.php">Profil</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>      
        
        <div class="divider">
            <div class="container divider-container">
                <div class="row divider-row">
                    <div class="col-md-5 divider-title">
                        Kursmanager <br/>
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
            <li><a href="../profile/index.php"><i class="fa fa-user fa-fw"></i>Profil</a></li>
        </ul>
        
        <div class="main">      
            <div class="container">
                <div class="row card">
                    <div class="tabbable">
                        <ul class="nav nav-pills nav-stacked col-md-3">
                            <li class="active"><a href="#a" data-toggle="tab"><span class="circle">1</span>Kursinfo</a></li>
                            <li><a href="#b" data-toggle="tab"><span class="circle">2</span><span class="type-text">Lektionen</span></a></li>
                            <li><a href="#c" data-toggle="tab"><span class="circle">3</span>KVD / Branchen</a></li>
                        </ul>
                        
                        <div class="tab-content col-md-9">
                            <div class="tab-pane active" id="a">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3 class="tab-pane-title">Kursinfo</h3>
                                    </div>
                                    <div class="col-md-9">                                        
                                        <button type="button" class="btn btn-success btn-flat btn-save" onclick="saveTraining()">Speichern</button> 
                                        <button type="button" class="btn btn-info btn-flat btn-preview">Vorschau</button> 
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">
                                    <div class="form-group has-feedback">
                                        <label>Kurstitel</label>
                                        <input type="text" class="form-control" id="training-title" maxlength="60" placeholder="Fügen Sie den Titel Ihres Trainings ein.">
                                        <span class="form-control-feedback">60</span>
                                    </div>
                                    
                                    <div class="form-group has-feedback">
                                        <label>Kursuntertitel</label>
                                        <input type="text" class="form-control" id="training-subtitle" maxlength="120" placeholder="Fügen Sie den Untertitel Ihres Trainings ein.">
                                        <span class="form-control-feedback">120</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Beschreibung</label>
                                        <textarea rows="5" class="form-control" id="training-desc"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Sprache</label>
                                        <select class="form-control width-25" id="training-lang">
                                            <option value="de">Deutsch</option>
                                            <option value="en">Englisch</option>
                                        </select>
                                    </div>
                                    
                                    <label>Kurs-Cover</label> <br/>
                                    <div class="col-md-7 no-gutter">
                                        <img src="../core/img/default-cover.png" class="img-responsive training-cover">
                                    </div>
                                    <div class="col-md-5 cover-info">
                                        <span>
                                            Das Bild muss 2048 x 1152 Pixel groß sein. Zulässige Formate sind .jpg, .jpeg, .gif, .bmp oder .png.
                                        </span>
                                        <div class="input-group bottom">                                                                                        
                                            <form id="uploadCover" enctype="multipart/form-data">
                                                <div class="input-group-btn">
                                                    <input id="cover-filename" type="text" class="form-control" placeholder="Keine Datei ausgewählt." readonly style="width:70%">
                                                    <input id="cover-file" name="upload_cover" type="file" accept="image/*" class="hidden"/>
                                                    <button type="button" name="submit_cover" class="btn btn-default btn-input" onclick="pickCover()">Bild hochladen</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>                                       
                                </div>  <!-- /tab-inner -->  
                                <div class="card-title-line"></div>                                
                                <button type="button" class="btn btn-success btn-flat btn-save" onclick="saveTraining()">Speichern</button>
                                <button type="button" class="btn btn-info btn-flat btn-preview">Vorschau</button>
                            </div> <!-- /tab-a -->  
                            
                            
                            <div class="tab-pane" id="b">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3 class="tab-pane-title">Lektionen</h3>
                                    </div>
                                    <div class="col-md-9">
                                        <button type="button" class="btn btn-info btn-flat btn-preview">Vorschau</button>
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">
                                    <div class="info-line">Gestalten Sie Ihren Kurs, indem Sie hier Abschnitte, Lektionen mit Ihren Videos und nützliches Infomaterial erstellen.</div>
                                    
                                    <div class="sections"></div>
                                                                       
                                    <button id="btn-insertZone" class="btn btn-default btn-md btn-flat btn-maexit" onclick="insert_zone()">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Abschnitt hinzufügen
                                    </button>
                                </div>
                                <div class="card-title-line"></div>
                                <button type="button" class="btn btn-info btn-flat btn-preview">Vorschau</button>
                            </div> <!-- /tab-b -->  
                            
                            
                            <div class="tab-pane" id="c">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="tab-pane-title">Kategorie &amp; Branchen</h3>                                        
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default btn-flat btn-save btn-maexit" disabled>Jetzt veröffentlichen</button>
                                        <button type="button" class="btn btn-success btn-flat btn-save" onclick="saveKvd()">Speichern</button>
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                
                                <div class="tab-inner">
                                    <div class="info-line">Geben Sie hier an für welche Kategorie und Branchen ihr Kurs geeignet ist.</div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Key Value Driver</label>
                                                <select class="form-control" id="kvd">                                                    
                                                    <option value="-1">Bitte auswählen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategorie</label>
                                                <select class="form-control" id="category" disabled>
                                                    <option value="-1">Bitte auswählen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Branchen</label> <br/>
                                        <div class="industries"></div>                                        
                                    </div>
                                </div>
                                <div class="card-title-line"></div>
                                <button type="button" class="btn btn-default btn-flat btn-save btn-maexit" disabled>Jetzt veröffentlichen</button>
                                <button type="button" class="btn btn-success btn-flat btn-save" onclick="saveKvd()">Speichern</button>                                
                            </div>                                                        
                        </div>
                    </div>
                    <!-- /tabs --> 
                </div>            
            </div>                       
        </div><!-- /MAIN -->
        
        <!-- Modal -->
        <div id="m-addVideo" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">     
                        <div class="form-group has-feedback" style="margin-bottom: 0">
                            <input type="text" class="form-control video-title" maxlength="60" placeholder="KURZBESCHREIBUNG ZUM VIDEO / TITEL DER LEKTION" style="margin-left: 15px; width: 97%">
                            <span class="form-control-feedback" style="margin-right: 16px">60</span>
                        </div>                        
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Videoquelle</label>
                                        <select class="form-control select-source" style="font-family:'FontAwesome', Arial;">
                                            <option value="file">&#xf1c8; Datei hochladen</option>
                                            <!--<option style="color: #cd201f" value="youtube">&#xf16a; Youtube</option>-->
                                        </select>
                                    </div>                        
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <div class="input-group" style="margin-top: 5px;">                                          
                                        <input type="text" class="form-control filename" placeholder="Keine Datei ausgewählt." readonly>
                                        <div class="input-group-btn">
                                            <button class="btn btn-default btn-input" type="button" onclick="pickVideo()">Video auswählen</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row progress-row hidden">
                                <div class="col-md-12">
                                    <label>Fortschritt</label>
                                    <div class='progress'>
                                        <div class='bar'></div>
                                        <div class='percent'>0%</div>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li class="error error-no-title hidden"><div >Bitte geben Sie einen Lektionstitel ein!</div></li>
                                <li class="error error-no-file hidden"><div >Bitte wählen Sie ein Video aus!</div></li>
                            </ul>                            
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat btn-cancel" data-dismiss="modal">Abbrechen</button>
                        <form action="upload_video.php" id="uploadFormVideo" name="frmupload" method="post" enctype="multipart/form-data" style="display:inline-block"> 
                            <input id="video-file" name="upload_file" type="file" accept="video/*" class="hidden"/>
                            <button type="submit" name='submit_video' class="btn btn-default btn-flat btn-maexit btn-upload" onclick="uploadVideo()">Video hochladen</button>
                            <button type="button" class="btn btn-danger btn-flat btn-cancel-upload hidden">Upload abbrechen</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div id="m-addFile" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">     
                        <div class="form-group has-feedback" style="margin-bottom: 0">
                            <input type="text" class="form-control file-title" maxlength="60" placeholder="ANZEIGETITEL DER DATEI" style="margin-left: 15px; width: 97%">
                            <span class="form-control-feedback" style="margin-right: 16px">60</span>
                        </div>                        
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quelle</label>
                                        <select class="form-control select-source" style="font-family:'FontAwesome', Arial;">
                                            <option value="file">&#xf1c8; Datei hochladen</option>
                                            <!--<option style="color: #cd201f" value="youtube">&#xf16a; Youtube</option>-->
                                        </select>
                                    </div>                        
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <div class="input-group" style="margin-top: 5px;">                                          
                                        <input type="text" class="form-control filename" placeholder="Keine Datei ausgewählt." readonly>
                                        <div class="input-group-btn">
                                            <button class="btn btn-default btn-input" type="button" onclick="pickFile()">Datei auswählen</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row progress-row hidden">
                                <div class="col-md-12">
                                    <label>Fortschritt</label>
                                    <div class='progress'>
                                        <div class='bar'></div>
                                        <div class='percent'>0%</div>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li class="error error-no-title hidden"><div >Bitte geben Sie einen Anzeigetitel ein!</div></li>
                                <li class="error error-no-file hidden"><div >Bitte wählen Sie eine Datei aus!</div></li>
                            </ul>                            
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat btn-cancel" data-dismiss="modal">Abbrechen</button>
                        <form action="upload_file.php" id="uploadFormFile" name="frmupload" method="post" enctype="multipart/form-data" style="display:inline-block"> 
                            <input id="file" name="upload_file" type="file" class="hidden" />
                            <button type="submit" name='submit_file' class="btn btn-default btn-flat btn-maexit btn-upload" onclick="uploadFile()">Datei hochladen</button>
                            <button type="button" class="btn btn-danger btn-flat btn-cancel-upload hidden">Upload abbrechen</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div id="m-playVideo" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <video id="video-preview" controls>
                            <source src="" type="">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Schließen</button>                       
                    </div>
                </div>
            </div>
        </div>
        
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