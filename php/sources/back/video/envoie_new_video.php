<?php
session_start();
if (!empty($_SESSION['user'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['user'];
?>
<?php
// Configuration
// 
include '../config/config.php';
date_default_timezone_set('Europe/Paris');
//
//

$titre=$_POST["titre"];
$titre=addslashes($titre);
$support=$_POST["support"];
$code=$_POST["code"];



    if ($support=='youtube') {
        $code = str_replace("http://youtu.be/", "", $code);
    } elseif ($support=='daily') {
        $code = str_replace("http://dai.ly/", "", $code);
    }else{
        $code = str_replace("http://vimeo.com/", "", $code);
    }


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

$google=$_POST['google'];
$google= addslashes($google);

// ajoute de l'heure local si le client ne met pas d'heure
$heure=$_POST['heure'];
if ($heure=="") {
     $heure=date("H:i");
} else {
     $heure=$heure;
}
//
//
$texte=$_POST["texte"];
$datetime=$date." ".$heure;

//-----------------------------//
//-----------------------------//
$sql = "INSERT INTO `video` (`id`,`titre`,`google`, `date`,`support`,`codage`) VALUES ('','$titre','$google','$datetime','$support','$code');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=oui');</script>";

?>