<?php
include '../config/config.php';
$id=$_GET['id'];

// on supprime le catergorie qu'on veut plus
$sql ="DELETE FROM `partenaires` WHERE position=$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

// on selectionne le maximum de position
$sql ="SELECT * FROM `partenaires` ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
//fin

// on affecte la position supprimé +1
$i = $id+1;

// on fait une boucle qui se termine une fois que $i à atteint le nombre max de positions
// on selectionne l'entrée qui correspond à $i
while ($i <=  $position_finale):
$sql ="SELECT * FROM  `partenaires` WHERE position='$i'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$id=$mot['id'];
	$position=$mot['position']-1;
	$sql="UPDATE  `partenaires` SET  `position` =  '$position' WHERE  `id` =$id";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}
    $i++;
endwhile;

echo "<script type='text/javascript'>document.location.replace('index.php');</script>";


?>

