<?php
session_start();
if (!empty($_SESSION['user'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['user'];

// Configuration
// 
include '../config/config.php';
date_default_timezone_set('Europe/Paris');
//
//

$titre=$_POST["titre"];

// Ajout de la date du jour si le client n'a pas mis de date
$date=$_POST["date"];
if ($date=="") {
     $date= date('d/m/Y');
} else {
     $date=$date;
}
//
//

$date=explode("/", $date);
$date=$date[2]."-".$date[1]."-".$date[0];

$heure="00:00";


//
$texte=$_POST["coureur"];
$datetime=$date." ".$heure;
$lien=$_POST['lieu'];

//-----------------------------//
//-----------------------------//
$sql = "INSERT INTO `agenda` (`id`,`titre`,`photo`, `date`,`texte`) VALUES ('','$titre','$lien','$datetime','$texte');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=oui');</script>";

?>