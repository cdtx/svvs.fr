<?php 

include('../config/config.php');
?>
<?php

if(isset($_POST["login"]) AND isset($_POST["format"]) ){

    $res = mysql_query("SELECT count(*) as test FROM `user` WHERE login ='".($_POST['login'])."' AND pass='".sha1($_POST['format'])."'");
    while($row = mysql_fetch_assoc($res)){
      
      if ($row['test']!=0) {
        	

		echo "<span style='    background: none;
    color: #43C831;
    margin: 0;
    width: auto;
    float: none;
    display: block;
    padding: 5px 0 0;
    font-size: 12px;'>bon mots de passe</span>
    </div></div></div>
                                     <div class='mws-form-row'>
                                    <label class='mws-form-label'>nouveau mots de passe <span class=''>*</span></label>
                                    <div class='mws-form-item'>
                                        <input type='text' name='password' class='large'>
                                    </div>
                                </div>";


      } else {
        
        echo "<span class='error'>mauvais mots de passe</span>";
        $bouton="";

      }
      
      
    }






	}
	echo "<br>";





?>