<!--Connexion à la base de donnée et création du fichier config -->
<?php
$code=$_POST['code'];



$create_config="../../analyticstracking.php";
$handle = fopen("$create_config", "w+");
fwrite($handle, $code);
fclose($handle);
echo "<script type='text/javascript'>document.location.replace('fin_duplicate.php');</script>";

?>