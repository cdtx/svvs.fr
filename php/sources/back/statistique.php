<?php 
error_reporting(0);
session_start();
if (!empty($_SESSION['login'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['login'];
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

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/themer.css" media="screen">

<title>Com Advance communication</title>

</head>

<body>


	   <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
           


                
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom='message'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $test=$mot['lien'];
    if ($test=='') {
        
    } else {
?>
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
        <?php
include 'config/config.php';
$sql = "SELECT COUNT(*) as nombre FROM message  where lecture=''"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nombre=$mot['nombre'];
    if ($nombre=='0') {
        # code...
    } else {
        echo "<span class='mws-dropdown-notif'>".$nombre."</span>";
    }
    
    
}
?>
                <!-- Unred messages count -->
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-messages">
<?php
include 'config/config.php';
$sql = "SELECT * FROM  message Order by id DESC Limit 3"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['nom'];
    $message=$mot['message'];
    $date=$mot['date'];
    $lecture=$mot['lecture'];
    if ($lecture=='') {
        echo "<li class='unread'>";
    } else {
        echo "<li class='read'>";
    }
    

?>
                            
                                <a href="#">
                                    <span class="sender"><?php echo $nom;?></span>
                                    <span class="message">
                                        <?php echo $message;?>
                                    </span>
                                    <span class="time">
                                        <?php echo $date;?>
                                    </span>
                                </a>
                            </li>
<?php
}
?>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">Voir tous les messages</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
    }
    
}
?>     





            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">             
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Bonjour, <?php echo $nom_connexion;?>
                    </div>
                    <ul>
                        <li><a href="#">Changer mot de passe</a></li>
                        <li><a href="deconnection.php">Deconection</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
          
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li><a href="dashboard.html"><i class="icon-home"></i> Accueil</a></li>
                    <li class="active"><a href="statistique.php"><i class="icon-graph"></i> Statistique</a></li>
<?php
include 'config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom='photo'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien=$mot['lien'];
    if ($lien=='') {
        
    } else {
?>
<li><a href="<?php echo $lien;?>"><i class="icon-pictures"></i> Photos</a></li>
<?php
    }
    
}
?>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom='blog'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien=$mot['lien'];
    if ($lien=='') {
        
    } else {
?>
<li><a href="blog/index.php"><i class="icon-align-center"></i> Blog</a></li>
<?php
    }
    
}
?>                   
                    
                    <li>
                        <a href="#"><i class="icon-list"></i> Pages</a>
                        <ul>
<?php
include 'config/config.php';
$sql = "SELECT * FROM  menu "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['nom'];
    $lien=$mot['lien'];
    echo "<li><a href='".$lien."'>".$nom."</a></li>";
}
?>
                    </ul>
                    </li>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom='message'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien=$mot['lien'];
    if ($lien=='') {
        
    } else {
?>
<li><a href="typography.html"><i class="icon-font"></i> Message</a></li>
<?php
    }
    
}
?>  

                    <li><a href="widgets.html"><i class="icon-cogs"></i> Parametres</a></li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">

            	<!-- Statistics Button Container -->
            	<div class="mws-stat-container clearfix">
                	<h3>Statistique du : <span style="color:#c00;">1 fevrier 2014</span>  au <span style="color:#c00;">1 mars 2014</span></h3><br>
                    <!-- Statistic Item -->
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-clock-"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Temps moyen de visite</span>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  autre WHERE nom='temps moyen'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{
    $temps_moyen=$mot['chiffre'];
}
?>
                            <span class="mws-stat-value"><?php echo $temps_moyen;?></span>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-page"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Nombres de pages vues</span>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  autre WHERE nom='nbr pages vues'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{
    $nbr_vue=$mot['chiffre'];
}
?>
                            <span class="mws-stat-value"><?php echo $nbr_vue;?></span>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-reseller-programm"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">nombre de visiteurs total</span>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  autre WHERE nom='nbr visiteurs total'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{
    $nbrtotal=$mot['chiffre'];
}
?>
                            <span class="mws-stat-value"><?php echo $nbrtotal;?></span>
                        </span>
                    </a>
                    
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-premium-support"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">nombre de visiteurs unique total</span>
 <?php
include 'config/config.php';
$sql = "SELECT * FROM  autre WHERE nom='nbr visiteurs total unique'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{
    $nbrunique=$mot['chiffre'];
}
?>
                            <span class="mws-stat-value"><?php echo $nbrunique;?></span>
                        </span>
                    </a>                   

                </div>
                
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-graph"></i> Fréquence des visites par jour</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-line-chart" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>              
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-chart"></i> Acquisition</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-pie-1" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>
                
               
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="plugins/flot/jquery.flot.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.charts.js"></script>

</body>
</html>