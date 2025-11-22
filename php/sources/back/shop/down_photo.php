<?php
include '../config/config.php';
$id_position1=$_GET['id_position'];
$id_photo=$_GET['id_photo'];
$id_retour=$_GET['id_produit'];


$id_position=$id_position1+1;
$sql ="SELECT * FROM `photo_produit` ORDER BY position_photo DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
echo $position_finale;
if ($id_position1==$position_finale) {

	echo "<script type='text/javascript'>document.location.replace('modif_produit?id=".$id_retour."');</script>";

}else {
$sql ="SELECT * FROM `photo_produit` WHERE position_photo='$id_position' AND id_produit=$id_produit";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_bas=$mot['id'];
    $position2=$mot['position_photo'];
}
//tu ajoute +1 à sa position pour le faire descendre
$position2=$position2-1;

//on fait un update de sa nouvelle position
$sql="UPDATE  `photo_produit` SET  `position_photo` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// on fait un nouvelle update de la position que l'on veut monter
$sql="UPDATE  `photo_produit` SET  `position_photo` =  '$id_position' WHERE  `id` =$id_photo;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_produit?id=".$id_retour."');</script>";
}
?>