<?php require_once("config.php"); ?>
<?php require_once("functions.php"); ?>


<!DOCTYPE html>
<html>
	<head>
			<title><?php echo $website_title; ?></title>
			<meta charset="<?php echo $website_charset; ?>" />
	</head>
	<body>
		<!HTML Elemente um den Text auf der Seite zu Zentrieren oder andere Sachen zu machen.>
		<center><h1 style="text-indent: 50;"><b>Dies ist eine Test Datenbank</b></h1></center><br /><br />
		<?php
		//Verbindung mit der bestehenden Datenbank ('mysql:host=[IP];dbname=[NAME]', 'Benutzername', 'Passwort');
		$db_link = mysqli_connect (
                     MYSQL_HOST, 
                     MYSQL_BENUTZER, 
                     MYSQL_KENNWORT, 
                     MYSQL_DATENBANK
                    );
		//Abfrage der erstellten Tabelle ('SELECT [Die Spalten] FROM [Der Tabelle] ORDER By [Sortieren nach] LIMIT [Zahl]';)
		$sql = 'SELECT * FROM pages ORDER BY ID LIMIT 150';
		$db_erg = mysqli_query( $db_link, $sql );
		if( ! $db_erg)
		{
			die('Ungültige Abfrage: ' . mysqli_error());
		}
		//Ausgabe mittels einer foreach Schleife. 
		echo '<table border="1">';
		echo "<td>". "ID" . "</td>";
		echo "<td>". "Name" . "</td>";
		echo "<td>". "Menue" . "</td>";
		echo "<td>". "Erstellt" . "</td>";
		while ($zeile = mysqli_fetch_array( $db_erg ))
		{
			echo "<tr>";
			echo "<td>". $zeile['ID'] . "</td>";
			echo "<td>". $zeile['Name'] . "</td>";
			echo "<td>". $zeile['Menue'] . "</td>";
			echo "<td>". $zeile['Datum'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
 
		mysqli_free_result( $db_erg );
		?>
	</body>
</html>