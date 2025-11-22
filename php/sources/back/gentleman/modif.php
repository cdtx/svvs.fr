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
                    <li class="active">
                        <a href="#"><i class="icon-road"></i> Gentleman</a>
                        <ul>
  <li><a href='presentation.php'> Présentation</a></li>
  <li><a href='reglement.php'> Règlement</a></li>
  <li><a href='parcourt.php'> Parcourt</a></li>
  <li><a href='resultat.php'> Résultats</a></li>
  <li><a href='presse.php'> Presse</a></li>

                    </ul>
                </li>
                <li><a href='../marathon/index.php'><i class='icon-road'></i> marathon</a></li>
<?php

$sql = "SELECT * FROM  menu_base"; 
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
if (in_array("video/index.php", $lien)) {echo "<li ><a href='../video/index.php'><i class='icon-television'></i> Video</a></li>";}
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

                    

                </div>
<?php              
 $id=$_GET['id'];

$sql1 = "SELECT * from incriptions where id='$id'";
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
while($mot1 = mysql_fetch_assoc($req1)) 
{ 
    $date=$mot1['date'];
        $cate=$mot1['categorie'];

$paye=$mot1['personne_qui_paye'];

    $date=explode(" ", $date);
    $heure=$date[1];
$repas=$mot1['repas'];
$total_repas=$repas * 20;
$total_prix=$repas *20+24;

}

$sql = "SELECT * from coureur where horaire_choisis='$id' ORDER BY `id` ASC";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_array($req)) 
{ 


$nom[]=$mot[1];
$prenom[]=$mot[2];
$age[]=$mot[3];
$sexe[]=$mot[4];
$licencie[]=$mot[5];
$federation[]=$mot[6];
$num_licence[]=$mot[7];
$club[]=$mot[8];
$adresse[]=$mot[9];
$code[]=$mot[10];
$ville[]=$mot[11];
$tel[]=$mot[12];
$email[]=$mot[13];




}

$sql = "SELECT * from coureur where horaire_choisis='$id' ORDER BY `id` ASC";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_array($req)) 
{ 

$coureur[]=$mot[0];

}


$sql = "SELECT * from incriptions ORDER BY date ASC";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_array($req)) 
{ 
$horaire=$mot['date'];
$horaire_cher=explode(" ", $horaire);
$final[]=$horaire_cher[1];


}   

?>        	


                <div class="mws-panel grid_6 mws-collapsible">
                <h1 class="post-title">Formulaire d'inscription pour l'horaire : <?php echo $heure;?></h1>
<FORM name="formulaire" method="POST" onsubmit="return valider ();" action="envoie_modif.php">
<table style="width:100%">
    <th><td>Coureur 1<input type="hidden" name="id_coureur1" value="<?php echo $coureur[0];?>"></td><td>Coureur 2 <input type="hidden" name="id_coureur2" value="<?php echo $coureur[1];?>"></td></th>
    <tr><td>Nom*</td><td><input type="text" name="coureur1" class="text" value="<?php echo $nom[0];?>"></td><td><input type="text" name="coureur2" class="text" value="<?php echo $nom[1];?>"></td></tr>
    <tr><td>Prenom*</td><td><input type="text" name="prenom1" class="text" value="<?php echo $prenom[0];?>"></td><td><input type="text" name="prenom2" class="text" value="<?php echo $prenom[1];?>"></td></tr>
    <tr><td>Age*</td><td>
<SELECT name="age1" size="0">
<OPTION value="">---choisir age---</OPTION>
<?php
for( $i = 1; $i < 100; $i++ )
    if ($age[0]== $i) {
        echo "<option value='".$i."'' selected>".$i."</option>";
    } else {
         echo "<option value='".$i."''>".$i."</option>"; 
    }
    
 
?> 
</SELECT>


    </td><td>
<SELECT name="age2" size="0">
<OPTION value="">---choisir age---</OPTION>
<?php 
for( $i = 1; $i < 100; $i++ )
    if ($age[1]== $i) {
        echo "<option value='".$i."'' selected>".$i."</option>";
    } else {
         echo "<option value='".$i."''>".$i."</option>"; 
    }
?> 
</SELECT>

