<!DOCTYPE html>
<html>
	<head>
		<title>Neu bei uns? - jetzt Rregistrieren</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
<?php 
	session_start();
	require_once("config.php");
	
	if(@strtolower($_SESSION["user"] == "administrator"))
	{
?>

		<!Hier kommt das Aussehen der php Seite>
		<center><h3>Registrieren</h3></center>
		<?php
		if (!isset($_GET["page"])){
		?>
		<table>
			<form action="register.php?page=2" method="post">
				<tr><td>ID: </td><td><input type="text" name="ID" /></td></tr>
				<tr><td>Name: </td><td><input type="text" name="username" /></td></tr>
				<tr><td>Passwort: </td><td><input type="password" name="pw" /></td></tr>
				<tr><td>Passwort wiederholen: </td><td><input type="password" name="pw2" /></td></tr>
				<tr><td colspan="2"><input type="submit" value="Registrieren" /></td></tr>
			</form>
		</table>
		<p><a href="login.php">Zurueck zur Anmeldung.</a></p>
 
		<?php
		}elseif(isset($_GET["page"]) == 2)
				{
					//Das strtolower ist eine Metode um alle Buchstaben klein zu machen.
					$user = strtolower($_POST["username"]);
					$id = $_POST["ID"];
					/*Mit hash('sha1',$_POST["pw"]) wird das eingegebene Verschlüssel damit das Passwort
					nicht roh auf der Datenbank liegt. */
					$pw = hash('sha1',$_POST["pw"]);
					$pw2 = hash('sha1',$_POST["pw2"]);
					//Hier wird überprüft ob beide eingegebenen Passwörter identisch sind.
					if ($pw != $pw2)
					{
						echo "<p>Ihr Passwort stimmt nicht ueberein. Bitte wiederholen Sie Ihre Eingabe..<a href=\"register.php\">zurueck</a></p>";
					} else 
					{
						/*Wenn meide identisch sind das verbinden wir zur Datenbank um zu überprüfen ob es schon einen Benutzer
						zu dem Namen gibt, wenn nicht dann wird dieser mit dem Passwort angelegt und gespeichert.*/
						$mysqli = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
						if ($mysqli->connect_errno) {
							die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
						}
						//Diese Variable Control ist zu Überprüfung da ob es den Namen schon in der Datenbank gibt.
						$control = 0;
						$db = "SELECT Benutzername FROM Anmeldung WHERE Benutzername = '$user'";  
						$ergebnis = mysqli_query($mysqli,$db); 
						while($row = $ergebnis->fetch_object())
						{
							$control++;
						}	
						//Wenn $control höher als Null ist dann wird eine messag ausgegeben das zu dem Namen schon
						// ein Konto vorhanden ist.
						if ($control != 0) 
						{
							echo "<p>Es existiert bereits ein Konto zu diesem Namen.<a href=\"register.php\">Zurueck</a></p>";
						} else 
						{
							//Hier werdeb die vorherigen Eingaben in der Datenbank gespeichert.
							$eintrag = "INSERT INTO Anmeldung
							(ID, Benutzername, Passwort)
			
							VALUES
							('$id', '$user', '$pw')";
			
							$eintragen= mysqli_query($mysqli, $eintrag);
							//Hier wird überprüft ob alles einwandfrei lief ohne Fehler.
							if ($eintragen == true) 
							{
								echo "<p>Vielen Dank Sie sind nun registriert... <a href=\"login.php\">Jetzt anmelden</a></p>";
							} else 
							{
								echo "<p>Bei der Registrierung ist ein Fehler unterlaufen bitte versuch es <a href=\"register.php\">erneut</a></p>";
							}
						}	
					}
				} else {
					echo "<center><h1><strong>ERROR - 404<br />Diese Seite existiert nicht!</strong></h1></center><br /><a href=\"index.php\">Zur Tabelle</a>.";
				}
		} else{
			echo "<center><strong><h1>Nur der Administator kann weitere Nutzer hinzufügen</h1></strong></center><br /><a href=\"index.php\">Zur Tabelle</a>.";
		}
		?>
	
	</body>
</html>