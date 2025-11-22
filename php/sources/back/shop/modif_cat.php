<?php 
error_reporting(0);
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
</head>
<?php include '../config/texte.php';?>
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
                        <li><a href="../deconnection.php">Deconection</a></li>
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

<?php

$sql = "SELECT * FROM  menu_base"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 

    $lien[]=$mot['lien'];

}
if (in_array("agenda/index.php", $lien)) {echo "<li><a href='../agenda/index.php'><i class='icon-calendar'></i> Agenda</a></li>";}
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
if (in_array("blog/index.php", $lien)) {echo "<li ><a href='../blog/index.php'><i class='icon-blogger'></i> blog</a></li>";}
if (in_array("shop/index.php", $lien)) {echo "<li class='active'><a href='index.php'><i class='icon-shopping-cart'></i> shop</a>
    <ul>
        <li><a href='index.php'>Categorie</a></li>
        <li><a href='produits.php'>Produits</a></li>
        <li><a href='produits_coeur.php'>Produits coup de coeur</a></li>

    </ul>
    </li>";}
?>

                
                    
                    <li>
                        <a href="#"><i class="icon-list"></i> Pages</a>
                        <ul>
<?php

$sql = "SELECT * FROM  menu "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['nom'];
    $page=$mot['lien'];
    echo "<li><a href='../".$page."'>".$nom."</a></li>";
}
?>
                    </ul>
                </li>

<?php
if (in_array("partenaire/index.php", $lien)) {echo "<li><a href='../partenaire/index.php'><i class='icon-users'></i> partenaire</a></li>";}
if (in_array("messagerie/index.php", $lien)) {echo "<li><a href='../messagerie/index.php'><i class='icon-envelope'></i> messagerie</a></li>";}
if (in_array("parametres/index.php", $lien)) {echo "<li ><a href='../parametres/index.php'><i class='icon-cogs'></i> parametres</a></li>";}
?>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
                
                <!-- Panels Start -->
                                <div class="mws-panel grid_8">
                                    <?php 
                    $mess=$_GET['mess'];
                           if ($mess=='') {
                        
                    } elseif ($mess=='erreur') {
                    ?>
                            <div class="mws-form-message error">
                                Impossible de changer le placement 1er ou dernier de la liste
                             </div>
                    <?php
                    }elseif ($mess=='modif') {
                    ?>
                            <div class="mws-form-message success">
                                modifiée effectuée
                             </div>
                    <?php                
                    }
                    ?>
                                </div>
               
                <div class="mws-panel grid_8">

                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Modifier categorie</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form id="mws-validate" class="mws-form" action="modif_envoie_cat.php" method="post" enctype="multipart/form-data">
                            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                     <?php
$id=$_GET['id'];
$sql = "SELECT * FROM  categorie WHERE id='$id'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['nom'];
    $id=$mot['id'];
    $texte=$mot['texte'];
    $photo=$mot['photo_couv'];
}
?>
                                    <label class="mws-form-label">Titre de la catégorie</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="name" value="<?php echo $nom;?>">
                                    </div></p>
                                    
                                    <label class="mws-form-label">Photo de couverture</label>
                                    <div class="mws-form-item">
                                        <img src="photo/<?php echo $photo;?>" width="100">
                                    </div>
                                </p>
                                    <label class="mws-form-label">Photo de couverture</label>
                                    <div class="mws-form-item">
                                        <input type="file" name="files[]" >
                                    </div>
                                </p>
                                    <label class="mws-form-label">Texte de présentation</label>
                                    <div class="mws-form-item">
                                        <input type="hidden" value="<?php echo $id;?>" name="id">
                                        <textarea name="texte" width="" id="textludo1"><?php echo $texte;?></textarea>
                                    </div>
                                    <input type="submit" value="modifier" class="btn btn-primary">
                                </div>
                        </form>
                    </div>
</div></div>
                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>Sous Categorie</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    
                                    <th>Activée</th>
                                    <th>Nom</th>
                                    <th>Position dans la page</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$id_cat=$_GET['id'];
$sql ="SELECT * FROM  `souscat` WHERE parent=$id_cat ORDER BY `position` ASC ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_souscat=$mot['id'];
    $nom=$mot['titre'];
    $position=$mot['position'];
    $active=$mot['active'];
    $parent=$mot['parent'];

   

