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
$album=$_POST['album'];
$sql="SELECT * from album order by id DESC Limit 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($mot = mysql_fetch_assoc($req)){
  $id=$mot['id'];

}

if ($id=='') {
	$id="1";
	$sql="ALTER TABLE album AUTO_INCREMENT=0";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$sql="INSERT into album (`id`,`nom`,`thumb`) VALUES('','$album',''); ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
} else {
	  $id=$id+1;
	  $sql="INSERT into album (`id`,`nom`,`thumb`) VALUES('','$album',''); ";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}



    echo "<script type='text/javascript'>document.location.replace('4_ajout_photo2.php?id=".$id."');</script>";

?>
