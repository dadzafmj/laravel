<?php
require('..\fpdf.php');
class PDF extends FPDF
{
//En-t�te
function Header()
{
//recuperation des renseignements a afficher
include('..\en_tete_pdf2.php');
//defintion des cordonnees
$long = 38;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',11);
$y = $y0;
$this->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5

$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+25*$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'G�n�raliste');
$this->Text($x3+$dx,$y,'Sp�cialiste');
$this->Text($x4+$dx,$y,'TOTAL');
$y=$y+$ddy;
$this->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
}
//Pied de page
function Footer()
{
  $this->SetFont('Arial','',8);
  $this->Text(105,290,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Fin de l'en-t�te 

//Instanciation de la classe d�riv�e
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//renseignement a afficher
$choix = $_POST['choix'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$annee = $_POST['annee'];
//definition des cordonnees
$long = 38;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 6;$ddy = 2;
include('..\connection.php');
require('..\fonctions.php');
//renseignement agent
	$ytitre = 45;
	$xtitre = 50;
	$ytitre2 = $ytitre+7;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','u',14);
$pdf->Text($xtitre,$ytitre,'STATISTIQUE CONSULTATIONS');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT `date_complet` FROM `patient` WHERE `date_complet` BETWEEN '$date_debut' AND '$date_fin' ORDER BY `date_complet`";
}else
{
	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$sql1 = "SELECT DISTINCT `mois_A` FROM `patient` WHERE `annee_A` = '$annee' ORDER BY `mois_A`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0;
$total_generaliste=0;
$total_specialiste=0;
$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
	$num = $num+1;
	if($choix=='periode')
	{
	$date_complet = $res1['date_complet'];
	$affiche = dateFR($date_complet);
	$sql2 = "SELECT `num_patient` FROM `patient` WHERE `date_complet` = '$date_complet'";
	}else
	{
	$mois_A = $res1['mois_A'];
	$affiche = ''.mois_long($mois_A).' '.$annee.'';
	$sql2 = "SELECT `num_patient` FROM `patient` WHERE `mois_A` = '$mois_A' AND `annee_A` = '$annee'";
	}
	$req2 = mysql_query($sql2);
	//initialisation a chaque changement de date
	$nbre_patient=0;
	$nbre_generaliste=0;
	$nbre_specialiste=0;
	$nbre_total=0;
	while($res2 = mysql_fetch_array($req2))
	{
		$num_patient = $res2['num_patient'];
		$sql3 = "SELECT `ref_prest` FROM `prestpatient` WHERE `num_patient` = '$num_patient' AND `ref_prest`<'1200'";
		$req3 = mysql_query($sql3);
		//initialisation a chaque changement num_patient
		$nbre_generaliste_patient = 0;
		$nbre_specialiste_patient = 0;
		while($res3 = mysql_fetch_array($req3))
		{
			$ref_prest = $res3['ref_prest'];
			if($ref_prest==1101){$nbre_generaliste_patient = 1;}
			if($ref_prest==1102){$nbre_specialiste_patient = 1;}
		}
		$nbre_generaliste = $nbre_generaliste + $nbre_generaliste_patient;
		$nbre_specialiste = $nbre_specialiste + $nbre_specialiste_patient;
		$nbre_total = $nbre_generaliste + $nbre_specialiste;
	}
		$pdf->SetFont('Arial','',11);
		$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
		$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
		$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
		$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
		$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
		$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
		$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
		
		$y = $y+$dy;
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($num,0,","," ").'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($nbre_generaliste,0,","," ").'',0,0,'C');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($nbre_specialiste,0,","," ").'',0,0,'C');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($nbre_total,0,","," ").'',0,0,'C');

		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_generaliste = $total_generaliste+$nbre_generaliste;
	$total_specialiste = $total_specialiste+$nbre_specialiste;
	$total_total = $total_total+$nbre_total;
}
	$pdf->SetFont('Arial','B',12);	
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_generaliste,0,","," ").'',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_specialiste,0,","," ").'',0,0,'C');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_total,0,","," ").'',0,0,'C');

	$pdf->Line($x0,$y+$ddy,$x5,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>