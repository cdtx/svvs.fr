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
if ($_POST['suppr'] == "supprimer photos" ){
$id_album=$_POST['id_album'];
$option=$_POST['option'];
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
			$photo=$mot['name'];
			unlink($photo); // On efface.
		}
		//////////////////////////////////////////////////////////////////////
		///////			suppression dans la table photos 		//////////////
		//////////////////////////////////////////////////////////////////////
		$table_sql= "photo";
		$sql = "DELETE FROM `$table_sql` WHERE `id`= $video"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('album_solo.php?id=".$id_album."');</script>";

} 
else {
$id_album=$_POST['id_album'];
$option=$_POST['option'];
$id_photo=$option[0];

		$sql = "SELECT * FROM `photo` WHERE `id`= $id_photo"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			while($mot = mysql_fetch_assoc($req)) 
		{ 
			$photo=$mot['lien'];

		}
		//////////////////////////////////////////////////////////////////////
		///////			suppression dans la table photos 		//////////////
		//////////////////////////////////////////////////////////////////////
		$table_sql= "photo";
		$sql = "UPDATE  `album` SET  `thumb` =  '$photo' WHERE  `id` =$id_album;"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('album_solo.php?id=".$id_album."');</script>";

?>
