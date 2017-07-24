<?php
session_start();
$verhalten = 0;

if(!isset($_SESSION["username"]) && !isset($_GET["page"])) {
	$verhalten = 0;
}
if (isset($_GET["page"]) && ($_GET["page"]) == "log") {
	
	$user = $_POST["Benutzer"];
	$passwort = $_POST["Passwort"];
	
	if($user == "Henrik" && $passwort == "toll") {
		$_SESSION["username"] = $user;
		$verhalten = 1;
	}
	else {
		$verhalten = 2;
	}
}
?>
<html>
<head>
	<title>Login</title>
	<?php
	if($verhalten == 1) {
	?>
	<Um die seite nach ner gewissen Sekunde wieder neu zu laden. />
		<meta http-equiv="refresh" content="3; URL=eingabe.php" />
	<?php
	}
	?>
</head>
<body>
<?php
if($verhalten == 0) {
?>
Bitte loggen Sie sich ein:
<form method="post" action="Login.php?page=log"><br />
Benutzername: <input type="text" name="Benutzer" /><br /><br />
Passwort: <input type="password" name="Passwort" /><br />
 <input type="submit" name="Einloggen" />
</form>
<?php
}
if($verhalten == 1){
?>
Sie haben sich erfolgreich eingeloggt Sie werden in wenigen Sekunden weitergeleitet...
<?php
}
if($verhalten == 2) {
?>
Sie haben Ihr Passwort oder Benutzernamen falsch eingegeben. <a href="Login.php">zurück</a>
<?php
}
?>
</body>
</html>