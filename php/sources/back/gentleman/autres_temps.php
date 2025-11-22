<?php
session_start();
if (!empty($_SESSION['user'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['user'];
include '../config/config.php';
$date=$_POST['date'];
$date2=explode("/", $date);
$date2="2016-02-01";
$heure="12:15";
$heure_2=$_POST['heure'];
$nbr="9";


for($k=0;$k<$nbr;$k++){

    
	$heure = date("H:i:s", strtotime("+30 minute", strtotime($heure)));
	$date_finale=$date2." ".$heure;
    $sql="INSERT INTO  `incriptions` (`id` ,`coureur1` ,`coureur2` ,`date` ,`paiement` ,`categorie` ,`date_inscriptions`)VALUES (NULL ,  '',  '',  '$date_finale',  '', 'DERNY',  '')";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}

echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

?>

