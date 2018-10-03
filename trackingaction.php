<!DOCTYPE html>

<html>
<head>
<title>Speed Courier</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">


</script>
</head>
<body id="top">




<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
   
    <div class="fl_left">
      <ul>
  
        <li><i class="fa fa-envelope-o"></i> BUN VENIT!</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
     
      
      </ul>
    </div>
   
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">SPEED COURIER</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>

   
      </ul>
    </nav>

  </header>
</div>
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
if (isset($_POST["btnCautaColet"])){
			$idcolet=$_POST['idcolet'];
			$query = "select * from colet where codc=$idcolet";
			$query2 = "select nume,prenume from clienti,colet where clienti.codcli=colet.codcli and codc=$idcolet";
			$query3 = "select nume,prenume from angajati,colet where colet.coda=angajati.coda and codc=$idcolet";

            $data=$conn->query($query);
			$data2=$conn->query($query2);
			$data3=$conn->query($query3);
			

            

            echo '<table width="70%" border="1" font color="black" cellpadding="5" cellspacing="5">
            <tr>
            <th>Id_Colet</th>
            <th>Client</th>
            <th>Destinat</th>
            <th>Adresa destinatar</th>
            <th>Data preluare</th>
            <th>Data predare</th>
            <th>Greutate</th>
			<th>Suma ramburs</th>
			<th>Angajat</th>
            </tr>';
           foreach($data as $row)
            {
				foreach($data2 as $row2){
					foreach($data3 as $row3){
                echo '<tr>
                <td>'.$row["codc"].'</td>
                <td>'.$row2["nume"]." ".$row2["prenume"].'</td>
                <td>'.$row["destinatar"].'</td>
               <td>'.$row["adr_dest"].'</td>
               <td>'.$row["preluare"].'</td>
                <td>'.$row["predare"].'</td>
                <td>'.$row["greutate"].'</td>
				<td>'.$row["suma"].'</td>
                <td>'.$row3["nume"]." ".$row3["prenume"].'</td>
                
                </tr>';
            }
			}
			}

            echo '</table>';
}		
$conn->close();
?>






<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
   
    <div class="one_third first">
      <h6 class="heading">SPEED COURIER</h6>
      <nav>
        <ul class="nospace">
          <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
          <li><a href="#">Despre</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Termeni</a></li>
          <li><a href="#">Tracking</a></li>
          
        </ul>
      </nav>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Despre</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
			Str. Domneasca nr.34, Parter A3
          </address>
        </li>
        <li><i class="fa fa-phone"></i> 0236 026 024</li>
        <li><i class="fa fa-envelope-o"></i> info@speedcourier.ro</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Aboneaza-te pentru noutati </h6>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Trimite</button>
        </fieldset>
      </form>
    </div>
   
  </footer>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>

</body>
</html>
