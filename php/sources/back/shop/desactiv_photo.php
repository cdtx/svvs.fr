<?php
include '../config/config.php';

$id=$_GET['id'];
$id_produit=$_GET['id_produit'];
$sql="UPDATE  `photo_produit` SET  `active` =  'non' WHERE  `id` =$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_produit.php?id=".$id_produit."');</script>";
?>