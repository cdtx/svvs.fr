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
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/knockout-3.0.0.js"></script>
    <script src="../js/globalize.min.js"></script>
    <script src="../js/dx.chartjs.js"></script>
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
if (in_array("statistique/index.php", $lien)) {echo "<li class='active'><a href='statistique/index.php'><i class='icon-stats'></i> statistique</a></li>";}
if (in_array("blog/index.php", $lien)) {echo "<li ><a href='../blog/index.php'><i class='icon-blogger'></i> blog</a></li>";}
if (in_array("shop/index.php", $lien)) {echo "<li><a href='../shop/index.php'><i class='icon-shopping-cart'></i> shop</a></li>";}
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
    echo "<li><a href='".$page."'>".$nom."</a></li>";
}
?>
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
                        <div class="mws-panel grid_8">

<center>
<?php
$sql = "SELECT * FROM  autre "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['nom'];
    $chiffre=$mot['chiffre'];
?>

                                        <!-- Statistic Item -->
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-building"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><?php echo $nom;?></span>
                            <span class="mws-stat-value"><?php echo $chiffre;?></span>
                        </span>
                    </a>
                
            
            <!-- Inner Container End -->
                       
<?php
}
?>
       </center>     
        </div>
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
                
               
        <script>
            $(function ()  
                {
   var dataSource = [

<?php

$sql = "SELECT * FROM  visiteurs "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $date=$mot['date'];
    $date=explode("-", $date);
    $date=$date[2]."/".$date[1];
    $visiteurs=$mot['nbr_visiteurs'];
    $visiteurs_unique=$mot['visiteurs_unique'];


?>
    { time: "<?php echo $date;?>", Visiteurs: <?php echo $visiteurs;?>},
<?php
}
?>
];

$("#chartContainer").dxChart({
    dataSource: dataSource,
    commonSeriesSettings: {
        type: "stackedLine",
        argumentField: "time"
    },
    commonPaneSettings: {
        border: {
            visible: true            
        }
    },
    commonAxisSettings: {
        grid: {
           visible: true
        }
    },
    series: [
        { valueField: "Visiteurs", name: "Visiteurs" },


    ],
    title: "Visiteurs",
    legend: {
        verticalAlignment: "bottom",
        horizontalAlignment: "center"
    },
    tooltip:{
        enabled: true
    }
});
}

            );
        </script>         	


                <div class="mws-panel grid_12">
                    <div class="mws-panel-header">
                        <span><i class="icon-graph"></i> Visiteurs / jour</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-panel-content">
                            <div class="content">
                                <div class="pane">
                                    <div id="chartContainer" class="case-container" style="width: 100%; height: 340px;"></div>          
                                </div>
                             </div>
                        </div>
                    </div>
                </div>        

        <script>
            $(function ()  
                {
   var dataSource = [

<?php

$sql = "SELECT * FROM  visiteurs "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $date=$mot['date'];
    $date=explode("-", $date);
    $date=$date[2]."/".$date[1];
    $visiteurs=$mot['nbr_visiteurs'];
    $visiteurs_unique=$mot['visiteurs_unique'];


?>
    { time: "<?php echo $date;?>", Visiteurs: <?php echo $visiteurs_unique;?>},
<?php
}
?>
];

$("#chartContainer2").dxChart({
    dataSource: dataSource,
    commonSeriesSettings: {
        type: "stackedLine",
        argumentField: "time"
    },
    commonPaneSettings: {
        border: {
            visible: true            
        }
    },
    commonAxisSettings: {
        grid: {
           visible: true
        }
    },
    series: [
        { valueField: "Visiteurs", name: "Visiteurs unique" },


    ],
    title: "Visiteurs unique",
    legend: {
        verticalAlignment: "bottom",
        horizontalAlignment: "center"
    },
    tooltip:{
        enabled: true
    }
});
}

            );
        </script>         	


                <div class="mws-panel grid_12">
                    <div class="mws-panel-header">
                        <span><i class="icon-graph"></i> Visiteurs / jour</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-panel-content">
                            <div class="content">
                                <div class="pane">
                                    <div id="chartContainer2" class="case-container" style="width: 100%; height: 340px;"></div>          
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="mws-panel grid_3">
                                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Mots-clés</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    
                                    <th>Mots clés</th>
                                    <th>Sessions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php 

$sql ="SELECT * FROM  `keyword` WHERE `quantite` !='' ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['keyword'];
    $nom=$mot['quantite'];


   

?>
                                <tr>
                                    
                                   <td><?php echo $id;?></td>
                                    <td><?php echo $nom;?></td>
                                </tr>
<?php
}
?>
                                
                            </tbody>
                        </table>
</div>
</div>

                <div class="mws-panel grid_5">
                                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Page consultées</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    
                                    <th>Page consultées</th>
                                    <th>Sessions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php 

$sql ="SELECT * FROM  `page_consult` WHERE `quantite` !='' ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['page'];
    $nom=$mot['quantite'];


   

?>
                                <tr>
                                    
                                   <td><?php echo $id;?></td>
                                    <td><?php echo $nom;?></td>
                                </tr>
<?php
}
?>
                                
                            </tbody>
                        </table>
</div>
</div>
        <!-- Main Container End -->
        
    </div>






</body>
</html>