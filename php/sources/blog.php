<!doctype html>
<html lang="fr">
<head>
    <?php include '_head_common.php'?>
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
