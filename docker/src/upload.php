<script>
function goBack() {
    window.history.back();
}
</script>
<?php

	$proizvodac = $_POST['proizvodac'];
	$model = $_POST['model'];
	$tip_motora = $_POST['tip_motora'];
	$gorivo = $_POST['gorivo'];
	$kilometraza = $_POST['kilometraza'];
	$godiste =  $_POST['godiste'];
	$snaga_ks =  $_POST['snaga_ks'];
	$radni_obujam =  $_POST['radni_obujam'];
	$vlasnik =  $_POST['vlasnik'];
	$datepicker =  $_POST['datepicker'];
	$cijena =  $_POST['cijena'];
	$naslov =  $_POST['naslov'];
	$opis =  $_POST['opis'];
	
	include "connect.php";
	
	session_start();
	if (isset($_SESSION['username']) ) {
	$usera = $_SESSION['username'];
	}else{header("Refresh:0; url=provjera.php");}
	
	$query = "SELECT * FROM korisnik WHERE username='$usera'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	$id_korisnik = $row[0];
	
	$query = "INSERT INTO oglas (proizvodac, model, tip_motora, gorivo, kilometraza, godiste, snaga_ks, radni_obujam, vlasnik, registracija, cijena, naslov, opis, ID_korisnika) 
						VALUES ('$proizvodac', '$model', '$tip_motora', '$gorivo', '$kilometraza', '$godiste', '$snaga_ks', '$radni_obujam', '$vlasnik', '$datepicker', '$cijena', '$naslov', '$opis', '$id_korisnik'); ";
	mysql_query($query);

/* 	echo $proizvodac;
	echo $model;
	echo $tip_motora;
	echo $gorivo;
	echo $kilometraza;
	echo $godiste;
	echo $snaga_ks;
	echo $radni_obujam;
	echo $vlasnik;
	echo $datepicker;
	echo $opis;
	echo $query; */
	 
	$query = "SELECT ID_oglasa FROM oglas ORDER BY ID_oglasa DESC LIMIT 1";
						
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result)) {
    $id = $row['ID_oglasa'];
	}
	
$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 1024*2000; // 2 MB
$path = "uploads/"; // Upload directory

$count = 0;
	$query = "SELECT ID_slike FROM oglas_slike ORDER BY ID_slike DESC LIMIT 1";
						
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result)) {
    $count = $row['ID_slike'];
	}
	
$limit = $count + 10;

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
			$message = "Dogodila se greška. Pokušajte ponovno.<br><br>Kliknite <a onclick='goBack()' href='#'>ovdje</a> za povratak";
			$query = "DELETE FROM oglas WHERE ID_oglasa=('$id')"; //Delete row just created if error occurs
			mysql_query($query);
	        $count=$limit; // Stop if error found
				break;
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
				$message = "Dogodila se greška. Slike prelaze limit veličine fajla(4MB). Pokušajte ponovno.<br><br>Kliknite <a onclick='goBack()' href='#'>ovdje</a> za povratak";
				$query = "DELETE FROM oglas WHERE ID_oglasa=('$id')"; //Delete row just created if error occurs
				mysql_query($query);
				$count=$limit; // Stop if error found
				break;
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message = "Dogodila se greška. Krivi format slika. Dopušteni su '.jpg', '.png', '.gif', '.bmp'. Pokušajte ponovno.<br><br>Kliknite <a onclick='goBack()' href='#'>ovdje</a> za povratak";
				$query = "DELETE FROM oglas WHERE ID_oglasa=('$id')"; //Delete row just created if error occurs
				mysql_query($query);
				$count=$limit; // Stop if error found
				break;
			}
	        else{ // No error found! Move uploaded files 
				$message = "Oglas je uspješno objavljen.<br><br>Kliknite <a href='index.php'>ovdje</a> za povratak na glavnu stranicu.";
				
				$ext = pathinfo($name, PATHINFO_EXTENSION);
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$count.".".$ext))
	            chmod($path.$count.".".$ext, 0755);
				$query = "INSERT INTO oglas_slike (slika, ID_oglasa) VALUES ('$path$count".".$ext', '$id');";
				mysql_query($query);
				$count++;// Number of successfully uploaded file
	        }
	    }
		
		if($count==$limit)
				break;
	}
}
?>
<html>
 <meta charset="UTF-8"> 
<title>
Kupi auto!
</title>
	<link rel="stylesheet" media="screen" href="style.css">
<style type="text/css">

</style>
<head>
	<div id = "topmenu" > 
	<ul>
		
		<div id = logo>
			<a href="index.php"><img src="images/logo.png" alt="" border=0></img></a>
		</div>
		<li>
			<div id = search>
				<a href="searchForm.php"><img src="images/search.png" border=0 ></img></a>
			</div>
			</li>
		<div id = desni_meni>
					
					<?php
					session_start();
					
					if (isset($_SESSION['username']) ) {
						$user = $_SESSION['username'];
						print ("<li><a href='profile.php'>$user</a></li>");
						print ("<li><a href='logout.php'>Logout</a></li>");
					}
					
					else{
						print ("<li><a href='register.php'>Register</a></li><li><a href='login.php'>Login</a></li>");
					}
					?>
			
		</div>
		
		
	</ul> 
	</div>
</head>

<body>

<table style="width:1000" border="0" align="center" >
	
	<tr>
		<td><?php echo $message; ?></td>
	</tr>
</table> 

</body>

<footer>
<div id="footer">Korisnička podrška | Telefon: xx.xxx.xxx | Radno vrijeme: Svaki dan 8:00–19:00 | Email: podrska@kupiauto.net16.net</div>
<br><div id="footer">© Kupiauto d.o.o. 2016. Sva prava pridržana.</div>
<br><div id="footer"><a href="admin.php">Admin site</a> </div>
</footer>


</html>