<?php
include '../config/config.php';

$id=$_GET['id'];
$sql="UPDATE  `produits` SET  `active` =  '' WHERE  `id` =$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('produits.php');</script>";
?>