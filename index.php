<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: strona_startowa1.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Rejestracja Pracowników </title>
	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>

	<div id="container">
		<div class="rectangle">
	
		Prosze się zarejestrować do bazy w celu dalszej pracy<br /><br />
		<style>
		;
		</style>
		
		
		<a href="rejestracja.php" class="tilelinkhtml5" >Rejestracja - Jeśli jesteś nowym pracownikiem, załóż konto!</a>
		<br /><br />
		
		<form action="zaloguj.php" method="post">
		
			Login: <br /> <input type="text" name="login" /> <br />
			Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
			<input type="submit" value="Zaloguj się" />
		
		</form>
		</div>
	</div>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>