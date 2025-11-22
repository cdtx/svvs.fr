<?php
include '../config/config.php';
$id_position=$_GET['id_position'];
$id=$_GET['id'];


$id_position=$id_position-1;
if ($id_position=='0') {
	echo "<script type='text/javascript'>document.location.replace('index.php?mess=erreur');</script>";
} else {
	$sql ="SELECT * FROM `partenaires` WHERE position='$id_position'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_bas=$mot['id'];
    $nom=$mot['nom'];
    $position2=$mot['position'];
}

$position2=$position2+1;

$sql="UPDATE  `partenaires` SET  `position` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$sql="UPDATE  `partenaires` SET  `position` =  '$id_position' WHERE  `id` =$id;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=modif');</script>";
}

 



?>