?>
                                <tr>
                                    
                                    <td><?php if ($active =='') {
                                    ?>
                                    <center><a href="desactiv_souscat.php?id=<?php echo $id;?>&amp;id_cat=<?php echo $id_cat;?>"><i class="icol-accept"></i></a></center>
                                    <?php
                                    } else {
                                    ?>
                                    <center><a href="activ_souscat.php?id=<?php echo $id;?>&amp;id_cat=<?php echo $id_cat;?>"><i class="icol-cross"></i></a></center>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td><?php echo $nom;?></td>
                                    <td><center><?php echo $position;?></center></td>
                                    <td>
                                        <span class="btn-group">
                                    <a href="up_souscat.php?id_position=<?php echo $position;?>&amp;id_parent=<?php echo $id_cat;?>&amp;id_souscat=<?php echo $id_souscat;?>"><i class="ui-icon ui-icon-triangle-1-n"></i></a>
                                    <a href="down_souscat.php?id_position=<?php echo $position;?>&amp;id_parent=<?php echo $id_cat;?>&amp;id_souscat=<?php echo $id_souscat;?>"><i class="ui-icon ui-icon-triangle-1-s"></i></a>
                                </span>
                                        <span class="btn-group">
                                            <a href="modif_souscat.php?id=<?php echo $id_souscat;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            <a href="suppr_souscat.php?id_position=<?php echo $position;?>&amp;id_parent=<?php echo $id_cat;?>&amp;id_souscat=<?php echo $id_souscat;?>" class="btn btn-small" onclick="return confirm('êtes vous sur de vouloir supprimer cette categorie ?');"><i class="icon-trash"></i></a>
                                        </span>

                                    </td>
                                </tr>
<?php
}
?>
                                <tr>
                                <form id="mws-validate" class="mws-form" action="new_souscat.php" method="post" enctype="multipart/form-data">
                                    <td><input type="hidden" name="id" value="<?php echo $id_cat;?>"></td>
                                    <td><input type="texte" name="titre"></td>
                                    <td></td>
                                    <td><input type="submit" value="ajouter sous-categorie" class="btn btn-primary"></td>
                                </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
<div class="mws-panel grid_8"> 
<a href="ajout_produit.php"><input button="submit" value="ajouter un produit" class="btn btn-primary"></a>&nbsp;<a href="ajout_fiche.php"><input button="submit" value="ajouter une fiche" class="btn btn-primary"></a>
</div>
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Les produits</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Position</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$id_cat=$_GET['id'];
$sql ="SELECT DISTINCT produits.id, produits.titre, cat_produit.sous_categorie, cat_produit.categorie, cat_produit.position, cat_produit.id as id_catproduit
FROM produits
INNER JOIN cat_produit ON produits.id = cat_produit.produit
WHERE categorie =  '$id_cat'
ORDER BY cat_produit.position ASC";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_souscat=$mot['id'];
    $nom=$mot['titre'];
    $position=$mot['position'];
    $active=$mot['active'];
    $id=$mot['id_catproduit'];
   


?>
                                <tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $position;?></td>
                                    <td>                                        <span class="btn-group">
                                    <a href="up_souscat_produit.php?id_position=<?php echo $position;?>&amp;id_produit=<?php echo $id;?>&amp;id_cat=<?php echo $id_cat;?>"><i class="ui-icon ui-icon-triangle-1-n"></i></a>
                                    <a href="down_souscat_produit.php?id_position=<?php echo $position;?>&amp;id_produit=<?php echo $id;?>&amp;id_cat=<?php echo $id_cat;?>"><i class="ui-icon ui-icon-triangle-1-s"></i></a>
                                </span>
                                        <span class="btn-group">
                                            <a href="modif_produit.php?id=<?php echo $id_souscat;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            <a href="suppr_produit.php?id=<?php echo $id_souscat;?>" class="btn btn-small" onclick="return confirm('êtes vous sur de vouloir supprimer ce produit ?');"><i class="icon-trash"></i></a>                                        </span></td>
                                </tr>
<?php
}
?>
                            </tbody>
                        </table>
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