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
$titre=str_replace("'", "''", $titre);

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
$texte=str_replace("'", "''", $texte);
$datetime=$date." ".$heure;

// envoie de l'image de couverture
//------------------------//
$dossier = '../../images/articles/';
$fichier = basename($_FILES['fichier']['name']);
$taille_maxi = 10485760;
$taille = filesize($_FILES['fichier']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg' ,'.JPG');
$extension = strrchr($_FILES['fichier']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}

if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
         
     }
     else //Sinon (la fonction renvoie FALSE).
     {
     
     }
}
else
{
     echo $erreur;
}
$lien='images/articles/'.$fichier;
//-----------------------------//
//-----------------------------//
$sql = "INSERT INTO `blog` (`titre`,`google`,`photo`, `date`,`texte`) VALUES ('$titre','$google','$lien','$datetime','$texte');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
echo "<script type='text/javascript'>document.location.replace('index.php?mess=oui');</script>";

?>
