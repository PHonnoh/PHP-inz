
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
	<title>Towar-"Nazwa firmy"</title>
	
	
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
			
			
					<div class="tile1">
				<a href="zlecenia.php" class="tilelink"><i class="icon-user"></i><br />Zlecenia</a>
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
		
		<form method="GET" action="towar.php">
			Nazwa lub ean: <input name="nazwa"  type="text"> 
			<input type="submit"  value="Szukaj" /><br><br>
			</form>
				
				
				<?php
				$nazwa = @$_GET["nazwa"];
				
			
			
			$conn = new mysqli("localhost", "root", "", "pracownicy") or die("Błąd");
			
			
					$wynik = $conn->query("SELECT * FROM towar WHERE name LIKE '%$nazwa%' OR ean LIKE '%$nazwa%'");
				
				
				
				echo"Towar: </p>";
				
				if($wynik->num_rows > 0){
					
					echo "<table>";
					echo "<tr>";
					echo "<th>Id</th>";
					echo "<th>ean</th>";
					echo "<th>Nazwa</th>";
			
					echo "<th>Ilość</th>";
					echo "<th>Cena</th>";
					echo "</tr>";
					
					while( $wiersz = $wynik->fetch_assoc() ){
						echo "<tr>";
						
						echo "<td>" . $wiersz["tid"]  . "</td>";
						echo "<td>" . $wiersz["ean"]  . "</td>";
						echo "<td>" . $wiersz["name"] . "</td>";
						echo "<td>" . $wiersz["number"] . "</td>";
						echo "<td>" . $wiersz["price"]  . "</td>";
					
						echo '<td ><a href="edycja_towaru.php?page=edycja&tid=';echo $wiersz['tid'];echo '" >Edytuj</a></td>';
						echo "</tr>";
					}
					
					echo "</table>";
					
				}else {
					echo "Brak dodanego towaru";
			}
			
			$conn->close();
			
			
			
		?>
					
					
			</div>



	
			

			<div class="tile1">
			<a href="dodaj_towar.php" class="tilelink"><i class="icon-plus"></i>
			
				<br />Dodaj towar</a>
		
	</form>
	</div>
				



</body>
</html>