<?php
include '../config/config.php';

$titre=$_POST['titre'];
$internet=$_POST['internet'];


foreach ($_FILES["files"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {


        $sql ="SELECT * FROM `partenaires` ORDER BY position DESC LIMIT 1";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
        while ($mot = mysql_fetch_assoc($req)) { $position=$mot['position']; }

    $position=$position+1;
    $file_name = time().'-'.$_FILES['files']['name'][$key];
    $file_name=str_replace(' ' ,'_',$file_name);
    $lien="photo/".$file_name;
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
    $sql="INSERT into partenaires (`id`,`nom`,`lien`,`internet`,`position`,`active`) VALUES('','$titre','$file_name','$internet','$position',''); ";
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


echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
?>