





<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Przyjęcia-"Nazwa firmy"</title>
	
	
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
			<a href="zlecenia.php" class="tilelinkhtml5">
				<div class="tile1">
					<i class="icon-user"></i><br />Zlecenia
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
				
					<form method="POST" action="przyjecia.php">
			Dane lub tel: <input name="dane" type="text"> 
			<input type="submit"  value="Szukaj" /><br><br>
			</form>
				
				
				<?php
				$dane = @$_POST["dane"];
				
				
			
			$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			$wynik = $conn->query("SELECT * FROM przyjecia WHERE name LIKE '%$dane%' OR tel LIKE '%$dane%' ORDER BY data");
			
			
			
			echo"Baza sprzętu do serwisu: </p>";
			if($wynik->num_rows > 0){
				
				echo "<table>";
				echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Model</th>";
				echo "<th>Nr.ser.</th>";
				echo "<th>Dane os.</th>";
				
				echo "<th>Data przyjęcia</th>";
				echo "<th>Nr tel.</th>";
				echo "</tr>";
				
				while( $wiersz = $wynik->fetch_assoc() ){
					echo "<tr>";
					
					echo "<td>" . $wiersz["pid"]  . "</td>";
					echo "<td>" . $wiersz["model"] . "</td>";
					echo "<td>" . $wiersz["no"] . "</td>";
					echo "<td>" . $wiersz["name"] . "</td>";
					echo "<td>" . $wiersz["data"] . "</td>";
					echo "<td>" . $wiersz["tel"]  . "</td>";
					echo '<td ><a href="edycja_przyjęcia.php?page=edycja&pid=';echo $wiersz['pid'];echo '">Szczegóły</a></td>';
					echo "</tr>";
				}
				
				echo "</table>";
				
			}else {
				echo "Brak przyjętego sprzętu";
			}
			
			$conn->close();
		
		?>
					
					
			</div>



	
			

		
		<div class="tile1">
				<a href="dodaj_sprzet.php" class="tilelink">
				<i class="icon-plus"></i>
				<br />Dodaj sprzęt</a>
	</form>
	</div>
				



</body>
</html>