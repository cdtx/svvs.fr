<?php
// Configuration
// 
include '../config/config.php';

//
//

$login=$_POST["login"];
$email=$_POST["email"];
$mdp=$_POST["mdp"];

echo $mdp;
$mdp=sha1($mdp);

//-----------------------------//
//-----------------------------//
$sql = "INSERT INTO `user` (`id`,`login`,`pass`,`mail`) VALUES ('','$login','$mdp','$email');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


$sql = "SELECT * FROM  user ORDER BY id desc LIMIT 1"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$user=$mot['id'];
}

$option=$_POST['option'];
while($video = array_shift($option)) 
{
$sql = "INSERT INTO `autorisation` (`id`,`user`,`autorisation`) VALUES ('','$user','$video');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('index.php?mess=oui');</script>";

?>