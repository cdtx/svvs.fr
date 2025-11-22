<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>SVVS</title>

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/foundation.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Header -->
	<header class="clearfix">
		<div class="inner-header clearfix">
			<div id="logo" class="left">
				<h1><a href="index.php"><img alt="" src="images/logo.png"></a></h1>
			</div>

			<div class="ads-728x90 right">
				<a href="#"><img alt="" src="images/logo_2.png"></a>
			</div>
		</div>
	</header>
	<!-- End Header -->

	<!-- Container -->
	<section class="container row clearfix">
		<header class="clearfix">
			<nav id="main-menu" class="left navigation">
				<ul class="sf-menu no-bullet inline-list m0">
					<li><a href="index.php" ><img src="images/accueil.png" style="width:10px"></a></li>
		    		<li><a href="actualite">News</a></li>
		    		<li><a href="prochaines-sorties">Les sorties</a></li>
		    		<li><a href="100-pour-sang" >100 pour sang</a></li>
		    		<li><a href="run-bike">le club</a></li>
		    		<li><a href="gentleman-des-champions">Gentleman</a>
						<ul class="sub-menu">
		    				<li><a href="gentleman-des-champions">Présentation</a></li>
							<li><a href="gentleman-des-champions-reglement">Le reglement</a></li>
							<li><a href="gentleman-des-champions-parcour">Le Parcours</a></li>
							<li><a href="gentleman-des-champions-inscription">Inscription</a></li>
							<li><a href="gentleman-des-champions-repas">Repas</a></li>
							<li><a href="gentleman-des-champions-resultats">Résultats</a></li>
							<li><a href="gentleman-des-champions-presse">La presse</a></li>
						</ul>
		    		</li>
		    		<li><a href="marathon-relais">Marathon relais</a>
		    			<ul class="sub-menu">
		    				<li><a href="marathon-relais">Présentation</a></li>
							<li><a href="marathon-relais-reglement">Le reglement</a></li>
							<li><a href="marathon-relais-parcour">Le Parcours</a></li>
							<li><a href="marathon-relais-inscription">Incriptions/départ</a></li>
							<li><a href="marathon-relais-repas">informations soirée/repas</a></li>
							<li><a href="marathon-relais-resultats">Résultats</a></li>
							<li><a href="marathon-relais-presse">La presse</a></li>
						</ul>
		    		</li>
		    		<li><a href="nos-photos">Galerie</a></li>
		    		<li><a href="nous-contacter">Contact</a></li>
				</ul>
			</nav>

		</header>
		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="twelve column row pull-center singlepost">
<?php
include 'nbvcxw.php';
$horaire_choisis=$_POST['horaires'];

$coureur1=$_POST['coureur1'];
$prenom1=$_POST['prenom1'];
$age1=$_POST['age1'];
$sexe1=$_POST['sexe1'];
$licencie1=$_POST['licencie1'];
$federation1=$_POST['federation1'];
$num_licence1=$_POST['num_licence1'];
$club1=$_POST['club1'];
$club1=str_replace("'", "''", $club1);
$adresse1=$_POST['adresse1'];
$adresse1=str_replace("'", "''", $adresse1);
$code_postale1=$_POST['code_postale1'];
$ville1=$_POST['ville1'];
$ville1=str_replace("'", "''", $ville1);
$tel1=$_POST['tel1'];
$email1=$_POST['email1'];
$cate=$_POST['cate'];

$repas=$_POST['repas'];
$personne_paye=$_POST['personne_qui_paye'];

$ville1=str_replace("'", " ", $ville1);


$sql1 = "INSERT INTO `coureur` (`id`, `nom`, `prenom`, `age`, `sexe`, `licencie`, `federation`, `num_licence`, `club`, `adresse`, `code_postale`, `ville`, `tel`, `email`, `date`, `horaire_choisis`) 
VALUES ('', '$coureur1', '$prenom1', '$age1', '$sexe1', '$licencie1', '$federation1', '$num_licence1', '$club1', '$adresse1', '$code_postale1', '$ville1', '$tel1', '$email1', '$today', '$horaire_choisis');"; 
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 

