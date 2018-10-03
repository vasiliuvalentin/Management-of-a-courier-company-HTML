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
if (isset($_POST["btnSterge"])){
   
$id=$_POST['cnpuser'];
$sql = "DELETE FROM clienti WHERE cnp=$id";

if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Utilizator sters cu succes!');</script>";
	header("Refresh:0; url=utilizatori.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if (isset($_POST["btnModifica"])){
	$cnp=$_POST['cnpvalue'];
	$value=$_POST['newvalue'];
    $select1 = $_POST['modificareuser'];
    switch ($select1) {
        case 'A':
            $sql = "UPDATE clienti SET nume='$value' WHERE cnp=$cnp";
            break;
        case 'B':
            $sql = "UPDATE clienti SET adresa='$value' WHERE cnp=$cnp";
            break;
		case 'C':
			$sql = "UPDATE clienti SET telefon='$value' WHERE cnp=$cnp";
            break;
		case 'D':
			$sql = "UPDATE clienti SET username='$value' WHERE cnp=$cnp";
            break;
        
    }
	if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Datele au fost actualizate!');</script>";
	header("Refresh:0; url=utilizatori.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


$conn->close();

