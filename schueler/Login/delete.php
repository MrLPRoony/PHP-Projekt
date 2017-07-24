<!DOCTYPE html>
<?php 
	require_once("config.php");
	require_once("dbconnect.php");
	session_start();
	if(isset($_SESSION["user"]))
	{
		$prüfen = $_SESSION["user"];
		if($prüfen == "administrator")
		{
		if(isset($_GET["id"]))
		{
?>
<html>
	<head>
		<title>Eintrag entfernen</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
		<?php
		$anfrage = "SELECT * FROM Tabelle WHERE ID= '$_GET[id]'";
		$antwort = mysqli_query($mysqli, $anfrage);
		if ($row = mysqli_fetch_row($antwort))
				{
					$user = strtolower($row[0]);
					$sql = "DELETE FROM Anmeldung WHERE ID='$user'";
					$loeschen = mysqli_query($mysqli, $sql);
				}
		$db = "DELETE FROM Tabelle WHERE ID= '$_GET[id]'";
		$loesch = mysqli_query($mysqli, $db);
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\" />";
			
		}
		} else 
		{
			?>
			<html>
				<body bgcolor=#ffffe0>
					<?php
						echo "<p>Sie dürfen nur als Administrator Einträge löschen und Sie dürfen nur bei Ihrem eignen Eintrag die Menüe auswahl ändern!</p><meta http-equiv=\"refresh\" content=\"4; URL=index.php\" />";
					?>
				</body>
			</html>
			<?php
		}
	} else {
		?>
		<html>
			<body bgcolor=#ffffe0>
				<p>Melden Sie sich zu erst an, bevor Sie etwas verändern oder gar löschen.</p><br />
				<strong><a href="index.php">Zurück zur Tabelle</a> oder <a href="login.php">zur Anmledung</a>.</strong>
			</body>
		</html>
		<?php
			}
		?>
	</body>
</html>