<?php
error_reporting(0);
$id_produit=$_POST['id_produit']; 
include '../config/config.php';

$titre=$_POST['titre'];
$prix=$_POST['prix'];
$google=$_POST['google'];
$description=$_POST['description'];
$texte_promo=$_POST['texte_promo'];

// on ajoute les nouvelles categorie séléctionne
$promo = $_POST["promotion"];
if ($promo=='') {
    $promo='non';
} else {
    $promo='oui';
}

//


$sql1 ="UPDATE  `produits` SET  `titre` =  '$titre',`prix` =  '$prix',`google` =  '$google',`description` =  '$description',`promo` =  '$promo',`texte_promotion` =  '$texte_promo' WHERE  `id` =$id_produit;";
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());

// on ajoute les nouvelles categorie séléctionne
// on supprime toutes les lignes qui correspond au categorie séléctionnée
$sql1 ="DELETE   FROM  `similaires` WHERE id_produit=$id_produit";
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
//fin
$option2 = $_POST["similaire"];
while($video2 = array_shift($option2)) 
{
$sql="INSERT into similaires (`id`,`id_produit`,`id_similaires`) VALUES('','$id_produit','$video2'); ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}


///////// SOUS CAT //////
////////////////////////
$option = $_POST["categorie"];
$sql="SELECT * FROM cat_produit WHERE produit=$id_produit";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        while($mot = mysql_fetch_assoc($req)) {
        $categorie[]=$mot['categorie'];}


while($video2 = array_shift($categorie)) 
{
if (in_array($video2, $option)) {
    
} else {


$sql ="SELECT * FROM `cat_produit` WHERE categorie=$video2 AND produit=$id_produit";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_produit=$mot['position'];
}
//fin
$sql="DELETE FROM cat_produit WHERE categorie=$video2 AND produit=$id_produit";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
// on selectionne le maximum de position
$sql ="SELECT * FROM `cat_produit` WHERE categorie=$video2 ORDER BY position DESC LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $position_finale=$mot['position'];
}
//fin

// on affecte la position supprimé +1
$i = $position_produit+1;

// on fait une boucle qui se termine une fois que $i à atteint le nombre max de positions
// on selectionne l'entrée qui correspond à $i
while ($i <=  $position_finale):
$sql ="SELECT * FROM  `cat_produit` WHERE position='$i' AND categorie=$video2";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $position=$mot['position']-1;
    $sql="UPDATE  `cat_produit` SET  `position` =  '$position' WHERE  `id` =$id";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

}
    $i++;
endwhile;





}
}


$sql="SELECT * FROM cat_produit WHERE produit=$id_produit";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        while($mot = mysql_fetch_assoc($req)) {
        $categorie2[]=$mot['categorie'];

    }

//On ajoute les nouveaux en faisant oublié les anciens déja presents    
while($video3 = array_shift($option)) 
{
$position_max='';
if (in_array($video3, $categorie2)) {

} else {

        $sql="SELECT * FROM cat_produit WHERE categorie=$video3 ORDER BY position DESC LIMIT 1";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        while($mot = mysql_fetch_assoc($req)) {
        $position_max=$mot['position'];}
        if ($position_max=='') {
        $position_max='1';
        } else {
   $position_max = $position_max+1;
}


        



    $sql="INSERT into cat_produit (`id`,`produit`,`categorie`,`sous_categorie`,`position`) VALUES('','$id_produit','$video3','','$position_max'); ";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
}





}




//

// on crée un array pour mettre les eventuel possibilité de sous categorie
    $sql ="SELECT souscat.id,souscat.parent, categorie.nom FROM `souscat` INNER JOIN categorie ON souscat.parent = categorie.id GROUP BY parent";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    while($mot = mysql_fetch_assoc($req)) {
        $id_souscat[]=$mot['parent'];
    }

// on fait un foreach pour faire le tableau des sous cat
foreach($id_souscat as $element){
	    $sql ="SELECT souscat.id,souscat.parent, categorie.nom FROM `souscat` INNER JOIN categorie ON souscat.parent = categorie.id WHERE parent=$element GROUP BY parent";
    	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
    	while($mot = mysql_fetch_assoc($req)) {
        $parent=$mot['nom'];
        $id_parent=$mot[''];
    }
		$option = $_POST[$element];
		while($video = array_shift($option)) 
		{
			$sql="UPDATE  `cat_produit` SET  `sous_categorie` =  '$video' WHERE  `produit` =$id_produit AND categorie=$element;";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}
        

}

foreach ($_FILES["files"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {


        $sql ="SELECT * FROM `photo_produit` WHERE id_produit=$id_produit ORDER BY position_photo DESC LIMIT 1";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
        while ($mot = mysql_fetch_assoc($req)) { $position=$mot['position_photo']; }

    $position=$position+1;
    $file_name = time().'-'.$_FILES['files']['name'][$key];
    $file_name=str_replace(' ' ,'_',$file_name);
    $lien="photo/".$file_name;
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
    $sql="INSERT into photo_produit (`id`,`id_produit`,`photo`,`active`,`position_photo`) VALUES('','$id_produit','$file_name','','$position'); ";
        $desired_dir="photo/";
        if(empty($errors)==true){
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                  // rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
 
        }else{
                print_r($errors);
                
        }
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
      }
  if(empty($error)){
    
  }
}



echo "<script type='text/javascript'>document.location.replace('modif_produit.php?id=".$id_produit."');</script>";
?>