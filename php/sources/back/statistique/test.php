<?php
require_once('GoogleAnalyticsAPI.class.php');
 $today = date("Y-m-d");

$nextWeek = time() - (30 * 24 * 60 * 60);
$avant = date('Y-m-d', $nextWeek);

include '../config/config.php';
// ajout des pages consulté du site
$ga = new GoogleAnalyticsAPI('galland.ludovic@gmail.com', 'l03g86', '31871877', $avant ,  $today);
$page_views = $ga->getDimensionByMetric('pageviews', 'pagepath' );

$tableau=$page_views['labels'];
$data=$page_views['datas'];

//fin de l'ajout des pages consultées

?>



<table>


<?php
$i=0;
   
 while ($i <= 29){
 	$tableau[$i]=str_replace("'", "", $tableau[$i]);
 	$tableau[$i]=str_replace('"','', $tableau[$i]);
 	echo "<tr><td>".$tableau[$i]."</td><td>".$data[$i]."</td></tr>";
 	$i++;
 }




?>
</table>