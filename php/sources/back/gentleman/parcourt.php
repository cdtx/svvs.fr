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

<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="fr"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="../plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="../custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/fonts/icomoon/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="../jui/css/jquery.ui.timepicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/icons/icol32.css" media="screen">
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="../css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="../jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="../jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="../css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/themer.css" media="screen">

<title>Com Advance communication</title>
<?php include '../config/texte.php';?>
</head>

<body>


    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="../images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
           


                
 <?php
include '../config/config.php';
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
<li><a href="../accueil.php"><i class="icon-home"></i> Accueil</a></li>
                    <li class="active">
                        <a href="#"><i class="icon-road"></i> Gentleman</a>
                        <ul>
    <li><a href='index.php'> inscription</a></li>                          
  <li><a href='presentation.php'> Présentation</a></li>
  <li><a href='reglement.php'> Règlement</a></li>
  <li><a href='parcourt.php'> Parcourt</a></li>
  <li><a href='resultat.php'> Résultats</a></li>
  <li><a href='presse.php'> Presse</a></li>

                    </ul>
                </li>
                <li><a href='../marathon/index.php'><i class='icon-road'></i> marathon</a></li>
<?php

$sql = "SELECT menu_base.nom, menu_base.lien ,user.login
FROM autorisation
INNER JOIN menu_base ON menu_base.id = autorisation.autorisation
INNER JOIN user ON user.id = autorisation.user
where login = '$nom_connexion'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien[]=$mot['lien'];

}
if (in_array("agenda/index.php", $lien)) {echo "<li><a href='../agenda/index.php'><i class='icon-calendar'></i> Résultats</a></li>";}
$sql = "SELECT * FROM  menu_base WHERE nom='photo'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $photo=$mot['lien'];
    if ($photo=='') {
        # code...
    } else {
        echo "<li><a href='../".$photo."'><i class='icon-pictures'></i> photos</a></li>";
    }
    

}
if (in_array("video/index.php", $lien)) {echo "<li><a href='../video/index.php'><i class='icon-television'></i> Video</a></li>";}
if (in_array("statistique/index.php", $lien)) {echo "<li><a href='../statistique/index.php'><i class='icon-stats'></i> statistique</a></li>";}
if (in_array("blog/index.php", $lien)) {echo "<li><a href='../blog/index.php'><i class='icon-blogger'></i> blog</a></li>";}
if (in_array("shop/index.php", $lien)) {echo "<li><a href='../shop/index.php'><i class='icon-shopping-cart'></i> shop</a></li>";}
?>

                
                    
                    <li>
                        <a href="#"><i class="icon-list"></i> Pages</a>
                        <ul>
    <li><a href='../sorties/index.php'>sorties</a></li>
    <li><a href='../run&bike/index.php'>run & bike</a></li>
    <li><a href='../100poursang/index.php'>100 pour sang</a></li>
                    </ul>
                </li>

<?php
if (in_array("partenaire/index.php", $lien)) {echo "<li><a href='../partenaire/index.php'><i class='icon-users'></i> partenaire</a></li>";}
if (in_array("messagerie/index.php", $lien)) {echo "<li><a href='../messagerie/index.php'><i class='icon-envelope'></i> messagerie</a></li>";}
if (in_array("parametres/index.php", $lien)) {echo "<li><a href='../parametres/index.php'><i class='icon-cogs'></i> parametres</a></li>";}
?>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
            
                
                
                <!-- Panels Start -->
                
               
                <div class="mws-panel grid_3">

 <?php
$repertoire = explode("/", $_SERVER["PHP_SELF"]); 
$id_aide = end(array_keys($repertoire));
$id_aide = $id_aide-1;
$page = $repertoire[$id_aide];
include '../config/config.php';
$mess=$_GET['mess'];
$sql = "SELECT * FROM  `gentleman_parcourt` "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $titre=$mot['titre'];
    $texte=$mot['texte'];
    
}
?>                  

                </div>

                <div class="mws-panel grid_8">
                                                        <?php 
                    $mess=$_GET['mess'];
                    if ($mess=='') {
                        
                    } else{
                    ?>
                                <div class="mws-form-message success">
                                page modifié
                             </div>
                    <?php
                    }
                    ?>
                    <div class="mws-panel-header">
                        <span><i class="icon-ok"></i> Page présentation parcourt</span>

                    </div>
                    <div class="mws-panel-body no-padding">
                        <form id="mws-validate" class="mws-form" action="update_parcourt.php" method="post" enctype="multipart/form-data">
                            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Titre de la page</label><input type="hidden" name="id" value="<?php echo $id;?>">
                                    <div class="mws-form-item">
                                        <input type="text" name="titre" class="large" value="<?php echo $titre;?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Texte</label>
                                    <div class="mws-form-item">
                                        <textarea name="texte" id="texte" style="width:100%;" rows="200"><?php echo $texte;?></textarea>
                                        <label for="s4" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" class="btn btn-danger" Value="Modifier">
                            </div>
                        </form>
                    </div>      
                </div>


                
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       

            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="../js/libs/jquery-1.8.3.min.js"></script>
    <script src="../js/libs/jquery.mousewheel.min.js"></script>
    <script src="../js/libs/jquery.placeholder.min.js"></script>
    <script src="../custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="../jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="../jui/jquery-ui.custom.min.js"></script>
    <script src="../jui/js/jquery.ui.touch-punch.js"></script>
    <script src="../jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="../plugins/flot/jquery.flot.min.js"></script>
    <script src="../plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="../plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="../plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="../plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="../plugins/colorpicker/colorpicker-min.js"></script>
    <script src="../plugins/validate/jquery.validate-min.js"></script>
    <script src="../custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="../js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="../js/demo/demo.dashboard.js"></script>






        <!-- JavaScript Plugins -->
    <script src="../js/libs/jquery-1.8.3.min.js"></script>
    <script src="../js/libs/jquery.mousewheel.min.js"></script>
    <script src="../js/libs/jquery.placeholder.min.js"></script>
    <script src="../custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="../jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="../jui/jquery-ui.custom.min.js"></script>
    <script src="../jui/js/jquery.ui.touch-punch.js"></script>
    <script src="../jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="../plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="../plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="../plugins/validate/jquery.validate-min.js"></script>
    <script src="../plugins/colorpicker/colorpicker-min.js"></script>



    <!-- Themer Script (Remove if not needed) -->
    <script src="../js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="../js/demo/demo.widget.js"></script>


</body>
</html>