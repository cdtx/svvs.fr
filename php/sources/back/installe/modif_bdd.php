<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="fr"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="../css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="../css/mws-theme.css" media="screen">

<title>Com advance Communication</title>

</head>

<body>
    <div id="mws-fonction-wrapper">
        <img src="../images/logo.png"></p>
        <div id="mws-login">

<h1>Modification BDD</h1>
            
            <div id="mws-login-form">
                <form class="mws-form" action="envoie_modif_bdd.php" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="adresse" class="mws-login-username required" placeholder="adresse base de donnée">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="nom" class="mws-login-username required" placeholder="nom base de donnée">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="login" class="mws-login-username required" placeholder="login">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="password" class="mws-login-password required" placeholder="password">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">

                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Modifier" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>

            
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="js/core/login.js"></script>

</body>
</html>
