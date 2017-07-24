<!DOCTYPE html>
<html>
	<head>
		<title>Neu angemeldet</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
		<strong><h2>Erste Anmeldung</h2></strong>
		<h4>Bitte ändern Sie das standard Passwort damit es sicherer ist.</h4>
		<?php
			session_start();
			require_once("dbconnect.php");
			require_once("config.php");
			if(isset($_GET["name"]))
			{
					$sql="SELECT * FROM Anmeldung WHERE Benutzername='$_GET[name]'";
					//Die Anfrage ausführen.
					$ergebnis = mysqli_query($mysqli,$sql);
					if ($row = mysqli_fetch_row($ergebnis))
					{
		?>
				<form method="POST" action="neu.php?page=2">
					<table>
						<?php echo "<tr><td>Name: </td><td><input type=\"text\" readonly name=\"user\" value=\"$row[1]\" /></td></tr>"; ?>
						<tr><td>Altes Passwort: </td><td><input type="password" name="pwa" /></td></tr>
						<tr><td>Neues Passwort: </td><td><input type="password" name="pwn" /></td></tr>
						<tr><td>Neues Passwort wiederholen: </td><td><input type="password" name="pwn2" /></td></tr>
						<tr><td colspan="2"><input type="submit" value="Ändern" /></td></tr>
					</table>
				</form>
		<?php	
					
					}
			} 
			else 
			{
					$sql="SELECT * FROM Anmeldung WHERE Benutzername='$_POST[user]'";
					//Die Anfrage ausführen.
					$ergebnis = mysqli_query($mysqli,$sql);
					if ($row = mysqli_fetch_row($ergebnis))
					{
						if ($row[4] == hash('sha1',$_POST["pwa"]))
						{
							//Hier geht es weiter wenn man das alte Passwort richtig eingegeben hat.
							$pwn = hash('sha1',$_POST["pwn"]);
							$pwn2 = hash('sha1',$_POST["pwn2"]);
							if($pwn == $pwn2)
							{
								if ($pwn == hash('sha1',$_POST["pwa"]))
								{
									echo "<strong>Ihr neues Passwort stimmt mit dem alten überein, bitte wählen Sie ein anderes.</strong><br/>";
		?>
									<form method="POST" action="neu.php?page=2">
										<table>
											<?php echo "<tr><td>Name: </td><td><input type=\"text\" readonly name=\"user\" value=\"$row[1]\" /></td></tr>"; ?>
											<tr><td>Altes Passwort: </td><td><input type="password" name="pwa" /></td></tr>
											<tr><td>Neues Passwort: </td><td><input type="password" name="pwn" /></td></tr>
											<tr><td>Neues Passwort wiederholen: </td><td><input type="password" name="pwn2" /></td></tr>
											<tr><td colspan="2"><input type="submit" value="Ändern" /></td></tr>
										</table>
									</form>
		<?php
								} else
								{
								//Hier geht es wieter wenn auch das neue Passwort mit der Wiederholung übereinstimmt.
								//SQL: Auffordern den Eintrag zu ändern
								$update = mysqli_query($mysqli, "UPDATE Anmeldung SET Passwort = '$pwn', Neu = '1' WHERE Benutzername = '$_POST[user]'");
								echo "<br /><strong>Sie haben ihr Passwort erfolgreich erneuert.</strong><meta http-equiv=\"refresh\" content=\"3; URL=index.php\" />";
								}
							}
							else
							{
								echo "<strong>Ihr wiederholtes Passwort stimmt nicht mit dem neuen Passwort überein.</strong><br />";
		?>
								<form method="POST" action="neu.php?page=2">
									<table>
										<?php echo "<tr><td>Name: </td><td><input type=\"text\" readonly name=\"user\" value=\"$row[1]\" /></td></tr>"; ?>
										<tr><td>Altes Passwort: </td><td><input type="password" name="pwa" /></td></tr>
										<tr><td>Neues Passwort: </td><td><input type="password" name="pwn" /></td></tr>
										<tr><td>Neues Passwort wiederholen: </td><td><input type="password" name="pwn2" /></td></tr>
										<tr><td colspan="2"><input type="submit" value="Ändern" /></td></tr>
									</table>
								</form>
		<?php
							}
						}
						else 
						{
							//Die Anfrage ausführen.
							$ergebnis = mysqli_query($mysqli,$sql);
							if ($row = mysqli_fetch_row($ergebnis))
							{
								echo "<strong>Sie haben Ihr altes Passwort falsche eingegeben.</strong><br />";
		?>
								<form method="POST" action="neu.php?page=2">
									<table>
										<?php echo "<tr><td>Name: </td><td><input type=\"text\" readonly name=\"user\" value=\"$row[1]\" /></td></tr>"; ?>
										<tr><td>Altes Passwort: </td><td><input type="password" name="pwa" /></td></tr>
										<tr><td>Neues Passwort: </td><td><input type="password" name="pwn" /></td></tr>
										<tr><td>Neues Passwort wiederholen: </td><td><input type="password" name="pwn2" /></td></tr>
										<tr><td colspan="2"><input type="submit" value="Ändern" /></td></tr>
									</table>
								</form>
		<?php
							}
						}
					}
			}
		?>
	</body>
</html>