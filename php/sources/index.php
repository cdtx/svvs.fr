<!DOCTYPE html>
<html lang="fr">
<head>

    <?php include '_head_common.php'?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.sponsors').cycle({
            fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
        });
    });
    </script>
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
					<li><a href="index.php" class="active"><img src="images/accueil.png" style="width:10px"></a></li>
		    		<li><a href="rando_tdf" >Rando Tour De France 2024</a></li>
		    		<li><a href="actualite">News</a></li>
		    		<li><a href="prochaines-sorties">Les sorties</a></li>
		    		<li><a href="100-pour-sang" >100 pour sang</a></li>
		    		<li><a href="run-bike">le club</a></li>
		    		<li><a href="gentleman-des-champions">Gentleman</a>
						<ul class="sub-menu">
		    				<li><a href="gentleman-des-champions">Pr�sentation</a></li>
							<li><a href="gentleman-des-champions-reglement">Le reglement</a></li>
							<li><a href="gentleman-des-champions-parcour">Le Parcours</a></li>
							<li><a href="gentleman-des-champions-inscription">Inscription</a></li>
							<li><a href="gentleman-des-champions-repas">Repas</a></li>
							<li><a href="gentleman-des-champions-resultats">R�sultats</a></li>
							<li><a href="gentleman-des-champions-presse">La presse</a></li>
						</ul>
		    		</li>

		    		<li><a href="marathon-relais">Marathon relais</a>
		    			<ul class="sub-menu">
		    				<li><a href="marathon-relais">Pr�sentation</a></li>
							<li><a href="marathon-relais-reglement">Le reglement</a></li>
							<li><a href="marathon-relais-parcour">Le Parcours</a></li>
							<li><a href="marathon-relais-inscription">Inscription</a></li>
							<li><a href="marathon-relais-resultats">R�sultats</a></li>
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
			<section id="content" class="eight column row pull-left">
				<!-- Slider -->
				<div class="flexslider mb25">
					<ul class="slides no-bullet inline-list m0">
<?php
include 'nbvcxw.php';
$sql = "SELECT * FROM blog ORDER BY date DESC LIMIT 4"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
    $id=$mot['id'];
    $titre=$mot['titre'];
    $titre= utf8_decode ( $titre );
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
$texte=$description;
$texte= utf8_decode ( $texte );

?>
						<li>
				     		<a href="nos-actualite/<?php echo $url; echo "-"; echo $id;?>"><img alt="" src="thumb.php?src=<?php echo $photo;?>&w=620&h=350"></a>
				     		<div class="flex-caption">
				                <div class="desc">
				                	<h1><a href="nos-actualite/<?php echo $url; echo "-"; echo $id;?>"><?php echo $titre;?></a></h1>
				                	<?php echo $texte;?>
				                </div>
				            </div>
						</li>
<?php
}
?>
					</ul>
				</div>
				<!-- End Slider -->

				<section class="row">
					<!-- Category posts -->
					<article class="six column">
						<h4 class="cat-title"><a href="#">Nos partenaires</a></h4>
						<div class="post-image">

<div class="sponsors">
<?php

