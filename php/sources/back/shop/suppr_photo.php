<?php
include '../config/config.php';
$id=$_GET['id'];
$id_produit=$_GET['id_produit'];
$id_position=$_GET['id_position'];

// on supprime la photo qu'on veut plus
$sql ="DELETE FROM `photo_produit` WHERE id=$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

// on selectionne le maximum de position
$sql ="SELECT * FROM `photo_produit` WHERE id_produit = $id_produit ORDER BY position_photo DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position_photo'];
}
//fin

// on affecte la position supprimé +1
$i = $id_position+1;

// on fait une boucle qui se termine une fois que $i à atteint le nombre max de positions
// on selectionne l'entrée qui correspond à $i
while ($i <=  $position_finale):
$sql ="SELECT * FROM  `photo_produit` WHERE position_photo='$i' AND id_produit=$id_produit ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$id=$mot['id'];
	$position=$mot['position_photo']-1;
	$sql="UPDATE  `photo_produit` SET  `position_photo` =  '$position' WHERE  `id` =$id";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}
    $i++;
endwhile;

echo "<script type='text/javascript'>document.location.replace('modif_produit?id=".$id_produit."');</script>";


?>

