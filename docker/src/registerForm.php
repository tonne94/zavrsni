<script language="Javascript">
  
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

	return true;
}
  
</script>
<h2>Registracija novog korisnika: </h2><br>

<form method="POST" action="register.php">

	<fieldset>
	<label>Username:</label><input type="text" class="tb5" name="username" size="20" required><br>
	<label>E-mail:</label><input type="email" class="tb5" name="email" size="20" required><br>
	<label>Password:</label><input type="password" class="tb5" name="password" size="20" required><br>
	<label>Ime:</label><input type="text" class="tb5" name="ime" size="20" required><br>
	<label>Prezime:</label><input type="text" class="tb5" name="prezime" size="20" required><br>
	<label>Kontakt broj:</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="kontakt" size="20" required><br><br>
	</fieldset>		
		<input type="submit" class="btn" value="Register" name="Register">
	<fieldset>

</form>


