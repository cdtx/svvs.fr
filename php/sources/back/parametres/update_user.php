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

//
//
$id=$_POST['id'];
$login=$_POST["login"];
$email=$_POST["email"];
$mdp=$_POST["old_pwd"];

$password=$mot['password'];

if ($password=='') {
    $password=$mdp;
} else {
     $password=sha1($password);
}



//-----------------------------//
//-----------------------------//
$sql = "UPDATE  `user` SET  `login` =  '$login',`pass` =  '$password',`mail` =  '$email' WHERE  `id` ='$id';"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


$sql = "DELETE from autorisation WHERE user='$id'"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 


$option=$_POST['option'];
while($video = array_shift($option)) 
{
$sql = "INSERT INTO `autorisation` (`id`,`user`,`autorisation`) VALUES ('','$id','$video');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('index.php?mess=oui');</script>";

?>