<!--Connexion à la base de donnée et création du fichier config -->
<?php
$page=$_POST['page'];
$dossier=$page."/index.php";
include '../config/config.php';

$sql = "CREATE TABLE `$page` (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text  NULL,texte text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO `$page` (`id` ,`titre` ,`texte`) VALUES ('' , 'titre de la page page', 'message de la page $page');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql2 = "INSERT INTO  `menu` (`id` ,`nom` ,`lien`)VALUES (NULL ,  '$page',  '$dossier')";
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());


function copy_dir ($dir2copy,$dir_paste) {

        // On vérifie si $dir2copy est un dossier
        if (is_dir($dir2copy)) {
       
                // Si oui, on l'ouvre
                if ($dh = opendir($dir2copy)) {     

                        // On liste les dossiers et fichiers de $dir2copy
                        while (($file = readdir($dh)) !== false) {
                       
                                // Si le dossier dans lequel on veut coller n'existe pas, on le créé

                                if (!is_dir($dir_paste)) mkdir ($dir_paste, 0777
);
                       
                                // S'il s'agit d'un dossier, on relance la fonction rÃ©cursive

                                if(is_dir($dir2copy.$file) && $file != '..'  && $file != '.') copy_dir ( $dir2copy.$file.'/' , $dir_paste.$file.'/' );     
                                // S'il sagit d'un fichier, on le copue simplement

                                elseif($file != '..'  && $file != '.') copy ( $dir2copy.$file , $dir_paste.$file );
                                       
                        }
                       
                // On ferme $dir2copy
                closedir($dh);
          
                }
               
        }       
          
}

$dir2copy = 'page/';
$dir_paste = '../'.$page.'/';

// Copie le dossier $dir2copy dans le dossir $dir_paste, inutile de créé les dossiers

copy_dir ($dir2copy,$dir_paste);
echo "<script type='text/javascript'>document.location.replace('fin_duplicate.php');</script>";

?>