<?php
require_once("dbconnect.php");
if (isset($_POST['insert']))
    {
        mysql_query("insert into `mytable` (`feld1`,`feld2`) values ('".$_POST['feld1']."','".$_POST['feld2']."')",$db);
        header('Location:'.$_SERVER['PHP_SELF']);
    }
elseif (isset($_POST['update']))
    {
        mysql_query("update `mytable` set `feld1`='".$_POST['feld1']."', `feld2`='".$_POST['feld2']."' where `id`='".$_POST['id']."'",$db);
        header('Location:'.$_SERVER['PHP_SELF']);
    }
elseif (!empty($_GET['delete']))
    {
        mysql_query("delete from `mytable` where `id`='".$_GET['delete']."'",$db);
        header('Location:'.$_SERVER['PHP_SELF']);
    }
elseif (!empty($_GET['edit']))
    {
        $results=mysql_query("select * from `mytable` where `id`='".$_GET['edit']."'",$db);
        $result=mysql_fetch_assoc($results);
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
        echo 'Feld 1:<input type="text" name="feld1" value="'.$result['feld1'].'"><br>';
        echo 'Feld 2:<input type="text" name="feld2" value="'.$result['feld2'].'"><br>';
        echo '<input type="hidden" name="id" value="'.$_GET['edit'].'">';
        echo '<input type="submit" name="update" value="Update">';
        echo '</form>';
    }
else
    {
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
        echo 'Feld 1:<input type="text" name="feld1"><br>';
        echo 'Feld 2:<input type="text" name="feld2"><br>';
        echo '<input type="submit" name="insert" value="Insert">';
        echo '</form>';
        echo '<table border="1">';
        echo '<tr><th>Feld1</th><th>Feld2</th><th colspan="2">Aktion</th></tr>';
        $results=mysql_query($db, "SELECT * FROM `Tabelle`");
        while ($result=mysql_fetch_assoc($results))
            {
                echo '<tr><td>'.$result['feld1'].'</td><td>'.$result['feld2'].'</td><td><a href="'.$_SERVER['PHP_SELF'].'?edit='.$result['id'].'">Bearbeiten</a></td><td><a href="'.$_SERVER['PHP_SELF'].'?delete='.$result['id'].'">Loeschen</a></td></tr>';
            }
        echo '</table>';
    }
mysql_close($db);
?>