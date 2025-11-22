<?php 

session_start();
if (!empty($_SESSION['user'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['user'];
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
<link rel="stylesheet" type="text/css" href="custom-plugins/wizard/wizard.css" media="screen">

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
<?php
 
function truncate($string, $max_length = 30, $replacement = '', $trunc_at_space = false)
{
    $max_length -= strlen($replacement);
    $string_length = strlen($string);
 
    if($string_length <= $max_length)
        return $string;
 
    if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
        $max_length = $space_position;
 
    return substr_replace($string, $replacement, $max_length);
}
 
?>
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
                        <li><a href="deconnection.php">Deconnexion</a></li>
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
<li class="active"><a href="accueil.php"><i class="icon-home"></i> Accueil</a></li>
<li><a href='gentleman/index.php'><i class='icon-road'></i> gentleman</a></li>
<li><a href='marathon/index.php'><i class='icon-road'></i> marathon</a></li>
<?php
include 'config/config.php';
$sql = "SELECT menu_base.nom, menu_base.lien ,user.login
FROM autorisation
INNER JOIN menu_base ON menu_base.id = autorisation.autorisation
INNER JOIN user ON user.id = autorisation.user
where login = '$nom_connexion'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$lien = [];
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien[]=$mot['lien'];

}
if (in_array("agenda/index.php", $lien)) {echo "<li><a href='agenda/index.php'><i class='icon-calendar'></i> Résultats</a></li>";}
$sql = "SELECT * FROM  menu_base WHERE nom='photo'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $photo=$mot['lien'];
    if ($photo=='') {
        # code...
    } else {
        echo "<li><a href='".$photo."'><i class='icon-pictures'></i> photos</a></li>";
    }
    

}
if (in_array("video/index.php", $lien)) {echo "<li><a href='video/index.php'><i class='icon-television'></i> Video</a></li>";}
if (in_array("statistique/index.php", $lien)) {echo "<li><a href='statistique/index.php'><i class='icon-stats'></i> statistique</a></li>";}
if (in_array("blog/index.php", $lien)) {echo "<li><a href='blog/index.php'><i class='icon-blogger'></i> blog</a></li>";}
if (in_array("shop/index.php", $lien)) {echo "<li><a href='shop/index.php'><i class='icon-shopping-cart'></i> shop</a></li>";}
?>

                
                    
                    <li>
                        <a href="#"><i class="icon-list"></i> Pages</a>
                        <ul>
    <li><a href='sorties/index.php'>sorties</a></li>
    <li><a href='run&bike/index.php'>run & bike</a></li>
    <li><a href='100poursang/index.php'>100 pour sang</a></li>
    <li><a href='rando_tdf/index.php'>Rando tour de france</a></li>
                    </ul>
                </li>

<?php
if (in_array("partenaire/index.php", $lien)) {echo "<li><a href='partenaire/index.php'><i class='icon-users'></i> partenaire</a></li>";}
if (in_array("messagerie/index.php", $lien)) {echo "<li><a href='messagerie/index.php'><i class='icon-envelope'></i> messagerie</a></li>";}
if (in_array("parametres/index.php", $lien)) {echo "<li><a href='parametres/index.php'><i class='icon-cogs'></i> parametres</a></li>";}
?>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
             <div class="mws-panel grid_8">
             <center><h1>Bienvenue sur l'outil de gestion de votre site internet</h1></center>
             </div>
<?php
if (in_array("blog/index.php", $lien)) {
?>
                <div class="mws-panel grid_3">
                                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Dernier article du blog en ligne</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    
                                    <th></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php 

$sql ="SELECT * FROM  `blog` ORDER BY id DESC LIMIT 1 ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $titre=$mot['titre'];
    $photo=$mot['photo'];
    $texte=$mot['texte'];
    $str = truncate($texte, 180, '...', true);




   

?>
                                <tr><td><center><?php echo $titre;?></center></td></tr>
                                <tr><td><center><a href="blog/modif_article.php?id=<?php echo $id;?>"><img src="<?php echo $photo;?>"></a></center></td></tr>
                                <tr><td><center><?php echo $str;?></center></td></tr>
<?php
}
?>
                                
                            </tbody>
                        </table>
</div>
</div>
<?php
;}
?>
               
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Comadvance 2014.
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
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="plugins/flot/jquery.flot.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.dashboard.js"></script>

</body>
</html>
