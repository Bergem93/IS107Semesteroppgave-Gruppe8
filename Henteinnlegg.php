<!DOCTYPE html>
<html>
<head>
</head>
<?php 
// 1: Variabler
 
$innlegg =         $_POST['innlegg']; 
$hente =         $_POST['hente']; 


if ($hente) 
    hente(); 
else echo "FUCK YOU!!";  


function hente() 
{    $file=fopen("innlegg.txt","r"); 
    $teller = 1;  
    while (!feof($file))     // dvs det er mer å hente 
    {   $innlegg=fgets($file); 
		echo "$innlegg <br> ";   
        $teller++;     // holder orden på antall brukere vi leser inn 
    }     
    fclose($file); 
} 
?> 

<body>

<form method="link" action="login.php">
<input type="submit" value="Gå tilbake til adminlogin">
</form>
</body>


</html>