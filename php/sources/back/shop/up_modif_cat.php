<?php
include '../config/config.php';
$nom=$_POST['name'];
$texte=$_POST['texte'];
$id=$_POST['id'];

$sql="UPDATE  `categorie` SET  `texte` =  '$texte' , `nom`= '$nom' WHERE  `id` ='$id';";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=modif');</script>";


?>