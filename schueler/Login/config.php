<?php
	$website_title   = "Essensplan MySQL Datenbank";
	$website_charest = "UTF-8";
	$website_pages   = "pages";
	static $tage;
	
	/*
	Die Konstanten auslagern in eigene Datei
	die dann per require_once ('config.php'); 
	geladen wird.
 
	Damit alle Fehler angezeigt werden
	error_reporting(E_ALL);

	Zum Aufbau der Verbindung zur Datenbank
	die Daten erhält man von XAMPP und phpMyAdmin
	*/
	define ( 'MYSQL_HOST',      'localhost' );
	define ( 'MYSQL_BENUTZER',  'Rene' );
	define ( 'MYSQL_KENNWORT',  '123456' );
	define ( 'MYSQL_DATENBANK', 'schueler' );
?>