<?php
	//Dies ist dazu da um den Cookie zu speichern für's Anmeldeformula.
	session_start();
	if(isset($_SESSION["user"])) 
	{
?>

<html>
	<head>
		<title>Neuen Eintrag hinzufügen.</title>
		<meta charset="UTF-8" />
	</head>
	<body>
	<?php
	if(!isset($_GET["page"]))
	{
		$zähler = 0;
	?>
		<center>
			<p>Füllen Sie bitte alle Spalten aus und drücken Sie<br />dann erst auf "Eintragen" um Ihren Eintrag zu bestätigen.
			<br />Man kann nur zwischen Menue 1, 2, 3 und 4 wählen.</p>
			<br /><br /><br />
			<form action="eingabe.php?page=2" method="post">
				<?php
				$zähler = 1;
				?>
				<table>
					<tr><td>ID: </td><td><input type="text" name="id" /></td></tr>
					<tr><td>Name: </td><td><input type="text" name="name" /></td></tr>
					<tr><td>Vorname: </td><td><input type="text" name="vorname" /></td></tr>
					<tr><td>Menue: </td><td><select name="menue" value="$row[3]" size="2"><option>1</option><option>2</option><option>3</option><option>4</option></select></td></tr>
					<tr><td colspan="2"><input type="submit" value="Eintragen" /></td></tr>
					</table>
			</form>
			<p>Sie können sich auch die <a href="eingabe.php?page=menues">Menues angucken</a>.<br /><br /></p>
		</center>
	</body>
<a href="logout.php">Ausloggen </a>
</html>

<?php
	} else if($zähler == 1) 
	{
		$eingabe = $_POST['name'];
		$eingaben = $_POST['vorname'];
		$id = $_POST['id'];
		
		
		if ($eingabe == "" || $eingaben == "" || $id == ""){
			?>
			<form action="eingabe.php">
			<input type="submit" value="Zurück" />
			</form>
			<?php
			die ("Sie haben bei einem oder mehreren Feldern keine Eingabe getätigt");
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
			$id = $_POST['id'];
		
			$eintrag = "INSERT INTO Tabelle
			(ID, Name, Vorname, Menue)
			
			VALUES
			('$id, ''$eingabe', '$eingaben', '$eingegeben')";
			
			$eintragen= mysqli_query($db_link, $eintrag);
			
			if($eintragen == true) {
			echo "Ihre Angaben wurden gespeichert... Sie werden in wenigen Sekunden<br />weitergeleitet <meta http-equiv=\"refresh\" content=\"3; URL=index.php\" />";
		}
		}
	} else 
	{
?>
<Center><h2>Menues von 1 bis 4</h2></center>
<form action="eingabe.php" method="post">
				<?php
				$zähler = 2;
				?>
	<table>
		<tr><td>Menue 1: </td><td>Lasagne Bolognese und als Nachtisch Vanilleeis</td></tr>
		<tr><td>Menue 2: </td><td>Vegetarisches Sushi und als Nachtisch Bio Salat</td></tr>
		<tr><td>Menue 3: </td><td>Herzhaftes Hänchensteak und als Nachtisch Joghurt</td></tr>
		<tr><td>Menue 4: </td><td>Spinat mit Fischstäbchen und Spiegelei und als Joghurt</td></tr>
		<tr><td colspan="2"><input type="submit" value="Eintragen" /></td></tr>
	</table>
</form>
<?php			
	}
	} else 
	{
?>
	Bitte zuerst einloggen <a href="Login.php"> hier</a>.
<?php
	}
?>