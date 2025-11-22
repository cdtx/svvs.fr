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
<link rel="stylesheet" type="text/css" href="../custom-plugins/picklist/picklist.css" media="screen">
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
<script language="javascript" src="auteur.js"></script>
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
                                </div>
                                                               <?php
$id_produit=$_GET['id'];
$sql ="SELECT * FROM  `produits` WHERE id=$id_produit ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
 $titre=$mot['titre'];

 $google=$mot['google'];
 $prix=$mot['prix'];
 $description=$mot['description'];
 $promo=$mot['promo'];
 $texte_promotion=$mot['texte_promotion'];

}
?>
            <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Fiche produit</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form id="mws-validate" class="mws-form" action="envoie_modif_produit.php" method="post" enctype="multipart/form-data">
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">titre du produit</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="titre" value='<?php echo $titre;?>'>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">description google</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="google" value="<?php echo $google;?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Prix</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="prix" value="<?php echo $prix;?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">description produit</label>
                                    <div class="mws-form-item">
                                        <textarea rows="" cols="" class="medium" id="textludo1" name="description"><?php echo $description;?></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Promo</label>
                                    <div class="mws-form-item">
                                        <?php 
                                        if ($promo=='non') {
                                            echo "<input type='checkbox' name='promotion[]' value='non'>";
                                        } else {
                                            echo "<input type='checkbox' checked name='promotion[]' value='ola'>";
                                        }
                                        ?>                                        

                                        
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">description promo</label>
                                    <div class="mws-form-item">
                                        <textarea rows="" cols="" class="medium" id="textludo2" name="texte_promo"><?php echo $texte_promotion;?></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Categorie</label>
                                    <div class="mws-form-item clearfix">
                                        

                                                <?php
include '../config/config.php';
    $sql1 ="SELECT *  FROM  `cat_produit` WHERE produit=$id_produit";
    $req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
    while($mot2 = mysql_fetch_assoc($req1)) 
    {
    $result[]=$mot2['categorie'];
    }
$sql ="SELECT * FROM  `categorie` ORDER BY `position` ASC ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $categorie[]=$mot['id'];
    $id_cat=$mot['id'];
    if (in_array($id_cat, $result)) {
        echo "<input type='checkbox' checked name='categorie[]' value=".$mot['id']."> ".$mot['nom']."&nbsp;";
    } else {
        echo "<input type='checkbox' name='categorie[]' value=".$mot['id']."> ".$mot['nom']."&nbsp;";
    }
    
    


}
?>

                                    </div>
                                </div>
                                                                <div class="mws-form-row">
                                    <label class="mws-form-label">sous categorie</label>
                                    <div class="mws-form-item clearfix">
            

<?php
    $sql1 ="SELECT *  FROM  `cat_produit` WHERE produit=$id_produit";
    $req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
    while($mot2 = mysql_fetch_assoc($req1)) 
    {
    $result_sous_cat[]=$mot2['sous_categorie'];
    }


    $sql ="SELECT souscat.id,souscat.parent, categorie.nom FROM `souscat` INNER JOIN categorie ON souscat.parent = categorie.id GROUP BY parent";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) {
        $test[]=$mot['parent'];

    }
    echo "<table><tr>";
