<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>Bearbeiten</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
		<?php
			require_once("config.php");
			//Verbindung zur Datenbank.
			require_once("dbconnect.php");
			
			if(isset($_SESSION["user"]))
			{
			$admin = $_SESSION["user"];
			if($admin == "administrator") 
			{
				if(!isset($_GET["page"]))
				{
					@$save = $_GET[id];
				?>
				<h2><strong>Wählen Sie aus bei welcher Woche Sie das Menü ändern wollen.</strong></h2>
					<form action="bearbeiten.php?page=2" method="POST" >
					<select name="woche" size="1"><option>33.Kalenderwoche</option><option>34.Kalenderwoche</option><option>35.Kalenderwoche</option><option>36.Kalenderwoche</option></select>
					<?php
					echo "<input type=\"submit\" name=\"auswahl\" value=\"Auswählen\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"$save\">";
					?>
					</form>
				<?php
				}
				if (@$_GET["page"] == 2 && isset($_GET["page"]))
				{
				//Hier für den Administator.
				echo "<p>Willkommen zur Bearbeitung. Sie können hier weitere Nutzer hinzufügen oder beim ausgewählten Nutzer das Menü ändern, Administrator!</p>";
				//SQL-Anfrage: Alle Spalten die unter der ID gespeichert sind auswählen.
				$db="SELECT * FROM Tabelle WHERE ID=$_POST[id]";
				//Die Anfrage ausführen.
				$ergebnis = mysqli_query($mysqli,$db);
				//Zum bearbeiten ausgebene und nur das menüe
				 if ($row = mysqli_fetch_row($ergebnis))
				{	
				?>
					<form action="index.php?page=2" method="POST" >
					<table>
					<?php
					echo "<tr><td><br>ID: </td><td><input type=\"text\" name=\"id\" readonly value=\"$row[0]\"></td></tr>";
					echo "<tr><td><br>Name: </td><td><input type=\"text\" name=\"name\" readonly value=\"$row[1]\"></td></tr>";
					echo "<tr><td><br>Vorname: </td><td><input type=\"text\" name=\"vorname\" readonly value=\"$row[2]\"></td></tr>";
					echo "<tr><td colspan=\"1\"><h3><u>Auswahl</u></h3></td></tr>";
					echo "<tr><td><br>Menü Montag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Dienstag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Mittwoch: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Donnerstag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Freitag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br><br><input type=\"submit\" name=\"bearbeitet\" value=\"Ändern\"></td></tr>";
					echo "</table></form>\n";
				}
				?>
				<form action="hinzufügen.php">
					<br /><input type="submit" value="Neu hinzufügen" />
				</form>
				<?php
				}
			} else 
			{
				$antwort = mysqli_query($mysqli, "SELECT Vorname, Nachname FROM Anmeldung WHERE Benutzername='$_SESSION[user]'");
				if ($row = mysqli_fetch_row($antwort))
				{
				//Hier für den einzelnen Besucher.
				echo "<p>Willkommen zur Bearbeitung. Sie koennen nur das Menue aendern, $row[0] $row[1]!</p>";
				}
				//SQL-Anfrage: Alle Spalten die unter der ID gespeichert sind auswählen.
				$sql="SELECT * FROM Tabelle WHERE ID=$_GET[id]";
				//Die Anfrage ausführen.
				$ergebnis = mysqli_query($mysqli,$sql);
				 if ($row = mysqli_fetch_row($ergebnis))
				{
					//Überprüfung ob es auch der Nutzer ist dem dieser Eintrag gehört.
					if($_SESSION["user"] == strtolower($row[5]))
					{
						//Wenn ja wird das auf der Seite ausgegeben und zur Bearbeitung frei gegeben.
				?>
					<form action="index.php?page=2" method="POST" >
					<table>
					<?php
					echo "<tr><td><br>ID: </td><td><input type=\"text\" name=\"id\" readonly value=\"$row[0]\"></td></tr>";
					echo "<tr><td><br>Name: </td><td><input type=\"text\" name=\"name\" readonly value=\"$row[1]\"></td></tr>";
					echo "<tr><td><br>Vorname: </td><td><input type=\"text\" name=\"vorname\" readonly value=\"$row[2]\"></td></tr>";
					echo "<tr><td colspan=\"1\"><h3><u>Auswahl</u></h3></td></tr>";
					echo "<tr><td><br>Menü Montag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Dienstag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Mittwoch: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Donnerstag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br>Menü Freitag: </td><td><select name=\"menue\" value=\"$row[3]\" size=\"1\"><option>1</option><option>2</option><option>3</option></select></td></tr>";
					echo "<tr><td><br><br><input type=\"submit\" name=\"bearbeitet\" value=\"Ändern\"></td></tr>";
					echo "</table></form>\n";
					} else 
					{
						$antwort = mysqli_query($mysqli, "SELECT Vorname, Nachname FROM Anmeldung WHERE Benutzername='$_SESSION[user]'");
						if ($row = mysqli_fetch_row($antwort))
						{
						echo "<strong>Sie dürfen nur bei Ihrem Benutzer $row[0] $row[1] das Menü ändern!</strong><meta http-equiv=\"refresh\" content=\"4; URL=index.php\" />";
						}
					}
				}
				
			
			
			}
			} else 
			{
				echo "<p>Melden Sie sich zuerst an um diesen Beitrag zu bearbeiten...<br /><strong><a href=\"index.php\">Zurück zur Tabelle</a> oder <a href=\"login.php\">zur Anmledung</a>.</strong>";
			}
		?>
	</body>
</html>