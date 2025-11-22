<?php


include '../config/config.php';
$sql = "TRUNCATE TABLE coeur";
mysql_query($sql) or die(mysql_error());

$sql ="SELECT * FROM `coeur` ORDER BY position DESC Limit 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id_position=$mot['position'];

}

$option2 = $_POST["similaire"];
print_r($option2);
while($video2 = array_shift($option2)) 
{
$id_position=$id_position+1;
$sql="INSERT into coeur (`id`,`id_produit`,`position`) VALUES('','$video2','$id_position'); ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo $position;
}



echo "<script type='text/javascript'>document.location.replace('produits_coeur.php');</script>";
?>