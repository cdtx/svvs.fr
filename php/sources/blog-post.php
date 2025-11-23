<!doctype html>
<html lang="fr">
<head>
    <?php include '_head_common.php'?>
<?php 

$id=$_GET['id'];
include 'nbvcxw.php';
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
