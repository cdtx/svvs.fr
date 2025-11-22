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
include '../config/config.php';
$id=$_GET['id'];
$sql = "DELETE FROM `agenda` WHERE `id`= $id"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

echo "<script type='text/javascript'>document.location.replace('index.php?mess=suppr');</script>";
?>
