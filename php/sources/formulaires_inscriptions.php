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
<script language="JavaScript"> 

function valider ( )
{
    if ( document.formulaire.coureur1.value == "" )
    {
        alert ( "Veuillez entrer le nom du coureur n°1" );
        valid = false;
return valid;
    }

    if ( document.formulaire.coureur2.value == "" )
    {
        alert ( "Veuillez entrer le nom du coureur n°2" );
        valid = false;
return valid;
    }

    if ( document.formulaire.prenom1.value == "" )
    {
        alert ( "Veuillez entrer le prenom du coureur n°1" );
        valid = false;
return valid;
    }

    if ( document.formulaire.prenom2.value == "" )
    {
        alert ( "Veuillez entrer le prenom du coureur n°2" );
        valid = false;
return valid;
    }
        if ( document.formulaire.tel1.value == "" )
    {
        alert ( "Veuillez entrer au moins un numéro de téléphone" );
        valid = false;
return valid;
    }


}
    function Info()
{
     window.alert("Merci de votre inscription à notre jeux");
}
</script>
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
		    		<li><a href="../actualite">News</a></li>
		    		<li><a href="../prochaines-sorties">Les sorties</a></li>
		    		<li><a href="../100-pour-sang" >100 pour sang</a></li>
		    		<li><a href="../run-bike">Run & bike</a></li>
		    		<li><a href="../gentleman-des-champions" class="active">Gentleman</a>
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
		    		<li><a href="../marathon-relais">Marathon relais</a>
		    			<ul class="sub-menu">
		    				<li><a href="../marathon-relais">Présentation</a></li>
							<li><a href="../marathon-relais-reglement">Le reglement</a></li>
							<li><a href="../marathon-relais-parcour">Le Parcours</a></li>
							<li><a href="../marathon-relais-inscription">Incriptions/départ</a></li>
							<li><a href="../marathon-relais-repas">informations soirée/repas</a></li>
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
<?php
include 'nbvcxw.php';
$id=$_GET['id'];
$sql = "SELECT * FROM  incriptions WHERE id= $id"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_assoc($req)) 
{ 
	$id=$mot['id'];
    $date=$mot['date'];
    $date=explode(" ", $date);
    $heure=$date[1];
}
?>
	
				<h1 class="post-title">Procédure d'inscription pour l'horaire : <?php echo $heure;?><p><center>
				ATTENTION! LA VALIDATION DE L'INSCRIPTION EST OBLIGATOIRE . SINON LA RÉSERVATION DE L'HORAIRE DE DÉPART NE SERA PAS VALIDE ET SERA REMIS A DISPOSITION</center></h1>
<FORM name="formulaire" method="POST" onsubmit="return valider ();" action="../gentleman-des-champions-final">
<table style="width:100%">
	<th><td>Coureur 1</td><td>Coureur 2</td></th>
	<tr><td>Nom*</td><td><input type="text" name="coureur1" class="text"></td><td><input type="text" name="coureur2" class="text"></td></tr>
	<tr><td>Prenom*</td><td><input type="text" name="prenom1" class="text"></td><td><input type="text" name="prenom2" class="text"></td></tr>
	<tr><td>N° Téléphone*</td><td><input type="text" name="tel1" class="text"></td><td></td></tr>

</table>
* champs obligatoires</p>
<input type="hidden" name="horaires" value="<?php echo $id;?>">
<input type="hidden" name="equipe" value="<?php echo $equipe;?>">
<input type="submit" value="Valider l'inscription">
</form>





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

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.superfish.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="../js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../js/jcarousel.js"></script>
	<script type="text/javascript" src="../js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>