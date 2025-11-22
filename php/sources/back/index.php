<?php 
session_start();
error_reporting(0);
?>
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
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">

<title>Com advance Communication</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <img src="images/logo.png"></p>
        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="index.php" method="post">
        <?php
include('config/config.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
$pass = sha1($pass);
if (!empty($user) && !empty($pass)){
    $sql="SELECT id FROM user WHERE LOGIN='$user' AND PASS='$pass'";
    $req= mysql_query($sql) or die (mysql_error());
    if(mysql_num_rows($req)>0){
    $_SESSION ['pass'] = $pass;
    $_SESSION ['user'] = $user;
echo "<script type='text/javascript'>document.location.replace('accueil.php');</script>";
    }
    else{
        echo "<span style='color:red'><center>Identifiants incorrect</center></span>";
    }
}

?>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="user" class="mws-login-username required" placeholder="nom">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="pass" class="mws-login-password required" placeholder="mot de passe">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Se connecter" class="btn btn-success mws-login-button">
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
