<?php
include '../config/config.php';

//on recupere id de position et id categorie parent
$id_position=$_GET['id_position'];
$id_produit=$_GET['id_produit'];
$id_retour=$_GET['id_cat'];


// on lui dit tu prend la position actuelle et tu enleve 1 pour faire monter
$id_position=$id_position-1;
//si le resultat est de 0 alors tu retourne a la page cat car tu peut pas plus monter
if ($id_position=='0') {
	echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_retour."');</script>";
} 
//sinon tu selectionne le produit qui a la position du dessus
else {
$sql ="SELECT * FROM `cat_produit` WHERE position='$id_position' AND categorie= $id_retour";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_bas=$mot['id'];
    $position2=$mot['position'];
}
//tu ajoute +1 à sa position pour le faire descendre
$position2=$position2+1;

//on fait un update de sa nouvelle position
$sql="UPDATE  `cat_produit` SET  `position` =  '$position2' WHERE  `id` =$id_bas";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// on fait un nouvelle update de la position que l'on veut monter
$sql="UPDATE  `cat_produit` SET  `position` =  '$id_position' WHERE  `id` =$id_produit;";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('modif_cat?id=".$id_retour."');</script>";
}

  



?>