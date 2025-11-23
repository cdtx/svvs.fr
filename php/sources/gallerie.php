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
            <?php include('_nav_common.php') ?>
		</header>
		<!-- Inner Container -->
		<section class="inner-container clearfix">
			<!-- Content -->
			<section id="content" class="twleve column row pull-center">
				

				<!-- Posts -->
				<section class="row">
<?php
include 'nbvcxw.php';
$sql4 = "SELECT * FROM album ORDER BY id DESC"; 
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
while($agenda = mysql_fetch_assoc($req4)) 
{ 
	$titre=$agenda['nom'];
	$thumb=$agenda['thumb'];
	$id=$agenda['id'];

    $url = $agenda['nom'];
    $url = strtolower($url);
    $url = str_replace('"', '', $url);
    $url = str_replace(' ', '-', $url);
    $url = _removeAccents($url);

?>
					<!-- Category posts -->

					<article class="post six column">
					<h4 class="cat-title mb25"><?php echo $titre;?></h4>
						<div class="post-image">
							<a href="photos/<?php echo $url; echo "-"; echo $id;?>"><img src="thumb.php?src=/images/<?php echo $thumb;?>&w=455&h=334" alt=""></a>
						</div>

						<div class="post-container">
							<h2 class="post-title"></h2>

						</div>

					</article>
					<!-- End Category posts -->
<?php
}
?>

					


			</section>
			<!-- Content -->

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
