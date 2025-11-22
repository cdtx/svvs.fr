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
                   
<?php
include '../config/config.php';
$option = $_POST["categorie"];
    if ($option=='') {
      ?>
                            <div class="mws-form-message error">
                                Veuillez séléctionner une categorie
                             </div>
<?php
exit();
    } else {
      
    }

$test_photo= $_FILES["files"]["error"];

    if (in_array('4', $test_photo)) {
?>
                            <div class="mws-form-message error">
                                Veuillez séléctionner une photo
                             </div>
                  <?php

    exit();} else {
                
    }

$valeur='';

$titre=$_POST['titre'];
$google=$_POST['google'];
$prix=$_POST['prix'];
$description=$_POST['description'];
$sql="INSERT into produits (`id`,`titre`,`prix`,`google`,`description`,`active`,`promo`,`texte_promotion`,`type`) VALUES('','$titre','$prix','$google','$description','','non','','produit'); ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$sql="SELECT id FROM produits ORDER by id DESC Limit 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($mot = mysql_fetch_assoc($req)) 
{ 
  $id_produit=$mot['id'];
}
while($video = array_shift($option)) 
{
    $sql="SELECT * FROM cat_produit WHERE categorie=$video order by position DESC limit 1 ";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     while ($mot =mysql_fetch_assoc($req)) {
        $position=$mot['position'];
        $position=$position+1;
     }

    
      $sql="INSERT into cat_produit (`id`,`produit`,`categorie`,`sous_categorie`,`position`) VALUES('','$id_produit','$video','','$position'); ";
      $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}



foreach ($_FILES["files"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {


        $sql ="SELECT * FROM `photo_produit` WHERE id_produit='$id_produit' ORDER BY position_photo DESC LIMIT 1";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
        while ($mot = mysql_fetch_assoc($req)) { $position=$mot['position_photo']; }

        if ($position=='') {
            $position='1';
        } else {
            $position=$position+1;
        }


    $file_name = $_FILES['files']['name'][$key];
    $extension=strrchr($file_name,'.');
    $extension=substr($extension,1) ; 
    $file_name=$titre."-".time().".".$extension;
    $file_name=str_replace(' ' ,'_',$file_name);
    $lien="photo/".$file_name;
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
    $sql="INSERT into photo_produit (`id`,`id_produit`,`photo`,`active`,`position_photo`) VALUES('','$id_produit','$file_name','','1'); ";
        $desired_dir="photo/";
        if(empty($errors)==true){
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                  // rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
 
        }else{
                print_r($errors);
                
        }
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
      }
  if(empty($error)){
    
  }

}


echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
?>


                
                
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

    <script src="../jui/js/globalize/globalize.js"></script>
    <script src="../jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="../custom-plugins/picklist/picklist.min.js"></script>
    <script src="../plugins/autosize/jquery.autosize.min.js"></script>
    <script src="../plugins/select2/select2.min.js"></script>
    <script src="../plugins/colorpicker/colorpicker-min.js"></script>
    <script src="../plugins/validate/jquery.validate-min.js"></script>
    <script src="../plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="../plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="../plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="../plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="../plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/core/mws.js"></script>


    <!-- Demo Scripts (remove if not needed) -->
    <script src="../js/demo/demo.formelements.js"></script>


    



</body>
</html>