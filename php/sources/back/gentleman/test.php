<?php

include '../config/config.php';
$date=$_POST['date'];
$date2=explode("/", $date);
$date2="2015-04-01";
$heure="15:48";
$heure_2=$_POST['heure'];
$nbr="20";


for($k=0;$k<$nbr;$k++){

    
	$heure = date("H:i:s", strtotime("+2 minute", strtotime($heure)));
	$date_finale=$date2." ".$heure;
    $sql="INSERT INTO  `incriptions` (`id` ,`coureur1` ,`coureur2` ,`date` ,`paiement` ,`categorie` ,`date_inscriptions`)VALUES (NULL ,  '',  '',  '$date_finale',  '',  '',  '')";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}


echo " fini";
?>

