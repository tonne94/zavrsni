<script>
function goBack() {
    window.history.back();
}
</script>
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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Prijava korisnika</td>
	</tr>
	<tr>
	<div class="sidebar">
		
	<td>
	<?php 

		// login session alive?
			
		if (isset($_SESSION['username'])) {
			$user = $_SESSION ['username'];
			$pass = $_SESSION ['password'];
			$potrebnaForma = false;
		}
			  
		// ispunjena forma?
		else 
			if (!isset($_POST ['username']) || !isset($_POST ['password'])){
				$potrebnaForma = true;
			}
			else{
				$user = $_POST ['username'];
				$pass = $_POST ['password'];
				
				$potrebnaForma = false;
			}

	?>
		
	<?php 
				
	if ($potrebnaForma) include("loginForma.php"); 
	else
	{
		include "connect.php";
				
		$query = "SELECT * FROM korisnik WHERE username = \"" . $user . "\" AND  password = \"" . $pass . "\"";
		$result = mysql_query($query);
			
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_free_result($result);
				
		if ($row){
			// uspjesno spajanje

			$_SESSION['username'] = $user;
			$_SESSION['password'] = $pass;
			
			header("Refresh:0; url=index.php");
			
		} 
		else{
			// neuspjesno spajanje
			print ("Nepostojeći username ili lozinka! Kliknite <a href='login.php'>ovdje</a> za povratak na login.");
			session_unset();
			
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