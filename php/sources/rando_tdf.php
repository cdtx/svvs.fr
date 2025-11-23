<!doctype html>
<html lang="fr">
<head>
    <?php include '_head_common.php'?>
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
		    		<li><a href="rando_tdf" class="active" >Rando Tour De France 2024</a></li>
		    		<li><a href="actualite">News</a></li>
		    		<li><a href="prochaines-sorties">Les sorties</a></li>
		    		<li><a href="100-pour-sang">100 pour sang</a></li>
		    		<li><a href="run-bike" >le club</a></li>
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
		<?php
include 'nbvcxw.php';
$sql2 = "SELECT * FROM  `rando_tdf` "; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
while($mot2 = mysql_fetch_assoc($req2)) 
{
	$texte=$mot2['texte'];
	$texte=str_replace('../', 'administration/', $texte);
	$titre=$mot2['titre'];
	
}
?>
		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="twelve column row pull-center singlepost">
				
				<h1 class="post-title"><?php echo $titre;?></h1>
<?php echo $texte;?>
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
