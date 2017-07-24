<?php require_once("config.php"); ?>
<?php require_once("functions.php");
/*Die Eingaben von der ersten Seite werden hier gespeichert
		und überprüft ob etwas eingegeben wurde.
		*/
        $eingabe = $_POST['name'];
		$eingaben = $_POST['vorname'];
		$eingegeben = $_POST['menue'];
		
		if ($eingabe == "" || $eingaben == "" || $eingegeben == ""){
			?>
			<form action="eingabe.php">
			<input type="submit" value="Zurück" />
			</form>
			<?php
			die ("Sie haben bei einem oder mehreren Feldern keine Eingabe getätigt");
		} else if ($eingegeben < 1 || $eingegeben > 3){
			?>
			<form action="eingabe.php">
			<input type="submit" value="Zurück" />
			</form>
			<?php
			die ("Sie können Ihr Menue nur ziwschen 1 und 3 wählen");
		}
?>
<head>
		<title><?php echo $website_title; ?></title>
		<meta charset="<?php echo $website_charset; ?>" />
</head>

<!DOCTYPE html>
<html>
	<head>
			<title><?php echo $website_title; ?></title>
			<meta charset="<?php echo $website_charset; ?>" />
	</head>
	<body>
		<!HTML Elemente um den Text auf der Seite zu Zentrieren oder andere Sachen zu machen.>
		<center><div style="background-color:cyan; width:  600px; height: 37px; padding: 30px;= 50"><h1 style="text-indent:10;"><b><u>Dies ist eine Test Datenbank</u></b></h1></center></div><br /><br />
		
		<?php 
		echo "<p align=right>";
		echo date("d.M.Y  H:i:s"); 
		echo "</p>";
		?>
		<?php 
		//Verbindung mit der bestehenden Datenbank ('mysql:host=[IP];dbname=[NAME]', 'Benutzername', 'Passwort');
		$db_link = mysqli_connect (
                     MYSQL_HOST, 
                     MYSQL_BENUTZER, 
                     MYSQL_KENNWORT, 
                     MYSQL_DATENBANK
                    )
		or die ("Fehler beim Verbinden zur Tabelle.");
		/*Die Eingaben von der ersten Seite werden hier gespeichert
		und überprüft ob etwas eingegeben wurde.
		*/
        $eingabe = $_POST['name'];
		$eingaben = $_POST['vorname'];
		$eingegeben = $_POST['menue'];
		
		$eintrag = "INSERT INTO Tabelle
		(Name, Vorname, Menue)
			
		VALUES
		('$eingabe', '$eingaben', '$eingegeben')";
			
		$eintragen= mysqli_query($db_link, $eintrag);
			
		if($eintragen == true) {
			echo "Ihre Angaben wurden gespeichert...";
		} else {
			echo "Fehler im System. Ihre Angaben onnte nicht gespeichert werden!";
		}
		//Abfrage der erstellten Tabelle ('SELECT [Die Spalten] FROM [Der Tabelle] ORDER By [Sortieren nach] LIMIT [Zahl]';)
		$sql = "SELECT * FROM Tabelle ORDER BY ID LIMIT 150";
		$db_erg = mysqli_query( $db_link, $sql );
		if( ! $db_erg)
		{
			die('Ungültige Abfrage: ' . mysqli_error());
		}
		
		//Ausgabe mittels einer foreach Schleife. 
		echo '<center>';
		echo '<table cellpadding="5" border="3" width="70%">';
		echo "<td bgcolor=cdcdcd><u>". "ID" . "</u></td>";
		echo "<td bgcolor=cdcdcd><u>". "Name" . "</u></td>";
		echo "<td bgcolor=cdcdcd><u>". "Vorname" . "</u></td>";
		echo "<td bgcolor=cdcdcd><u>". "Menue" . "</u></td>";
		echo "<td bgcolor=707070><u>". "Erstellt" . "</u></td>";
		while ($zeile = mysqli_fetch_array( $db_erg ))
		{
			echo "<tr>";
			echo "<td bgcolor=cdcdcd>". $zeile['ID'] . "</td>";
			echo "<td bgcolor=cdcdcd>". $zeile['Name'] . "</td>";
			echo "<td bgcolor=cdcdcd>". $zeile['Vorname'] . "</td>";
			echo "<td bgcolor=cdcdcd>". $zeile['Menue'] . "</td>";
			echo "<td bgcolor=707070>". $zeile['Datum'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo '</center>';
 
		mysqli_free_result( $db_erg );
		?>
		<form action="eingabe.php">
		<input type="submit" value="Eintragen" />
		</form>
	</body>
</html>