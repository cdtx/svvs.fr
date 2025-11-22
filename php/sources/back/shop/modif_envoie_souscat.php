<?php
include '../config/config.php';
$nom=$_POST['name'];
$parent=$_POST['parent'];
$id=$_POST['id'];
$texte=$_POST['texte'];


$sql="UPDATE  `souscat` SET  `titre`= '$nom' , `texte` = '$texte' WHERE  `id` ='$id';";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat.php?id=".$parent."');</script>";


?>