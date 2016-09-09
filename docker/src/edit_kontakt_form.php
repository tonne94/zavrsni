<script language="Javascript">
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;	
	return true;
}
</script>
<h2>Promjena kontakta: </h2><br>
<form method="POST" action="edit_kontakt.php">
	<fieldset>
	<label>Kontakt broj:</label><input onkeypress="return isNumberKey(event)" type="text" class="tb5" name="kontakt" size="20" required><br><br>
	</fieldset>		
		<input type="submit" class="btn" value="Promijeni kontakta" name="Promijena_podataka">
</form>


