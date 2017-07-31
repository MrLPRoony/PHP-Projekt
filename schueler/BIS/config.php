<?php
	$website_title   = "Essensplan MySQL Datenbank";
	$website_charest = "UTF-8";
	$website_pages   = "pages";
	
	/*
	Die Konstanten auslagern in eigene Datei
	die dann per require_once ('config.php'); 
	geladen wird.
 
	Damit alle Fehler angezeigt werden
	error_reporting(E_ALL);

	Zum Aufbau der Verbindung zur Datenbank
	die Daten erhält man von XAMPP und phpMyAdmin
	*/
	define ( 'MYSQL_HOST',      'db690269393.db.1and1.com' );
	define ( 'MYSQL_BENUTZER',  'dbo690269393' );
	define ( 'MYSQL_KENNWORT',  'Leonie05012001+' );
	define ( 'MYSQL_DATENBANK', 'db690269393' );
	//Haupt Datenbank
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
	if ($mysqli->connect_errno) 
	{
		die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
	}
?>