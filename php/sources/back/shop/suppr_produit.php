<?php
include '../config/config.php';
$id=$_GET['id'];


// on supprime produit qu'on veut plus
$sql ="DELETE FROM `produits` WHERE id=$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

// on selectionne le maximum de position
$sql ="SELECT * FROM `cat_produit` WHERE produit=$id ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $categorie=$mot['categorie'];
    $position=$mot['position'];
    $sql ="SELECT * FROM `cat_produit` WHERE categorie=$categorie ORDER BY position DESC LIMIT 1 ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	while($mot = mysql_fetch_assoc($req)) 
	{ 
		$position_max=$mot['position'];
	}
	// on affecte la position supprimé +1
	$i = $position+1;
	// on fait une boucle qui se termine une fois que $i à atteint le nombre max de positions
	// on selectionne l'entrée qui correspond à $i
	while ($i <=  $position_max):
	$sql ="SELECT * FROM  `cat_produit` WHERE position='$i' AND categorie=$categorie ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	while($mot = mysql_fetch_assoc($req)) 
	{ 
		$id=$mot['id'];
		$position=$mot['position']-1;
		$sql="UPDATE  `cat_produit` SET  `position` =  '$position' WHERE  `id` =$id";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
    $i++;
	endwhile;
}
//fin


// on supprime produit qu'on veut plus
$sql ="DELETE FROM `cat_produit` WHERE produit=$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

// on supprime produit qu'on veut plus
$sql ="DELETE FROM `photo_produit` WHERE id_produit=$id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
// fin

echo "<script type='text/javascript'>document.location.replace('produits.php');</script>";


?>

