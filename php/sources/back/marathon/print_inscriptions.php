<?php
include('../config/config.php');
$id=$_GET['id'];

$sql1 = "SELECT * from incriptions where id='$id'";
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
while($mot1 = mysql_fetch_assoc($req1)) 
{ 
    $date=$mot1['date'];
        $cate=$mot1['categorie'];
if ($cate=="1") { $cate="MA";}
if ($cate=="2") { $cate="MB";}
if ($cate=="3") { $cate="MC";}
if ($cate=="4") { $cate="MD";}
if ($cate=="5") { $cate="ME";}
if ($cate=="6") { $cate="FA";}
if ($cate=="7") { $cate="FB";}
if ($cate=="8") { $cate="MXA";}
if ($cate=="9") { $cate="MXB";}
if ($cate=="10") { $cate="PE";}
if ($cate=="11") { $cate="GPE";}
if ($cate=="12") { $cate="HAN";}

    $date=explode(" ", $date);
    $heure=$date[1];


}

$sql = "SELECT * from coureur where horaire_choisis='$id'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_array($req)) 
{ 
$nom[]=$mot[1];
$prenom[]=$mot[2];
$age[]=$mot[3];
$sexe[]=$mot[4];
$licencie[]=$mot[5];
$federation[]=$mot[6];
$num_licence[]=$mot[7];
$club[]=$mot[8];
$adresse[]=$mot[9];
$code[]=$mot[10];
$ville[]=$mot[11];
$tel[]=$mot[12];
$email[]=$mot[13];



}

$sql = "SELECT * from incriptions ORDER BY date ASC";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($mot = mysql_fetch_array($req)) 
{ 
$horaire=$mot['date'];
$horaire_cher=explode(" ", $horaire);
$final[]=$horaire_cher[1];

}



$position = array_search($heure, $final);
$position =$position +1;


ob_start();
?>
<style type="text/css">
<!--
table{ width: 100%;background-color: white;color: #737175;font-size: 11pt; }
td.center{text-align: center;}
strong{color: #000;font-size:12pt; }
h1{color: #00adee;font-size: 20pt;}
table.border{border-collapse: collapse;}
table.border td{border: 1px solid #CFD1D2; padding: 3mm 1mm;}
table.border th{background-color: black;color: white;text-align: center; padding: 2mm 1mm}
td.black{background-color: grey;color: white}
td.noborder{border: none;}
td.info{border: 1px solid black;color: blue;font-size: 15pt;border-radius: 5px;padding: 0.5mm 0.5mm;height: 12mm}
td.right{text-align: right;}
table.total td{border: 1px solid #CFD1D2; padding: 1mm 1mm;}
table.total {border-collapse: collapse;}
table.total td.noborder{border: none;}

-->

</style>


<page>

<table>


<tr>
<td style="width:60%;margin-left:40pt;">
<strong></strong><br>
</td>
</tr>
</table>
<table style="margin-top:-20pt;">
<tr><td style="width:30%"></td><td><h1>Gentleman des champions</h1></td></tr>
<tr><td style="width:30%"></td><td><h1>Horaire Choisis : <?php echo $heure;?></h1></td></tr>

</table>
<table  class="border" style="margin-left:10pt">
    <tr><td style="width:20%">Equipe N°: <?php echo $position;?></td><td style="width:40%">Coureur 1</td><td style="width:40%">Coureur 2</td></tr>
    <tr><td>Nom</td><td><?php echo $nom[0];?></td><td><?php echo $nom[1];?></td></tr>
    <tr><td>Prenom</td><td><?php echo $prenom[0];?></td><td><?php echo $prenom[1];?></td></tr>
    <tr><td>Age</td><td><?php echo $age[0];?></td><td><?php echo $age[1];?></td></tr>
    <tr><td>sexe</td><td><?php echo $sexe[0];?></td><td><?php echo $sexe[1];?></td></tr>
    <tr><td>licencié</td><td><?php echo $licencie[0];?></td><td><?php echo $licencie[1];?></td></tr>
    <tr><td>Fédération</td><td><?php echo $federation[0];?></td><td><?php echo $federation[1];?></td></tr>
    <tr><td>N° Licence</td><td><?php echo $num_licence[0];?></td><td><?php echo $num_licence[1];?></td></tr>
    <tr><td>Club</td><td><?php echo $club[0];?></td><td><?php echo $club[1];?></td></tr>
    <tr><td>Adresse</td><td><?php echo $adresse[0];?></td><td><?php echo $adresse[1];?></td></tr>
    <tr><td>code postale</td><td><?php echo $code[0];?></td><td><?php echo $code[1];?></td></tr>
    <tr><td>Ville</td><td><?php echo $ville[0];?></td><td><?php echo $ville[1];?></td></tr>
    <tr><td>N° Téléphone</td><td><?php echo $tel[0];?></td><td><?php echo $tel[1];?></td></tr>
    <tr><td>Email</td><td><?php echo $email[0];?></td><td><?php echo $email[1];?></td></tr>
    <tr><td>Categorie</td><td><?php echo $cate;?></td><td></td></tr>

</table>

<table class="border" style="margin-left:40pt;margin-top:10pt">
    <tr><td>TARIFS (chèque à l'ordre Saint Vulbas Vélo Sport) :</td></tr>
    <tr><td>Engagement : 10€ / coureur ( licenciés ou non)</td><td style="width:14%;text-align:right">............x 10€</td><td style="width:20%">=</td></tr>
    <tr><td>Pasta Party midi : 5€ </td><td style="width:14%;text-align:right">............x 5€</td><td style="width:20%">=</td></tr>
    <tr><td>Repas du soir : 18€ </td><td style="width:14%;text-align:right">............x 18€</td><td style="width:20%">=</td></tr>
    <tr><td class='noborder'></td><td style="width:14%;text-align:right">TOTAL</td><td style="width:20%">=</td></tr>
</table>

<span class="info" style="margin-top:10pt">A renvoyer sous 4 jours accompagné d’un chèque à l’ordre du Saint Vulbas Vélo Sport à :
Christian FAYARD     21, Chemin du Bois Saint Pierre – 01800 St Maurice de Gourdans - 06 89 24 91 89
ATTENTION : L’INSCRIPTION NE SERA EFFECTIVE QU’A LA RECEPTION DU DOSSIER COMPLET ET TOUT DOSSIER INCOMPLET (certificat médical, licence, chèque) SERA REFUSE
</span>

</page>


<?php
$nom_facture="facture_".$num_facture."_".$raison.".pdf";
    $content =  ob_get_clean();
    //die($content);
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output($nom_facture);
?>