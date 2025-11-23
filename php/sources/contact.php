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
                    <li><a href="rando_tdf" >Rando Tour De France 2024</a></li>
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
							<li><a href="marathon-relais-inscription">Inscription</a></li>
							<li><a href="marathon-relais-resultats">Résultats</a></li>
							<li><a href="marathon-relais-presse">La presse</a></li>
						</ul>
		    		</li>
		    		<li><a href="nos-photos">Galerie</a></li>
		    		<li><a href="nous-contacter" class="active">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="eight column row pull-left">
				<h1 class="post-title"></h1>


				<!-- Map -->
				<div id="map" class="row flex-video widescreen"></div>
				<!-- End Map -->

				<br>

				<h3 class="post-title">Nous envoyer un message</h3>

				<!-- Contact Form -->
				<div class="contact-form cleafix">
					<form action="traitement.php" method="post"/>
						<input name="ca" class="left" type="text" data-value="Name" value="Nom">
						<input name="cb" class="right" type="text" data-value="E-mail" value="E-mail">
						<textarea name="cd" class="twelve column" data-value="Message">Message</textarea>
						<div id="msg" class="message"></div>
						<input type="text" name="host" style="visibility:hidden"></br>
						<input type="submit" value="Envoyer" class="form-submit">
					</form>
				</div>
				<!-- End Contact Form -->

				<br>
				<br>
				<br>
			</section>
			<!-- Content -->

			<!-- Sidebar -->
			<aside id="sidebar" class="four column pull-right">
					<li class="widget tabs-widget clearfix">
		        		<h4 class="cat-title">Les prochaines sorties</h4>

		        		<div id="popular-tab">
		        			<ul>
<?php
include 'nbvcxw.php';
$sql4 = "SELECT * FROM sorties "; 
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
while($agenda = mysql_fetch_assoc($req4)) 
{ 
	$titre=$agenda['texte'];
	$titre= utf8_decode ( $titre );
	$date=$agenda['date'];
	$date=explode(" ", $date);
	$date_final=explode("-", $date[0]);
	$date_final=$date_final[2]."/".$date_final[1]."/".$date_final[0];

?>
		        				<li>
		        					
		        					<h3><?php echo $titre;?></h3>
		        					
		        				</li>
<?php
}
?>
			        	</div>
			        </li>

					<li class="widget widget_facebook_box clearfix">
						<h3 class="widget-title">Nous suivre aussi sur facebook</h3>
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/saintvulbasvelosport?ref=ts&fref=ts&amp;width=285&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=258" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
					</li>

				</ul>
			</aside>
			<!-- End Sidebar -->
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
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/gmap3.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
