<?php
include '../config/config.php';
$id_position=$_GET['id_position'];
$id_souscat=$_GET['id_souscat'];
$id_parent=$_GET['id_parent'];

// on supprime la sous catergorie qu'on veut plus
$sql ="DELETE FROM `souscat` WHERE id=$id_souscat";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

// on selectionne le maximum de position
$sql ="SELECT * FROM `souscat` WHERE parent=$id_parent ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
//fin

// on affecte la position supprimé +1
$i = $id_position+1;

// on fait une boucle qui se termine une fois que $i à atteint le nombre max de positions
// on selectionne l'entrée qui correspond à $i
while ($i <=  $position_finale):
$sql ="SELECT * FROM  `souscat` WHERE position='$i' AND parent=$id_parent";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$id=$mot['id'];
	$position=$mot['position']-1;
	$sql="UPDATE  `souscat` SET  `position` =  '$position' WHERE  `id` =$id";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}
    $i++;
endwhile;

echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_parent."');</script>";


?>

