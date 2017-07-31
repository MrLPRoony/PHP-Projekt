<!DOCTYPE html>
<?php
session_start();
?>
<html>
	<head>
		<title>BIS - Essenstabelle</title>
		<meta charset="UTF-8" />
	</head>
	<body bgcolor=#ffffe0>
		<form method="POST" action="index.php?page=Kalenderwoche">
		
			<?php//Dies muss jeden Monat angepasst werden (immer das letzt Wochenende nach den jeweiligen Kalenderwochen) ?>
			<select name="woche" size="1"><option>33.Kalenderwoche</option><option>34.Kalenderwoche</option><option>35.Kalenderwoche</option><option>36.Kalenderwoche</option></select>
			
			<input type="submit" name="weiter" value="Auswählen" />
		</form>
		<center><div style="background-color:#bddbff; width:  500px; height: 40px; padding: 20px;= 30;"><h1 style="text-indent:10;"><strong><u>BIS - Essensplan</u></strong></h1></div><br /><br />
		<?php
			if(isset($_SESSION["kalenderwoche"]) && !isset($_GET["page"]))
			{
				if (isset($_GET["page"]))
				{
					
				}else{
				echo "<form method=\"POST\" action=\"index.php?page=suche\">";
				echo "<a>Namens Suche:</a> <center><input type=\"text\" name=\"such\" size=30> <input type=\"submit\" value=\"Suchen\"></center><br>";
				echo "</form>";
				$prüf = $_SESSION["kalenderwoche"];
				//Diese Überprüfung auch monatilich bearbeiten
				if($prüf == "33.Kalenderwoche")
				{
					//Erste Woche
					echo "33.";
					$host_name = "db690269393.db.1and1.com";
					$database = "db690269393";
					$user_name = "dbo690269393";
					$password = "Auf!43stiek";
					$connect = mysqli_connect($host_name, $user_name, $password, $database);

					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
					
				} elseif ($prüf == "34.Kalenderwoche")
				{
					//Zweite Woche
					echo "34.";
					$connect = mysqli_connect("db692671872.db.1and1.com", "dbo692671872", "Leonie05012001+8", "db692671872");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
				} elseif ($prüf == "35.Kalenderwoche")
				{
					//Dritte Woche
					echo "35.";
					$connect = mysqli_connect("db692676778.db.1and1.com", "dbo692676778", "rovercar!", "db692676778");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
				} else 
				{
					//Vierte Woche
					echo "36.";
					$connect = mysqli_connect("db692676791.db.1and1.com", "dbo692676791", "Su43!per", "db692676791");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
				}
				}
			}
			if($_GET["page"] == "Kalenderwoche")
			{
				$_SESSION["kalenderwoche"]= $_POST["woche"];
				if(isset($_SESSION["kalenderwoche"]))
				{
					if(!isset($_SESSION["user"])){	} else 
					{
						echo "$_SESSION[user]";
						$prüf = $_SESSION["user"];
						if($prüf == "administrator" || $prüf == "kueche")
						{
							echo "<p align=\"right\"><a href=\"kueche.php\">Zur Zusammenzählung</a></p>";
						}
					}
		?>
		<form method="POST" action="index.php?page=suche">
			<a>Namens Suche:</a> <center><input type="text" name="such" size=30> <input type="submit" value="Suchen"></center><br>
		</form>
		<?php
					if(isset($_GET["page"]) && $_GET["page"] == "suche")
					{
						$suche = strtolower($_POST["such"]);
						
						
						
						
						
						
						
					}else 
					{
						$prüf = $_SESSION["kalenderwoche"];
						
						//Diese Überprüfung auch monatilich bearbeiten (die Kalenderwochen müssen immer angepasst werden)
						if($prüf == "33.Kalenderwoche")
						{
					//Erste Woche
					echo "33.";
					$host_name = "db690269393.db.1and1.com";
					$database = "db690269393";
					$user_name = "dbo690269393";
					$password = "Auf!43stiek";
					$connect = mysqli_connect($host_name, $user_name, $password, $database);

					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
					
				} elseif ($prüf == "34.Kalenderwoche")
				{
					//Zweite Woche
					echo "34.";
					$connect = mysqli_connect("db692671872.db.1and1.com", "dbo692671872", "Leonie05012001+8", "db692671872");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
				} elseif ($prüf == "35.Kalenderwoche")
				{
					//Dritte Woche
					echo "35.";
					$connect = mysqli_connect("db692676778.db.1and1.com", "dbo692676778", "rovercar!", "db692676778");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><p><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a></p>";
						echo "</tr>";
					}
					echo "</table>";
				} else 
				{
					//Vierte Woche
					echo "36.";
					$connect = mysqli_connect("db692676791.db.1and1.com", "dbo692676791", "Su43!per", "db692676791");
					if (mysqli_connect_errno()) {
					die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
					}
					$db_erg = mysqli_query($connect, "SELECT * FROM TabelleKomplett LIMIT 150");
					
					echo '<table border="2" width="60%" bordercolor=#000000 bgcolor=#CCFFCC bordercolordark=#000000 bordercolorlight=#000000>';
					echo "<caption align=bottom >Alle eingetragenen Schüler</caption>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "ID" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Bearbeitet" . "</u></th>";
					echo "<th bgcolor=5dc264 rowspan=\"2\"><u>". "Name" . "</u></th>";
					echo "<th bgcolor=5dc264 colspan=\"5\"><u>". "Menüs" . "</u></th>";
					echo "<th bgcolor=5dc264 height =20 rowspan=\"2\"><u>". "Bearbeiten" . "</u></th>";
					echo "<tr>";
					echo "<td bgcolor=5dc264><u>". "Mo" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Di" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Mi" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Do" . "</u></td>";
					echo "<td bgcolor=5dc264><u>". "Fr" . "</u></td>";
					echo "</tr>";
					while ($zeile = mysqli_fetch_array( $db_erg ))
					{
						echo "<tr>";
						echo "<td bgcolor=76fa7e height = 20>". $zeile['ID'] . "</td>";
						echo "<td bgcolor=76fa7e nowrap>". date('d.m.y H:i', strtotime($zeile['Datum'])) . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Nachname'] . ", ". $zeile['Vorname'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Montag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Dienstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Mittwoch'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Donnerstag'] . "</td>";
						echo "<td bgcolor=76fa7e>". $zeile['Freitag'] . "</td>";
						echo "<td bgcolor=00e600 align=\"left\" align=\"center\" ><a href=\"bearbeiten.php?id=$zeile[0]\"><img src='2.gif' /></a> <a href=\"delete.php?id=$zeile[0]\"><img src='x.png' /></a>";
						echo "</tr>";
					}
					echo "</table>";
				}
					}
					
				} else
				{
					echo "<strong>Sie haben keine Kalenderwoche ausgewählt um die Tabelle anzeigen zu lassen.<a href=\"http://bis.ahrcomp.de\"> Zurück zur Auswahl</a>.</strong>";
				}
			}
		?>
	<center>
	</body>
</html>