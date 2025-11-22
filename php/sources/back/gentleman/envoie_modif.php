<?php
include '../config/config.php';
$horaire_choisis=$_POST['horaires'];


$id_coureur1=$_POST['id_coureur1'];
$coureur1=$_POST['coureur1'];
$prenom1=$_POST['prenom1'];
$age1=$_POST['age1'];
$sexe1=$_POST['sexe1'];
$licencie1=$_POST['licencie1'];
$federation1=$_POST['federation1'];
$num_licence1=$_POST['num_licence1'];
$club1=$_POST['club1'];
$club1=str_replace("'", "''", $club1);
$adresse1=$_POST['adresse1'];
$adresse1=str_replace("'", "''", $adresse1);
$code_postale1=$_POST['code_postale1'];
$ville1=$_POST['ville1'];
$ville1=str_replace("'", "''", $ville1);
$tel1=$_POST['tel1'];
$email1=$_POST['email1'];
$cate=$_POST['cate'];

$repas=$_POST['repas'];
$personne_paye=$_POST['personne_qui_paye'];

$ville1=str_replace("'", " ", $ville1);


$sql1= " UPDATE `coureur`
SET `nom` = '$coureur1',
`prenom` = '$prenom1',
`age` = '$age1',
`sexe` = '$sexe1',
`licencie` = '$licence1',
`federation` = '$federation1',
`num_licence` = '$num_licence1',
`club` = '$club1',
`adresse` = '$adresse1',
`code_postale` = '$code_postale1',
`ville` = '$ville1',
`tel` = '$tel1',
`email` = '$email1'
WHERE `id` = '$id_coureur1'";
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 

$id_coureur2=$_POST['id_coureur2'];
$coureur2=$_POST['coureur2'];
$prenom2=$_POST['prenom2'];
$age2=$_POST['age2'];
$sexe2=$_POST['sexe2'];
$licencie2=$_POST['licencie2'];
$federation2=$_POST['federation2'];
$num_licence2=$_POST['num_licence2'];
$club2=$_POST['club2'];
$club2=str_replace("'", "''", $club2);
$adresse2=$_POST['adresse2'];
$adresse2=str_replace("'", "''", $adresse2);
$code_postale2=$_POST['code_postale2'];
$ville2=$_POST['ville2'];
$ville2=str_replace("'", "''", $ville2);
$tel2=$_POST['tel2'];
$email2=$_POST['email2'];

$ville2=str_replace("'", " ", $ville2);

$sql2= " UPDATE `coureur`
SET `nom` = '$coureur2',
`prenom` = '$prenom2',
`age` = '$age2',
`sexe` = '$sexe2',
`licencie` = '$licence2',
`federation` = '$federation2',
`num_licence` = '$num_licence2',
`club` = '$club2',
`adresse` = '$adresse2',
`code_postale` = '$code_postale2',
`ville` = '$ville2',
`tel` = '$tel2',
`email` = '$email2'
WHERE `id` = '$id_coureur2'";

$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 

     echo "<script type='text/javascript'>document.location.replace('index.php');</script>";




?>
