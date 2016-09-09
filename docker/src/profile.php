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
		<td colspan="2" style="width:700; height:100; font-size: 30px">Moj profil</td>
	</tr>
	<tr>
		<td>
			<br>
			<a id="profile_meni" href="profile.php">Moji podaci</a>
			<a id="profile_meni" href="moji_oglasi.php">Moji oglasi</a>
			<br>
			<?php

			include "connect.php";
			
			
			
				$query = "SELECT username, email, ime, prezime, kontakt FROM korisnik WHERE username='$user'";
				$result=mysql_query($query);
				if (mysql_num_rows($result) == 0)
				{continue;}
				$row = mysql_fetch_row($result);
				
				$email =  $row[1];
				$ime =  $row[2];
				$prezime =  $row[3];
				$kontakt = $row[4];
				
				print ("<h2>Profil korisnika $user:</h2></br>
				<fieldset id='oglas' style='font-size: 20px'>
				<label>Email:</label>$email</br>
				<label>Ime:</label>$ime</br>
				<label>Prezime:</label>$prezime</br>
				<label>Kontakt:</label>$kontakt</br>
				</fieldset>");
				echo "<br>";
				print ("<a href='edit_password.php' id='profile_meni'>Promjeni lozinku</a> ");
				print ("<a href='edit_kontakt.php' id='profile_meni'>Promjeni kontakt</a>");
				
				?>
		<br> <br>
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