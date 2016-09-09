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
	<td colspan="2" style="width:700; height:100; font-size: 30px">Predaja oglasa</td>
	</tr>
	<tr>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<td> 	
		<fieldset>
		<br>
		<label>Marka automobila *</label><select name="proizvodac" class="tb5" required>
<option selected="selected" disabled="disabled">Odaberite marku</option>
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
</select> <br>
		<hr>
		<label>Model *</label><input type="text" class="tb5" name="model" required><br>
		<hr>
		<label>Tip motora (npr. TDI) *</label><input type="text" class="tb5" name="tip_motora" required><br>
		<hr>
		<label>Motor *</label> <select name="gorivo" class="tb5" required>
							<option selected="selected" disabled="disabled">Odaberite tip</option>
							<option value="Benzin">Benzin</option>
							<option value="Dizel">Dizel</option>
							<option value="Plin">Plin</option>
							<option value="Benzin-plin">Benzin/Plin</option>
							<option value="Hibrid">Hibrid</option>
							<option value="Elektricni">Električni</option>
					</select> <br>
					<hr>
		<label>Prijeđeni kilometri *</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="kilometraza" required><br>
		<hr>
		<label>Godina proizvodnje *</label>
			<SCRIPT LANGUAGE="JavaScript">
			var time = new Date();
			var year = time.getYear();
			year = 2000;
			var date = year + 16; /*change the '101' to the number of years in the past you want to show */
			var past = year - 50; /*change the '100' to the number of years in the future you want to show */ 
			document.writeln ("<select name='godiste' class='tb5' required><option selected='selected' disabled='disabled'>Odaberite godiste</option>");
			do {
			document.write ("<option value=\"" +date+"\">" +date+ ".");
			date--;
			}
			while (date > past)
			document.write ("</select>");

			</script>
			<br>
			<hr>
		<label>Snaga motora (KS) *</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="snaga_ks" required><br>
		<hr>
		<label>Radni obujam (cm<sup>3</sup>) *</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="radni_obujam" required><br>
		<hr>
		<label>Vlasnik *</label><select name="vlasnik" class="tb5" required>
							<option selected="selected" disabled="disabled">Prvi/Drugi...</option>
							<option value="Prvi">Prvi</option>
							<option value="Drugi">Drugi</option>
							<option value="Treći i više">Treći i više</option>
					</select> <br>
		<hr>
		<label>Registriran do *</label><input width="142px"; type="datetime" id="datepicker" class="tb5" name="datepicker" required><br>
		<hr>
		<label>Cijena (EUR) *</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="cijena" required><br>
		<hr>
		<label>Naslov oglasa (do 50 znakova) *</label><br><input type="text" maxlength="50" class="tb5" name="naslov" size="50" required><br>
		<hr>
		<label>Dodatni opis (do 1000 znakova)</label><br>
		<textarea rows="20" cols="60" class="tb5" name="opis" maxlength="1000" placeholder="Opišite vaš oglas ovdje..."></textarea>
		<br>
		</fieldset>
	</td>
	
	<td>
	Polja označena sa * su obavezna. <br><br><br><br>
	Moguće je uplodati najviše 10 slika.<br>
	<span style="color:red;">Slike su obavezne.</span><br>Slike mogu biti veličine do 2MB.<br>Formati: .jpg, .png, .bmp, .gif, png<br><br><br><br>
	Odaberite slike za vaš oglas (odaberite sve slike istovremeno):
	<br><br>
		<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" required>
		
		<br><br><br><br>
		Nakon sto ste odabrali slike i ispunili obrasce kliknite "Objavite oglas!".
		<br><br><br><br><br><br>
		<input type="submit" class="btn" value="Objavite oglas!" />
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