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

	<link rel="stylesheet" href="../css/foundation.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<?php 

$id=$_GET['id'];
include 'nbvcxw.php';
include 'function.php';
$sql = "SELECT * FROM blog WHERE id=$id"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$titre=$mot['titre'];
	$image=$mot['photo'];
	$texte=$mot['texte'];
	$google=$mot['google'];

	    $url = $mot['titre'];
    $url = strtolower($url);
    $url = str_replace('"', '', $url);
    $url = str_replace(' ', '-', $url);
    $url = _removeAccents($url);

	$max_caracteres=200;
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
$texte2=$description;
}
$texte2=strip_tags($texte2);
?>
</head>
<body>
	<!-- Header -->
	<header class="clearfix">

		<div class="inner-header clearfix">
			<div id="logo" class="left">
				<h1><a href="index.php"><img alt="" src="../images/logo.png"></a></h1>
			</div>

			<div class="ads-728x90 right">
				<a href="#"><img alt="" src="../images/logo_2.png"></a>
			</div>
		</div>
	</header>
	<!-- End Header -->

	<!-- Container -->
	<section class="container row clearfix">
		<header class="clearfix">
			<nav id="main-menu" class="left navigation">
				<ul class="sf-menu no-bullet inline-list m0">
					<li><a href="../index.php" ><img src="../images/accueil.png" style="width:10px"></a></li>
		    		<li><a href="../actualite" class="active">News</a></li>
		    		<li><a href="../prochaines-sorties">Les sorties</a></li>
		    		<li><a href="../100-pour-sang-vie">100 pour sang vie</a></li>
		    		<li><a href="gentleman-des-champions">Gentleman</a>
						<ul class="sub-menu">
		    				<li><a href="../gentleman-des-champions">Présentation</a></li>
							<li><a href="../gentleman-des-champions-reglement">Le reglement</a></li>
							<li><a href="../gentleman-des-champions-parcour">Le Parcours</a></li>
							<li><a href="../gentleman-des-champions-inscription">Inscription</a></li>
							<li><a href="../gentleman-des-champions-repas">Repas</a></li>
							<li><a href="../gentleman-des-champions-resultats">Résultats</a></li>
							<li><a href="../gentleman-des-champions-presse">La presse</a></li>
						</ul>
		    		</li>
		    		<li><a href="../marathon-relais">Run & bike</a>
		    			<ul class="sub-menu">
		    				<li><a href="../marathon-relais">Présentation</a></li>
							<li><a href="../marathon-relais-reglement">Le reglement</a></li>
							<li><a href="../marathon-relais-parcour">Le Parcours</a></li>
							<li><a href="../marathon-relais-inscription">Inscription</a></li>
							<li><a href="../marathon-relais-resultats">Résultats</a></li>
							<li><a href="../marathon-relais-presse">La presse</a></li>
						</ul>
		    		</li>
		    		<li><a href="../nos-photos">Galerie</a></li>
		    		<li><a href="../nous-contacter">Contact</a></li>
				</ul>
			</nav>

		</header>

		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="twelve column row pull-center singlepost">
				<a href="#" class="featured-img"><img src="../thumb.php?src=/<?php echo $image;?>&w=935&h=566" alt=""></a>
				
				<h1 class="post-title"><?php echo $titre;?></h1>
				<?php echo $texte;?>




				<!-- End Comments -->

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