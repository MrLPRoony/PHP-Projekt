<!DOCTYPE html>
<?php require_once("config.php");
	require_once("dbconnect.php");
	/*
	Das session_start(); ist dazu da um einen Cookie anzulegen
	für die Anmeldung
	*/
	session_start();
	$verhalten = 0;
	/*
	Hier wird direkt am Anfang überprüft ob man schon angemeldet ist, 
	wenn dies der fall ist wird verhalten auf 3 gesetzt.
	*/
	if(!isset($_SESSION["user"]) && !isset($_GET["page"])) {
		$verhalten = 0;
	} else {
		$verhalten = 3;
	}
	if (isset($_GET["page"]) == "log") {
	
		$user = strtolower($_POST["Benutzer"]);
		$passwort = hash('sha1',$_POST["pw"]);
		//Diese Variable Control ist zur Überprüfung da ob es den Namen schon in der Datenbank gibt.
		$control = 0;
		$db = "SELECT * FROM Anmeldung WHERE Benutzername = '$user' AND Passwort = '$passwort'";  
		$ergebnis = mysqli_query($mysqli,$db); 
		while($row = $ergebnis->fetch_object())
		{
			$control++;
		}
	
		if($control != 0) {
			$_SESSION["user"] = $user;
			$verhalten = 1;
		}
		else {
			$verhalten = 2;
		}
	}
	if (isset($_GET["page"]) == "log" && $verhalten == 1) {
		$prüf = 0;
		$antwort = mysqli_query($mysqli, "SELECT * FROM Anmeldung WHERE Benutzername = '$user' AND Neu = '0'");
		while($row = $antwort->fetch_object())
		{
			$prüf++;
		}
		if($prüf != 0){
			$verhalten=7;
			
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=neu.php?name=$user\" />";
		}
	}
?>
<html>
	<head>
		<!Hier kommt die Ausgabe und Überprüfung des Logins>
		<title>Login</title>
		<meta charset="UTF-8" />
		<?php
		if($verhalten == 1) {
		?>
		<?php//Um die Seite nach ner gewissen Sekunde wieder neu zu laden.?>
			<meta http-equiv="refresh" content="3; URL=index.php" />
		<?php
		}
		?>
	</head>
	<body bgcolor=#ffffe0>
		<?php
			if($verhalten == 0) {
		?>
		<h3>Bitte loggen Sie sich ein:</h3>
		<form action="Login.php?page=log" method="post" ><br />
			<table>
				<tr><td>Name: </td><td><input type="text" name="Benutzer" /></td></tr>
				<tr><td>Passwort: </td><td><input type="password" name="pw" /></td></tr>
				<tr><td colspan="2"><input type="submit" value="Einloggen" /></td></tr>
				</table>
			<p><a href="index.php">Zurück zur Tabelle.</a></p>

		</form>
		<?php
			}
			if($verhalten == 1){
		?>
		<p>Sie haben sich erfolgreich eingeloggt Sie werden in wenigen Sekunden weitergeleitet...</p>
		<?php
			}
			if($verhalten == 2) {
		?>
		<p>Sie haben Ihr Passwort oder Benutzernamen falsch eingegeben. <a href="Login.php">zurück</a></p>
		<?php
			} 
			if ($verhalten == 3) {
		?>
		<p>Sie sind bereits angemeldet.</p>
		<meta http-equiv="refresh" content="3; URL=index.php" />
		<?php
			}
		?>
	</body>
</html>