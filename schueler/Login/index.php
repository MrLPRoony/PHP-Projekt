<!DOCTYPE html>
<?php 
session_start();
require_once("config.php");
//Verbindung zur Datenbank.
require_once("dbconnect.php");
?>
<html>
	<head>
		<title><?php echo $website_title; ?></title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
	<?php
			if(!isset($_SESSION["user"])){
			} else {
				$essen = $_SESSION["user"];

				if($essen == "kueche" || $essen == "administrator"){
		?>
		<p align="right"><a href="menu.php">Zur Zusammenzählung.</p></a>
		<?php
			}
			}
		?>
		<center><div style="background-color:#bddbff; width:  600px; height: 30px; padding: 30px;= 50; position: center;"><h1 style="text-indent:10;"><b><u>René's-Projekt</u></b></h1></div><br /><br />
			<?php
				if(isset($_GET["page"]) == 2)
				{
					@$menue = $_POST["menue"];
					//SQL: Auffordern Den eintrag zu ändern
					@$update = mysqli_query($mysqli, "UPDATE Tabelle SET Menue = '$menue' WHERE id = '$_POST[id]'");
				}
				
				//Hier werden alle spalten der Datenbank rausgeholt un das maximum 200 Zeilen
				$db = "SELECT * FROM Tabelle ORDER BY ID";
				$db_erg= mysqli_query($mysqli,$db);

				//Ausgabe mittels einer while Schleife und das in einer Art Tabelle ausgeben.  
		
				echo '<table border="2" width="50%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
				echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
				echo "<th bgcolor=5dc264><u>". "ID" . "</u></th>";
				echo "<th bgcolor=5dc264><u>". "Bearbeitet" . "</u></th>";
				echo "<th bgcolor=5dc264><u>". "Name" . "</u></th>";
				echo "<th bgcolor=5dc264><u>". "Vorname" . "</u></th>";
				echo "<th bgcolor=5dc264><u>". "Menü" . "</u></th>";
				echo "<th bgcolor=5dc264 height =20><u>". "Bearbeiten" . "</u></th>";
				while ($zeile = mysqli_fetch_array( $db_erg ))
				{
					echo "<tr>";
					echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
					echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i:s', strtotime($zeile['Datum'])) . "</td>";
					echo "<td bgcolor=76fa7e>". $zeile['Name'] . "</td>";
					echo "<td bgcolor=76fa7e>". $zeile['Vorname'] . "</td>";
					echo "<td bgcolor=76fa7e>". $zeile['Menue'] . "</td>";
					echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><p><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a></p>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		</center>
		<?php
			if(!isset($_SESSION["user"])){
		?>
		<p align="left"><a href="login.php">Zur Anmeldung.</p></a>
		<?php
			} else			
			{
				$prüfen = $_SESSION["user"];
				if($prüfen == "administrator"){
					echo "<h5>Sie sind zurzeit als Administrator angemeldet.<br /><a href=\"logout.php\">Ausloggen</a></h5>";
				} elseif ($prüfen == "kueche"){
					echo "<h5>Sie sind zurzeit als die Kueche angemeldet.<br /><a href=\"logout.php\">Ausloggen</a></h5>";
				} else {
				$antwort = mysqli_query($mysqli, "SELECT Vorname, Nachname FROM Anmeldung WHERE Benutzername='$_SESSION[user]'");
				if ($row = mysqli_fetch_row($antwort))
				{
				echo "<h5>Sie sind zurzeit als $row[0] $row[1] angemeldet.<br /><a href=\"logout.php\">Ausloggen</a></h5>";
				}
				}
			}
		?>
	</body>
</html>