<!DOCTYPE html>

<html>
<head>
<title>Speed Courier</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 0px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
	color: #00ff00;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 1px 0 1px 0;
}

img.avatar {
    width: 20%;
    border-radius: 20%;
}

.container {
    padding: 12px;
	border: 5px solid #f1f1f1;
	margin-left: 405px;
	margin-right: 405px;
}

span.psw {
    float: right;
    padding-top: 1px;
}


    span.psw {
       display: block;
       float: none;
    }

}
</style>
<script>
  $(function(){
        $("#date").datepicker({ dateFormat: 'dd-mm-yy' });
      
    });
  function setTextField(ddl) {
        document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
    }

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
        <li><a href="index.html">Delogare</a></li>
      
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
		<li><a href="admin.html">ADMIN PANEL</a></li>
        <li><a href="colete.php#stergere">Stergere colet</a></li>
        <li><a href="colete.php#modificare">Modificare colet</a></li>
      </ul>
    </nav>

  </header>
</div>
<br><center><h1><b><font color="red" size="26">Lista Colete</font></h1></b></center><br>
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

			$query = "select * from colet";
			$query2 = "select nume,prenume from clienti,colet where clienti.codcli=colet.codcli";
			$query3 = "select nume,prenume from angajati,colet where colet.coda=angajati.coda";

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
			
$conn->close();
?>

<form action="coletaction.php" method="post" > 

  <div class="container">
  <br><center><h1><b><font color="red" size="">Adauga colet nou</font></h1></b></center><br>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "curier";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$query="Select * from clienti";
	$data=$conn->query($query);
	$option = '';
	foreach($data as $row)
	{
	$option .= '<option value = "'.$row['codcli'].'">'.$row['codcli']." ".$row['nume']." ".$row['prenume'].'</option>';
	}
?>
	 <label for="nume"><b><font color="red">Nume Client</font></b></label>
	<select id="soflow-color" name="numeclient" onchange="setTextField(this)"> 
	<?php echo  $option?>
	</select><input id="make_text" type = "hidden" name = "make_text" value = "" /><br>

	
    <label for="nume"><b><font color="red">Nume Destinatar</font></b></label>
    <input type="text" placeholder="Introduce-ti numele destinatarului" name="destinatar" required>
	
	<label for="prenume"><b><font color="red">Adresa Destinatar</font></b></label>
    <input type="text" placeholder="Introduce-ti adresa destinatarului" name="adresa_dest" required>
	
	 <label for="nume"><b><font color="red">Data preluare</font></b></label>
	<input type="date" id="datepicker" name='preluare' size='33' value="" />
	
	 <label for="nume"><b><font color="red">Data predare</font></b></label>
	<input type="date" id="datepicker" name='predare' size='33' value="" /> 
	
	<label for="cnp"><b><font color="red">Greutate</font></b></label>
    <input type="text" placeholder="Introduce-ti greutate coletului" name="greutate" required>
	
	<label for="adresa"><b><font color="red">Suma Ramburs</font></b></label>
    <input type="text" placeholder="Introduce-ti suma ranburs" name="suma" required>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "curier";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$query="Select * from angajati";
	$data=$conn->query($query);
	$option = '';
	foreach($data as $row)
	{
	$option .= '<option value = "'.$row['coda'].'">'.$row['coda']." ".$row['nume']." ".$row['prenume'].'</option>';
	}
?>
	 <label for="nume"><b><font color="red">Nume angajat</font></b></label>
	<select id="soflow-color" name="numeangajat"> 
	<?php echo  $option?>
	</select><br>
    <button type="submit" name="btnColetNou">Inregistrare</button>
    
  </div>
</form>
<br>
<form action="coletaction.php" method="post" id="modificare"> 

  <div class="container">
	<center><font color="red"><h1>Modificare colet</h1></font></center>
    <select name="modificarecolet" id="soflow-color">
    <option value="A">Nume Destinatar</option>
    <option value="B">Adresa Destinatar</option>
    <option value="C">Suma ramburs</option>
	<option value="D">Greutate</option>
	</select>
	
    <input type="text" placeholder="Introduce-ti id-ul coletului" name="idcolet" required>
    <input type="text" placeholder="Introduce-ti noua valoare" name="newvalue" required>
	 <button type="submit" name="btnModifica">Modifica</button>
</div>
</form>
<br>
<form action="coletaction.php" method="post" id="stergere"> 

  <div class="container">
		<br><center><h1><b><font color="red" size="">Sterge colet</font></h1></b></center><br>
		
		<label for="nume"><b><font color="red">ID COLET</font></b></label>
		<input type="text" placeholder="Introduce-ti id-ul coletului" name="idcolet" required>
		<button type="submit" name="btnStergereColet">Sterge</button>
  </div>
</form>
<br>


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