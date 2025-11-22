<?php
function clearDir($dossier) {
    $ouverture=@opendir($dossier);
    if (!$ouverture) return;
    while($fichier=readdir($ouverture)) {
        if ($fichier == '.' || $fichier == '..') continue;
            if (is_dir($dossier."/".$fichier)) {
                $r=clearDir($dossier."/".$fichier);
                if (!$r) return false;
            }
            else {
                $r=@unlink($dossier."/".$fichier);
                if (!$r) return false;
            }
    }
closedir($ouverture);
$r=@rmdir($dossier);
@rename($dossier,"trash");
return true;
}
include '../config/config.php';
$option=$_POST['option'];
while($video = array_shift($option)) 
{
        //////////////////////////////////////////////////////////////////////
        /////// on lit et on effaces les photos dans le dossier //////////////
        //////////////////////////////////////////////////////////////////////
        $sql = "SELECT * FROM `menu` WHERE `id`= $video"; 
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
            while($mot = mysql_fetch_assoc($req)) 
        { 
            $lien=$mot['nom'];
        }
        //////////////////////////////////////////////////////////////////////
        ///////         suppression dans la table photos        //////////////
        //////////////////////////////////////////////////////////////////////
$a_del = "../".$lien;  // <- c'est ici qu'on remplace

clearDir($a_del);




        
        $sql = "DROP table `$lien`"; 
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        $sql = "DELETE FROM `menu` WHERE `id`= $video"; 
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}
echo "<script type='text/javascript'>document.location.replace('fonction.php');</script>";

?>
