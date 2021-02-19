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
				$name = $_POST["name"];
				$ean = $_POST["ean"];
				$number = $_POST["number"];
				$price = $_POST["price"];
			
				
				if( empty( $name ) || empty($number) || empty($price) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query("INSERT INTO towar( name, ean, number, price) VALUES ('$name', '$ean','$number', '$price')");

					if($odp){
						echo "Udało się dodać towar";
						
					}else {
						echo "Nie udało się dodać towaru";
					}
					
					$conn->close();
				}
				
			}
			
		?>
		
		<div id="container">
	
		
		<form method="POST" action="dodaj_towar.php">
		
				
			<div class="tile1">
				<a href="towar.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a>
				
				</div>
			</a>
		<div style="clear:both;"></div>
		
			Nazwa: <input name="name" type="text"> <br>
			Nr. ean: <input name="ean" type="number"> <br>
			Ilość sztuk: <input name="number" type="number"><br>
			Cena: <input name="price" type="price"><br>
			<input value="Zapisz" class="input" type="submit" class="tilelinkhtml5" >
			
			
		</form>
	
	</div>
		
		
	</body>
</html>