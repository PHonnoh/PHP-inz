

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Zlecenia-"Nazwa firmy"</title>
	
	
	<link rel="stylesheet" href="css/zlecenia.css" type="text/css" />
	<link rel="stylesheet" href="css/fontelli.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
</head>

<body>

<div id="container">
	
		
		
		
			<div class="tile9">
				<a href="strona_startowa1.php" class="tilelink">
				<i class="icon-th"></i>
				<br />Strona Startowa</a>
			</div>
			<a href="przyjecia.php" class="tilelinkhtml5">
				<div class="tile8">
					<i class="icon-laptop"></i><br />Przyjęcia
				</div>
			</a>
			
			
					<div class="tile3">
				<a href="towar.php" class="tilelink"><i class="icon-shop"></i><br />Towar</a>
			</div>
			<div class="tile2">
				<a href="logout.php" class="tilelink"><i class="icon-power-outline"></i><br />Wyloguj</a>
			</div>
	
			<div style="clear:both;"></div>
			
		
	
			
			<div class="tile6">
				
			
				<style>
			td {
				border: solid #000 2px;
				padding: 5px;
				border-spacing: 0;
				border-collapse: collapse;
			}
		</style>
				<form method="GET" action = "zlecenia.php">
			Nazwa lub Nr tel: <input name="zlecenie" type="text" value = ""> 
			
			Statut: <select name= "statut">
						
						<option>Oczekujące </option>
						<option>Rozpoczęte </option>
						<option>Zakończone </option>
					</select>
					<input type="submit"  value="Szukaj" /><br><br>
			</form>
				<?php
				
			$s = @$_GET["statut"];
			$filtr = @$_GET["zlecenie"];
			
			$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			$wynik = $conn->query("SELECT * FROM zlecenia WHERE name LIKE '%$filtr%' OR tel LIKE '%$filtr%' ORDER BY active = '$s' DESC");
			
			
			echo"Baza zleceń do realizacji: </p>";
			
			if($wynik->num_rows > 0){
			
				
				echo "<table>";
				echo "<tr>";
				
				echo "<th>Nazwa:</th>";
				echo "<th>Termin:</th>";
				echo "<th>Godzina:</th>";
				echo "<th>Nr tel.:</th>";
				echo "<th>Statut:</th>";
				echo "</tr>";
				
				while( $wiersz = mysqli_fetch_assoc($wynik) ){
					echo "<tr>";
					
					
					echo "<td>" . $wiersz['name'] . "</td>";
					echo "<td>" . $wiersz['data'] . "</td>";
					echo "<td>" . $wiersz['time'] . "</td>";
					echo "<td>" . $wiersz['tel']  . "</td>";
					echo "<td>" . $wiersz['active']  . "</td>";
					echo '<td ><a href="edycja_zlecenia.php?page=edycja&id=';echo $wiersz['zid'];echo '">Edytuj</a></td>';
						echo "</tr>";
				}
				
				echo "</table>";
				
			}else {
				echo "Brak dodanych zleceń";
			}
			
			$conn->close();
		
		?>
					
					
			</div>



	
			

			
				<div class="tile1">
				<a href="dodaj_zlecenie.php" class="tilelink">
				<i class="icon-plus"></i>
				<br />Dodaj zlecenie</a>
		
	</form>
	</div>
				



</body>
</html>