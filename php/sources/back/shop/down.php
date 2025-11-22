<?php
include '../config/config.php';
$id_position1=$_GET['id_position'];
$id=$_GET['id'];


$id_position=$id_position1+1;
$sql ="SELECT * FROM `categorie` ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
echo $position_finale;
if ($id_position1==$position_finale) {

	echo "<script type='text/javascript'>document.location.replace('index.php?mess=erreur');</script>";
} else {

$sql ="SELECT * FROM `categorie` WHERE position='$id_position'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
   $id_bas=$mot['id'];
   $nom=$mot['nom'];
   $position2=$mot['position'];
}
$position2=$position2-1;

$sql="UPDATE  `categorie` SET  `position` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$sql="UPDATE  `categorie` SET  `position` =  '$id_position' WHERE  `id` =$id;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=modif');</script>";
}

?>