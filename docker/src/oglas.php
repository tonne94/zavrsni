<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
    }
	$html = "";
	$slikehtml = "";
	include "connect.php";

	
	$query = "SELECT * FROM oglas WHERE ID_oglasa='$id'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	
	$proizvodac = $row[1];
	$model = $row[2];
	$tip_motora = $row[3];
	$gorivo = $row[4];
	$kilometraza = $row[5];
	$godiste =  $row[6];
	$snaga_ks =  $row[7];
	$radni_obujam =  $row[8];
	$vlasnik =  $row[9];
	$datepicker =  $row[10];
	$cijena =  $row[11];
	$naslov =  $row[12];
	$opis =  $row[13];
	$id_korisnika =  $row[14];
	
	$query = "SELECT username, kontakt, email  FROM korisnik WHERE ID_korisnika='$id_korisnika'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	$oglas_username=$row[0];
	$oglas_kontakt=$row[1];
	$oglas_email=$row[2];
	
	$html = "<h2>$naslov</h2><br>
	<fieldset id='oglas'>
		<label>Marka automobila:</label>$proizvodac
		<hr>
		<label>Model:</label>$model
		<hr>
		<label>Tip motora:</label>$tip_motora
		<hr>
		<label>Motor:</label>$gorivo
		<hr>
		<label>Prijeđeni kilometri:</label>$kilometraza
		<hr>
		<label>Godina proizvodnje:</label>$godiste.
		<hr>
		<label>Snaga motora:</label>$snaga_ks KS
		<hr>
		<label>Radni obujam:</label>$radni_obujam cm<sup>3</sup>
		<hr>
		<label>Vlasnik:</label>$vlasnik
		<hr>
		<label>Registriran do:</label>$datepicker
		<hr>
		<label>Cijena:</label>$cijena €
		<hr>
		<label>Dodatni opis:</label><div id='opis'><br><br>$opis<div>
		<hr>
		<label>Oglas objavio korisnik:</label>$oglas_username
		<hr>
		<label>Kontakt broj:</label>$oglas_kontakt
		<hr>
		<label>Email:</label>$oglas_email
		<br>
	</fieldset>";
		
	$query = "SELECT slika FROM oglas_slike WHERE ID_oglasa = '$id'";
	$result=mysql_query($query);

	$slika=array();
	$broj=0;
	
	while($row = mysql_fetch_assoc($result)) 
	{
		$slika[$broj] = $row['slika'];
		$broj++;
	}
	for($i=0; $i<$broj; $i++)
	{
	$slikehtml.="<img src='$slika[$i]' class='fancybox' style='width:150px;height:auto;'>&nbsp;";

		if($i%2!=0 && $i!=0)
		{
			$slikehtml.="<br>";
		}
	}
?>
<html>
 <meta charset="UTF-8"> 
<title>
Kupi auto!
</title>

<link rel="stylesheet" media="screen" href="style.css">
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

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
		<td><?php echo $html;?></td>
		<td><h2>Slike:</h2><?php echo $slikehtml;?></td>
	</tr>
</table> 

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
</body>

<footer>
<div id="footer">Korisnička podrška | Telefon: xx.xxx.xxx | Radno vrijeme: Svaki dan 8:00–19:00 | Email: podrska@kupiauto.net16.net</div>
<br><div id="footer">© Kupiauto d.o.o. 2016. Sva prava pridržana.</div>
<br><div id="footer"><a href="admin.php">Admin site</a> </div>
</footer>


</html>