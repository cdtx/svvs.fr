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
$option=$_POST['option'];
$album=$_POST['album'];
while($video = array_shift($option)) 
{
		//////////////////////////////////////////////////////////////////////
		///////	on lit et on effaces les photos dans le dossier	//////////////
		//////////////////////////////////////////////////////////////////////
		$table_sql= "photo";
		$sql = "SELECT * FROM `$table_sql` WHERE `id`= $video"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			while($mot = mysql_fetch_assoc($req)) 
		{ 
			$photo="photo/photo/".$mot['name'];
			unlink($photo); // On efface.
		}
		//////////////////////////////////////////////////////////////////////
		///////			suppression dans la table photos 		//////////////
		//////////////////////////////////////////////////////////////////////
		$table_sql= "photo";
		$sql = "DELETE FROM `$table_sql` WHERE `id`= $video"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

?>
