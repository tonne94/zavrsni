<?php

    if(!isset($_GET["marka"]))
    {
        $marka = 0;
    }else $marka = $_GET["marka"];
	
include "connect.php";
		
?>
	<script type="text/javascript">;
		function myFunction()
		{
		window.location.href = "searchForm.php?marka=" + document.getElementById('marka').value;
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

<script language="Javascript">
  
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

	return true;
}
  
</script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
<script>
	$(function() {
	$( "#datepicker" ).datepicker();
	});
</script>

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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Pretraživanje oglasa</td>
	</tr>
	<tr>
	<form action="ponuda.php" method="POST">
	<td> 	
			<fieldset>
			<br>
			<label>Marka automobila </label>
			<select onchange="myFunction()" name="marka" id="marka" class="tb5">
			<option selected="selected" value=''>Odaberite marku</option>
				<option value='Alfa Romeo'>Alfa Romeo</option>
				<option value='Aston Martin'>Aston Martin</option>
				<option value='Audi'>Audi</option>
				<option value='Bentley'>Bentley</option>
				<option value='BMW'>BMW</option>
				<option value='Cadillac'>Cadillac</option>
				<option value='Chevrolet'>Chevrolet</option>
				<option value='Chrysler'>Chrysler</option>
				<option value='Citroen'>Citroen</option>
				<option value='Dacia'>Dacia</option>
				<option value='Daewoo'>Daewoo</option>
				<option value='Daihatsu'>Daihatsu</option>
				<option value='Dodge'>Dodge</option>
				<option value='Ferrari'>Ferrari</option>
				<option value='Fiat'>Fiat</option>
				<option value='Ford'>Ford</option>
				<option value='Honda'>Honda</option>
				<option value='Hyundai'>Hyundai</option>
				<option value='Isuzu'>Isuzu</option>
				<option value='Jaguar'>Jaguar</option>
				<option value='Jeep'>Jeep</option>
				<option value='Kia'>Kia</option>
				<option value='Lada'>Lada</option>
				<option value='Lamborghini'>Lamborghini</option>
				<option value='Lancia'>Lancia</option>
				<option value='Land Rover'>Land Rover</option>
				<option value='Lexus'>Lexus</option>
				<option value='Lotus'>Lotus</option>
				<option value='Maserati'>Maserati</option>
				<option value='Maybach'>Maybach</option>
				<option value='Mazda'>Mazda</option>
				<option value='Mercedes'>Mercedes</option>
				<option value='MG'>MG</option>
				<option value='MINI'>MINI</option>
				<option value='Mitsubishi'>Mitsubishi</option>
				<option value='Nissan'>Nissan</option>
				<option value='Opel'>Opel</option>
				<option value='Peugeot'>Peugeot</option>
				<option value='Pontiac'>Pontiac</option>
				<option value='Porsche'>Porsche</option>
				<option value='Renault'>Renault</option>
				<option value='Rolls-Royce'>Rolls-Royce</option>
				<option value='Rover'>Rover</option>
				<option value='Saab'>Saab</option>
				<option value='Seat'>Seat</option>
				<option value='Smart'>Smart</option>
				<option value='Ssang Yong'>Ssang Yong</option>
				<option value='Subaru'>Subaru</option>
				<option value='Suzuki'>Suzuki</option>
				<option value='Škoda'>Škoda</option>
				<option value='Tata'>Tata</option>
				<option value='Tesla'>Tesla</option>
				<option value='Toyota'>Toyota</option>
				<option value='Volvo'>Volvo</option>
				<option value='VW'>VW</option>
				<option value='Yugo'>Yugo</option>
				<option value='Zastava'>Zastava</option>
			</select>
				<script type="text/javascript">
					document.getElementById('marka').value = "<?php echo $marka;?>";
				</script>
			<br>
			<hr>
			<label>Model </label>
				<select name="model" id="model" class="tb5">
				<option value=''>Odaberite model</option>
				<?php		
				if(!($marka))
				{
					echo "<option value=''></option>";
				}else 
				{
					$query = "SELECT model FROM oglas WHERE proizvodac='".$marka."'";
					
					$result = mysql_query($query);
					while($row=mysql_fetch_array($result, MYSQL_ASSOC)){                                                 
					   echo "<option value='".$row['model']."'>".$row['model']."</option>";
					}
				}
				?>
				
				</select>
			<br>
			<hr>
			<label>Cijena (EUR)</label><br>
			<label>od:</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="cijena_od"><br>
			<label>do:</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="cijena_do"><br>
			<hr>

			<input type="submit" class="btn" value="Traži!" />
                        <br> Ukoliko želite vidjeti sve oglase ostavite polja prazna i kliknite Traži

		</td>
	</form>
	</tr>
</table> 

</body>

<footer>
<div id="footer">Korisnička podrška | Telefon: xx.xxx.xxx | Radno vrijeme: Svaki dan 8:00–19:00 | Email: podrska@kupiauto.net16.net</div>
<br><div id="footer">© Kupiauto d.o.o. 2016. Sva prava pridržana.</div>
<br><div id="footer"><a href="admin.php">Admin site</a> </div>
</footer>


</html>