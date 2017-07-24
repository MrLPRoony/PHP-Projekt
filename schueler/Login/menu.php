<!DOCTYPE html>
<?php 
	require_once("config.php"); 
	session_start();
?>
<html>
	<head>	
		<meta charset="UTF-8" />
		<title>Menues</title>
	</head>
	<body bgcolor=#ffffe0>
	<center><h1>Die Menue Anzahl</h1></center><br />
	<p align="right"><a href="index.php">Zur Tabelle.</a></p>
		<?php
			
			$mysqli = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
			if ($mysqli->connect_errno) 
			{
			die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
			}
			$db = "SELECT Menue FROM Tabelle ORDER BY ID";
			$db_erg= mysqli_query($mysqli,$db);
			$menue1 = 0;
			$menue2 = 0;
			$menue3 = 0;
			$menue4 = 0;
			while ($prüfen = mysqli_fetch_array( $db_erg ))
			{
		
				if ($prüfen["Menue"] == 1)
				{
					$menue1++;
				} else if ($prüfen["Menue"] == 2)
				{
					$menue2++;
				} else if ($prüfen["Menue"] == 3)
				{
					$menue3++;
				} else if ($prüfen["Menue"] == 4)
				{
					$menue4++;
				}	
			}
			echo '<center>';
			echo '<table cellpadding="2" border="2" width="70%">';
			echo "<td bgcolor=5dc264><u>". "Menue 1" . "</u></td>";
			echo "<td bgcolor=5dc264><u>". "Menue 2" . "</u></td>";
			echo "<td bgcolor=5dc264><u>". "Menue 3" . "</u></td>";
			echo "<td bgcolor=5dc264><u>". "Menue 4" . "</u></td>";
			echo "<tr>";
			echo "<td bgcolor=76fa7e>". $menue1 . "x</td>";
			echo "<td bgcolor=76fa7e>". $menue2 . "x</td>";
			echo "<td bgcolor=76fa7e>". $menue3 . "x</td>";
			echo "<td bgcolor=76fa7e>". $menue4 . "x</td>";
			echo "</table></center></tr>";
		?>
	</body>
</html>