<?php
session_start();
session_destroy();
?>
<html>
<body>
<h3>Sie sind nun ausgeloggt.</h3><br /><br />
<h5>Sie werden in wenigen Sekunden zum Einlogfenster geleitet.</h5><br />
<h5>Wenn dies nicht automatisch funktioniert klicken Sie <a href="Login.php">hier</a>.</h5>
<meta http-equiv="refresh" content="5; URL=Login.php" />
</body>
</html>