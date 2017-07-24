<?php
	//Dies ist dazu da um den Cookie zu speichern für's Anmeldeformula.
	session_start();
	if(isset($_SESSION["user"])) 
	{
?>

<html>
	<head>
		<title>Eingabe</title>
		<meta charset="UTF-8" />
	</head>
	<body>
	<?php
	if(isset($_GET["page"]))
	{
	?>
		<center>
			<p>Füllen Sie bitte alle Spalten aus und drücken Sie<br />dann erst auf "Eintragen" um Ihren Eintrag zu bestätigen.
			<br />Man kann nur zwischen Menue 1, 2, 3 und 4 wählen.</p>
			<br /><br /><br />
			<!Hier wird man weiter zur Seite geleitet wenn man alle angaben gemacht hat.>
			<form action="eingabe.php?page=2" method="post">
				<table>
					<tr><td>Name: </td><td><input type="text" name="name" /></td></tr>
					<tr><td>Vorname: </td><td><input type="text" name="vorname" /></td></tr>
					<tr><td>Menue (zwischen 1-4): </td><td><input type="number" name="menue" /></td></tr>
					<tr><td colspan="2"><input type="submit" value="Eintragen" /></td></tr>
					</table>
			</form>
			<p>Sie können sich auch die <a href="eingabe.php?page=menues">Menues angucken</a>.</p><br /><br />
		</center>
	</body>
<a href="logout.php">Ausloggen </a>
</html>

<?php
	} elseif (isset($_GET["page"]) == 2) 
	{
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
		} else if ($eingegeben < 1 || $eingegeben > 4){
			?>
			<form action="eingabe.php">
			<input type="submit" value="Zurück" />
			</form>
			<?php
			die ("Sie können Ihr Menue nur ziwschen 1 und 4 wählen");
		} else 
		{
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
			echo "Ihre Angaben wurden gespeichert... Sie werden in wenigen Sekunden<br />weitergeleitet <meta http-equiv=\"refresh\" content=\"3; URL=index.php\" />";
		}
		}
	} else 
		{
?>
<Center><h2>Menues von 1 bis 4</h2></center>
<table>
<tr><td>Menue 1: </td><td>Lasagne Bolognese und als Nachtisch Vanilleeis</td></tr>
<tr><td>Menue 2: </td><td>Vegetarisches Sushi und als Nachtisch Bio Salat</td></tr>
<tr><td>Menue 3: </td><td>Herzhaftes Hänchensteak und als Nachtisch Joghurt</td></tr>
<tr><td>Menue 4: </td><td>Spinat mit Fischstäbchen und Spiegelei und als Joghurt</td></tr>
</table>
<input type="submit" value="Eingabe" />
<?php			
	}
	} else 
	{
?>
	Bitte zuerst einloggen <a href="Login.php"> hier</a>.
<?php
	}
?>