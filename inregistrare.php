<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "curier";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO clienti( nume, prenume, cnp, adresa, telefon, username, password)
        VALUES ('".$_POST["nume"]."','".$_POST["prenume"]."','".$_POST["cnp"]."','".$_POST["adresa"]."','".$_POST["telefon"]."'
		,'".$_POST["username"]."','".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<script type='text/javascript'>alert('Utilizator inregistrat cu succes!');</script>";
	header("Refresh:0; url=inregistrare.html");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

