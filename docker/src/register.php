<html>
 <meta charset="UTF-8"> 
 
 <?php 
			if (!isset($username) || !isset($email) || !isset($password) || !isset($ime) || !isset($prezime) || !isset($kontakt)){
				$potrebnaForma = 1;
		    }
			else {
				$username = $_POST ['username'];
				$email = $_POST ['email'];
				$pass = $_POST ['password'];	
				$ime = $_POST ['ime'];	
				$prezime = $_POST ['prezime'];	
				$kontakt = $_POST ['kontakt'];	
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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Registracija korisnika</td>
	</tr>
	<tr>
	
	<td>
	<?php 
		if ((!isset($_POST ['username'])) || (!isset($_POST ['email'])) || (!isset($_POST ['password'])) || (!isset($_POST ['ime'])) || (!isset($_POST ['prezime'])) || (!isset($_POST ['kontakt'])))
		{
			include("registerForm.php"); 
		}
		else if (!((!isset($_POST ['username'])) || (!isset($_POST ['email'])) || (!isset($_POST ['password'])) || (!isset($_POST ['ime'])) || (!isset($_POST ['prezime'])) || (!isset($_POST ['kontakt']))))
		{
			
				$username = $_POST ['username'];
				$email = $_POST ['email'];
				$pass = $_POST ['password'];	
				$ime = $_POST ['ime'];	
				$prezime = $_POST ['prezime'];	
				$kontakt = $_POST ['kontakt'];	
				$potrebnaForma = 0;
		
		
include "connect.php";
			
			
			$query = "SELECT * FROM korisnik WHERE username = '$username' ";
			$result = mysql_query($query);
			
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			mysql_free_result($result);
			
			if ($row)
			{
				// uspjesno upisivanje u bazu
				print ("Neuspješna registracija! Korisnik s tim usernameom već postoji. Kliknite <a href='register.php'>ovdje</a> za povratak na registraciju.");
				
			}else{
				
				$query = "SELECT * FROM korisnik WHERE email = '$email' ";
				$result = mysql_query($query);
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				mysql_free_result($result);
				if ($row)
				{
					// uspjesno upisivanje u bazu
					print ("Neuspješna registracija! Korisnik s tim emailom već postoji. Kliknite <a href='register.php'>ovdje</a> za povratak na registraciju.");
					
				} else 
				{
					$query = "  INSERT INTO `a8034263_db`.`korisnik` (`username`, `email`, `password`, `ime`, `prezime`, `kontakt`) VALUES ('$username', '$email', '$pass', '$ime', '$prezime', '$kontakt');";
					mysql_query($query);
					
					
					$query = "SELECT * FROM korisnik WHERE username = '$username' AND email = '$email' AND  password = '$pass' AND ime = '$ime' AND prezime = '$prezime' AND kontakt = '$kontakt'";
					$result = mysql_query($query);
					
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					mysql_free_result($result);
					
					if ($row)
					{
						// uspjesno upisivanje u bazu
						print ("Uspješno ste se registrirali! Kliknite <a href='index.php'>ovdje</a> za povratak na glavnu stranicu.");
						
					} 
					else 
					{
						// neuspjesno upisivanje u bazu
						print ("Neuspješna registracija! Kliknite <a href='register.php'>ovdje</a> za povratak na registraciju.");
							
					}
				}
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