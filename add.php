<?php
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "pracownicy";

// Create connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO zlecenia (zid, name, active, materials)
VALUES from  ('NULL','$Nazwa' ,'$Termin', '$Zapotrzebowanie')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>