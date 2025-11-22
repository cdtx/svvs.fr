<?php
include '../config/config.php';
$nom=$_POST['name'];
$texte=$_POST['texte'];
$sql ="SELECT * FROM `categorie` ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
$position_finale=$position_finale+1;
$sql="INSERT INTO  `categorie` (`id` ,`nom` ,`position`,`texte`)VALUES ('' ,  '$nom',  '$position_finale',  '$texte');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=modif');</script>";


?>