<?php
//se connecter à MySql
include ('../config/config.php');

//envoi des headers csv
header('Content-Type: application/csv-tab-delimited-table');
//nommage du fichier avec la date du jour
header('Content-disposition: filename=email_coureur_'.date('Y-m-d').'.csv');

//Première ligne avec le noms des colonnes

echo '"email";'."\n";

//selection des champs souhaités dans la base
$equipe=1;   
$sql="SELECT * FROM  `coureur` ORDER BY date ASC"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $email=$mot['email'];


    echo '"'.$email.'"'."\n";



} 

mysql_close();
exit;

?>