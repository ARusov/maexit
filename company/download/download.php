<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MAEXIT | Downloads</title>

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

<div class="wrapper">
    <?php include("../core/sidebar.php") ?>

    <!-- Page Content Holder -->
    <div id="content">
        <?php include("../core/navbar.php") ?>
        <div class="main">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="app-title">Persönlicher Downloadbereich</h2>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Maexit</div>
                            <div class="panel-body">
                                <a href="files/Maexit_Marktfaehigkeits_Report.pdf" download="Maexit-Marktfähigkeits-Report">
                                    <button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o fa-5x"></i><span class="btn-download">Maexit-Marktfähigkeits-Report</span></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">BizEquity</div>
                            <div class="panel-body">
                                <a href="files/Insurance_Agency_Over_10M.pdf" download="Report Unternehmensbewertung">
                                    <button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o fa-5x"></i><span class="btn-download">Report Unternehmensbewertung</span></button>
                                </a>
                                <a href="files/IV_Sample_Report.pdf" download="Report Unternehmensabsicherung">
                                    <button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o fa-5x"></i><span class="btn-download">Report Unternehmensabsicherung</span></button>
                                </a>
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
