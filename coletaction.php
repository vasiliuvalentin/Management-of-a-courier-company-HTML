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
if (isset($_POST["btnColetNou"])){
	
	$chosen=preg_replace('/[^\w]/','',$_POST['numeclient']);
	$numecli = explode(" ",$chosen);

	$chosen2=preg_replace('/[^\w]/','',$_POST['numeangajat']);
	$numeang = explode(" ",$chosen2);
	

	$sql = "INSERT INTO colet(codcli, destinatar, adr_dest, preluare, predare, greutate, suma, coda)
        VALUES ('".$numecli[0]."','".$_POST["destinatar"]."','".$_POST["adresa_dest"]."','".$_POST["preluare"]."','".$_POST["predare"]."'
		,'".$_POST["greutate"]."','".$_POST["suma"]."','".$numeang[0]."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<script type='text/javascript'>alert('Colet adaugata cu succes!');</script>";
	header("Refresh:0; url=colete.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


if (isset($_POST["btnModifica"])){
	$cnp=$_POST['idcolet'];
	$value=$_POST['newvalue'];
    $select1 = $_POST['modificarecolet'];
    switch ($select1) {
        case 'A':
            $sql = "UPDATE colet SET destinatar='$value' WHERE codc=$cnp";
            break;
        case 'B':
            $sql = "UPDATE colet SET adr_dest='$value' WHERE codc=$cnp";
            break;
		case 'C':
			$sql = "UPDATE colet SET suma='$value' WHERE codc=$cnp";
            break;
		case 'D':
			$sql = "UPDATE colet SET greutate='$value' WHERE codc=$cnp";
            break;
        
    }
	if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Datele au fost actualizate!');</script>";
	header("Refresh:0; url=colete.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if (isset($_POST["btnStergereColet"])){
   
$id=$_POST['idcolet'];
$sql = "DELETE FROM colet WHERE codc=$id";

if ($conn->query($sql) === TRUE) {
   
	echo "<script type='text/javascript'>alert('Colet sters cu succes!');</script>";
	header("Refresh:0; url=colete.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>