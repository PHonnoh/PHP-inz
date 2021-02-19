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

$pid = @$_GET[pid];




$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			$wynik = $conn->query("SELECT * FROM przyjecia WHERE pid = $pid ");
			
			
			
			
			if(@$wynik->num_rows > 0){
				
				while( $wiersz = mysqli_fetch_assoc($wynik) ){
					echo "<tr>";
					
				$m1 = $wiersz['model'];
				$no1 = $wiersz['no'];
				$n1 = $wiersz['name'];
				$t1 = $wiersz['tel'];
				$d1 = $wiersz['data'];
				$w1 = $wiersz['what'];
				
					
					}
				
				echo "</table>";
				
				
				
				
				
			}else {
				echo "Brak sprzętu";
			}
			
			$conn->close();
		
					
					
?>
</head>

	<body>
<div id="container">
	
		
		<form method="POST" action="edycja_przyjęcia.php">
		<div class="tile1">
				<a href="przyjecia.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a></br>
				</div>
			<div style="clear:both;"></div>
			
			Edycja naprawy: "<?php echo $n1 ?>" <br> </br>
			ID: <input name = "pid" type = "text" value = "<?php echo $pid ?>">  <br>
			Model: <input name="model" type="text" value = "<?php echo $m1 ?>"> <br>
			Nr. seryjny: <input name="no" type="text" value = "<?php echo $no1 ?>"> <br>
			Imie i Nazwisko klienta: <input name="name" type="text" value = "<?php echo $n1 ?>"> <br>
			Numer telefonu: <input name="tel" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" value = "<?php echo $t1 ?>"><br>
			Data przyjęcia: <input name="data" type="date" id="start" name="trip-start"
			value="2020:02:01"
			min="2020:02:01" max="2050:02:01" value = "<?php echo $d1 ?>"><br>
			Rodzaj usterki: <input name="what" type="text"value = "<?php echo $w1 ?>"><br>
				<input value="Zapisz" class="input" type="submit" class="tilelinkhtml5" >
			
			
		</form>
	
	</div>
	
			
	</body>
</html>

<?php
			if( isset($_POST["pid"]) ){
				$pid = $_POST["pid"];
				$model = $_POST["model"];
				$no = $_POST["no"];
				$name = $_POST["name"];
				$tel = $_POST["tel"];
				$data = $_POST["data"];
				$what = $_POST["what"];
				
				
				if( empty( $model ) || empty($name) || empty($what) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query ("UPDATE przyjecia SET model='$model', no='$no',name='$name',tel='$tel' ,data='$data' ,what='$what' WHERE pid='$pid'");

					if($odp){
						echo "Udało się zaktualizować przyjęcie";
						
					}else {
						echo "Nie udało się zaktualizować przyjęcia";
					}
					
					$conn->close();
				}
				
			}
			
		?>


