<?php
include '../config/config.php';
$nom=$_POST['titre'];
$id=$_POST['id'];
$sql ="SELECT * FROM `souscat` WHERE parent= $id ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
$position_finale=$position_finale+1;
$sql="INSERT INTO  `souscat` (`id` ,`titre` ,`parent`,`position`,`active`)VALUES ('' ,  '$nom',  '$id',  '$position_finale',  '');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat.php?id=".$id."');</script>";


?>