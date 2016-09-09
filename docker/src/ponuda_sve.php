<?php

    if(!isset($_GET["s"]))
    {
        $stranica = 1;
    }else $stranica = $_GET["s"];
	
	if(!isset($_GET['bO'])) 
	{
		$bO = 5;
			
	}else $bO = $_GET['bO'];
	
	include "connect.php";
	
	
	$query = "SELECT COUNT(*) FROM oglas";
	$result=mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_NUM); 
    $top = $row[0];
	mysql_free_result($result);
	
	$html = "</br><h2>Svi oglasi</h2>";
	$row=array();
	$query = "SELECT naslov, cijena, ID_oglasa FROM oglas";
	$result=mysql_query($query);
	
	for($i=1; $i<(($stranica-1)*$bO)+1; $i++)
	{
		$row = mysql_fetch_array($result, MYSQL_NUM);
	}
	
	for($i=(($stranica-1)*$bO)+1; $i<($stranica*$bO)+1; $i++)
	{	
		$slikehtml="";
		$row = mysql_fetch_array($result, MYSQL_NUM);
		if($row)
		{	
			$naslov =  $row[0];
			$cijena =  $row[1];
			$id_oglasa =  $row[2];
				
			$query_slika = "SELECT slika FROM oglas_slike WHERE ID_oglasa = '$id_oglasa'";
			$result_slika=mysql_query($query_slika);

			$ava=array();
			$broj=0;
			
			while($row = mysql_fetch_assoc($result_slika)) 
			{
				$ava[$broj] = $row['slika'];
				$broj++;
			}
			$slikehtml ="<img src='$ava[0]'style='width:300px;height:auto;'>";

			$html .= "<br><table style='width:850px; height:200px; min-height:200px;' border='0' align='center' >
					<tr>
						<td rowspan='2' style='width:300px;'>
							 $slikehtml 
						</td>
						<td>
							<a style='color: blue; text-decoration: underline; background-color: #99b3ff;' href='oglas.php?id=$id_oglasa'><h3>$naslov</h3><a>
						</td>
					</tr>
					<tr>
						<td>
							Cijena: $cijena €
						</td>
					</tr>
				</table><br><br>";
				
		}
	}

?>

<html>
 <meta charset="UTF-8"> 
<title>
Kupi auto!
</title>

<style type="text/css">

</style>
<head>

	<link rel="stylesheet" media="screen" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
		<td>
			<?php echo $html?>
		</td>	
	</tr>
	<tr>
		<td><br>
		<ul class="pagination">
		<?php
		for($i=1;$i<= ceil($top/$bO); $i++)
		{
			if($i!=$stranica)
			{
				echo "<li><a href=\"ponuda_sve.php?s=".$i."&bO=".$bO."\">".$i."</a></li>	";
			}else echo "<li class='active'><a href=''>$i</a></li>";
		}?>

		</ul>
		<br><br>
	Broj oglasa po stranici:
		<form action="ponuda_sve.php" method="GET">
			<select onchange="this.form.submit()" style="width:50px" name="bO" id="bO" class="tb5">
				<option value="1">1</option>
				<option selected="selected" value="5">5</option>
				<option value="10">10</option>
				<option value="25">25</option>
				<option value="50">50</option>
			</select>
		<form>

			<script type="text/javascript">
				document.getElementById('bO').value = "<?php echo $bO;?>";
			</script>
			
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