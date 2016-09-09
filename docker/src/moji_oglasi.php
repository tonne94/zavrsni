<?php
	
	session_start();
	if (isset($_SESSION['username']) ) {
	$user = $_SESSION['username'];
	}
	
	include "connect.php";
	
	$query = "SELECT ID_korisnika FROM korisnik WHERE username='$user'";
	$result=mysql_query($query);
	while($row = mysql_fetch_assoc($result)) {
    $id_korisnik = $row['ID_korisnika'];
	}
	
	$query = "SELECT ID_oglasa FROM oglas ORDER BY ID_oglasa DESC LIMIT 1";
	$result=mysql_query($query);
	while($row = mysql_fetch_assoc($result)) {
    $top = $row['ID_oglasa'];
	}
	
	$html = "";
	
	for($i=1;$i<=$top;$i++)
	{	
	$slikehtml="";
		$query = "SELECT naslov, opis, cijena FROM oglas WHERE ID_oglasa='$i' AND ID_korisnika = '$id_korisnik'";
		$result=mysql_query($query);
		if (mysql_num_rows($result) == 0)
		{continue;}
		$row = mysql_fetch_row($result);
		//$proizvodac = $row['proizvodac'];
		//$model = $row['model'];
		//$tip_motora = $row['tip_motora'];
		//$gorivo = $row['gorivo'];
		//$kilometraza = $row['kilometraza'];
		//$godiste =  $row['godiste'];
		//$snaga_ks =  $row['snaga_ks'];
		//$radni_obujam =  $row['radni_obujam'];
		//$vlasnik =  $row['vlasnik'];
		//$datepicker =  $row['datepicker'];
		$cijena =  $row[2];
		$naslov =  $row[0];
		$opis =  $row[1];
			
		$query = "SELECT slika FROM oglas_slike WHERE ID_oglasa = '$i'";
		$result=mysql_query($query);

		$ava=array();
		$broj=0;
		
		while($row = mysql_fetch_assoc($result)) 
		{
			$ava[$broj] = $row['slika'];
			$broj++;
		}
		//for($j=0;$j<$broj;$j++)
		{
			$slikehtml .="<img src='$ava[0]'style='width:300px;height:auto;'>";
		}
		
		$html .= "<br><table style='width:850px; height:200px; min-height:200px;' border='0' align='center' >
				<tr>
					<td rowspan='2' style='width:300px;'>
						 $slikehtml 
					</td>
					<td>
						<a style='color: blue; text-decoration: underline; background-color: #99b3ff;' href='oglas.php?id=$i'><h3>$naslov</h3><a>
					</td>
				</tr>
				<tr>
					<td>
						Cijena: $cijena €
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<br><a id='profile_meni' href='delete.php?id=$i'>Izbriši oglas</a><br><br>
					</td>
				</tr>
			</table><br><hr>";
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
		<td colspan="2" style="width:700; height:100; font-size: 30px">Moj profil</td>
	</tr>
	<tr>
		<td>
			<br>
			<a id="profile_meni" href="profile.php">Moji podaci</a>
			<a id="profile_meni" href="moji_oglasi.php">Moji oglasi</a>
			<br>
			<?php echo $html ?>
		
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