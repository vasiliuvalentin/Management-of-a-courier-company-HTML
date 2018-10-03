<html>
<head>
<title>Speed Courier</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
   
    <div class="fl_left">
      <ul>
        <li>BUN VENIT,<?php echo $_POST["username"]; ?> !</li>
        
      </ul>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="#index.html">Delogare</a></li>
        
      </ul>
    </div>
   
  </div>
</div>
<div class="wrapper bgded" style="background-image:url('images/demo/backgrounds/03.png');">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">SPEED COURIER</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>

        <li><a href="tracking.html">Tracking</a></li>
       
      </ul>
    </nav>

  </header>
</div>

</html>
<?php
$server = "localhost";
$database = "curier";
$db_username = "root";
$pass = "";



$conn = new mysqli($server, $db_username, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$username = $conn->escape_string($_POST['username']);
 if (isset($_POST['angajat'])){
$result = $conn->query("SELECT * FROM angajati WHERE username='$username'");
}
else $result = $conn->query("SELECT * FROM clienti WHERE username='$username'");

if ( $result->num_rows == 0 ){
    echo 'Codul de utilizator nu este inregistrat!';
   
}
else { 
    $user = $result->fetch_assoc();


    if ( $_POST['password'] == $user['password'] ) {
		
    	if (isset($_POST['angajat'])){
    		header("Refresh:0; url=admin.html");
		}
    	
    	else{
			
    		$query = "select colet.codc, colet.destinatar, colet.adr_dest, colet.preluare, 
			colet.predare, colet.greutate, angajati.nume 
			from colet,angajati where colet.coda=angajati.coda 
			and colet.codcli=(SELECT codcli FROM clienti where username='$username')";
			

            $data=$conn->query($query);

            echo '<h1>Coletele dvs si starea lor:</h1>';

            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5">
            <tr>
            <th>Id_Colet</th>
            <th>Destinatar</th>
            <th>Adresa Destinatar</th>
            <th>Data Preluare</th>
            <th>Data Predare</th>
            <th>Greutate</th>
            <th>Nume Angajat</th>
			
            </tr>';
            foreach($data as $row)
            {
                echo '<tr>
                <td>'.$row["codc"].'</td>
                <td>'.$row["destinatar"].'</td>
                <td>'.$row["adr_dest"].'</td>
               <td>'.$row["preluare"].'</td>
               <td>'.$row["predare"].'</td>
                <td>'.$row["greutate"].'</td>
                <td>'.$row["nume"].'</td>
                
                
                </tr>';
            }

            echo '</table>';
			
		}
      
    }
    else {
        echo 'You have entered wrong password, try again!';
    }
}
?>


