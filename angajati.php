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
</head>
<body id="top">




<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
   
    <div class="fl_left">
      <ul>
  
        <li><i class="fa fa-envelope-o"></i> Bun venit!</li>
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
		<li><a href="angajati.php#functie">Adaugare functie</a></li>
		<li><a href="angajati.php#modificare">Modificare angajat</a></li>
        <li><a href="angajati.php#stergere">Stergere angajat</a></li>
      </ul>
    </nav>

  </header>
  </div>
  <br><center><h1><b><font color="FF3333" size="26">Lista angajati</font></h1></b></center><br>
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

			$query = "select * from angajati";
			

            $data=$conn->query($query);

            

            echo '<table width="70%" border="1" font color="black" cellpadding="5" cellspacing="5">
            <tr>
            <th>Id_Angajat</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>CNP</th>
            <th>Adresa</th>
            <th>Salariu</th>
            <th>Username Login</th>
			
            </tr>';
            foreach($data as $row)
            {
                echo '<tr>
                <td>'.$row["coda"].'</td>
                <td>'.$row["nume"].'</td>
                <td>'.$row["prenume"].'</td>
               <td>'.$row["cnp"].'</td>
               <td>'.$row["adresa"].'</td>
                <td>'.$row["salariu"].'</td>
                <td>'.$row["username"].'</td>
                
                
                </tr>';
            }

            echo '</table>';
			
$conn->close();
?>

<br>
<form action="angajatiaction.php" method="post"> 

  <div class="container">
	<center><font color="FF3333"><h1>Adaugare angajat nou</h1></font></center>
    <label for="nume"><b><font color="FF3333">Nume</font></b></label>
    <input type="text" placeholder="Introduce-ti numele" name="nume" requiFF3333>
	
	<label for="prenume"><b><font color="FF3333">Prenume</font></b></label>
    <input type="text" placeholder="Introduce-ti prenumele" name="prenume" requiFF3333>
	
	<label for="cnp"><b><font color="FF3333">CNP</font></b></label>
    <input type="text" placeholder="Introduce-ti cnp" name="cnp" requiFF3333>
	
	<label for="adresa"><b><font color="FF3333">Adressa</font></b></label>
    <input type="text" placeholder="Introduce-ti adresa" name="adresa" requiFF3333>
	
	<label for="salariu"><b><font color="FF3333">Salariu</font></b></label>
    <input type="text" placeholder="Introduce-ti numarul de telefon" name="salariu" requiFF3333>
	
	<br><label for="password"><b><font color="FF3333">Functie</font></b></label>
	
	<?php
$con = mysql_connect("localhost","root","");
 $db = mysql_select_db("curier",$con);
 $get=mysql_query("SELECT denumire FROM functie");
$option = '';
 while($row = mysql_fetch_assoc($get))
{
  $option .= '<option value = "'.$row['denumire'].'">'.$row['denumire'].'</option>';
}
?>
<select id="soflow-color"> 
<?php echo $option; ?>
</select>

	<br>	
	<label for="username"><b><font color="FF3333">Username</font></b></label>
    <input type="text" placeholder="Introduce-ti username" name="username" requiFF3333>
	
    <br><label for="password"><b><font color="FF3333">Parola</font></b></label>
    <input type="password" placeholder="Introduce-ti parola" name="password" requiFF3333>
	
	
	
    <button type="submit" name="btnRegister">Adauga</button>
    
  </div>
</form>
<br>
<form action="angajatiaction.php" method="post" id="functie"> 

  <div class="container">
	<center><font color="FF3333"><h1>Adaugare Funtie noua</h1></font></center>
    <label for="idf"><b><font color="FF3333">ID Functie</font></b></label>
    <input type="text" placeholder="Introduce-ti id" name="idf" requiFF3333>
	
	<label for="prenume"><b><font color="FF3333">Denumire</font></b></label>
    <input type="text" placeholder="Introduce-ti denumirea functiei" name="denumire" requiFF3333>
	
	<label for="cnp"><b><font color="FF3333">Salariu Minim</font></b></label>
    <input type="text" placeholder="Introduce-ti salariu minim" name="salmin" requiFF3333>
	
	<label for="adresa"><b><font color="FF3333">Salariu Maxim</font></b></label>
    <input type="text" placeholder="Introduce-ti adresa" name="salmax" requiFF3333>
	 <button type="submit" name="btnFunctie">Adauga</button>
</div>
</form>
<br>
<form action="angajatiaction.php" method="post" id="modificare"> 

  <div class="container">
	<center><font color="FF3333"><h1>Modificare angajat</h1></font></center>
    <select name="modificareangajat" id="soflow-color">
    <option value="A">Nume</option>
    <option value="B">Adresa</option>
    <option value="C">Salariu</option>
	<option value="D">Username</option>
	</select>
	
    <input type="text" placeholder="Introduce-ti cnp-ul" name="cnpvalue" requiFF3333>
    <input type="text" placeholder="Introduce-ti noua valoare" name="newvalue" requiFF3333>
	 <button type="submit" name="btnModifica">Modifica</button>
</div>
</form>
<br>
<form action="angajatiaction.php" method="post" id="stergere"> 

<div class="container">
	
    <center><font color="FF3333"><h1>Stergere angajat</h1></font></center>
    <input type="text" placeholder="Introduce-ti cnp-ul" name="cnpvalue">
	<button type="submit" name="btnSterge">Sterge</button>
	
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