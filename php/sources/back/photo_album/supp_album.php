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
$id_album=$_POST['id_album'];
$option=$_POST['option'];
while($video = array_shift($option)) 
{
		//////////////////////////////////////////////////////////////////////
		///////	on lit et on effaces les photos dans le dossier	//////////////
		//////////////////////////////////////////////////////////////////////
		$sql = "SELECT * FROM photo WHERE album= '$video'"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			while($mot = mysql_fetch_assoc($req)) 
		{ 
			$photo=$mot['lien'];
			echo $photo;echo "<br>";
			unlink($photo); // On efface.
		}
		$sql = "DELETE FROM `photo` WHERE `album`= $video"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		//////////////////////////////////////////////////////////////////////
		///////			suppression dans la table photos 		//////////////
		//////////////////////////////////////////////////////////////////////
		$sql = "DELETE FROM `album` WHERE `id`= $video"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";




?>
