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
if (isset($_POST["btnRegister"])){
	$sql2="SELECT codf from functie WHERE denumire='".$_POST["functie"]."'";
	$idf=$conn->query($sql2);
	$idf = (int)$idf;
$sql = "INSERT INTO angajati(nume, prenume, cnp, adresa, salariu, codf, username, password)
        VALUES ('".$_POST["nume"]."','".$_POST["prenume"]."','".$_POST["cnp"]."','".$_POST["adresa"]."','".$_POST["salariu"]."'
		,'$idf','".$_POST["username"]."','".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<script type='text/javascript'>alert('Functie adaugata cu succes!');</script>";
	header("Refresh:0; url=angajati.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

if (isset($_POST["btnFunctie"])){

	
$sql = "INSERT INTO functie(codf,denumire,sal_min,sal_max)
        VALUES ('".$_POST["idf"]."','".$_POST["denumire"]."','".$_POST["salmin"]."','".$_POST["salmax"]."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<script type='text/javascript'>alert('Angajat adaugat cu succes!');</script>";
	header("Refresh:0; url=angajati.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if (isset($_POST["btnModifica"])){
	$cnp=$_POST['cnpvalue'];
	$value=$_POST['newvalue'];
    $select1 = $_POST['modificareangajat'];
    switch ($select1) {
        case 'A':
            $sql = "UPDATE angajati SET nume='$value' WHERE cnp=$cnp";
            break;
        case 'B':
            $sql = "UPDATE angajati SET adresa='$value' WHERE cnp=$cnp";
            break;
		case 'C':
			$sql = "UPDATE angajati SET salariu='$value' WHERE cnp=$cnp";
            break;
		case 'D':
			$sql = "UPDATE angajati SET username='$value' WHERE cnp=$cnp";
            break;
        
    }
	if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Datele au fost actualizate!');</script>";
	header("Refresh:0; url=utilizatori.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if (isset($_POST["btnSterge"])){
   
$id=$_POST['cnpvalue'];
$sql = "DELETE FROM angajati WHERE cnp=$id";

if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Utilizator sters cu succes!');</script>";
	header("Refresh:0; url=angajati.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>