foreach($test as $element)
{
echo "<td width='150'>";
    $sql ="SELECT souscat.id,souscat.parent, categorie.nom FROM `souscat` INNER JOIN categorie ON souscat.parent = categorie.id WHERE parent=$element GROUP BY parent";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) {
        $parent=$mot['nom'];
        $id_parent=$mot['parent'];
    }

        echo $parent."<br/>";

    

    $sql ="SELECT * FROM  `souscat` WHERE parent=$element ORDER BY `position` ASC ";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) 
{
    $id_souscat=$mot['id'];
    $nom_souscat=$mot['titre'];


    if (in_array($id_souscat, $result_sous_cat)) {
            echo "<input type='radio' checked name='".$id_parent."[]' value=".$mot['id']."> ".$nom_souscat."<br/>";
    } else {
            echo "<input type='radio' name='".$id_parent."[]' value=".$mot['id']."> ".$nom_souscat."<br/>";
    }

    

}
echo "<input type='radio' name='".$id_parent."[]' value=''>pas de sous categorie<br/>";
echo "</td>";
}
echo "</tr></table>";
?>


                                    </div>
                                </div>                                 
                                    <div class="mws-form-row">
                                    <label class="mws-form-label">Photo</label>
                                        <div class="mws-form-item">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    
                                    <th>photo</th>
                                    <th>activé</th>
                                    <th>position</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 

     $sql ="SELECT * FROM photo_produit WHERE id_produit=$id_produit ORDER BY position_photo ASC";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) {
        $photo=$mot['photo'];
        $active=$mot['active'];
        $position=$mot['position_photo'];
        $id_photo=$mot['id'];



?>
                                   
                                <tr>
                                    <td><img src="photo/<?php echo $photo;?>" width="50"></td>
                                    <td><?php if ($active =='') {
                                    ?>
                                    <center><a href="desactiv_photo.php?id=<?php echo $id_photo;?>&amp;id_produit=<?php echo $id_produit;?>"><i class="icol-accept"></i></a></center>
                                    <?php
                                    } else {
                                    ?>
                                    <center><a href="activ_photo.php?id=<?php echo $id_photo;?>&amp;id_produit=<?php echo $id_produit;?>"><i class="icol-cross"></i></a></center>
                                    <?php
                                    }
                                    ?></td>
                                    <td><?php echo $position;?></td>
                                    <td>
                                        <span class="btn-group">
                                    <a href="up_photo.php?id_position=<?php echo $position;?>&amp;id_photo=<?php echo $id_photo;?>&amp;id_produit=<?php echo $id_produit;?>"><i class="ui-icon ui-icon-triangle-1-n"></i></a>
                                    <a href="down_photo.php?id_position=<?php echo $position;?>&amp;id_photo=<?php echo $id_photo;?>&amp;id_produit=<?php echo $id_produit;?>"><i class="ui-icon ui-icon-triangle-1-s"></i></a>
                                </span>
                                        <span class="btn-group">
                                            <a href="suppr_photo.php?id=<?php echo $id_photo;?>&amp;id_produit=<?php echo $id_produit;?>&amp;id_position=<?php echo $position;?>" class="btn btn-small" onclick="return confirm('êtes vous sur de vouloir supprimer cette categorie ?');"><i class="icon-trash"></i></a>
                                        </span>
</td>
                                </tr>
<?php
}
?>
                            </tbody>
                        </table>
                               
                                        </div>


                                    </div>                                 
                                    <div class="mws-form-row">
                                    <label class="mws-form-label">Ajouter photos</label>
                                        <div class="mws-form-item">
                                            
                                                <input type="file" name="files[]" multiple/>
                                                <input type="hidden" value="<?php echo $id_produit;?>" name="id_produit">
                               
                                        </div>
                                    </div>

                            <div class="mws-form-row">
                                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Les produits similaires</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>photo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    $sql ="SELECT * FROM similaires WHERE id_produit=$id_produit";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) {
        $id_similaires[]=$mot['id_similaires'];

    }

$sql ="SELECT DISTINCT cat_produit.produit,produits.titre ,photo_produit.photo, produits.active,produits.id
FROM cat_produit
INNER JOIN produits ON cat_produit.produit = produits.id
INNER JOIN photo_produit ON id_produit = produits.id
WHERE photo_produit.position_photo = 1
GROUP BY cat_produit.produit
order by titre asc
";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_souscat=$mot['id'];
    $nom=$mot['titre'];
    $photo=$mot['photo'];
    $active=$mot['active'];
    $id=$mot['id'];




?>
                                <tr>
                                    <td><?php echo $nom;?></td>
                                    <td><img src="photo/<?php echo $photo;?>" width="50"></td>
                                    <td>                                        
                                        <span class="btn-group">
<?php
    if (in_array($id, $id_similaires)) {
        echo "<input type='checkbox' checked name='similaire[]' value='".$id."''>";
    } else {
                echo "<input type='checkbox'  name='similaire[]' value='".$id."''>";
    }
?>
</span></td>
                                </tr>
<?php
}
?>
                            </tbody>
                        </table>
                        <input type="hidden" name="id_produit" value="<?php echo $id_produit;?>">
                    </div>
                                </div>
                            </div></p>
                            <div class="mws-button-row">
                                <input type="submit" value="Modifié" class="btn btn-danger" onclick="affiche_chargement()">
                                
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
    <script src="../js/demo/demo.table.js"></script>




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