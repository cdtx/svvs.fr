<?php
include '../config/config.php';

$id=$_GET['id'];
$id_cat=$_GET['id_cat'];
$sql="UPDATE  `souscat` SET  `active` =  'non' WHERE  `id` =$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat.php?id=".$id_cat."');</script>";
?>