<!doctype html>
<html lang="fr">
<head>
    <?php include '_head_common.php'?>
</head>
<body>
	<!-- Header -->
	<header class="clearfix">
        <?php include('_header_common.php') ?>
	</header>
	<!-- End Header -->

	<!-- Container -->
	<section class="container row clearfix">
		<header class="clearfix">
            <?php include('_nav_common.php') ?>
		</header>
		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="twelve column row pull-center singlepost">
				
				<h1 class="post-title">Les prochaines sorties</h1>
<?php
include 'nbvcxw.php';
$sql2 = "SELECT * FROM  `sorties` "; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
while($mot2 = mysql_fetch_assoc($req2)) 
{
	$image=$mot2['photo'];
	echo "<img src='".$image."'>";
	echo "<br>";
	echo $mot2['texte'];

	
}
?>
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