$coureur2=$_POST['coureur2'];
$prenom2=$_POST['prenom2'];
$age2=$_POST['age2'];
$sexe2=$_POST['sexe2'];
$licencie2=$_POST['licencie2'];
$federation2=$_POST['federation2'];
$num_licence2=$_POST['num_licence2'];
$club2=$_POST['club2'];
$club2=str_replace("'", "''", $club2);
$adresse2=$_POST['adresse2'];
$adresse2=str_replace("'", "''", $adresse2);
$code_postale2=$_POST['code_postale2'];
$ville2=$_POST['ville2'];
$ville2=str_replace("'", "''", $ville2);
$tel2=$_POST['tel2'];
$email2=$_POST['email2'];

$ville2=str_replace("'", " ", $ville2);

$sql2 = "INSERT INTO `coureur` (`id`, `nom`, `prenom`, `age`, `sexe`, `licencie`, `federation`, `num_licence`, `club`, `adresse`, `code_postale`, `ville`, `tel`, `email`, `date`, `horaire_choisis`) 
VALUES ('', '$coureur2', '$prenom2', '$age2', '$sexe2', '$licencie2', '$federation2', '$num_licence2', '$club2', '$adresse2', '$code_postale2', '$ville2', '$tel2', '$email2', '$today', '$horaire_choisis');"; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 

$sql3="SELECT * FROM  `coureur` ORDER BY  `id` DESC LIMIT 2";
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
while($mot3 = mysql_fetch_assoc($req3)) 
{ 

	$coureur[]=$mot3["id"];

}

$coureur1=$coureur[0];
$coureur2=$coureur[1];

$today=date('Y-m-d');

$sql4="UPDATE  `incriptions` SET  `coureur1` =  '$coureur1' WHERE  `id` =$horaire_choisis;";
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 

$sql5="UPDATE  `incriptions` SET  `coureur2` =  '$coureur2' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

$sql5="UPDATE  `incriptions` SET  `categorie` =  '$cate' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());

$sql5="UPDATE  `incriptions` SET  `date_inscriptions` =  '$today' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

$sql5="UPDATE  `incriptions` SET  `repas` =  '$repas' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

$sql5="UPDATE  `incriptions` SET  `personne_qui_paye` =  '$personne_paye' WHERE  `id` =$horaire_choisis;";
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

header('Location: http://www.njuko.net/gentleman-des-champions-2017');
  exit();
?>
	
				<h1 class="post-title"><center>Merci de votre inscription</h1><br>
<span style="color:black">Horaire définitivement validé par l'organisateur après réception du paiement.<br>
En l'absence de réception du paiement (chèque ou paiement en ligne) au-delà de 5 jours, il sera remis à disposition sur la grille de départ</span></center></p>

<center>&nbsp;<a href="https://www.apayer.fr/saintvulbasvelosport"><input type="button" value="paiement en ligne"></a>
</p><a href="print/horaire<?php echo "-"; echo $horaire_choisis;?>"><input type="button" value="Télécharger votre bon d'inscriptions et le présenter avant la course"></a>
</center>




				<div class="clear"></div>

				<div class="line"></div>

			</section>
			<!-- Content -->
<!-- Footer -->
			<footer class="row clearfix">
				<!-- Footer widgets -->
				<ul class="no-bullet clearfix">
					<li class="widget four column">
			        	<div class="textwidget">
			       		</div>
					</li>
					<li class="widget four column">

					</li>
					<li class="widget four column">

					</li>
				</ul>
				<!-- End Footer widgets -->

				<div class="copyright clearfix">
					© Copyright 2014 Saint Vulbas Vélo Sport - Création : www.comadvance.fr
				</div>

				<div id="back-to-top" class="right">
					<a href="#top">Back to Top</a>
				</div>
			</footer>
			<!-- End Footer -->
		</section>
		<!-- End Inner Container -->
	</section>
	<!-- End Container -->

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.superfish.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/jcarousel.js"></script>
	<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>