</td></tr>

    <tr><td>sexe*</td><td>Homme<input type="radio" name="sexe1" value="Homme" <?php if ($sexe[0]==Homme) {echo "checked";} else {}?>>Femme<input type="radio" name="sexe1" value="femme" <?php if ($sexe[0]=='Femme') {echo "checked";} else {}?>></td><td>Homme<input type="radio" name="sexe2" value="Homme" <?php if ($sexe[1]=='Homme') {echo "checked";} else {}?>> Femme<input type="radio" name="sexe2" value="femme" <?php if ($sexe[1]=='Femme') {echo "checked";} else {}?>></td></tr>
    <tr><td>licencié*</td><td>Oui<input type="radio" name="licencie1" value="Homme">Non<input type="radio" name="licencie1" value="femme"></td><td>Oui<input type="radio" name="licencie2" value="Homme">Non<input type="radio" name="licencie2" value="femme"></td></tr>
    <tr><td>Fédération</td><td><input type="text" name="federation1" class="text" value="<?php echo $federation[0];?>"></td><td><input type="text" name="federation2" class="text" value="<?php echo $federation[1];?>"></td></tr>
    <tr><td>N° Licence</td><td><input type="text" name="num_licence1" class="text" value="<?php echo $num_licence[0];?>"></td><td><input type="text" name="num_licencie2" class="text" value="<?php echo $num_licence[0];?>"></td></tr>
    <tr><td>Club</td><td><input type="text" name="club1" class="text" value="<?php echo $club[0];?>"></td><td><input type="text" name="club2" class="text" value="<?php echo $club[1];?>"></td></tr>
    <tr><td>Adresse</td><td><input type="text" name="adresse1" class="text" value="<?php echo $adresse[0];?>"></td><td><input type="text" name="adresse2" class="text" value="<?php echo $adresse[1];?>"></td></tr>
    <tr><td>code postale</td><td><input type="text" name="code_postale1" class="text" value="<?php echo $code[0];?>"></td><td><input type="text" name="code_postale2" class="text" value="<?php echo $code[1];?>"></td></tr>
    <tr><td>Ville</td><td><input type="text" name="ville1" class="text" value="<?php echo $ville[0];?>"></td><td><input type="text" name="ville2" class="text" value="<?php echo $ville[1];?>"></td></tr>
    <tr><td>N° Téléphone*</td><td><input type="text" name="tel1" class="text" value="<?php echo $tel[0];?>"></td><td><input type="text" name="tel2" class="text" value="<?php echo $tel[1];?>"></td></tr>
    <tr><td>Email*</td><td><input type="text" name="email1" class="text" value="<?php echo $email[0];?>"></td><td><input type="text" name="email2" class="text" value="<?php echo $email[1];?>"></td></tr>
    <tr><td colspan="2">Categorie*</td><td>
        
<SELECT name="cate" size="0">
<OPTION value="">---choisir categorie---</OPTION>
<OPTION value="1" <?php if ($cate==1) {echo "selected";} else {}?>>Masculin A : Moins de 60 ans</OPTION>
<OPTION value="2" <?php if ($cate==2) {echo "selected";} else {}?>>>Masculin B : Moins de 80 ans</OPTION>
<OPTION value="3" <?php if ($cate==3) {echo "selected";} else {}?>>>Masculin C : Moins de 100 ans</OPTION>
<OPTION value="4" <?php if ($cate==4) {echo "selected";} else {}?>>>Masculin D : Moins de 120 ans</OPTION>
<OPTION value="5" <?php if ($cate==5) {echo "selected";} else {}?>> >Masculin E : Plus de 120 ans</OPTION>
<OPTION value="">---------------------</OPTION>
<OPTION value="6" <?php if ($cate==6) {echo "selected";} else {}?>>>Fémininmes : Moins de 60 ans</OPTION>
<OPTION value="7" <?php if ($cate==7) {echo "selected";} else {}?>>>Fémininmes : Plus de 60 ans</OPTION>
<OPTION value="">---------------------</OPTION>
<OPTION value="8" <?php if ($cate==8) {echo "selected";} else {}?>>>Mixte A : moins de 70 ans</OPTION>
<OPTION value="9" <?php if ($cate==9) {echo "selected";} else {}?>>>Mixte B : Plus de 70 ans</OPTION>
<OPTION value="10" <?php if ($cate==10) {echo "selected";} else {}?>>>Parent-Enfant </OPTION>
<OPTION value="11" <?php if ($cate==11) {echo "selected";} else {}?>>>Grand parent-Enfant</OPTION>
<OPTION value="12" <?php if ($cate==12) {echo "selected";} else {}?>>>Handisport : Handbike, duo avec valide </OPTION>
</SELECT>

        <tr><td colspan="2">Nom de la personne qui paye*</td><td>   
<input type="text" name="personne_qui_paye" class="text" value="<?php echo $paye;?>">
</td></tr>

</table>
* champs obligatoires</p>
<input type="hidden" name="horaires" value="<?php echo $id;?>">
<input type="hidden" name="equipe" value="<?php echo $equipe;?>">
<input type="submit" value="modifier">
</form>
</center>
                    </div>
                </div>
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       

            
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