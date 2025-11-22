<?php
include '../config/config.php';
$choix=$_POST['option'];
if ($choix=="album") {

	$sql = "UPDATE  `menu_base` SET  `lien` =  'photo_album/index.php' WHERE  `nom` ='photo';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

} elseif ($choix=="simple") {
	$sql = "UPDATE  `menu_base` SET  `lien` =  'photo/index.php' WHERE  `nom` ='photo';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}else{
	$sql = "UPDATE  `menu_base` SET  `lien` =  '' WHERE  `nom` ='photo';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('fonction.php');</script>";


?>