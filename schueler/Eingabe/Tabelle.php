<?php 
//Dies ist dazu da um den Cookie zu speichern für's Anmeldeformula.
session_start();
if(isset($_SESSION["username"])) {
	
require_once("config.php"); ?>
<?php require_once("functions.php"); ?>

<!DOCTYPE html>
<html>
	<head>
			<title><?php echo $website_title; ?></title>
			<meta charset="<?php echo $website_charset; ?>" />
	</head>
	<body>
		<!HTML Elemente um den Text auf der Seite zu Zentrieren oder andere Sachen zu machen.>
		<center><div style="background-color:cyan; width:  600px; height: 37px; padding: 30px;= 50"><h1 style="text-indent:10;"><b><u>Dies ist eine Test Datenbank</u></b></h1></center></div><br /><br />
		<form action="eingabe.php">
		<input type="submit" value="Eintragen" />
		</form> 
		<a href="logout.php">Ausloggen </a>
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
		//Abfrage der erstellten Tabelle ('SELECT [Die Spalten] FROM [Der Tabelle] ORDER By [Sortieren nach] LIMIT [Zahl]';)
		$sql = "SELECT * FROM Tabelle ORDER BY ID LIMIT 150";
		$db_erg = mysqli_query( $db_link, $sql );
		if( ! $db_erg)
		{
			die('Ungültige Abfrage: ' . mysqli_error());
		}
		
		//Ausgabe mittels einer while Schleife und in einer Art Tabelle ausgeben.  
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
	</body>
</html>

<?php
} else {
?>
Bitte zuerst einloggen <a href="Login.php"> hier</a>.
<?php
}
?>