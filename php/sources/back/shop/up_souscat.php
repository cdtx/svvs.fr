<?php
include '../config/config.php';

//on recupere id de position et id categorie parent
$id_position=$_GET['id_position'];
$id_parent=$_GET['id_parent'];
$id_souscat=$_GET['id_souscat'];
// on lui dit tu prend la position actuelle et tu enleve 1 pour faire monter
$id_position=$id_position-1;
//si le resultat est de 0 alors tu retourne a la page cat car tu peut pas plus monter
if ($id_position=='0') {
	echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_parent."');</script>";
} 
//sinon tu selectionne la sous cat qui est au dessus
else {
$sql ="SELECT * FROM `souscat` WHERE position='$id_position' AND parent = $id_parent";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_bas=$mot['id'];
    $nom=$mot['nom'];
    $position2=$mot['position'];
}
//tu ajoute +1 à sa position pour le faire descendre
$position2=$position2+1;
//on fait un update de sa nouvelle position
$sql="UPDATE  `souscat` SET  `position` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// on fait un nouvelle update de la position que l'on veut monter
$sql="UPDATE  `souscat` SET  `position` =  '$id_position' WHERE  `id` =$id_souscat;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_parent."');</script>";
}

  



?>