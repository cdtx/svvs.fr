<?php
//se connecter à MySql
include ('../config/config.php');

//envoi des headers csv
header('Content-Type: application/csv-tab-delimited-table');
//nommage du fichier avec la date du jour
header('Content-disposition: filename=tableau_inscription_'.date('Y-m-d').'.csv');

//Première ligne avec le noms des colonnes

echo '"equipe";"coureur 1";"age 1";"coureur 2";"age 2";"cumul annee";"categorie";"horaire";'."\n";

//selection des champs souhaités dans la base
$equipe=1;   
$sql="SELECT * FROM  `incriptions` ORDER BY date ASC"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $date=$mot['date'];
    $date=explode(" ", $date);
    $heure=$date[1];
    $coureur1=$mot['coureur1'];
    $coureur2=$mot['coureur2'];
    $paiement=$mot['paiement'];
    $debut=$mot['date_inscriptions'];

$cate=$mot['categorie'];
if ($cate=="1") { $cate="MA";}
if ($cate=="2") { $cate="MB";}
if ($cate=="3") { $cate="MC";}
if ($cate=="4") { $cate="MD";}
if ($cate=="5") { $cate="ME";}
if ($cate=="6") { $cate="FA";}
if ($cate=="7") { $cate="FB";}
if ($cate=="8") { $cate="MXA";}
if ($cate=="9") { $cate="MXB";}
if ($cate=="10") { $cate="PE";}
if ($cate=="11") { $cate="GPE";}
if ($cate=="12") { $cate="HAN";}

if ($coureur1=="") {
	$nom1="";
	$nom2="";
	$age1="";
	$age2="";
	$total_age="";
	$categorie="";
} else {

$sql1 = "SELECT * FROM  `coureur` WHERE id=$coureur1 "; 
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
while($mot1 = mysql_fetch_assoc($req1)) 
{
    $nom1=$mot1['nom'];
    $prenom1=$mot1['prenom'];
    $age1=$mot1['age'];
    $nom1=$nom1." ".$prenom1;

}
$sql2 = "SELECT * FROM  `coureur` WHERE id=$coureur2 "; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
while($mot2 = mysql_fetch_assoc($req2)) 
{
    $nom2=$mot2['nom'];
    $prenom2=$mot2['prenom'];
    $age2=$mot2['age'];
    $nom2=$nom2." ".$prenom2;

    
}
$total_age=$age1+$age2;
}


    echo '"'.$equipe.'";"'.$nom1.'";"'.$age1.'";"'.$nom2.'";"'.$age2.'";"'.$total_age.'";"'.$cate.'";"'.$heure.'"'."\n";

$equipe++; 

} 

mysql_close();
exit;

?>