$sql1 = "SELECT * FROM partenaires"; 
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
while($partenaire = mysql_fetch_assoc($req1)) 
{ 
	$lien=$partenaire['internet'];
	$photo_partenaire=$partenaire['lien'];
?>
 
							<a href="<?php echo $lien;?>"><img src="thumb.php?src=/back/partenaire/photo/<?php echo $photo_partenaire;?>&w=300&h=220" alt=""></a>
<?php
}
?>
</div>
						</div>

				</article>
					<!-- End Category posts -->

					<!-- Category posts -->
					<article class="six column">
						<h4 class="cat-title"><a href="#">Infos Cycliste</a></h4>
						<div class="post-image">
							<!-- DEBUT CODE MISE EN PAGE XML PAR ACTIFPUB V2 -->      
  <SCRIPT language="Javascript"> 
 var member=""; //optionnel si vous etes inscrit sur la plateforme actifpub  le parametrage se fait dans votre espace membre 
 var fichier="http://www.lequipe.fr/rss/actu_rss_Cyclisme.xml"; 
 var limite="1";  //  sujets compris entre 1 
 var limite1="10";   //  et plus  
  var aspect="0";  //  0 ou 1 (1 permet d'afficher lien + description, 0 que les liens)  
 var minute="1";  //  0 ou 1 (1 permet d'afficher date et heure, 0 pas de date et heure) 
 var sujet="1"; //  0 ou 1 (1 permet d'afficher le titre des sujets traités, 0 pas de titre )  
 var te="Geneva, Arial, sans-serif";  // Police de caractères (Verdana, arial etc...) 
 var fil_textsize="11"; // taille des liens et description 
 var title_textcolor="1F70B4"; // couleur des liens (000000 donne noir)  
 var tlien="none"; // style du lien none ou underline  
 var text_textcolor="000000";  // couleur description (000000 donne noir) 
 var frame_color="FFFFFF"; // couleur arrière plan (FFFFFF donne blanc) 
 var content="0"; // 0 ou 1 comme paramètre optionnel, 1  format html,  0  format texte 
 var extract="";  // laisser vide ou indiquez le nombre de caractères que vous souhaitez garder dans le corps du flux 
 var cache="15"; // gestion du cache exprimée en minutes - en fonction de la fréquence de mise à jour 
  document.write('<s'+'cript language="JavaScript" type="text/javascript" SRC="http://www.actifpub.com/rss.php?fichier_AP_='+fichier+'&limite_AP_='+limite+'&limite1_AP_='+limite1+'&aspect_AP_='+aspect+'&minute_AP_='+minute+'&sujet_AP_='+sujet+'&te_AP_='+te+'&fil_textsize_AP_='+fil_textsize+'&title_textcolor_AP_='+title_textcolor+'&text_textcolor_AP_='+text_textcolor+'&frame_color_AP_='+frame_color+'&content_AP_='+content+'&cache_AP_='+cache+'&extract_AP_='+extract+'&tlien_AP_='+tlien+'&java=1&member_AP_='+member+'"></sc'+'ript>'); 
  </script>  
						</div>


					</article>
					<!-- End Category posts -->
				</section>

				


				<!-- Gallery Posts -->
				<div class="clearfix mb25 oh">
					<h4 class="cat-title">Les photos</h4>
					<!-- jCarousel -->
					<div class="carousel-container">
						<div class="carousel-navigation">
							<a class="carousel-prev"></a>
							<a class="carousel-next"></a>
						</div>
						<div class="carousel-item-holder gallery row" data-index="0">
<?php

$sql2 = "SELECT * FROM photo ORDER BY rand() limit 6"; 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
while($photo = mysql_fetch_assoc($req2)) 
{ 
	$photos=$photo['lien'];

?>
							<div class="four column carousel-item">
								<a href="images/<?php echo $photos;?>"><img src="thumb.php?src=images/<?php echo $photos;?>&w=300&h=250" alt=""></a>
							</div>
<?php
}
?>
						</div>
					</div>
					<!-- End jCarousel -->
				</div>
				<!-- End Gallery Posts -->
			</section>
			<!-- Content -->

			<!-- Sidebar -->
			<aside id="sidebar" class="four column pull-right">
				<ul class="no-bullet">
					<li class="widget tabs-widget clearfix">
		        		<h4 class="cat-title">Les prochaines sorties</h4>

		        		<div id="popular-tab">
		        			<ul>
<?php

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

			        <li class="widget tabs-widget clearfix">
		        		<h4 class="cat-title">Les r�sultats</h4>

		        		<div id="popular-tab">
		        			<ul>
<?php

$sql4 = "SELECT * FROM agenda ORDER BY date desc"; 
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
while($agenda = mysql_fetch_assoc($req4)) 
{ 
	$titre=$agenda['texte'];
	$titre= utf8_decode ( $titre );


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
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Club-cyclisme-saint-vulbas-svvs-2196096733734773/ ?ref=ts&fref=ts&amp;width=285&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=258" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
					</li>

				</ul>
			</aside>
			<!-- End Sidebar -->

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
					Copyright <?php echo date('Y');?> Saint Vulbas V�lo Sport - Cr�ation : www.comadvance.fr
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

	
	<script type="text/javascript" src="js/jquery.superfish.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/jcarousel.js"></script>
	<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
