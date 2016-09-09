<html>
 <meta charset="UTF-8"> 
 
 <?php 
			session_start();
			
			if (!isset($password)){
				$potrebnaForma = 1;
		    }
			else {

				$pass = $_POST ['password'];	
				$potrebnaForma = 0;
			}
			
?>
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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Moj profil</td>
	</tr>
	<tr>
	
	<td>
	<?php 
		if (!isset($_POST ['password']))
		{
			include("edit_password_form.php"); 
		}
		else if (isset($_POST ['password']))
		{
			
				$pass = $_POST ['password'];	
				$potrebnaForma = 0;
		
		
include "connect.php";
			
			$query = "SELECT ID_korisnika FROM korisnik WHERE username = '$user' ";
			
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$ID_korisnika = $row[0];
			
			
			$query = "UPDATE `korisnik` SET `password` = '$pass' WHERE `korisnik`.`ID_korisnika` = '$ID_korisnika'; ";
			mysql_query($query);
			
			
			$query = "SELECT * FROM korisnik WHERE ID_korisnika = '$ID_korisnika' AND password = '$pass'";
			$result = mysql_query($query);
			
			$row_check = mysql_fetch_array($result, MYSQL_ASSOC);
			mysql_free_result($result);
			
			if ($row_check)
			{
				// uspjesno upisivanje u bazu
				print ("Uspješno ste se promijenili lozinku! Kliknite <a href='profile.php'>ovdje</a> za povratak na profil.");
				
			} 
			else 
			{
				// neuspjesno upisivanje u bazu
				print ("Neuspješna promijena podataka provjerite da li ste upisali sva polja! Kliknite <a href='profile.php'>ovdje</a> za povratak na profil.");
					
			}
		}
	?>
		
	</td>
	</tr>
</table> 

</body>

<footer>
<div id="footer">Korisnička podrška | Telefon: xx.xxx.xxx | Radno vrijeme: Svaki dan 8:00–19:00 | Email: podrska@kupiauto.net16.net</div>
<br><div id="footer">© Kupiauto d.o.o. 2016. Sva prava pridržana.</div>
<br><div id="footer"><a href="admin.php">Admin site</a> </div>
</footer>


</html>