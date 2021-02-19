<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Strona główna-"Nazwa firmy"</title>
	
	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontelli.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	

		
</head>

<body>
	
	<div id="container">
	
		
		<div class="tile1">
				<a href="zlecenia.php" class="tilelink">
				<i class="icon-user"></i>
				<br />Zlecenia</a>
			</div>
			<a href="przyjecia.php" class="tilelinkhtml5">
				<div class="tile6">
					<i class="icon-laptop"></i><br />Przyjęcia
				</div>
			</a>
			
			
					<div class="tile3">
				<a href="towar.php" class="tilelink"><i class="icon-shop"></i><br />Towar</a>
			</div>
			<div class="tile2">
				<a href="logout.php" class="tilelink"><i class="icon-power-outline"></i> <br />Wyloguj</a>
			</div>
	
			<div style="clear:both;"></div>
			
		<div class="square">
			
			<div class="tile5">
			<i> Informacje!	 </i>	
			
		
						 
				

				<?php
				
				 $conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
					
					$wynik = $conn->query("SELECT active FROM zlecenia ");
					
					
					if($wynik->num_rows > 0){
					
						
						while( $wiersz = mysqli_fetch_assoc($wynik) ){
					
					
					if ($wiersz['active'] == "Rozpoczęte"){
					@$roz++;
					}
					if ($wiersz['active'] == "Zakończone"){
					@$zak++;
					}
					if ($wiersz['active'] == "Oczekujące"){
					@$ocz++;
					}
					
					
						}
					}	
					$conn->close();
				
				
					echo "<p>Witaj ".$_SESSION['user']."</p>"; 
					echo "<b>Zlecenia oczekujące</b>: ".$ocz."<br>";
					echo "  <b>Rozpoczęte zlecenia</b>: ".$roz."<br>";
					echo "  <b>Zakończone zlecenia</b>: ".$zak."</p>";
					
					echo "<p><b>E-mail</b>: ".$_SESSION['email'];
					
			
	
				?>
				</div>
			
		
		</div>	
		<div class="square">
			<div class="tile4">
				<i>"Im bardziej chce coś zrobić, tym mniej nazywam to pracą."</i><br />- Richard Bach.
			</div>
			<div class="yt">
				<a href="http://youtube.com" target="_blank" class="sociallink"><i class="icon-youtube"></i></a>
			</div>
			<div class="fb">
				<a href="http://facebook.com" target="_blank" class="sociallink"><i class="icon-facebook"></i></a>
			</div>
			<div class="ista">
				<a href="http://instagram.com" target="_blank" class="sociallink"><i class="icon-instagram"></i></a>
			</div>
			<div class="tw">
				<a href="http://twitter.com" target="_blank" class="sociallink"><i class="icon-twitter"></i></a>			
			</div>
		</div>
		
		
		<div style="clear: both;"></div>
		
		<div class="rectangle">2020 &copy; "Nazwa firmy" - Wszelkie prawa zastrzeżone! <i class="icon-mail-alt" ></i> biuro@nazwafirmy.pl</div>
	
	</div>
	
	
	
				
				
	
</body>
</html>