<!--Connexion à la base de donnée et création du fichier config -->
<?php
$serveur=$_POST['adresse'];
$nom_base=$_POST['nom'];
$login=$_POST['login'];
$password=$_POST['password'];

/* Fichier à supprimer */
   $fichier = '../config/config.php';

   if( file_exists ( $fichier))
     unlink( $fichier ) ;





$create_config="../config/config.php";
$handle = fopen("$create_config", "w+");
fwrite($handle, '<?php
$serveur = "'.$serveur.'";
$nom_base = "'.$nom_base.'";
$login = "'.$login.'";
$passwd= "'.$password.'";
mysql_connect ($serveur,$login,$passwd) or die ("ERREUR".mysql_error());
mysql_select_db ($nom_base) or die ("ERREUR".mysql_error());
?>');
fclose($handle);
echo "<script type='text/javascript'>document.location.replace('fin_duplicate.php');</script>";

?>