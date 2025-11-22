<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
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
        <h2>Fonction du back office</h2>
            <div class="mws-form-row">
                <a href="index.php"><input type="button" value="retour menu" class="btn btn-success mws-login-button"></p></a>
                <div id="mws-login">
                <center><h1>Page crée</h1></center>
                    <div class="mws-form-row"><!--module page créé-->  
                        <form method="POST" action="suppr_page.php" enctype="multipart/form-data">
<?php
include '../config/config.php';
$sql = "SELECT * FROM  menu"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{
$nom=$mot['nom'];
$id=$mot['id'];
?>
<span><input type="checkbox" name="option[]" value="<?php echo $id;?>"> <?php echo $nom;?></span><br/>
<?php
}
?>
</p>
                        <input type="submit" value="supprimer page" class="btn btn-danger mws-login-button" onclick="return confirm('êtes vous sur de vouloir supprimer cette page ?');">
                        </form>
                    </div></div></p><!--Fin module page créé-->
                    

            <div id="mws-login"><!--module photo-->
            <center><h1>page photo</h1></center>
                <div class="mws-form-row">    
<form method="POST" action="choix_photo.php" enctype="multipart/form-data">
<?php
include '../config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom = 'photo'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='photo_album/index.php') {
?>
<span><input type="radio" checked name="option" value="album"> Photos avec album</span><br/>
<span><input type="radio" name="option" value="simple"> Photos simple</span><br/>
<span><input type="radio" name="option" value="pas"> Pas d'album</span><br/>
<?php
} elseif ($nom=='photo/index.php') {
?>
<span><input type="radio" name="option" value="album"> Photos avec album</span><br/>
<span><input type="radio" checked name="option" value="simple"> Photos simple</span><br/>
<span><input type="radio" name="option" value="pas"> Pas d'album</span><br/>
<?php  
}else{
?>
<span><input type="radio" name="option" value="album"> Photos avec album</span><br/>
<span><input type="radio" name="option" value="simple"> Photos simple</span><br/>
<span><input type="radio" checked name="option" value="pas"> Pas d'album</span><br/><?php    
}
}
?>

</p>
<input type="submit" value="Choisir type d'album" class="btn btn-success mws-login-button" onclick="return confirm('êtes vous sur de vouloir faire ce choix ?');">
</form>
                    </div>
                </div>&nbsp;
            </div></p><!--Fin module photo-->


<div id="mws-login"><!--module photo-->
            <center><h1>Autre fonction</h1></center>
                <div class="mws-form-row">    
<form method="POST" action="choix_fonction.php" enctype="multipart/form-data">
<?php
include '../config/config.php';
$sql = "SELECT * FROM  menu_base WHERE nom = 'blog'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>
<table>
    <tr>
    <td><span><input type="radio" name="blog" value="active"> Blog activé</span></td>
    <td><span><input type="radio" checked name="blog" value="pas"> Blog desactivé</span></td>
</tr>
<?php
} else {
?>
<table>
    <tr>
    <td><span><input type="radio" checked name="blog" value="active"> Blog activé</span></td>
    <td><span><input type="radio" name="blog" value="pas"> Blog desactivé</span></td>
</tr>

<?php
}
}
?>

<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'message'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="message" value="active"> messagerie activé</span></td>
    <td><span><input type="radio" checked name="message" value="pas"> messagerie desactivé</span></td>
</tr>

<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="message" value="active"> messagerie activé</span></td>
    <td><span><input type="radio" name="message" value="pas"> messagerie desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->

<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'video'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="video" value="active"> video activé</span></td>
    <td><span><input type="radio" checked name="video" value="pas"> video desactivé</span></td>
</tr>

<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="video" value="active"> video activé</span></td>
    <td><span><input type="radio" name="video" value="pas"> video desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->


<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'statistique'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="statistique" value="active"> statistique activé</span></td>
    <td><span><input type="radio" checked name="statistique" value="pas"> statistique desactivé</span></td>
</tr>

<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="statistique" value="active"> statistique activé</span></td>
    <td><span><input type="radio" name="statistique" value="pas"> statistique desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->

<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'agenda'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="agenda" value="active"> agenda activé</span></td>
    <td><span><input type="radio" checked name="agenda" value="pas"> agenda desactivé</span></td>
</tr>

<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="agenda" value="active"> agenda activé</span></td>
    <td><span><input type="radio" name="agenda" value="pas"> agenda desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->

<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'shop'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="shop" value="active"> shop activé</span></td>
    <td><span><input type="radio" checked name="shop" value="pas"> shop desactivé</span></td>
</tr>

<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="shop" value="active"> shop activé</span></td>
    <td><span><input type="radio" name="shop" value="pas"> shop desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->


<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'partenaire'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="partenaire" value="active"> partenaire activé</span></td>
    <td><span><input type="radio" checked name="partenaire" value="pas"> partenaire desactivé</span></td>
</tr>
<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="partenaire" value="active"> partenaire activé</span></td>
    <td><span><input type="radio" name="partenaire" value="pas"> partenaire desactivé</span></td>
</tr>

<?php
}
}
?>
<!--Fin du module -->

<!-- Ajout d'un choix de menue de base-->
<?php
$sql = "SELECT * FROM  menu_base WHERE nom = 'parametres'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $nom=$mot['lien'];
    $id=$mot['id'];
if ($nom=='') {
?>

    <tr>
    <td><span><input type="radio" name="parametres" value="active"> parametres activé</span></td>
    <td><span><input type="radio" checked name="parametres" value="pas"> parametres desactivé</span></td>
</tr>
</table>
<?php
} else {
?>

    <tr>
    <td><span><input type="radio" checked name="parametres" value="active"> parametres activé</span></td>
    <td><span><input type="radio" name="parametres" value="pas"> parametres desactivé</span></td>
</tr>
</table>
<?php
}
}
?>
<!--Fin du module -->

</p>
<input type="submit" value="Choisir fonction" class="btn btn-success mws-login-button" onclick="return confirm('êtes vous sur de vouloir faire ce choix ?');">
</form>
                    </div>
                </div>&nbsp;
            </div></p><!--Fin module photo-->





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
