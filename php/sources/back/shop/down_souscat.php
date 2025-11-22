<?php
include '../config/config.php';
//on recupere id de position et id categorie parent
$id_position1=$_GET['id_position'];
$id_parent=$_GET['id_parent'];
$id_souscat=$_GET['id_souscat'];

// on lui dit tu prend la position actuelle et tu ajoute 1 pour faire monter
$id_position=$id_position1+1;
$sql ="SELECT * FROM `souscat` WHERE parent=$id_parent ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}

if ($id_position1==$position_finale) {

	echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_parent."');</script>";
} else {

$sql ="SELECT * FROM `souscat` WHERE position='$id_position' AND parent = $id_parent";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
   $id_bas=$mot['id'];
   $nom=$mot['nom'];
   $position2=$mot['position'];
}
$position2=$position2-1;

//on fait un update de sa nouvelle position
$sql="UPDATE  `souscat` SET  `position` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// on fait un nouvelle update de la position que l'on veut monter
$sql="UPDATE  `souscat` SET  `position` =  '$id_position' WHERE  `id` =$id_souscat;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_parent."');</script>";
}

?>

  

