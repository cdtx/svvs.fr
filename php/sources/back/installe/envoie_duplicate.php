<!--Connexion à la base de donnée et création du fichier config -->
<?php
$serveur=$_POST['adresse'];
$nom_base=$_POST['nom'];
$login=$_POST['login'];
$password=$_POST['password'];
// connexion à MySQL
mysql_connect ($serveur,$login,$password) or die ('ERREUR '.mysql_error());
// sélection de la base de données
mysql_select_db ($nom_base) or die ('ERREUR '.mysql_error());



//creation table fonctionnement
$sql = "CREATE TABLE user (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,login  text  NULL,pass text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO user (`id` ,`login` ,`pass`) VALUES ('' , 'ludog', 'cf1a90711cd3e6ba370e8cf5a187a73c2dfea069');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE blog (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text  NULL,google  text  NULL,photo text NULL,date datetime NULL,texte text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE album (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  text  NULL,thumb text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE photo (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,name  text  NULL,album text NULL,lien text NULL,thumb text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE menu (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  text  NULL,lien text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE menu_base (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  text  NULL,lien text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE agenda (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text  NULL,photo text NULL,date datetime NULL,texte text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE video (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text  NULL,google text NULL,date datetime NULL,support text NULL,codage text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE autorisation (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,user  INT(11)  NULL,autorisation INT(11) NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


//shop
$sql = "CREATE TABLE categorie (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  text  NULL,position varchar(11) NULL,texte  text  NULL,active  text  NULL,photo_couv  text  NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE cat_produit (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,produit  varchar(11)  NULL,categorie  varchar(11) NULL,sous_categorie  varchar(11) NULL,position  varchar(11) NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE photo_produit (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,id_produit  varchar(11)  NULL,photo  text NULL,active  text NULL,position_photo  varchar(11) NULL)";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE produits (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text  NULL,prix  text NULL,google  text NULL,description  text NULL,active  text NULL,promo  text NULL,texte_promotion  text NULL,type  text NULL)";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE similaires (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,id_produit  varchar(11) NULL,id_similaires  varchar(11) NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE souscat (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,titre  text NULL,texte text NULL,parent text NULL,position varchar(11) NULL,active text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE coeur (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,id_produit  varchar(11) NULL,position varchar(11) NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

// creation des autorisations pour ludog
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '1');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '2');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '3');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '4');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '5');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '6');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '7');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '8');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '9');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `autorisation` (`id` ,`user` ,`autorisation`) VALUES (NULL ,  '1', '10');";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());




$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'photo', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'blog', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'message', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'statistique', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'video', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'agenda', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'shop', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'partenaire', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "INSERT INTO  `menu_base` (`id` ,`nom` ,`lien`) VALUES (NULL ,  'parametres', NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$sql = "CREATE TABLE message (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  text  NULL,mail text NULL,message text NULL,date date NULL,reponse text NULL,lecture text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE visiteurs (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,date  date  NULL,nbr_visiteurs text NULL,visiteurs_unique text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$sql = "CREATE TABLE autre (id    INT(11)    NULL    AUTO_INCREMENT    PRIMARY KEY,nom  date  NULL,chiffre text NULL,visiteurs_unique text NULL);";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


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