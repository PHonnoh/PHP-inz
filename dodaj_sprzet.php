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
			if( isset($_POST["model"]) ){
				$model = $_POST["model"];
				$no = $_POST["no"];
				$name = $_POST["name"];
				$tel = $_POST["tel"];
				$data = $_POST["data"];
				$what = $_POST["what"];
				
				if( empty( $model ) || empty($name) || empty($tel) || empty($data) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query("INSERT INTO przyjecia(model, no, name, tel, data, what) VALUES ('$model', '$no','$name', '$tel', '$data', '$what')");

					if($odp){
						echo "Udało się dodać zlecenie";
						
					}else {
						echo "Nie udało się dodać zlecenia";
					}
					
					$conn->close();
				}
				
			}
			
		?>
		
		<div id="container">
	
		
		<form method="POST" action="dodaj_sprzet.php">
		<div class="square">
			
				
			<div class="tile1">
				<a href="przyjecia.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a>
				
				</div>
		<div style="clear:both;"></div>
		
			Model: <input name="model" type="text"> <br>
			Nr. seryjny: <input name="no" type="text"> <br>
			Imie i Nazwisko klienta: <input name="name" type="text"> <br>
			Numer telefonu: <input name="tel" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"><br>
			Data przyjęcia: <input name="data" type="date" id="start" name="trip-start"
			value="2020:02:01"
			min="2020:02:01" max="2050:02:01"><br>
			Rodzaj usterki: <textarea name="what" rows="5" cols="40"></textarea>
			<input value="Zapisz" class="input" type="submit" class="tilelinkhtml5" >
			
			
		</form>
	
	</div>
		
		
	</body>
</html>