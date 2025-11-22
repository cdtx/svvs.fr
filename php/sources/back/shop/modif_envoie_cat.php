<?php
include '../config/config.php';
$nom=$_POST['name'];
$texte=$_POST['texte'];
$id=$_POST['id'];

$test_photo= $_FILES["files"]["error"];

    if (in_array('4', $test_photo)) {

        $sql="UPDATE  `categorie` SET  `texte` =  '$texte' , `nom`= '$nom' WHERE  `id` ='$id';";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    } else {
          


          if(isset($_FILES['files'])){
    $errors= array();
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    $file_name = time().'-'.$_FILES['files']['name'][$key];
    $file_name=str_replace(' ' ,'_',$file_name);
    $lien="photo/".$file_name;
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
        $sql="UPDATE  `categorie` SET  `texte` =  '$texte' , `nom`= '$nom', `photo_couv`= '$file_name' WHERE  `id` ='$id';";
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
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
  }
}      
    }






?>