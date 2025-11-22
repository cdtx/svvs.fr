<?php
$serveur = "mysql";
$nom_base = getenv("MYSQL_DATABASE");
$login = getenv("MYSQL_USER");;
$passwd = getenv("MYSQL_PASSWORD");;
mysql_connect ($serveur,$login,$passwd) or die ("ERREUR".mysql_error());
mysql_select_db ($nom_base) or die ("ERREUR".mysql_error());
?>

