
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



<?php

$tid = @$_GET[tid];





$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			$wynik = $conn->query("SELECT * FROM towar WHERE tid = $tid ");
			
			
			
			
			if(@$wynik->num_rows > 0){
				
				while( $wiersz = mysqli_fetch_assoc($wynik) ){
					echo "<tr>";
					
					$n = $wiersz['name']  ;
					$e = $wiersz['ean'] ;
					$nu = $wiersz['number'] ;
					$p = $wiersz['price'] ;
					
					}
				
				echo "</table>";
				
				
				
				
				
			}else {
				echo "Brak towaru";
			}
			
			$conn->close();
		
					
					
?>
</head>

	<body>
<div id="container">
	
		
		<form method="POST" action="edycja_towaru.php">
		
				
			<div class="tile1">
				<a href="towar.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a>
				</div>
			<div style="clear:both;"></div>
			Edycja towaru : "<?php echo $n ?>" <br> </br>
			ID: <input name = "tid" type = "text" value = <?php echo $tid ?>>  <br>
			Nazwa: <input name="name" type="text" value = "<?php echo $n ?>">  <br>
			Ean: <input name="ean" type="number" value = "<?php echo $e ?>"><br>
			Ilość: <input name="number" type="number" value = "<?php echo $nu ?>"><br>
			Cena za szt.: <input name="price" type="price"  value = "<?php echo $p ?>"><br>
			
			<input value="Zapisz" class="input" type="submit" class="tilelinkhtml5" >
			
			
		</form>
	
	</div>
	
			
	</body>
</html>

<?php
			if( isset($_POST["tid"]) ){
				$tid = $_POST["tid"];
				$nazwa = $_POST["name"];
				$ean = $_POST["ean"];
				$number = $_POST["number"];
				$cena = $_POST["price"];
				
				
				if( empty( $nazwa ) || empty($number) || empty($cena) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query ("UPDATE towar SET name='$nazwa', ean='$ean',number='$number',price='$cena' WHERE tid='$tid'");

					if($odp){
						echo "Udało się zaktualizować zlecenie";
						
					}else {
						echo "Nie udało się zaktualizować zlecenia";
					}
					
					$conn->close();
				}
				
			}
			
		?>


