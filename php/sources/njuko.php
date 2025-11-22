<?php
include 'nbvcxw.php';
$id=$_GET['id'];

$horaire_choisis=$id;

$coureur1="En attente";
$prenom1="En attente";



$sql1 = "INSERT INTO `coureur` (`id`, `nom`, `prenom`, `age`, `sexe`, `licencie`, `federation`, `num_licence`, `club`, `adresse`, `code_postale`, `ville`, `tel`, `email`, `date`, `horaire_choisis`) 
VALUES ('', '$coureur1', '$prenom1', '$age1', '$sexe1', '$licencie1', '$federation1', '$num_licence1', '$club1', '$adresse1', '$code_postale1', '$ville1', '$tel1', '$email1', '$today', '$horaire_choisis');"; 
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 

$coureur2="En attente";
$prenom2="En attente";


$sql2 = "INSERT INTO `coureur` (`id`, `nom`, `prenom`, `age`, `sexe`, `licencie`, `federation`, `num_licence`, `club`, `adresse`, `code_postale`, `ville`, `tel`, `email`, `date`, `horaire_choisis`) 
VALUES ('', '$coureur2', '$prenom2', '$age2', '$sexe2', '$licencie2', '$federation2', '$num_licence2', '$club2', '$adresse2', '$code_postale2', '$ville2', '$tel2', '$email2', '$today', '$horaire_choisis');"; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 

$sql3="SELECT * FROM  `coureur` ORDER BY  `id` DESC LIMIT 2";
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
while($mot3 = mysql_fetch_assoc($req3)) 
{ 

	$coureur[]=$mot3["id"];

}

$coureur1=$coureur[0];
$coureur2=$coureur[1];

$sql4="UPDATE  `incriptions` SET  `coureur1` =  '$coureur1' WHERE  `id` =$horaire_choisis;";
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 

$sql5="UPDATE  `incriptions` SET  `coureur2` =  '$coureur2' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

$today=date('Y-m-d');
$sql5="UPDATE  `incriptions` SET  `date_inscriptions` =  '$today' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

header('Location: http://www.njuko.net/gentleman-des-champions-2017');
  exit();
?>