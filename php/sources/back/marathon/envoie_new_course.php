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
$date2=$date2[2]."-".$date[1]."-".$date[0];
$heure=$_POST['heure'];
$heure_2=$_POST['heure'];
$nbr=$_POST['nbr'];


for($k=0;$k<$nbr;$k++){

    
	$heure = date("H:i:s", strtotime("+2 minute", strtotime($heure)));
	$date_finale=$date2." ".$heure;
    $sql="INSERT INTO  `incriptions` (`id` ,`coureur1` ,`coureur2` ,`date` ,`paiement` ,`categorie` ,`date_inscriptions`)VALUES (NULL ,  '',  '',  '$date_finale',  '',  '',  '')";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}

 $sql = "INSERT INTO  `propriete_gentleman` (`id` ,`date` ,`heure` ,`nbr_part`)VALUES (NULL ,  '$date2',  '$heure_2',  '$nbr');";
     $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     echo "<script type='text/javascript'>document.location.replace('index.php');</script>";  

?>

