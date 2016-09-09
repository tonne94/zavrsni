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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Admin site</td>
	</tr>
	<tr>
	<div class="sidebar">
		
	<td>
	<?php 

			 
		// admin session alive?
			
		if (isset($_SESSION['admin_username'])) {
			$admin_user = $_SESSION ['admin_username'];
			$admin_pass = $_SESSION ['admin_password'];
			$potrebnaForma = false;
		}
			  
		// ispunjena forma?
		else 
			if (!isset($_POST ['admin_username']) || !isset($_POST ['admin_password'])){
				$potrebnaForma = true;
			}
			else{
				$admin_user = $_POST ['admin_username'];
				$admin_pass = $_POST ['admin_password'];
				$potrebnaForma = false;
			}

	?>

	<?php 
		if ($potrebnaForma) include("adminForma.php"); 
		else{
			
			include "connect.php";
				
			$query = "SELECT * FROM admin WHERE username = \"" . $admin_user . "\" AND  password = \"" . $admin_pass . "\"";
			$result = mysql_query($query);
				
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			mysql_free_result($result);
				
			if ($row){
				// uspjesno spajanje
				print ("Prijavljeni ste kao administrator: <b>" . $admin_user . "</b><br><br>");
				print('
				<a href="http://file-manager.000webhost.com/web-ftp-client/index.php?" target="_blank"><img src="images/filemanager.png"  width="auto" height="64" ><br>File manager</a><br><br>
				<a href="http://sql11.000webhost.com/phpMyAdmin/index.php?db=a8034263_db&token=cbfe35c6a03f66b04e65c8c81d8432dd&old_usr=a8034263_root" target="_blank"><img src="images/phpmyadmin-logo.jpg"  width="auto" height="64" ><br>phpMyAdmin</a><br><br>
				<a href="https://members.000webhost.com/panel" target="_blank"><img src="images/000webhost_logo.jpg"  width="auto" height="64" ><br>Hosting panel</a><br><br>
				');
				print ("<br><br><a href=\"logout.php\">Logout</a><br><br>");
				$_SESSION['admin_username'] = $admin_user;
				$_SESSION['admin_password'] = $admin_pass;
				
			} 
			else{
				// neuspjesno spajanje
				print ("Nepostojeći username ili password!");
				
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