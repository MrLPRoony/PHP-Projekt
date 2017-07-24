<?php
	require_once("config.php");

	$mysqli = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
	if ($mysqli->connect_errno) 
	{
		die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
	}
?>