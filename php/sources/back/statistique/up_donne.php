
<?php
require_once('GoogleAnalyticsAPI.class.php');

include '../config/config.php';


// Effacement de toutes les données pour repartir sur 30 jours
//
//
//
//
//---//
$sql = "TRUNCATE TABLE visiteurs"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "TRUNCATE TABLE autre"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "TRUNCATE TABLE page_consult"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "TRUNCATE TABLE keyword"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// fin de l'effacement des tables
// 
// -------//



// on determine la date d'aujourd'hui
 $today = date("Y-m-d");
//

// ajout du nombre de visiteurs
// 
// 
// 
 $i = 30;
 while ($i >= 0){
$nextWeek = time() - ($i * 24 * 60 * 60);
$date= date('Y-m-d', $nextWeek);
$date_affiche=explode("-", $date);
$date_affiche=$date_affiche[2]."-".$date_affiche[1]."-".$date_affiche[0];

$i--;
$ga2 = new GoogleAnalyticsAPI('galland.ludovic@gmail.com', 'l03g86', '84775738', $date);
$visit= $ga2->getMetric('visits');
$visit_unique= $ga2->getMetric('visitors');

$sql = "INSERT INTO `visiteurs` (`id`,`date`, `nbr_visiteurs`, `visiteurs_unique`) VALUES ('','$date','$visit','$visit_unique');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
//
//
//
//

//Ajout des autres données
//
//
$nextWeek = time() - (30 * 24 * 60 * 60);
$avant = date('Y-m-d', $nextWeek);

$ga2 = new GoogleAnalyticsAPI('galland.ludovic@gmail.com', 'l03g86', '84775738', $avant ,  $today);
$temps_en_secondes=round($ga2->getMetric('avgTimeOnSite'));
$temps= date('i:s',$temps_en_secondes);

$nbpagevues = $ga2->getMetric('pageviews');
$visiteurs = $ga2->getMetric('visits');
$visiteurs_unique = $ga2->getMetric('visitors');
$support = $ga2->getMetric('support');

$nom="temps moyen";
$sql = "INSERT INTO `autre` (`id`,`nom`, `chiffre`) VALUES ('','$nom','$temps');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$nom="nbr pages vues";
$sql = "INSERT INTO `autre` (`id`,`nom`, `chiffre`) VALUES ('','$nom','$nbpagevues');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$nom="nbr visiteurs total";
$sql = "INSERT INTO `autre` (`id`,`nom`, `chiffre`) VALUES ('','$nom','$visiteurs');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$nom="nbr visiteurs total unique";
$sql = "INSERT INTO `autre` (`id`,`nom`, `chiffre`) VALUES ('','$nom','$visiteurs_unique');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$nom="support";
$sql = "INSERT INTO `autre` (`id`,`nom`, `chiffre`) VALUES ('','$nom','$support');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
//
//
//
//

// ajout des pages consulté du site
$ga = new GoogleAnalyticsAPI('galland.ludovic@gmail.com', 'l03g86', '31871877', $avant ,  $today);
$page_views = $ga->getDimensionByMetric('pageviews', 'pagepath' );

$tableau=$page_views['labels'];
$data=$page_views['datas'];
$i=0;
   
 while ($i <= 29){

 	$tableau[$i]=str_replace("'", "", $tableau[$i]);
 	$tableau[$i]=str_replace('"','', $tableau[$i]);
$sql = "INSERT INTO `page_consult` (`id`,`page`, `quantite`) VALUES ('','$tableau[$i]','$data[$i]');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
 	$i++;
 }
//fin de l'ajout des pages consultées


// ajout des keyword du site
$ga = new GoogleAnalyticsAPI('galland.ludovic@gmail.com', 'l03g86', '31871877', $avant ,  $today);
$page_views = $ga->getDimensionByMetric('pageviews', 'keyword' );

$tableau=$page_views['labels'];
$data=$page_views['datas'];
$i=0;
   
 while ($i <= 29){
 	 	$tableau[$i]=str_replace("'", "", $tableau[$i]);
 	$tableau[$i]=str_replace('"','', $tableau[$i]);
$sql = "INSERT INTO `keyword` (`id`,`keyword`, `quantite`) VALUES ('','$tableau[$i]','$data[$i]');"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
 	$i++;
 }
//fin de l'ajout des pages consultées




?>