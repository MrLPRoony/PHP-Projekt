<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>BIS - Menü auswahl</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
		<?php
			if(isset($_SESSION["user"]) && isset($_SESSION["kalenderwoche"]))
			{
		?>
		<?php
			} else 
			{
				echo "<center><strong><h2>Sie haben sich nicht angemeldet oder keine Kalenderwoche ausgewählt.</h2></strong></center><br /><strong><h3>Zur<a href=\"http://bis.ahrcomp.de\">Anmeldung</a></h3></strong>";
				echo "<br /><center><img src='Warnung.png' /></center>";
			}
		?> 
	</body>
</html>