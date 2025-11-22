<?php
session_start();
if (!empty($_SESSION['user'])){
}
else{
header("location:index.php");
}
$nom_connexion=$_SESSION['user'];
include '../config/config.php';
$id=$_GET['id'];

     $sql = "UPDATE  `incriptions` SET  `paiement` =  'oui' WHERE  `id` =$id;";
     $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
     echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

?>

