<?php
include '../config/config.php';


//Envoie du choix précedent
$choix=$_POST['blog'];

if ($choix=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='blog';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'blog/index.php' WHERE  `nom` ='blog';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix


//Envoie du choix précedent
$message=$_POST['message'];

if ($message=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='message';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'messagerie/index.php' WHERE  `nom` ='message';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix


//Envoie du choix précedent
$video=$_POST['video'];

if ($video=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='video';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'video/index.php' WHERE  `nom` ='video';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix

//Envoie du choix précedent
$stat=$_POST['statistique'];

if ($stat=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='statistique';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'statistique/index.php' WHERE  `nom` ='statistique';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix

//Envoie du choix précedent
$agenda=$_POST['agenda'];

if ($agenda=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='agenda';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'agenda/index.php' WHERE  `nom` ='agenda';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix

//Envoie du choix précedent
$shop=$_POST['shop'];

if ($shop=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='shop';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'shop/index.php' WHERE  `nom` ='shop';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix

//Envoie du choix précedent
$partenaire=$_POST['partenaire'];

if ($partenaire=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='partenaire';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'partenaire/index.php' WHERE  `nom` ='partenaire';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix

//Envoie du choix précedent
$parametres=$_POST['parametres'];

if ($parametres=="pas") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='parametres';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  'parametres/index.php' WHERE  `nom` ='parametres';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
// fin du choix


// retour sur la page fonctions
echo "<script type='text/javascript'>document.location.replace('fonction.php');</script>";


?>