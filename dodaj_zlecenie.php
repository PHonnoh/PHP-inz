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
	<title>Zlecenia HoSt-IT</title>
	
	
	<link rel="stylesheet" href="css/dodaj-edytuj.css" type="text/css" />
		<link rel="stylesheet" href="css/fontelli.css" type="text/css" />
	
	<link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
</head>

	<body>
	<div id="container">
		
		<?php
			if( isset($_POST["name"]) ){
				$nazwa = $_POST["name"];
				$materialy = $_POST["materials"];
				$data = $_POST["data"];
				$statut = $_POST["statut"];
				$czas = $_POST["time"];
				$tel = $_POST["tel"];
				
				if( empty( $nazwa ) || empty($data) || empty($tel) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query("INSERT INTO zlecenia(name, active, materials, data, time, tel) VALUES ('$nazwa', '$statut','$materialy', '$data', '$czas', '$tel')");

					if($odp){
						echo "Udało się dodać zlecenie";
						
					}else {
						echo "Nie udało się dodać zlecenia";
					}
					
					$conn->close();
				}
				
			}
			
		?>
		
		
	
		
		<form method="POST" action="dodaj_zlecenie.php">
		
			
				
			
				
			<div class="tile1">
				<a href="zlecenia.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a>
				</div>
				
			<div style="clear:both;"></div>
		
		
			Nazwa: <input name="name" type="text"> <br>
			Numer telefonu: <input name="tel" type="number"><br>
			Data: <input name="data" type="date" id="start" name="trip-start"
			value="2020:02:01"
			min="2020:02:01" max="2050:02:01"><br>
			Godzina: <input id="time" type="time" name="time"><br>
			Materiały: <textarea name="materials" rows="5" cols="40"></textarea><br>
			Statut: <select name= "statut">
						<option>Oczekujące </option>
						<option>Rozpoczęte </option>
						<option>Zakończone </option>
					</select><br>
			<input value="Zapisz" class="input" type="submit" class="tilelinkhtml5" >
			
		</form>
	
	
		
		
	</body>
</html>