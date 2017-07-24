<?php
	//Dies ist dazu da um den Cookie zu speichern für's Anmeldeformula.
	session_start();
	if(isset($_SESSION["user"])) 
	{
		$prüfen = $_SESSION["user"];
		if($prüfen == "administrator")
		{
			?>

			<html>
				<head>
					<title>Neuen Eintrag hinzufügen.</title>
					<meta charset="UTF-8" />
				</head>
				<body bgcolor=#ffffe0>
				<?php
					if(!isset($_GET["page"]))
					{
				?>
					<center>
						<p>Füllen Sie bitte alle Spalten aus und drücken Sie<br />dann erst auf "Eintragen" um Ihren Eintrag zu bestätigen.
						<br />Man kann nur zwischen Menue 1, 2, 3 und 4 wählen.</p>
						<br /><br /><br />
						<form action="hinzufügen.php?page=2" method="post">
							<table>
								<tr><td>ID: </td><td><input type="text" name="id" /></td></tr>
								<tr><td>Familienname: </td><td><input type="text" name="name" /></td></tr>
								<tr><td>Vorname: </td><td><input type="text" name="vorname" /></td></tr>
								<tr><td>Menue: </td><td><select name="menue" value="$row[3]" size="1"><option>1</option><option>2</option><option>3</option><option>4</option></select></td></tr>
								<tr><td>Anmeldename: </td><td><input type="text" name="benutzer" /></td></tr>
								<tr><td>Standart Passwort: </td><td><input type="text" name="pw" /></td></tr>
								<tr><td colspan="2"><input type="submit" value="Eintragen" /></td></tr>
							</table>
						</form>
						<p>Sie können sich auch die <a href="hinzufügen.php?page=menues">Menues angucken</a>.<br /><br /></p>
					</center>
					<a href="logout.php">Ausloggen </a>
				</body>
			</html>

			<?php
					} elseif (isset($_GET["page"]) == 2) 
					{
						/*Die Eingaben von der ersten Seite werden hier gespeichert
						und überprüft ob etwas eingegeben wurde.
						*/
						$eingabe = $_POST['name'];
						$eingaben = $_POST['vorname'];
						$id = $_POST['id'];
		
		
						if ($eingabe == "" || $eingaben == "" || $id == "")
						{
			?>
							<form action="hinzufügen.php">
								<input type="submit" value="Zurück" />
							</form>
			<?php
							die ("Sie haben bei einem oder mehreren Feldern keine Eingabe getätigt");
						} else
						{
							//Verbindung zur Datenbank.
							require_once("dbconnect.php");
							
							$name = $_POST['name'];
							$vorname = $_POST['vorname'];
							$menue = $_POST['menue'];
							$id = $_POST['id'];
							$pw = hash('sha1',$_POST["pw"]);
							
							//Für den Benutzer
							$user = strtolower($_POST['benutzer']);
							$anfrage = "INSERT INTO `Anmeldung` (`ID`, `Benutzername`, `Vorname`, `Nachname`, `Passwort`) VALUES (?, ?, ?, ?, ?)";
							$eintragen = $mysqli->prepare( $anfrage );
							$eintragen->bind_param( 'sssss', $id, $user, $vorname, $name, $pw);
							$eintragen->execute();
							
							$sql = 'INSERT INTO `Tabelle` (`ID`, `Name`, `Vorname`, `Menue`, `anmeldung` ) VALUES (?, ?, ?, ?, ?)';
							$eintrag = $mysqli->prepare( $sql );
							$eintrag->bind_param( 'sssss', $id, $name, $vorname, $menue, $user);
							$eintrag->execute();
							
							// Pruefen ob der Eintrag efolgreich war
							if ($eintrag->affected_rows > 0)
							{
			
							//$eintragen= mysqli_query($mysqli, $eintrag);
								echo "Ihre Angaben wurden gespeichert... Sie werden in wenigen Sekunden<br />weitergeleitet. <meta http-equiv=\"refresh\" content=\"3; URL=index.php\" />";
							}
						}
					} else
					{
			?>
		<Center><h2>Menues von 1 bis 4</h2></center>
		<form action="hinzufügen.php" method="post">
			<table>
				<tr><td>Menue 1: </td><td>Lasagne Bolognese und als Nachtisch Vanilleeis</td></tr>
				<tr><td>Menue 2: </td><td>Vegetarisches Sushi und als Nachtisch Bio Salat</td></tr>
				<tr><td>Menue 3: </td><td>Herzhaftes Hänchensteak und als Nachtisch Joghurt</td></tr>
				<tr><td>Menue 4: </td><td>Spinat mit Fischstäbchen und Spiegelei und als Joghurt</td></tr>
				<tr><td colspan="2"><input type="submit" value="Zurück" /></td></tr>
			</table>
		</form>
			<?php			
					}
		} else
		{
			die ("<strong>Nur der Administrator darf weitere Einträge in die Tabelle machen!</strong>");
		}
	} else 
	{
?>
	Bitte zuerst einloggen <a href="Login.php"> hier</a>.
<?php
	}
?>