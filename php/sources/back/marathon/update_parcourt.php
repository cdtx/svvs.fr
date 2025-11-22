<?php
// Configuration
// 
include '../config/config.php';

$id=$_POST['id'];
$titre=$_POST["titre"];
$texte=$_POST['texte'];
$texte=str_replace("'", "\'", $texte);

$repertoire = explode("/", $_SERVER["PHP_SELF"]); 
$id_aide = end(array_keys($repertoire));
$id_aide = $id_aide-1;
$page = $repertoire[$id_aide];


     $sql = "UPDATE  `marathon_parcourt` SET  `texte` =  '$texte' WHERE  `id` =$id;";
     $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     echo "<script type='text/javascript'>document.location.replace('parcourt.php?mess=modif');</script>";



?>
