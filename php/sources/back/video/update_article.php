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
$id=$_POST['id'];
$titre=$_POST["titre"];
$date=$_POST["date"];
$date=explode("/", $date);
$date=$date[2]."-".$date[1]."-".$date[0];

$google=$_POST['google'];
$heure=$_POST['heure'];
$texte=$_POST["texte"];
$datetime=$date." ".$heure;

$changement_fly=$_FILES["fichier"]["error"];

if ($changement_fly==4) {
     $sql = "UPDATE  `blog` SET  `titre` =  '$titre',`google` =  '$google',`date` =  '$datetime',`texte` =  '$texte' WHERE  `id` =$id;";
     $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     echo "<script type='text/javascript'>document.location.replace('index.php?=modif');</script>";


} else {

$dossier = '../images/articles/';
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
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
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
        $ok=" Soirée correctement ajoutée."; 
     }
     else //Sinon (la fonction renvoie FALSE).
     {
     
     }
}
else
{
     echo $erreur;
}
$lien='/images/articles/'.$fichier;

     $sql = "UPDATE  `blog` SET  `titre` =  '$titre',`google` =  '$google',`photo` =  '$lien',`date` =  '$datetime',`texte` =  '$texte' WHERE  `id` =$id;";
     $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     echo "<script type='text/javascript'>document.location.replace('index.php?=modif');</script>";


}
?>

