<?php

    if(!isset($_GET["id"]))
    {
        $id = 0;
    }else $id = $_GET["id"];
	
if($id)
	{

		$file = "";
		$files = array();
		$broj=0;
		
		include "connect.php";
		
		$query="SELECT slika FROM oglas_slike WHERE ID_oglasa='$id'";
		$result=mysql_query($query);
		
		while($row = mysql_fetch_assoc($result)) {
		$files[$broj] = $row['slika'];
		$broj++;
		}

		$pobrisan=1;
		for($i=0;$i<$broj;$i++)
		{

			//try to delete file
			$file_to_delete=$files[$i];
			
			echo "<br>";
			if (unlink($file_to_delete))
			{
				$pobrisan=1;
			}
			else
			{
				$pobrisan=0;
			}

		}
		
		$html="";
		$query="DELETE FROM oglas_slike WHERE ID_oglasa='$id'";
		$result=mysql_query($query);
		$query="DELETE FROM oglas WHERE ID_oglasa='$id'";
		$result=mysql_query($query);
		$html.= "Oglas je pobrisan<br>";
		$html.= "Molimo kliknite <a href='moji_oglasi.php'>ovdje</a> ili pricekajte 5 sekundi za povratak";
		if($pobrisan==0)
		{
			$html = "Greska";
		}
		header("Refresh:5; url=moji_oglasi.php");
		// close connection
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
		<td><?php echo $html; ?></td>
	</tr>
</table> 

</body>


<footer>
<div id="footer">Korisnička podrška | Telefon: xx.xxx.xxx | Radno vrijeme: Svaki dan 8:00–19:00 | Email: podrska@kupiauto.net16.net</div>
<br><div id="footer">© Kupiauto d.o.o. 2016. Sva prava pridržana.</div>
<br><div id="footer"><a href="admin.php">Admin site</a> </div>
</footer>

</html>