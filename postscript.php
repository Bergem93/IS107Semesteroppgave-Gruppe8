<!DOCTYPE html>
<html>

<head>
<title> baresidet </title>
<link rel="stylesheet" type="text/css" href="group42.css">
</head>

<body>

<div id="logobar" style="z-index:2">
</div>

<div id="toolbar" style="z-index:1">
</div>

<div id="menybar" style="z-index:3">
    <ul class="hovedmeny">
	<li class="meny"><a href="index.html">bare<span class="test">lesdet</span></a></li>
	<li class="meny"><a href="side2.html">bare<span class="test">sidet</span></a></li>
	<li class="meny"><a href="retningslinjer.html">bare<span class="test">skjønndet</span></a>
	</div>
	<div id="loginbar" style="z-index:3">
	
	<form action="login.php" method='post'>
	<li class="brukernavn"><label for="username">Brukernavn</label><input type="text" name="username" id="username"></li><br>
	<li class="passord"><label for="password">Passord</label><input type="password" name="password" id="password"></li><br>
	<li class="login"><input type="submit" name="submit" value="Logg inn"></form></li>	
</ul>
</div>


<?php 

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$sidet = $_POST['sidet']; 
$melding = $_POST['Melding']; 
$insertPos=0;  // variabel for å lagre markør posisjon

$file=fopen("innlegg.txt","r+") or exit("...kødda, det her systemet fungerer ikke LITT engang. Beklager. Prøv igjen senere."); // variabel for åpning av fila og skrivemodus
	
while (!feof($file)) { //sålenge markøren ikke er på slutten av fila
	$line=fgets($file);

	if (strpos($line, 'Innlegg:')!==false) { //strpos leter i line etter første instans av body
		$insertPos=ftell($file);    // ftell sier hvilken posisjon markøren nå har: rett etter body
		$newline = $melding;
		$newline.='</li>';
	}

	else{
		$newline.=$line;   // legger til melding i tillegg til hva som ligger fra før
		$div = array($newline);
		$tagger = array('<li class="innlegg">'.$newline);
	}
}

$newline2 = str_replace($div, $tagger, $newline);

fseek($file,$insertPos);   // flytter markøren til posisjonen som ble satt: rett etter body
fwrite($file,$newline2); // skriver til fil

fclose($file); //lukker fila

echo "Innlegget ditt har blitt sendt inn og vil publiseres i nær fremtid.";

?> 

<address class="address"> <a href="http://www.uia.no">Uia.no</a> <br>
Denne siden er opprettet av Håkon, Simon, Thomas og Thomas 

</body>
</html>
