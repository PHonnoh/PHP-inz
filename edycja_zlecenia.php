
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

$id = @$_GET[id];




$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			$wynik = $conn->query("SELECT * FROM zlecenia WHERE zid = $id ");
			
			
			
			
			if(@$wynik->num_rows > 0){
				
				while( $wiersz = mysqli_fetch_assoc($wynik) ){
					echo "<tr>";
					
					$m = $wiersz['materials']  ;
					@$n = $wiersz['name'] ;
					$d = $wiersz['data'] ;
					$t = $wiersz['time'] ;
					$te = $wiersz['tel']  ;
					}
				
				echo "</table>";
				
				
				
				
			}
			
			
			$conn->close();
		
					
					
?>
</head>

	<body>
<div id="container">
	
		
		<form method="POST" action="edycja_zlecenia.php">
		<div class="square">
			<div class="tile1">
				<a href="zlecenia.php" type="submit" class="tilelink">
				<i class="icon-play-circled"></i>
				<br />Powrót</a>
				</div>
				
			<div style="clear:both;"></div>
			
			Edycja zlecenia: "<?php echo @$n ?>" <br> </br>
			ID: <input name = "zid" type = "text" value = <?php echo $id ?>>  <br>
			Nazwa: <input name="name" type="text" value = "<?php echo $n ?>">  <br>
			Numer telefonu: <input name="tel" type="number" value = "<?php echo $te ?>"><br>
			Data: <input name="data" type="text" value = "<?php echo $d ?>"><br>
			Godzina: <input id="time" type="time" name="time" value = "<?php echo $t ?>"><br>
			Materiały: <input name="materials" type="text" value = "<?php echo $m?>" rows="5" cols="40" ><br>
			Statut: <select name= "statut">
						<option>Oczekujące </option>
						<option>Rozpoczęte </option>
						<option>Zakończone </option>
					</select><br>
			<input value="Zapisz" class="tile1" type="submit"  >
			
			
		</form>
	
	</div>
	
			
	</body>
</html>

<?php
			if( isset($_POST["zid"]) ){
				$id = $_POST["zid"];
				$nazwa = $_POST["name"];
				$activ = $_POST["statut"];
				$materialy = $_POST["materials"];
				$data = $_POST["data"];
				$czas = $_POST["time"];
				$tel = $_POST["tel"];
				
				if( empty( $nazwa ) || empty($data) || empty($tel) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
					$conn = new mysqli("localhost", "root", "", "pracownicy");
					
					$odp = $conn->query ("UPDATE zlecenia SET name='$nazwa', active = '$activ',materials='$materialy',data='$data',time='$czas',tel='$tel' WHERE zid='$id'");

					if($odp){
						echo "Udało się zaktualizować zlecenie";
						
					}else {
						echo "Nie udało się zaktualizować zlecenia";
					}
					
					$conn->close();
				}
				
			}
			
		?>


