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


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php

session_start();

// Antall sekunder session skal vare
$inactive = 90;

// Skjekker om session har overgått inactive

if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { session_destroy(); header("Location: index.html"); }
}
$_SESSION['timeout'] = time();

//Definerer variabler

$username = 'haakb12';
$password = '12345';

$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1.$password.$random2); 

$self = $_SERVER['prosjekt.hia.no/user/haakb12/BareSiDet'];


// Hvis bruker logger ut

if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
	header("location: login.php");
}


// Hvis bruker logger inn, men det er allerede en logget inn

if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {

	?>
	
	<p>Hei <?php echo $username; ?>, du har logget inn!</p>
		<div id="skjema">
		<form method="post" action="postscriptadmin.php">
		<textarea rows="20" cols="50" name="Melding2"></textarea>
		<br/>
		<input type="submit" name=" postinnlegg" value="Post innlegg">
		</form>
		<form method="get">
		<input type="submit" name="logout" value="logg ut">
		</form>
		
		<form method="post" action="Henteinnlegg.php" target="_blank">
		<input type="submit" name="hente" class="link" value="Vis innlegg" target="_blank">
		</form>
	
	


<?php
}


//Hvis form har blitt fylt ut

else if (isset($_POST['submit'])) {

	if ($_POST['username'] == $username && $_POST['password'] == $password){
	
		//Hvis brukernavn og passord stemmer, vil brukeren bli logget inn og form vist fram
		$_SESSION["login"] = $hash;
		?>
		<p>Hei <?php echo $username; ?>, du har logget inn!</p>
		<div id="skjema">
		<form method="post" action="postscriptadmin.php">
		<textarea rows="20" cols="50" name="Melding2"></textarea>
		<br>
		<input type="submit" name="postinnlegg" value="Post innlegg">
		</form>
		<form method="get">
		<input type="submit" name="logout" value="logg ut">
		</form>
		
		<form method="post" action="Henteinnlegg.php">
		<input type="submit" name="hente" class="link" value="Vis innlegg">
		</form>
		
<?php
		
		
	} else {
		
		// Vis feilmelding og login form
		display_login_form();
		echo '<p>Passord eller brukernavn er feil</p>';
		
	}
}	
	
	
// Login form

else { 

	header('location: index.html');
	

}


function display_login_form(){ ?>

	<form action="<?php echo $self; ?>" method='post'>
	<label for="username">Brukernavn</label>
	<br>
	<input type="text" name="username" id="username">
	<label for="password">Passord</label>
	<input type="password" name="password" id="password">
	<input type="submit" name="submit" value="Logg inn">
	</form>	
	
	
	<form method="link" action="http://prosjekt.hia.no/users/haakb12/BareSiDet/index.html">
	<input type="submit" value="Tilbake til hovesiden">
	</form>
	

<?php } ?>

<address class="address"> <a href="http://www.uia.no">Uia.no</a> <br>
Denne siden er opprettet av Håkon, Simon, Thomas og Thomas 

</html>