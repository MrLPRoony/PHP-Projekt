<!DOCTYPE html>
<?php
	//Dies ist dazu da um den Cookie zu speichern für's Anmeldeformula.
	session_start();
	//Verbindung zur Datenbank.
	require_once("dbconnect.php");
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
							<br />Man kann nur zwischen Menü 1, 2, 3 und 4 wählen.</p>
							<br /><br /><br />
							<form action="hinzufügen.php?page=2" method="post">
								<table>
									<tr><td>ID: </td><td><input type="text" name="id" /></td></tr>
									<tr><td>Familienname: </td><td><input type="text" name="name" /></td></tr>
									<tr><td>Vorname: </td><td><input type="text" name="vorname" /></td></tr>
									<tr><td>Menue: </td><td><select name="menue" value="$row[3]" size="1"><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option></select></td></tr>
									<tr><td>Anmeldename: </td><td><input type="text" name="benutzer" /></td></tr>
									<tr><td>Standart Passwort: </td><td><input type="text" name="pw" /></td></tr>
									<tr><td colspan="2"><input type="submit" value="Eintragen" /></td></tr>
								</table>
							</form>
							<p>Sie können sich auch die <a href="hinzufügen.php?page=menues">Menüs angucken</a>.<br /><br /></p>
						</center>
						<a href="logout.php">Ausloggen </a>
			<?php
					} elseif ($_GET["page"] == 2) 
					{
						/*Die Eingaben von der ersten Seite werden hier gespeichert
						und überprüft ob etwas eingegeben wurde.
						*/
						$eingabe = $_POST['name'];
						$eingaben = $_POST['vorname'];
						$id = $_POST['id'];
						$pwe = $_POST['pw'];
						$anm = $_POST['benutzer'];
		
		
						if ($eingabe == "" || $eingaben == "" || $id == "" || $pwe == "" || $anm == "")
						{
			?>
							<form action="hinzufügen.php">
								<input type="submit" value="Zurück" />
							</form>
			<?php
							die ("Sie haben bei einem oder mehreren Feldern keine Eingabe getätigt");
						} else
						{
							$überprüfen = mysqli_query($mysqli, "SELECT * FROM Tabelle WHERE ID='$id'");
							$control=0;
							while($row = $überprüfen->fetch_object())
							{
								$control++;
							}
							if($control > 0)
							{
								echo "<strong>Die von Ihnen eingegeben ID ist schon vergeben!</strong>";
								echo "<meta http-equiv=\"refresh\" content=\"2; URL=hinzufügen.php\" />";
							} else
							{
								$überprüfen2 = mysqli_query($mysqli, "SELECT * FROM Anmeldung WHERE Benutzername='$anm'");
								$control2=0;
								while($row = $überprüfen2->fetch_object())
								{
									$control2++;
								}
								if ($control2 > 0)
								{
									echo "<strong>Der von Ihnen eingegeben Anmeldename ist schon vergeben!</strong>";
									echo "<meta http-equiv=\"refresh\" content=\"2; URL=hinzufügen.php\" />";
								} else
								{
									$name = $_POST['name'];
									$such = strtolower($name);
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
							
									$sql = 'INSERT INTO `Tabelle` (`ID`, `Name`, `Vorname`, `Menue`, `anmeldung`, `suchen` ) VALUES (?, ?, ?, ?, ?, ?)';
									$eintrag = $mysqli->prepare( $sql );
									$eintrag->bind_param( 'ssssss', $id, $name, $vorname, $menue, $user, $such);
									$eintrag->execute();
							
									// Pruefen ob der Eintrag efolgreich war
									if ($eintrag->affected_rows > 0)
									{
			
										//$eintragen= mysqli_query($mysqli, $eintrag);
										echo "Ihre Angaben wurden gespeichert... Sie werden in wenigen Sekunden<br />weitergeleitet. <meta http-equiv=\"refresh\" content=\"3; URL=index.php\" />";
									}
								}
							}
						}
					} else
					{
					$query = mysqli_query($mysqli, "SELECT * FROM Menues");
					if($menues = mysqli_fetch_row($query))
					{
						echo "<h2>Die Menüs!</h2>";
						echo "<form action=\"hinzufügen.php\" method=\"post\">";
						echo "<table>";
						echo "<tr><td>Menü 1: </td><td>$menues[1]</td></tr>";
						echo "<tr><td>Menü 2: </td><td>$menues[2]</td></tr>";
						echo "<tr><td>Menü 3: </td><td>$menues[3]</td></tr>";
						echo "<tr><td>Menü 4: </td><td>$menues[4]</td></tr>";
					}
			?>
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
	<b>Bitte zuerst einloggen <a href="Login.php"> hier</a></b>.
<?php
	}
?>

				</body>
			</html>