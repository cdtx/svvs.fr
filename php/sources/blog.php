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
<?php include 'function.php';?>
<?php  date_default_timezone_set("Europe/Paris")?>
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
                    <li><a href="rando_tdf" >Rando Tour De France 2024</a></li>
		    		<li><a href="actualite" class="active">News</a></li>
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
							<li><a href="marathon-relais-inscription">Inscription</a></li>
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
			<section id="content" class="twleve column row pull-center">

				<!-- Posts -->
				<section class="row">
					<!-- Category posts -->
<?php
include 'nbvcxw.php';

$sql = "SELECT COUNT(id) as nbArt  FROM  blog "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$data=mysql_fetch_assoc($req);

$nbArt = $data['nbArt'];
$perPage = 9;
$nbPage = ceil($nbArt/$perPage);



if (isset($_GET['p']) && $_GET ['p']>0 && $_GET['p']<=$nbPage) {
    $cPage = $_GET['p'];
} else {
    $cPage=1;
}


$sql = "SELECT * FROM blog ORDER BY date DESC LIMIT ".(($cPage-1)*$perPage).",$perPage"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $titre=$mot['titre'];
    $date=$mot['date'];
    $date=explode("-", $date);
    $mois=$date['1'];

    $url = $mot['titre'];
    $url = strtolower($url);
    $url = str_replace('"', '', $url);
    $url = str_replace(' ', '-', $url);
    $url = _removeAccents($url);

if ($mois=="01") {$mois='Janvier';}
if ($mois=="02") {$mois='Fevrier';}
if ($mois=="03") {$mois='Mars';}
if ($mois=="04") {$mois='Avril';}
if ($mois=="05") {$mois='Mai';}
if ($mois=="06") {$mois='Juin';}
if ($mois=="07") {$mois='Juillet';}
if ($mois=="08") {$mois='Aout';}
if ($mois=="09") {$mois='Septembre';}
if ($mois=="10") {$mois='Octobre';}
if ($mois=="11") {$mois='Novembre';}
if ($mois=="12") {$mois='Decembre';}
    $date=$date['2'].' '.$mois.' '.$date['0'];

    $texte=$mot['texte'];
    $photo=$mot['photo'];

$max_caracteres=150;
$description=$texte;
// Test si la longueur du texte dépasse la limite
if (strlen($description)>$max_caracteres)
{    
// Séléction du maximum de caractères
$description = substr($description, 0, $max_caracteres);
// Récupération de la position du dernier espace (afin déviter de tronquer un mot)
$position_espace = strrpos($description, " ");    
$description = substr($description, 0, $position_espace);    
// Ajout des "..."
$description = $description."...";
}
$texte=$description;




?>  
					<article class="post six column">
						<div class="post-image">
							<a href="nos-actualite/<?php echo $url; echo "-"; echo $id;?>"><img src="thumb.php?src=<?php echo $photo;?>&w=455&h=334" alt=""></a>
						</div>

						<div class="post-container">
							<h2 class="post-title"><?php echo $titre;?></h2>
							<div class="post-content">
								<p><?php echo $texte;?></p>
							</div>
						</div>

						<div class="post-meta">
							<span class="date"><?php echo $date;?></span>
						</div>
					</article>
					<!-- End Category posts -->
<?php
}
?>
			
				</section>
				<!-- End Posts -->

				<!-- Pagenation -->
				<div class="pagenation clearfix">
					<ul class="no-bullet">
  <?php



for ($i=1;$i<=$nbPage;$i++){
    if($i==$cPage){
        echo "<li><a href='#' class='active'>$i</a></li>";
    }
    else{
        echo "<li><a href='blog.php?p=$i'  >$i</a></li>";
    }
}

?> 

					</ul>
				</div>
				<!-- End Pagenation -->
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
					Copyright <?php echo date('Y');?> Saint Vulbas Vélo Sport - Création : www.comadvance.fr
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
